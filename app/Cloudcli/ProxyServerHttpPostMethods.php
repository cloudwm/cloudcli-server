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
            \Log::info("${httpMethod} ${res['server']}${serverPath} ".json_encode($postJson));
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
            $value = str_replace("<".$contextK.">", $contextV, $value);
        }
        return $value;
    }

    static function runPrePostAction(Request $request, $prePostAction, $prePostActionsContext) {
        $run = false;
        if (Arr::get($prePostAction, "runIfNotEmpty")) {
            $anyEmpty = false;
            foreach ($prePostAction["runIfNotEmpty"] as $k) {
                if (!Arr::get($prePostActionsContext, $k)) {
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
                    $formParams = [];
                    foreach ($prePostAction["payload"] as $payloadK=>$payloadV) {
                        $formParams[$payloadK] = self::replacePrePostActionContext($payloadV, $prePostActionsContext);
                    }
                    $path = self::replacePrePostActionContext($prePostAction["path"], $prePostActionsContext);
                    $res = $requestRes["client"]->request($httpMethod, $path, ["form_params" => $formParams]);
                    if ($res->getStatusCode() != 200 || $res->getBody() != "") {
                        \Log::error("Invalid response from prePostActionContext path ".$path.": (".$res->getStatusCode().") ".$res->getBody());
                        return [
                            "error" => true,
                            "status_code" => $res->getStatusCode(),
                            "message" => "Invalid response"
                        ];
                    }
                };
            }
        }
        return null;
    }

    static function runPostGetResponsesAction($postGetResponsesAction, $responses, $command) {
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
        return $responses;
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
            if (count($serversInfo) > 1) {
                return [
                    "error" => true,
                    "message" => "Too many matching servers (name='$nameValue')"
                ];
            }
            $serverIds = [$serversInfo[0]["id"]];
        } else {
            $serverIds = self::_getServerIdsFromName($request, $nameValue, $context, $serverNames);
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
                    $prePostActionsContext["serverId"] = $serverIds[0];
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
                $postCommand = $command;
                $postCommand["path"] = $path;
                $response = self::returnProxyHttpPostResponse($request, $httpMethod, $postCommand, $serverPostMultipart, $context);
                $responses[] = $response;
                if (Arr::get($response, "error")) {
                    return [
                        "error" => true,
                        "message" => "Error response from server", $responses,
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
                        $responses = self::runPostGetResponsesAction($postGetResponsesAction, $responses, $command);
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
        if ($res["error"]) {
            return $res;
        } elseif ($httpMethod == "DELETE" || $httpMethod == "PUT") {
            foreach ($postMultipart as $mp) {
                $formParams[$mp["name"]] = $mp["contents"];
            }
            $res = ProxyServerHttp::parseClientResponse(
                $res["client"]->request($httpMethod, $command["path"], ["form_params" => $formParams])
            );
        } else {
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


    static function _getServerIdsFromName(Request $request, $name, $context, &$serverNames) {
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
        foreach ($servers as $server) {
            $externalIp = null;
            foreach (Arr::get($server, "networks", []) as $network) {
                $externalIp = self::getExternalNetworkIp($network);
                if (!empty($externalIp)) break;
            }
            $serversInfo[] = [
                "id" => $server["id"],
                "name" => $server["name"],
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
