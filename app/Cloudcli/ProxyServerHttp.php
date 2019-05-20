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

class ProxyServerHttp
{

    /**
     * low-level interaction with API
     */

    static function getHttpClient(Request $request) {
        $server = env("CLOUDCLI_API_SERVER");
        if (empty($server)) {
            return [
                "error" => true,
                "server" => $server,
                "message" => "Missing env var: CLOUDCLI_API_SERVER"
            ];
        }
        return [
            "error" => false,
            "server" => $server,
            "client" => new Client([
                "http_errors" => false,
                "base_uri" => $server,
                "headers" => [
                    "AuthClientId" => $request->header("AuthClientId", env("CLOUDCLI_API_CLIENTID")),
                    "AuthSecret" => $request->header("AuthSecret", env("CLOUDCLI_API_SECRET")),
                ]
            ])
        ];
    }

    static function parseClientResponse(Response $res) {
        $decoded_response = json_decode($res->getBody(), true);
        $last_error = (json_last_error() == JSON_ERROR_NONE) ? null : json_last_error_msg();
        if (!$last_error && $res->getStatusCode() == 200) {
            return $decoded_response;
        } else {
            \Log::error(json_encode($decoded_response));
            return [
                "error" => true,
                "status_code" => $res->getStatusCode(),
                "response" => $decoded_response,
                "json_decode_error" => $last_error
            ];
        }
    }

}
