<?php

namespace App\Cloudcli;

class Network
{
    static function create($request, $command) {
        try {
            [$values, $errors] = Common::parseFlags($request, $command);
            if (count($errors) > 0) {
                return Common::returnParseFlagsErrors($errors);
            } else {
                $datacenter = $values["datacenter"];
                unset($values["datacenter"]);
                return self::apiPostJson($request, "/svc/networks/{$datacenter}/create", $values);
            }
        } catch (\Exception $e) {
            return Common::handleException($e);
        }
    }

    static function apiPostJson($request, $path, $data) : array {
        $res = ProxyServerHttp::getHttpClient($request);
        if ($res["error"]) {
            throw new \Exception($res);
        } else {
            $res = $res["client"]->request("POST", $path, ["json" => $data]);
            $body = (string) $res->getBody();
            if (empty($body) && $res->getStatusCode() == 200) {
                return [];
            } else {
                $decoded_response = json_decode($body, true);
                $last_error = (json_last_error() == JSON_ERROR_NONE) ? null : json_last_error_msg();
                if (!$last_error && $res->getStatusCode() == 200) {
                    return $decoded_response;
                } else {
                    return [
                        "error" => true,
                        "message" => json_encode($decoded_response)
                    ];
                }
            }
        }
    }
}
