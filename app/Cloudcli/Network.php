<?php

namespace App\Cloudcli;

use Illuminate\Support\Arr;

class Network
{
    static function postSimpleJson($request, $command) {
        return Common::requestHandler($request, $command, function($values) use ($request, $command) {
            $path = Common::renderServerPath($command["schemaCommand"]["run"]["serverPath"], $values);
            foreach ($command["schemaCommand"]["run"]["postSimpleJson"]["unsetFields"] as $field) {
                unset($values[$field]);
            }
            return self::apiPostSimpleJson(
                $request, $path, $values,
                $command["schemaCommand"]["run"]["postSimpleJson"]["successMessage"],
                Arr::get($command, "schemaCommand.run.postSimpleJson.httpMethod", "POST")
            );
        });
    }

    static function getListItems($request, $command) {
        return Common::requestHandler($request, $command, function($values) use ($request, $command) {
            $path = Common::renderServerPath($command["schemaCommand"]["run"]["serverPath"], $values);
            return self::apiGetListItems(
                $request, $path, $command, $values,
                $command["schemaCommand"]["run"]["getListItems"]["itemsKey"],
                $command["schemaCommand"]["run"]["getListItems"]["maxItems"]
            );
        });
    }

    static function apiGetListItems($request, $path, $command, $values, $itemsKey, $maxItems) {
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            throw new \Exception($res);
        } else {
            $res = $res["client"]->request("GET", $path);
            $body = (string)$res->getBody();
            if (empty($body) && $res->getStatusCode() == 200) {
                return [];
            } else {
                $decoded_response = json_decode($body, true);
                $last_error = (json_last_error() == JSON_ERROR_NONE) ? null : json_last_error_msg();
                if (!$last_error && $res->getStatusCode() == 200) {
                    if (!Arr::exists($decoded_response, $itemsKey)) {
                        return [
                            "error" => true,
                            "message" => "Unexpected response ($decoded_response)"
                        ];
                    } else {
                        $items = Arr::get($decoded_response, $itemsKey);
                        $countItems = count($items);
                        if ($countItems > $maxItems) {
                            return [
                                "error" => true,
                                "message" => "Invalid response (maxItems exceeded: {$countItems})"
                            ];
                        } else {
                            $resItems = [];
                            foreach ($items as $item) {
                                $resItem = [];
                                foreach ($command["schemaCommand"]["run"]["fields"] as $field) {
                                    $fieldName = $field["name"];
                                    if (Arr::exists($item, $fieldName)) {
                                        $value = $item[$fieldName];
                                    } else {
                                        $value = Arr::get($values, $fieldName);
                                    }
                                    $resItem[$fieldName] = $value;
                                }
                                $resItems[] = $resItem;
                            }
                            return $resItems;
                        }
                    }
                } else {
                    return [
                        "error" => true,
                        "message" => json_encode($decoded_response)
                    ];
                }
            }
        }
    }

    static function apiPostSimpleJson($request, $path, $data, $successMessage=null, $httpMethod="POST") : array {
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            throw new \Exception($res);
        } else {
            $requestArgs = [];
            if (count($data) > 0) {
                $requestArgs["json"] = $data;
            }
            Common::info($path, [$httpMethod, $requestArgs]);
            $res = $res["client"]->request($httpMethod, $path, $requestArgs);
            $body = (string) $res->getBody();
            if (empty($body) && $res->getStatusCode() == 200) {
                $res = [];
            } else {
                $decoded_response = json_decode($body, true);
                $last_error = (json_last_error() == JSON_ERROR_NONE) ? null : json_last_error_msg();
                if (!$last_error && $res->getStatusCode() == 200) {
                    $res = $decoded_response;
                } else {
                    $res = [
                        "error" => true,
                        "message" => json_encode($decoded_response)
                    ];
                }
            }
            if ($successMessage && !Arr::get($res, "error") && !Arr::get($res, "errors") && !Arr::get($res, "message")) {
                $res = [
                    "message" => $successMessage,
                    "res" => json_encode($res)
                ];
            }
            return $res;
        }
    }
}
