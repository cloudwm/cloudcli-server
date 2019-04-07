<?php

namespace App\Cloudcli;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class ProxyServer extends BaseServer {

    /*
     * Base cloudcli server methods
     */

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

    /*
     * low-level http request / response handling
     */

    protected function _getHttpClient(Request $request) {
        $server = env("CLOUDCLI_API_SERVER");
        if (empty($server)) {
            return [
                "error" => true,
                "message" => "Missing env var: CLOUDCLI_API_SERVER"
            ];
        }
        return [
            "error" => false,
            "client" => new Client([
                "http_errors" => false,
                "base_uri" => $server,
                "headers" => [
                    "AuthClientId" => $request->header("AuthClientId", env("CLOUDCLI_API_CLIENTID")),
                    "AuthSecret" => $request->header("AuthSecret", env("CLOUDCLI_API_SECRET"))
                ]
            ])
        ];
    }

    protected function _returnProxyHttpPostResponse(Request $request, $httpMethod, $command, $postMultipart) {
        $res = $this->_getHttpClient($request);
        if ($res["error"]) {
            return $res;
        } elseif ($httpMethod == "DELETE" || $httpMethod == "PUT") {
            foreach ($postMultipart as $mp) {
                $formParams[$mp["name"]] = $mp["contents"];
            }
            $res = $this->_parseClientResponse(
                $res["client"]->request($httpMethod, $command["path"], ["form_params" => $formParams])
            );
        } else {
            $res = $this->_parseClientResponse(
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

    protected function _getServerIdsFromName(Request $request, $name) {
        $serverIds = [];
        $servers = $this->_handleInternalRequest($request, "listServers");
        foreach ($servers as $server) {
            if (preg_match("/^".$name."$/", $server["name"])) {
                $serverIds[] = $server["id"];
            }
        }
        return $serverIds;
    }

    protected function _returnProxyHttpMultiServerPostResponse(Request $request, $httpMethod, $command, $postMultipart) {
        $idField = "id";
        $idValue = null;
        $nameField = "name";
        $nameValue = null;
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
        } else {
            $serverIds = $this->_getServerIdsFromName($request, $nameValue);
        }
        if (count($serverIds) == 0) {
            return [
                "error" => true,
                "message" => "No servers found (name='$nameValue')"
            ];
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
            $response = $this->_returnProxyHttpPostResponse($request, $httpMethod, $postCommand, $serverPostMultipart);
            $responses[] = $response;
            if (Arr::get($response, "error")) {
                return [
                    "error" => true,
                    "message" => "Error response from server", $responses,
                    "responses" => $responses
                ];
            } elseif (is_array($response)) {
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
        return $commandIds;
    }

    protected function _parseClientResponse(Response $res) {
        $decoded_response = json_decode($res->getBody(), true);
        if ($res->getStatusCode() == 200) {
            return $decoded_response;
        } else {
            return [
                "error" => true,
                "status_code" => $res->getStatusCode(),
                "response" => $decoded_response
            ];
        }
    }

    /*
     * optional server processing functions, used by commands / flags / fields in schema
     */

    protected function _getInvalidFlagError($name, $value=null, $message=null) {
        if (empty($message)) {
            if (empty($value)) {
                $message = "missing required flag";
            } else {
                $message = "invalid flag value";
            }
        }
        if (empty($value)) {
            $message .= " (".$name.")";
        } else {
            $message .= " (".$name."=".$value.")";
        }
        return ["error" => true, "message" => $message, "status_code" => 400];
    }

    protected function _renameField($multiPartField, $p) {
        $multiPartField["name"] = $p["to"];
        return $multiPartField;
    }

    protected function _validateChars($multiPartField, $p) {
        $name = $multiPartField["name"];
        $value = $multiPartField["contents"];
        $valueArr = str_split($value);
        if (Arr::has($p, "minLength") && count($valueArr) < $p["minLength"]) {
            throw new ProxyServerValidateCharsException($name, "less then ".$p["minLength"]." characters");
        }
        if (Arr::has($p, "maxLength") && count($valueArr) > $p["maxLength"]) {
            throw new ProxyServerValidateCharsException($name, "more then ".$p["maxLength"]." characters");
        }
        $allowedChars = "";
        if (Arr::has($p, "atLeastOneOf")) {
            foreach ($p["atLeastOneOf"] as $chars) {
                $allowedChars .= $chars;
                $charsArr = str_split($chars);
                $gotOne = false;
                foreach ($valueArr as $valueChar) {
                    if (in_array($valueChar, $charsArr)) {
                        $gotOne = true;
                    }
                }
                if (! $gotOne) {
                    throw new ProxyServerValidateCharsException($name, "must have at least one of: '".$chars."'");
                }
            }
        }
        if (Arr::has($p, "extraAllowedChars")) {
            $allowedChars .= $p["extraAllowedChars"];
        }
        $allowedcharsArr = str_split($allowedChars);
        foreach ($valueArr as $valueChar) {
            if (! in_array($valueChar, $allowedcharsArr)) {
                throw new ProxyServerValidateCharsException($name, "disallowed character: '".$valueChar."', allowed characters: '".$allowedChars."'");
            }
        }
        return $multiPartField;
    }

    /*
     * handle the server requests
     */

    protected function _serverGet(Request $request, $command) {
        $res = $this->_getHttpClient($request);
        if ($res["error"]) {
            return $res;
        } else {
            return $this->_parseClientResponse(
                $res["client"]->get($command['path'])
            );
        }
    }

    protected function _serverPost(Request $request, $command, $httpMethod=null) {
        if (empty($httpMethod)) {
            $httpMethod = Arr::get($command, "schemaCommand.run.serverMethod", "POST");
        }
        $schemaCommand = $command["schemaCommand"];
        $flags = [];
        foreach ($schemaCommand["flags"] as $flag) {
            $flags[$flag["name"]] = $flag;
        }
        $postMultipart = [];
        $fieldValues = [];
        $runFields = [];
        foreach ($schemaCommand["run"]["fields"] as $runField) {
            $value = $request->input($runField["name"], "");
            if (Arr::get($runField, "bool")) {
                $value = ($value == "true") ? "1" : "0";
            };
            $fieldValues[$runField["name"]] = $value;
            $runFields[$runField["name"]] = $runField;
        }
        foreach (Arr::get($schemaCommand, "run.serverFields", []) as $serverField) {
            $fieldValues[$serverField["name"]] = $serverField["value"];
        }
        foreach ($fieldValues as $fieldName => $value) {
            $runField = Arr::get($runFields, $fieldName);
            if ($runField) {
                $flag = $flags[$runField["flag"]];
                if (empty($value)) {
                    if (Arr::get($flag, "required")) {
                        return $this->_getInvalidFlagError($flag["name"]);
                    } elseif (Arr::has($flag, "default")) {
                        $value = $flag["default"];
                    }
                }
            }
            if ($runField && Arr::get($runField, "array")) {
                $items = [];
                $itemsWithoutId = [];
                foreach (explode(" ", $value) as $keyvalues) {
                    $dictValue = [];
                    foreach (explode(",", $keyvalues) as $keyvalue) {
                        $keyvalueparts = explode("=", $keyvalue);
                        if (count($keyvalueparts) != 2) {
                            return $this->_getInvalidFlagError($flag["name"], $value);
                        }
                        $dictValue[$keyvalueparts[0]] = $keyvalueparts[1];
                    }
                    if (Arr::has($dictValue, "id")) {
                        if ($dictValue["id"] > 3) {
                            return $this->_getInvalidFlagError($flag["name"], $value, "invalid item id: ".$dictValue["id"]);
                        } elseif (array_key_exists($dictValue["id"], $items)) {
                            return $this->_getInvalidFlagError($flag["name"], $value, "duplicate item id: ".$dictValue["id"]);
                        } else {
                            $items[$dictValue["id"]] = $dictValue;
                        }
                    } else {
                        $itemsWithoutId[] = $dictValue;
                    }
                }
                foreach (["0", "1", "2", "3"] as $itemId) {
                    if (! array_key_exists($itemId, $items)) {
                        if (count($itemsWithoutId) > 0) {
                            $items[$itemId] = array_shift($itemsWithoutId);
                            $items[$itemId]["id"] = $itemId;
                        }
                    }
                }
                if (count($itemsWithoutId) > 0) {
                    return $this->_getInvalidFlagError($flag["name"], $value, "invalid item ids");
                }
                foreach ($items as $itemId => $item) {
                    foreach ($item as $k=> $v) {
                        $postMultipart[] = [
                            "name" => $runField["name"]."_".$k."_".$itemId,
                            "contents" => $v
                        ];
                    }
                }
            } else {
                $multiPartField = [
                    "name" => $fieldName,
                    "contents" => $value
                ];
                if ($runField && Arr::has($runField, "serverProcessing")) {
                    foreach ($runField["serverProcessing"] as $p) {
                        $multiPartField = call_user_func([$this, $p["method"]], $multiPartField, $p);
                    }
                }
                $postMultipart[] = $multiPartField;
            }
        }
        $postMethod = Arr::get($schemaCommand["run"], "serverPostMethod", "_returnProxyHttpPostResponse");
        return call_user_func([$this, $postMethod], $request, $httpMethod, $command, $postMultipart);
    }

    function listServers($request, $command) {
        return $this->_serverGet($request, $command);
    }

    function getServerOptions($request, $command) {
        return $this->_serverGet($request, $command);
    }

    function createServer($request, $command) {
        return $this->_serverPost($request, $command);
    }

    function terminateServer($request, $command) {
        return $this->_serverPost($request, $command);
    }

    function poweronServer($request, $command) {
        return $this->_serverPost($request, $command);
    }

    function poweroffServer($request, $command) {
        return $this->_serverPost($request, $command);
    }

}


class ProxyServerValidateCharsException extends \Exception {

    function __construct($fieldName, $message=null) {
        if (empty($message)) $message = "Invalid value";
        parent::__construct($message." for field ".$fieldName);
    }

};


class ProxyServerGetServerIdsException extends \Exception {

    function __construct($message=null, $idValue=null, $nameValue=null)
    {
        if (empty($message)) $message = "Failed to get server id/s";
        $message .= "(id=".$idValue." name=".$nameValue.")";
        parent::__construct($message);
    }
}
