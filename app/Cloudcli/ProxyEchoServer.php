<?php

namespace App\Cloudcli;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProxyEchoServer extends ProxyServer {

    protected function _returnProxyHttpPostResponse(Request $request, $httpMethod, $command, $postMultipart) {
        return [
            "httpMethod" => $httpMethod,
            "postMultipart" => $postMultipart,
            "path" => $command["path"]
        ];
    }

    protected function _serverGet(Request $request, $command) {
        if (Arr::get($command, "internal")) {
            return parent::_serverGet($request, $command);
        } else {
            return [
                "httpMethod" => "GET",
                "path" => $command["path"]
            ];
        }
    }

}
