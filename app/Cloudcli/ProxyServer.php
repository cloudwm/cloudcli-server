<?php

namespace App\Cloudcli;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class ProxyServer extends BaseServer {


    function listServers($request, $command) {
        return $this->get($request, $command);
    }

    function listQueue($request, $command) {
        return $this->get($request, $command);
    }

    function getQueue($request, $command) {
        return $this->get($request, $command);
    }

    function serversInfo($request, $command) {
        return $this->post($request, $command);
    }

    function serverDescription($request, $command) {
        return $this->post($request, $command);
    }

    function serverSnapshot($request, $command) {
        return $this->post($request, $command);
    }

    function serverTags($request, $command) {
        return $this->post($request, $command);
    }

    function serverNetwork($request, $command) {
        return $this->post($request, $command);
    }

    function serverHistory($request, $command) {
        return $this->post($request, $command);
    }

    function serverDisk($request, $command) {
        return $this->post($request, $command);
    }

    function serverConfigure($request, $command) {
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $cpu = $request->input('cpu', null);
        $ram = $request->input('ram', null);
        $billingcycle = $request->input('billingcycle', null);
        if (!empty($billingcycle)) $billingcycle = strtolower(trim($billingcycle));
        $monthlypackage = $request->input('monthlypackage', null);
        $flags = [
            ["flag" => "dailybackup", "param" => "backup"],
            ["flag" => "managed", "param" => "managed"]
        ];
        $numCommands = 0;
        if (!empty($cpu)) $numCommands++;
        if (!empty($ram)) $numCommands++;
        if (!empty($billingcycle)) {
            $numCommands++;
        } elseif (!empty($monthlypackage)) {
            $numCommands++;
        }
        foreach ($flags as $flag) {
            $value = $request->input($flag['flag'], null);
            if (!empty($value)) $numCommands++;
        }
        if ($numCommands < 1) {
            return ["error" => true, "message" => "Please choose a configuration flag"];
        } elseif ($numCommands > 1) {
            return ["error" => true, "message" => "Please choose only 1 configuration flag at a time"];
        }
        if ((empty($id) && empty($name)) || (!empty($id) && !empty($name))) {
            return ["error" => true, "message" => "Please choose --id or --name flags (but not both)"];
        }
        if (!empty($name)) {
            $serverNames = [];
            $serverIds = ProxyServerHttpPostMethods::getServerIdsFromName($request, $name, ["handleInternalRequest" => [$this, "handleInternalRequest"]], $serverNames);
            if (count($serverIds) < 1) {
                return ["error" => true, "message" => "--name flag did not match any servers"];
            } elseif (count($serverIds) > 1) {
                return ["error" => true, "message" => "--name flag must match a single server"];
            }
            $id = $serverIds[0];
        }
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            return $res;
        } else {
            if (!empty($cpu)) {
                $clientResponse = $res["client"]->request("PUT", "/service/server/${id}/cpu", ['form_params' => ["cpu" => $cpu]]);
                $res = ProxyServerHttp::parseClientResponse($clientResponse);
            } elseif (!empty($ram)) {
                $clientResponse = $res["client"]->request("PUT", "/service/server/${id}/ram", ['form_params' => ["ram" => $ram]]);
                $res = ProxyServerHttp::parseClientResponse($clientResponse);
            } elseif (!empty($billingcycle) || !empty($monthlypackage)) {
                if ($billingcycle == "hourly") {
                    $billingParam = "1";
                    if (!empty($monthlypackage)) {
                        return ["error" => true, "message" => "monthlypackage is not allowed for hourly billing cycle"];
                    } else {
                        $clientResponse = $res["client"]->request("PUT", "/svc/server/${id}/configuration", ['json' => ["billing" => $billingParam,]]);
                        $res = ProxyServerHttp::parseClientResponse($clientResponse);
                    }
                } else {
                    if (empty($billingcycle)) {
                        $billingParam = "";
                    } elseif ($billingcycle == "monthly") {
                        $billingParam = "0";
                    } else {
                        return ["error" => true, "message" => "Invalid billingcycle, allowed values: monthly / hourly"];
                    }
                    $clientResponse = $res["client"]->request("GET", "/svc/server/${id}/configuration");
                    $subRes = ProxyServerHttp::parseClientResponse($clientResponse);
                    $trafficOptions = Arr::get($subRes, "options.traffic", []);
                    if (empty($trafficOptions)) {
                        return ["error" => true, "message" => "Cannot use monthly billing cycle, no available traffic options"];
                    } elseif (empty($monthlypackage)) {
                        return ["error" => true, "message" => "--monthlypackage flag is required, valid values for your server: " . implode(" / ", $trafficOptions)];
                    } elseif (!in_array($monthlypackage, $trafficOptions)) {
                        return ["error" => true, "message" => "Invalid value for --monthlypackage, valid values for your server: " . implode(" / ", $trafficOptions)];
                    } else {
                        $clientResponse = $res["client"]->request("PUT", "/svc/server/${id}/configuration", ['json' => ["billing" => $billingParam, "traffic" => $monthlypackage]]);
                        $res = ProxyServerHttp::parseClientResponse($clientResponse);
                    }
                }
            } else {
                foreach ($flags as $flag) {
                    $value = $request->input($flag['flag'], null);
                    if ($value !== null) {
                        if (!in_array($value, ["yes", "no"])) {
                            return ["error" => true, "message" => "Invalid value for --".$flag['flag'].". Valid values: 'yes' or 'no'"];
                        }
                        $param = $value == "yes" ? "1" : "0";
                        $clientResponse = $res["client"]->request("PUT", "/svc/server/${id}/configuration", ['json' => [$flag['param'] => $param,]]);
                        $res = ProxyServerHttp::parseClientResponse($clientResponse);
                        break;
                    }
                }
            }
            if (Arr::get($res, "error")) {
                if (Arr::get($res, "response")) {
                    \Log::error($res);
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
            } else {
                if (is_numeric($res)) {
                    return ["".$res];
                } elseif (Arr::get($res, "cmdId") && is_numeric($res["cmdId"])) {
                    return ["".$res["cmdId"]];
                } else {
                    return [
                        "error" => true,
                        "message" => "Unexpected response from server: ".json_encode($res)
                    ];
                }
            }
        }
    }

    function getServerOptions($request, $command) {
        return $this->get($request, $command);
    }

    function createServer($request, $command) {
        return $this->post($request, $command);
    }

    function terminateServer($request, $command) {
        return $this->post($request, $command);
    }

    function poweronServer($request, $command) {
        return $this->post($request, $command);
    }

    function poweroffServer($request, $command) {
        return $this->post($request, $command);
    }

    function rebootServer($request, $command) {
        return $this->post($request, $command);
    }

    function sshServer($request, $command) {
        return $this->post($request, $command);
    }

    function sshServerKey($request, $command) {
        return $this->post($request, $command);
    }

    function handleInternalRequest($request, $method, $command=null) {
        return $this->_handleInternalRequest($request, $method, $command);
    }

    function handleDatacenterConfigurationRequest($request, $datacenter) {
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            return $res;
        } else {
            $serverPath = "/svc/serverCreate/datacenterConfiguration/".$datacenter;
            return ProxyServerHttp::parseClientResponse(
                $res["client"]->get($serverPath)
            );
        }
    }

    function post($request, $command) {
        return ProxyServerPost::post($request, $command, null, [$this, 'handleInternalRequest']);
    }

    function get($request, $command) {
        return ProxyServerGet::get($request, $command);
    }

    protected function _handleInternalRequest($request, $method, $command=null) {
        if (empty($command)) {
            $command = [];
        }
        if ($method == "listServers") {
            $command["path"] = "/service/servers";
            $command["internal"] = true;
        }
        return parent::_handleInternalRequest($request, $method, $command);
    }

}
