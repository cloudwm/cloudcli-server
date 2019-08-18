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
