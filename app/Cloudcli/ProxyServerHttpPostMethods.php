<?php

namespace App\Cloudcli;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Throwable;

class ProxyServerHttpPostMethods
{

    static function returnProxyHttpPostJsonResponse(Request $request, $httpMethod, $command, $postJson, $context) {
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            return $res;
        } else {
            $serverPath = $command["schemaCommand"]["run"]["serverPath"];
//            \Log::info("${httpMethod} ${res['server']}${serverPath} ".json_encode($postJson));
            $clientResponse = $res["client"]->request($httpMethod, $serverPath, [
                'json'  => $postJson
            ]);
            $res = ProxyServerHttp::parseClientResponse($clientResponse);
        }
        if (Arr::get($res, "error")) {
            $messages = [];
            if (Arr::get($res, "message")) {
                $messages[] = $res["message"];
            }
            if (Arr::get($res, "response.errors")) {
                foreach ($res["response"]["errors"] as &$re) {
                    $error_code = Arr::get($re, "code", "");
                    $error_info = Arr::get($re, "info", "");
                    if (strlen($error_code) > 0 && strlen($error_info) > 0) {
                        $messages[] = "$error_info ($error_code)";
                    } elseif (strlen($error_info) > 0) {
                        $messages[] = "$error_info";
                    } elseif (strlen($error_code) > 0) {
                        $message[] = "unidentified error (" . $error_code . ")";
                    }
                }
            }
            $res["message"] = implode('. ', $messages);
            return $res;
        } elseif (is_int($res) || is_string($res)) {
            return ["$res"];
        } elseif (is_array($res) && count($res) == 1) {
            return ["$res[0]"];
        } else {
            return [
                "error" => true,
                "message" => "Invalid response from server",
                "res" => $res
            ];
        }
    }

    static function replacePrePostActionContext($value, $prePostActionsContext) {
        foreach ($prePostActionsContext as $contextK=>$contextV) {
            if (is_string($contextV)) {
                $value = str_replace("<".$contextK.">", $contextV, $value);
            }
        }
        return $value;
    }

    static function _preprocessAddNetwork(Request $request, &$prePostActionsContext) {
        $serverId = $prePostActionsContext['serverId'];
        $requestRes = ProxyServerHttp::getHttpClient($request);
        if ($requestRes["error"]) {
            return $requestRes;
        } else {
            $res = $requestRes["client"]->request("GET", "/service/server/" . $serverId);
            $res = ProxyServerHttp::parseClientResponse($res);
            if (Arr::get($res, "error")) {
                \Log::error("_addNewNetwork /service/server: " . json_encode($res));
                return $res;
            } else {
                $datacenter = Arr::get($res, "datacenter");
                if (!$datacenter) {
                    return ["error" => true, "message" => "Failed to get server info"];
                }
                $prePostActionsContext["datacenter"] = $datacenter;
                $res = $requestRes["client"]->request("GET", "/svc/networks/" . $datacenter . "/create");
                $res = ProxyServerHttp::parseClientResponse($res);
                if (Arr::get($res, "error")) {
                    \Log::error("_addNewNetwork GET /svc/networks/DATACENTER/create: " . json_encode($res));
                    return $res;
                } else {
                    $prePostActionsContext["baseName"] = Arr::get($res, "name");
                    $prePostActionsContext["subnetIps"] = Arr::get($res, "subnetIp");
                    $prePostActionsContext["subnetMasks"] = Arr::get($res, "subnetMask");
                    $addNetworkName = Arr::get($prePostActionsContext, "add", "");
                    if (!empty($addNetworkName) && !empty($prePostActionsContext["baseName"]) && !Str::startsWith($addNetworkName, $prePostActionsContext["baseName"])) {
                        $prePostActionsContext["add"] = $prePostActionsContext["baseName"].$addNetworkName;
                    }
                    return null;
                }
            }
        }
    }

    static function _addNewNetwork(Request $request, $prePostAction, $prePostActionsContext) {
        $serverId = $prePostActionsContext['serverId'];
        $requestRes = ProxyServerHttp::getHttpClient($request);
        if ($requestRes["error"]) {
            return $requestRes;
        } else {
            $datacenter = Arr::get($prePostActionsContext, "datacenter");
            $baseName = Arr::get($prePostActionsContext, "baseName");
            $subnetIps = Arr::get($prePostActionsContext, "subnetIps");
            $subnetMasks = Arr::get($prePostActionsContext, "subnetMasks");
            if (!$subnetIps || !$subnetMasks || ! $baseName) {
                return ["error" => true, "message" => "Failed to get available subnet IPs / masks"];
            } else {
                $res = $requestRes["client"]->request("POST", "/svc/networks/".$datacenter."/create", [
                    "json" => [
                        "dns1" => "",
                        "dns2" => "",
                        "gateway" => "",
                        "name" => str_replace($baseName, "", Arr::get($prePostActionsContext, "add")),
                        "subnetBit" => Arr::get($prePostActionsContext, "bits"),
                        "subnetIp" => Arr::get($prePostActionsContext, "subnet")
                    ]
                ]);
                $res = ProxyServerHttp::parseClientResponse($res);
                if (Arr::get($res, "error") && Arr::get($res, "status_code") != 200) {
                    $msg = "\nFailed to create VLAN network, please check the bits and subnet flags:\n\n";
                    $msg .= "Available subnets: ".json_encode($subnetIps)."\n";
                    $msg .= "Available bits: ".json_encode($subnetMasks)."\n\n";
                    if (Arr::get($res, "response")) {
                        $msg .= json_encode($res["response"]);
                    } else {
                        $msg .= json_encode($res);
                    }
                    return ["error" => true, "message" => $msg];
                } else {
                    $res = $requestRes["client"]->request("POST", "/svc/server/".$serverId."/nics", [
                        "json" => [
                            "ip" => Arr::get($prePostActionsContext, "ip"),
                            "network" => Arr::get($prePostActionsContext, "add"),
                            "provision" => true
                        ]
                    ]);
                    $res = ProxyServerHttp::parseClientResponse($res);
                    if (Arr::get($res, "error")) {
                        $msg = (Arr::get($res, "response")) ? ": ".json_encode($res["response"]) : "";
                        return [
                            "error" => true,
                            "message" => "Failed to attach VLAN to server".$msg
                        ];
                    } elseif (is_numeric($res)) {
                        return $res;
                    } elseif (Arr::get($res, "cmdId") && is_numeric($res["cmdId"])) {
                        return $res["cmdId"];
                    } else {
                        return [
                            "error" => true,
                            "message" => "Unexpected response from server: ".json_encode($res)
                        ];
                    }
                }
            }
        }
    }

    static function runPrePostAction(Request $request, $prePostAction, &$prePostActionsContext) {
        $run = false;
        if (Arr::get($prePostAction, "runIfNotEmpty")) {
            $anyEmpty = false;
            foreach ($prePostAction["runIfNotEmpty"] as $k) {
                if (!Arr::get($prePostActionsContext, $k) && Arr::get($prePostActionsContext, $k) !== "0") {
                    $anyEmpty = true;
                }
            }
            if (!$anyEmpty) {
                $run = true;
            }
        }
        if ($run) {
            $httpMethod = Arr::get($prePostAction, "httpMethod");
            if ($httpMethod) {
                $requestRes = ProxyServerHttp::getHttpClient($request);
                if ($requestRes["error"]) {
                    return $requestRes;
                } else {
                    if (Arr::get($prePostAction, "addNewNetworkOnNetworkNotFoundError")) {
                        $res = self::_preprocessAddNetwork($request, $prePostActionsContext);
                        if (!empty($res)) {
                            return $res;
                        }
                    }
                    $isJson = true;
                    if (Arr::get($prePostAction, "postJson")) {
                        $postJson = [];
                        foreach ($prePostAction["payload"] as $payloadK=>$payloadV) {
                            $value = $payloadV;
                            if (is_string($value)) {
                                $value = self::replacePrePostActionContext($value, $prePostActionsContext);
                            }
                            $postJson[$payloadK] = $value;
                        }
                        $path = self::replacePrePostActionContext($prePostAction["path"], $prePostActionsContext);
                        $res = $requestRes["client"]->request($httpMethod, $path, ['json' => $postJson]);
                    } elseif ($httpMethod == "POST") {
                        $postMultipart = [];
                        foreach ($prePostAction["payload"] as $payloadK => $payloadV) {
                            $postMultipart[] = [
                                "name" => $payloadK,
                                "contents" => self::replacePrePostActionContext($payloadV, $prePostActionsContext)
                            ];
                        }
                        $path = self::replacePrePostActionContext($prePostAction["path"], $prePostActionsContext);
                        $res = $requestRes["client"]->request($httpMethod, $path, ['multipart' => $postMultipart]);
                    } elseif (Arr::has($prePostAction, "payload")) {
                        $formParams = [];
                        foreach ($prePostAction["payload"] as $payloadK=>$payloadV) {
                            $formParams[$payloadK] = self::replacePrePostActionContext($payloadV, $prePostActionsContext);
                        }
                        $path = self::replacePrePostActionContext($prePostAction["path"], $prePostActionsContext);
                        $res = $requestRes["client"]->request($httpMethod, $path, ["form_params" => $formParams]);
                    } else {
                        $path = self::replacePrePostActionContext($prePostAction["path"], $prePostActionsContext);
                        $res = $requestRes["client"]->request($httpMethod, $path);
                        $isJson = false;
                    }
                    $res = ProxyServerHttp::parseClientResponse($res, $isJson);
                    if (Arr::get($res, "error")) {
                        if (Arr::get($res, "response")) {
                            \Log::error($res);
                            if (Arr::get($prePostAction, "addNewNetworkOnNetworkNotFoundError") && Arr::get($res, "response.errors.0.info") == "selected network was not found") {
                                // selected network was not found
                                return self::_addNewNetwork($request, $prePostAction, $prePostActionsContext);
                            }
                            return [
                                "error" => true,
                                "message" => json_encode($res["response"])
                            ];
                        } else {
                            \Log::error($res);
                            return [
                                "error" => true,
                                "message" => "Unexpected error"
                            ];
                        }
                    }
                };
                if (Arr::get($prePostAction, "returnsCommandIDOnSuccess")) {
                    if (is_numeric($res)) {
                        return $res;
                    } elseif (Arr::get($res, "cmdId") && is_numeric($res["cmdId"])) {
                        return $res["cmdId"];
                    } else {
                        return [
                            "error" => true,
                            "message" => "Unexpected response from server: ".json_encode($res)
                        ];
                    }
                }
            }
        }
        return null;
    }

    static function recursiveFlattenField($field, $responses) {
        $newResponses = [];
        foreach ($responses as $response) {
            if (Arr::get($response, $field)) {
                foreach (self::recursiveFlattenField($field, $response[$field]) as $childResponse) {
                    $childResponse[$field] = null;
                    $newResponses[] = $childResponse;
                }
                $response[$field] = null;
            }
            $newResponses[] = $response;
        }
        return $newResponses;
    }

    static function runPostGetResponsesAction($postGetResponsesAction, $responses, $command, $context) {
        $returnFields = Arr::get($postGetResponsesAction, "returnFields");
        if ($returnFields) {
            $newResponses = [];
            foreach ($responses as $response) {
                $newResponse = [];
                foreach ($response as $k=>$v) {
                    if (in_array($k, $returnFields)) {
                        $newResponse[$k] = $v;
                    }
                }
                $newResponses[] = $newResponse;
            }
            $responses = $newResponses;
        }
        if (Arr::get($postGetResponsesAction, "collapseResponses")) {
            if (Arr::get($command, "schemaCommand.run.onlyOneServer")) {
                $responses = $responses[0];
            } else {
                throw new Exception("Invalid usage");
            }
        }
        $recursiveFlattenField = Arr::get($postGetResponsesAction, "recursiveFlattenField");
        if ($recursiveFlattenField) {
            $responses = self::recursiveFlattenField($recursiveFlattenField, $responses);
        }
        if (Arr::get($postGetResponsesAction, "parseNetworks")) {
            if (count($responses) != 1) {
                throw new Exception("Unexpected response: ".json_encode($responses));
            }
            $response = $responses[0];
            $responses = $response["nics"];
        }
        if (Arr::get($postGetResponsesAction, "parseDisks")) {
            if (count($responses) != 1) {
                throw new Exception("Unexpected response: ".json_encode($responses));
            }
            $response = [];
            foreach ($responses[0]["diskSizes"] as $k => $diskSize) {
                $response[] = [
                    "id" => $k,
                    "size" => $diskSize."gb"
                ];
            };
            $responses = $response;
        }
        if (Arr::get($postGetResponsesAction, "parseTags")) {
            $newResponses = [];
            foreach ($responses as $tagName) {
                $newResponses[] = ["server id" => $context['onlyOneServer_serverId'], "tag name" => $tagName];
            }
            $responses = $newResponses;
        }
        return $responses;
    }

    static function serverStatisticsPathPreProcessing($request, $path, &$context) {
        $category = '';
        $error = '';
        foreach (['network', 'ram', 'cpu', 'disksIops', 'disksTransfer'] as $k) {
            if ($request->input($k) == 'true') {
                if ($category == '') {
                    $category = $k;
                } else {
                    $error = 'Please choose a single metric to view';
                    break;
                }
            }
        }
        if ($error != '') {
            return [null, $error];
        }
        if ($category == '') {
            return [null, 'Please choose a metric to show'];
        }
        $context['statisticsSelectedCategory'] = $category;
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $period = $request->input('period');
        if ($period) {
            if ($startdate || $enddate) {
                return [null, 'Please choose either period or start/enddate flags but not both'];
            } else {
                $enddate = new \DateTime();
                $startdate = clone($enddate);
                if ($period == '1h') {
                    $startdate->sub(new \DateInterval('PT1H'));
                } elseif ($period == '8h') {
                    $startdate->sub(new \DateInterval('PT8H'));
                } elseif ($period == '1w') {
                    $startdate->sub(new \DateInterval('P1W'));
                } elseif ($period == '1m') {
                    $startdate->sub(new \DateInterval('P1M'));
                } elseif ($period == '3m') {
                    $startdate->sub(new \DateInterval('P3M'));
                } else {
                    return [null, 'Please choose from one of the supported periods, see statistics command help message for details'];
                }
                $startdate = $startdate->format('Y-m-d') . 'T' . $startdate->format('H:i:s') . '.000Z';
                $enddate = $enddate->format('Y-m-d') . 'T' . $enddate->format('H:i:s') . '.000Z';
//                \Log::info($startdate);
//                \Log::info($enddate);
                $path .= '?category='.$category.'&dtFrom='.$startdate.'&dtTo='.$enddate;
                return [$path, ''];
            }
        } else {
            if (!$startdate || !$enddate) {
                return [null, 'Please specify both startdate and enddate flags'];
            } else {
                try {
                    $startdate = \DateTime::createFromFormat('Ymd  -- H:i:s', $startdate.'  -- 00:00:00');
                    $enddate = \DateTime::createFromFormat('Ymd  -- H:i:s', $enddate.'  -- 23:59:59');
                } catch (\Exception $e) {
                    \Log::error($e->getTraceAsString());
                    return [null, 'Please specify startdate and enddate using the format YYYYMMDD'];
                }
                $startdate = $startdate->format('Y-m-d') . 'T' . $startdate->format('H:i:s') . '.000Z';
                $enddate = $enddate->format('Y-m-d') . 'T' . $enddate->format('H:i:s') . '.000Z';
                $path .= '?category='.$category.'&dtFrom='.$startdate.'&dtTo='.$enddate;
                return [$path, ''];
            }
        }
    }

    static function returnProxyHttpMultiServerPostResponse(Request $request, $httpMethod, $command, $postMultipart, $context) {
        $idField = "id";
        $idValue = null;
        $nameField = "name";
        $nameValue = null;
        $serverNames = [];
        foreach ($postMultipart as $multiPartField) {
            if ($multiPartField["name"] == $idField) $idValue = $multiPartField["contents"];
            elseif ($multiPartField["name"] == $nameField) $nameValue = $multiPartField["contents"];
        }
        if (!empty($nameValue) && !empty($idValue)) {
            throw new ProxyServerGetServerIdsException("Please specify 'name' or 'id' but not both", $nameValue, $idValue);
        } elseif (empty($nameValue) && empty($idValue)) {
            throw new ProxyServerGetServerIdsException("Missing server 'id' / 'name'");
        } elseif (!empty($idValue)) {
            $serverIds = [$idValue];
        } elseif (Arr::get($command, "schemaCommand.run.onlyOneServer", false)) {
            $serversInfo = self::_getServerIdsAndIpsFromName($request, $nameValue, $context, $serverNames);
            if (Arr::get($serversInfo, "error")) {
                return $serversInfo;
            }
            if (count($serversInfo) > 1) {
                return [
                    "error" => true,
                    "message" => "Too many matching servers (name='$nameValue')"
                ];
            }
            $serverIds = [$serversInfo[0]["id"]];
        } else {
            $serverIds = self::getServerIdsFromName($request, $nameValue, $context, $serverNames);
        }
        if (count($serverIds) == 0) {
            return [
                "error" => true,
                "message" => "No servers found (name='$nameValue')"
            ];
        }
        if (Arr::get($command, "schemaCommand.run.returnServerInfoWithIP", false)) {
            if (empty($serversInfo[0]["externalIp"])) {
                return [
                    "error" => true,
                    "message" => "No external IP for server name $nameValue"
                ];
            } else {
                return $serversInfo;
            }
        } elseif ($request->input('dryrun')) {
            return [
                "dryrun" => true,
                "server-names" => $serverNames
            ];
        } else {
            if (Arr::get($command, "schemaCommand.run.prePostActions")) {
                $prePostActionsContext = [];
                foreach ($context["fieldValues"] as $k=>$v) {
                    $prePostActionsContext[$k] = $v;
                }
                if (Arr::get($command, "schemaCommand.run.onlyOneServer")) {
                    $prePostActionsContext["serverId"] = $context['onlyOneServer_serverId'] = $serverIds[0];
                }
                foreach ($command["schemaCommand"]["run"]["prePostActions"] as $prePostAction) {
                    $prePostActionRes = self::runPrePostAction($request, $prePostAction, $prePostActionsContext);
                    if ($prePostActionRes) {
                        return $prePostActionRes;
                    }
                };
            }
            $responses = [];
            $commandIds = [];
            foreach ($serverIds as $serverId) {
                $serverPostMultipart = [];
                foreach ($postMultipart as $multiPartField) {
                    if ($multiPartField["name"] == "id") {
                        $multiPartField["contents"] = $serverId;
                    }
                    if (! in_array($multiPartField["name"], ["name", "id"])) {
                        $serverPostMultipart[] = $multiPartField;
                    }
                }
                $path = str_replace("<id>", $serverId, $command["schemaCommand"]["run"]["serverPath"]);
                if (Arr::get($command, "schemaCommand.run.serverPathPreProcessing")) {
                    foreach ($command['schemaCommand']['run']['serverPathPreProcessing'] as $serverPathProcessing) {
                        if (Arr::get($serverPathProcessing, 'serverStatisticsPath')) {
                            [$path, $error] = self::serverStatisticsPathPreProcessing($request, $path, $context);
                            if ($error) {
                                return [
                                    "error" => true,
                                    "message" => $error
                                ];
                            }
                        }
                    }
                }
                $postCommand = $command;
                $postCommand["path"] = $path;
                $response = self::returnProxyHttpPostResponse($request, $httpMethod, $postCommand, $serverPostMultipart, $context);
                $responses[] = $response;
                if (Arr::get($response, "error")) {
                    return [
                        "error" => true,
                        "message" => "Error response from server: ".json_encode($responses),
                        "responses" => $responses
                    ];
                } elseif ($httpMethod != "GET") {
                    if (is_array($response)) {
                        foreach ($response as $commandId) {
                            $commandIds[] = "$commandId";
                        }
                    } else {
                        return [
                            "error" => true,
                            "message" => "Failed to parse command IDs from server response",
                            "responses" => $responses
                        ];
                    }
                }
            }
            if ($httpMethod == "GET") {
                if (Arr::get($command, "schemaCommand.run.postGetResponsesActions")) {
                    foreach ($command["schemaCommand"]["run"]["postGetResponsesActions"] as $postGetResponsesAction) {
                        $responses = self::runPostGetResponsesAction($postGetResponsesAction, $responses, $command, $context);
                    }
                }
                return $responses;
            } else {
                return $commandIds;
            }
        }
    }


    static function returnProxyHttpPostResponse(Request $request, $httpMethod, $command, $postMultipart, $context) {
        $res = ProxyServerHttp::getHttpClient($request);
        foreach(Arr::get($command, "schemaCommand.run.fields", []) as $runField) {
            if (Arr::get($runField, "postName")) {
                foreach ($postMultipart as &$postItem) {
                    if ($postItem['name'] == $runField['name']) {
                        $postItem['name'] = $runField['postName'];
                    }
                };
            }
        }
        if ($res["error"]) {
            return $res;
        } elseif (Arr::get($command, "schemaCommand.run.serverFieldsEncoding") == "json") {
            $jsonParams = [];
            foreach ($postMultipart as $mp) {
                $jsonParams[$mp["name"]] = $mp["contents"];
            }
            $res = ProxyServerHttp::parseClientResponse(
                $res["client"]->request($httpMethod, $command["path"], ["json" => $jsonParams])
            );
        } elseif ($httpMethod == "DELETE" || $httpMethod == "PUT") {
            foreach ($postMultipart as $mp) {
                $formParams[$mp["name"]] = $mp["contents"];
            }
            $res = ProxyServerHttp::parseClientResponse(
                $res["client"]->request($httpMethod, $command["path"], ["form_params" => $formParams])
            );
        } else {
//            \Log::info($httpMethod);
//            \Log::info($command["path"]);
//            \Log::info($postMultipart);
            $res = ProxyServerHttp::parseClientResponse(
                $res["client"]->request($httpMethod, $command["path"], ['multipart' => $postMultipart])
            );
        }
        if (Arr::get($res, "error")) {
            $messages = [];
            if (Arr::get($res, "message")) {
                $messages[] = $res["message"];
            }
            if (Arr::get($res, "response.errors")) {
                foreach ($res["response"]["errors"] as &$re) {
                    $error_code = Arr::get($re, "code", "");
                    $error_info = Arr::get($re, "info", "");
                    if (strlen($error_code) > 0 && strlen($error_info) > 0) {
                        $messages[] = "$error_info ($error_code)";
                    } elseif (strlen($error_info) > 0) {
                        $messages[] = "$error_info";
                    } elseif (strlen($error_code) > 0) {
                        $message[] = "unidentified error (" . $error_code . ")";
                    }
                }
            }
            if (Arr::get($res, "json_decode_error")) {
                $messages[] = "json decode error: " . $res["json_decode_error"];
            }
            if (count($messages) > 0) {
                $res["message"] = implode('. ', $messages);
            }
            return $res;
        } elseif ($httpMethod == "GET") {
            return $res;
        } elseif (is_int($res) || is_string($res)) {
            return ["$res"];
        } elseif (is_array($res) && Arr::get($res, "cmdId")) {
            return ["${res['cmdId']}"];
        } elseif (is_array($res) && count($res) == 1) {
            return ["$res[0]"];
        } else {
            return [
                "error" => true,
                "message" => "Invalid response from server",
                "res" => $res
            ];
        }
    }


    static function getServerIdsFromName(Request $request, $name, $context, &$serverNames) {
        $serverIds = [];
        $servers = call_user_func($context['handleInternalRequest'], $request, "listServers", [
            "path" => "/service/servers",
            "schemaCommand" => []
        ]);
        foreach ($servers as $server) {
            if (preg_match("/^".$name."$/", $server["name"])) {
                $serverIds[] = $server["id"];
                $serverNames[] = $server['name'];
            }
        }
        return $serverIds;
    }

    static function getExternalNetworkIp($network) {
        if (Str::startswith(Arr::get($network, "network", ""), "wan-")) {
            foreach (Arr::get($network, "ips", []) as $ip) {
                if (!empty($ip)) {
                    return $ip;
                }
            }
        }
        return null;
    }

    static function _getServerIdsAndIpsFromName(Request $request, $name, $context, &$serverNames) {
        $serversInfo = [];
        $servers = call_user_func($context['handleInternalRequest'], $request, "serversInfo", [
            "path" => "/service/server/info",
            "method" => "serversInfo",
            "schemaCommand" => Schema::getSchemaPart("commands/server/info")
        ]);
        if (Arr::get($servers, "error")) {
            return $servers;
        }
        foreach ($servers as $server) {
            $externalIp = null;
            foreach (Arr::get($server, "networks", []) as $network) {
                $externalIp = self::getExternalNetworkIp($network);
                if (!empty($externalIp)) break;
            }
            $serversInfo[] = [
                "id" => Arr::get($server, "id"),
                "name" => Arr::get($server, "name"),
                "externalIp" => $externalIp
            ];
        }
        return $serversInfo;
    }


}


class ProxyServerGetServerIdsException extends Exception {

    function __construct($message=null, $idValue=null, $nameValue=null)
    {
        if (empty($message)) $message = "Failed to get server id/s";
        $message .= "(id=".$idValue." name=".$nameValue.")";
        parent::__construct($message);
    }
}
