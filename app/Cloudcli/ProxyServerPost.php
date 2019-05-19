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

class ProxyServerPost
{

    static function getPostMultiPartValues($postMultipart) {
        $values = [];
        foreach ($postMultipart as $postMultipartField) {
            $values[$postMultipartField["name"]] = $postMultipartField["contents"];
        }
        return $values;
    }

    static function setMultipartValue(&$postMultipart, $key, $value) {
        \Log::info("Setting multipart value ${key}=${value}");
        foreach ($postMultipart as &$v) {
            if (Arr::get($v, 'name') == $key) {
                $v['contents'] = $value;
            }
        }
    }

    static function post(Request $request, $command, $httpMethod=null, $handleInternalRequestCallback=null) {
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
                        return self::_getInvalidFlagError($flag["name"]);
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
                            return self::_getInvalidFlagError($flag["name"], $value);
                        }
                        $dictValue[$keyvalueparts[0]] = $keyvalueparts[1];
                    }
                    if (Arr::has($dictValue, "id")) {
                        if ($dictValue["id"] > 3) {
                            return self::_getInvalidFlagError($flag["name"], $value, "invalid item id: ".$dictValue["id"]);
                        } elseif (array_key_exists($dictValue["id"], $items)) {
                            return self::_getInvalidFlagError($flag["name"], $value, "duplicate item id: ".$dictValue["id"]);
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
                    return self::_getInvalidFlagError($flag["name"], $value, "invalid item ids");
                }
                if (Arr::get($schemaCommand["run"], "serverPostMultipartArray")) {
                    $postMultipart[] = [
                        "name" => $runField["name"],
                        "contents" => $items
                    ];
                } else {
                    foreach ($items as $itemId => $item) {
                        foreach ($item as $k => $v) {
                            $postMultipart[] = [
                                "name" => $runField["name"] . "_" . $k . "_" . $itemId,
                                "contents" => $v
                            ];
                        }
                    }
                }
            } else {
                $multiPartField = [
                    "name" => $fieldName,
                    "contents" => $value
                ];
                if ($runField && Arr::has($runField, "serverProcessing")) {
                    foreach ($runField["serverProcessing"] as $p) {
                        $multiPartField = call_user_func([ProxyServerFieldProcessingMethods::class, $p["method"]], $multiPartField, $p);
                    }
                }
                $postMultipart[] = $multiPartField;
            }
        }
        $context = [
            "request" => $request,
            "command" => $command,
            "httpMethod" => $httpMethod,
            "schemaCommand" => $schemaCommand,
            "flags" => $flags,
            "handleInternalRequest" => $handleInternalRequestCallback
        ];
        if (Arr::has($schemaCommand["run"], "serverPostProcessing")) {
            foreach ($schemaCommand["run"]["serverPostProcessing"] as $p) {
                $postMultipart = call_user_func([ProxyServerPostProcessingMethods::class, $p["method"]], $postMultipart, $p, $context);
            }
        }
        $postMethod = Arr::get($schemaCommand["run"], "serverPostMethod", "returnProxyHttpPostResponse");
        return call_user_func([ProxyServerHttpPostMethods::class, $postMethod], $request, $httpMethod, $command, $postMultipart, $context);
    }

    static function _getInvalidFlagError($name, $value=null, $message=null) {
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

}
