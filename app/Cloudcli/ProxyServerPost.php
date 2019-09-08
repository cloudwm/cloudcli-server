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

    static function getHttpMethod($schemaCommand, $httpMethod) {
        if (empty($httpMethod)) {
            $httpMethod = Arr::get($schemaCommand, "run.serverMethod", "POST");
        }
        return $httpMethod;
    }

    static function getFlags($schemaCommand) {
        $flags = [];
        foreach ($schemaCommand["flags"] as $flag) {
            $flags[$flag["name"]] = $flag;
        }
        return $flags;
    }

    static function getRunFields($schemaCommand) {
        $runFields = [];
        foreach ($schemaCommand["run"]["fields"] as $runField) {
            $runFields[$runField["name"]] = $runField;
        }
        return $runFields;
    }

    static function getFieldValues(Request $request, $schemaCommand) {
        $fieldValues = [];
        foreach ($schemaCommand["run"]["fields"] as $runField) {
            $value = $request->input($runField["name"], "");
            if (Arr::get($runField, "bool")) {
                $value = ($value == "true") ? "1" : "0";
            };
            $fieldValues[$runField["name"]] = $value;
        }
        foreach (Arr::get($schemaCommand, "run.serverFields", []) as $serverField) {
            $fieldValues[$serverField["name"]] = $serverField["value"];
        }
        return $fieldValues;
    }

    static function getPostMultipartArrayField($postMultipart, $value, $flag, $schemaCommand, $runField) {
        $items = [];
        $itemsWithoutId = [];
        foreach (explode(" ", $value) as $keyvalues) {
            $dictValue = [];
            foreach (explode(",", $keyvalues) as $keyvalue) {
                $keyvalueparts = explode("=", $keyvalue);
                if (count($keyvalueparts) != 2) {
                    return [$postMultipart, [$flag["name"], $value, null]];
                }
                $dictValue[$keyvalueparts[0]] = $keyvalueparts[1];
            }
            if (Arr::has($dictValue, "id")) {
                if ($dictValue["id"] > 3) {
                    return [$postMultipart, [$flag["name"], $value, "invalid item id: ".$dictValue["id"]]];
                } elseif (array_key_exists($dictValue["id"], $items)) {
                    return [$postMultipart, [$flag["name"], $value, "duplicate item id: ".$dictValue["id"]]];
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
            return [$postMultipart, [$flag["name"], $value, "invalid item ids"]];
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
        return [$postMultipart, null];
    }

    static function getPostMultipartFieldValue($postMultipart, $fieldName, $value, $runField) {
        $multiPartField = [
            "name" => $fieldName,
            "contents" => $value
        ];
        if ($runField && Arr::has($runField, "serverProcessing")) {
            foreach ($runField["serverProcessing"] as $p) {
                try {
                    $multiPartField = call_user_func([ProxyServerFieldProcessingMethods::class, $p["method"]], $multiPartField, $p);
                } catch (Exception $e) {
                    return [$postMultipart, [$fieldName, $value, $e->getMessage()]];
                }

            }
        }
        $postMultipart[] = $multiPartField;
        return [$postMultipart, null];
    }

    static function getPostMultipart($schemaCommand, $fieldValues, $runFields, $flags) {
        $postMultipart = [];
        $errors = [];
        foreach ($fieldValues as $fieldName => $value) {
            $runField = Arr::get($runFields, $fieldName);
            if ($runField && Arr::has($runField, "flag")) {
                $flag = $flags[$runField["flag"]];
                if (empty($value)) {
                    if (Arr::get($flag, "required")) {
                        // return self::_getInvalidFlagError($flag["name"]);
                        $errors[] = [$flag["name"], null, null];
                        continue;
                    } elseif (Arr::has($flag, "default")) {
                        $value = $flag["default"];
                    }
                }
            }
            if ($runField && Arr::get($runField, "array")) {
                list($postMultipart, $err) = self::getPostMultipartArrayField($postMultipart, $value, $flag, $schemaCommand, $runField);
            } else {
                list($postMultipart, $err) = self::getPostMultipartFieldValue($postMultipart, $fieldName, $value, $runField);
            }
            if ($err) {
                $errors[] = $err;
                continue;
            }
        }
        return [$postMultipart, $errors];
    }

    static function runServerPostProcessing($schemaCommand, $postMultipart, $context) {
        if (Arr::has($schemaCommand["run"], "serverPostProcessing")) {
            foreach ($schemaCommand["run"]["serverPostProcessing"] as $p) {
                $postMultipart = call_user_func([ProxyServerPostProcessingMethods::class, $p["method"]], $postMultipart, $p, $context);
            }
        }
        return $postMultipart;
    }

    static function post(Request $request, $command, $httpMethod=null, $handleInternalRequestCallback=null) {
        $schemaCommand = $command["schemaCommand"];
        $httpMethod = self::getHttpMethod($schemaCommand, $httpMethod);
        $flags = self::getFlags($schemaCommand);
        $runFields = self::getRunFields($schemaCommand);
        $fieldValues = self::getFieldValues($request, $schemaCommand);
//        var_dump($flags);
//        var_dump($runFields);
//        var_dump($fieldValues);
        list($postMultipart, $errors) = self::getPostMultipart($schemaCommand, $fieldValues, $runFields, $flags);
        if (count($errors) > 0) {
            \Log::info(var_export($errors, true));
            // TODO: output multiple errors
            list($name, $value, $message) = $errors[0];
            return self::_getInvalidFlagError($name, $value, $message);
        }
        $context = [
            "request" => $request,
            "command" => $command,
            "httpMethod" => $httpMethod,
            "schemaCommand" => $schemaCommand,
            "flags" => $flags,
            "fieldValues" => $fieldValues,
            "handleInternalRequest" => $handleInternalRequestCallback
        ];
        $postMultipart = self::runServerPostProcessing($schemaCommand, $postMultipart, $context);
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
