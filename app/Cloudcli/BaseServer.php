<?php

namespace App\Cloudcli;

use Exception;
use Illuminate\Support\Arr;

class BaseServer {

    protected function _handleInternalRequest($request, $method, $command=null) {
        if (empty($command)) {
            $command = [];
        }
        return call_user_func([$this, $method], $request, $command);
    }

    function handleRequest($request, $command) {
        return BaseServerRequest::handleRequest($request, $command, $this);
    }

    function handleSvcRequest($request) {
        return BaseServerRequest::handleSvcRequest($request, $this);
    }

    function getServerCommands($schemaCommand=null, $commands=null) {
        return Schema::getServerCommands($schemaCommand, $commands);
    }

    function getSchema() {
        return Schema::getSchema();
    }

    function root() {
        return ['ready' => true];
    }

    function listServers($request, $command) {
        return [];
    }

    function getServerOptions($request, $command) {
        return [
            "datacenters" => new \ArrayObject(),
            "cpu" => [],
            "ram" => [],
            "disk" => [],
            "diskImages" => new \ArrayObject(),
            "traffic" => new \ArrayObject(),
            "networks" => new \ArrayObject(),
            "billing" => [],
        ];
    }

}
