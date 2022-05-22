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

class ProxyServerGet
{

    static function processBoolFlags($flagNames, $items, Request $request) {
        $enabledFlagNames = [];
        if ($flagNames) {
//            \Log::info("flagNames=".implode(',', $flagNames));
            foreach ($flagNames as $flagName) {
//                \Log::info($request->input($flagName, ""));
                if ($request->input($flagName, "")) {
                    $enabledFlagNames[] = $flagName;
                }
            }
        }
        if ($enabledFlagNames) {
            $newItems = [];
            foreach ($items as $item) {
                $newItem = [];
                foreach ($item as $k=>$v) {
                    foreach ($enabledFlagNames as $flagName) {
                        if ($flagName == $k) {
                            $newItem[$k] = $v;
                        }
                    }
                }
                if (count($newItem) > 0) {
                    $newItems[] = $newItem;
                }
            }
            return $newItems;
        } else {
            return $items;
        }
    }

    static function get(Request $request, $command) {
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            return $res;
        } else {
            $schemaCommand = $command["schemaCommand"];
            $serverPath = Arr::get($schemaCommand, 'run.serverPath', Arr::get($command, 'path'));
            $arrayFlag = null;
            $boolFlags = [];
            foreach (Arr::get($schemaCommand, "flags", []) as $flag) {
                $flagName = Arr::get($flag, "name");
                if ($flagName) {
                    if (Arr::get($flag, 'array')) {
                        if ($arrayFlag && $arrayFlag != $flagName) {
                            throw new ProxyServerGetInvalidArgumentException($flagName, "Multiple array flag names");
                        }
                        $arrayFlag = $flagName;
                    } elseif (Arr::get($flag, 'bool')) {
                        $boolFlags[] = $flagName;
                    } else {
                        if (Arr::get($flag, "required") && empty($request->input($flagName))) {
                            return ["error" => true, "message" => "$flagName is required", "status_code" => 400];
                        }
                        if (strstr($serverPath, "<" . $flagName . ">")) {
                            $serverPath = str_replace("<" . $flagName . ">", $request->input($flagName), $serverPath);
                        }
                    }
                }
            }
            if ($arrayFlag) {
                if (!strstr($serverPath, "<".$arrayFlag.">")) {
                    throw new ProxyServerGetInvalidArgumentException($flagName, "Invalid serverPath");
                }
                $items = [];
                foreach (explode(" ", $request->input($arrayFlag, "")) as $value) {
                    if ($value) {
                        $valueRes = ProxyServerHttp::parseClientResponse(
                            $res["client"]->get(str_replace("<".$arrayFlag.">", $value, $serverPath))
                        );
                        // \Log::info($valueRes);
                        if (!$valueRes || Arr::get($valueRes, 'error')) {
                            return $valueRes;
                        } else {
                            $items[] = $valueRes;
                        }
                    }
                }
                return self::processBoolFlags($boolFlags, $items, $request);
            } else {
                if ($boolFlags) {
                    throw new ProxyServerGetInvalidArgumentException($boolFlags[0], "boolean list flags are only supported with array flags: ${boolFlags}");
                }
                $res = ProxyServerHttp::parseClientResponse(
                    $res["client"]->get($serverPath)
                );
                if (Arr::get($schemaCommand, 'run.serverParseListItems')) {
                    $res = $res[$schemaCommand["run"]["serverParseListItems"]];
                }
                if (Arr::get($res, 'error') && Arr::get($res, 'response')) {
                    return $res['response'];
                } else {
                    return $res;
                }
            }
        }
    }

}


class ProxyServerGetInvalidArgumentException extends Exception {

    function __construct($argname, $message=null)
    {
        if (empty($message)) $message = "Invalid argument ($argname)";
        parent::__construct($message);
    }

}
