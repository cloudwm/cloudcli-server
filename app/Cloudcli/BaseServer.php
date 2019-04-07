<?php

namespace App\Cloudcli;

use Illuminate\Support\Arr;

class BaseServer {

    protected function _handleInternalRequest($request, $method, $command=null) {
        if (empty($command)) {
            $command = [];
        }
        return call_user_func([$this, $method], $request, $command);
    }

    function handleRequest($request, $command) {
        if ($command["cmd"] == "_") {
            // special server-only commands, must be called without a request
            $request = null;
        }
        $res = call_user_func([$this, $command['method']], $request, $command);
        if (Arr::get($res, "error")) {
            Arr::forget($res, "error");
            if (Arr::has($res, "status_code")) {
                $status_code = $res["status_code"];
                Arr::forget($res, "status_code");
            }
            if (empty($status_code)) {
                $status_code = 500;
            }
            if (Arr::has($res, "messasge")) {
                $message = $res["message"];
                Arr::forget($res, "message");
            } else {
                $message = "";
            }
            if (Arr::has($res, "response")) {
                $response = $res["response"];
                Arr::forget($res, "response");
            } else {
                $response = null;
            }
            if (Arr::has($res, "responses")) {
                $responses = $res["responses"];
                Arr::forget($res, "responses");
            } else {
                $responses = [];
            }
            if ($response) {
                $responses[] = $response;
            }
            $messages = [];
            if (!empty($message)) {
                $messages[] = $message;
            }
            $unhandledResponses = [];
            foreach ($responses as &$response) {
                if (Arr::get($response, "error")) {
                    Arr::forget($response, "error");
                    if (Arr::get($response, "message")) {
                        $messages[] = $response["message"];
                        Arr::forget($response, "message");
                    }
                    if (count($response) != 0) {
                        $unhandledResponses[] = $response;
                    }
                }
            }
            if (count($messages) > 0) {
                return response()->json(["message" => implode('. ', $messages)], $status_code);
            } else {
                if (count($unhandledResponses) > 0) {
                    $res["responses"] = $unhandledResponses;
                }
                if (count($messages) > 0) {
                    $res["message"] = implode('. ', $messages);
                }
                return response()->json($res, $status_code);
            }
        } else {
            return response()->json($res, 200);
        }
    }

    function getServerCommands($schemaCommand=null, $commands=null) {
        if ($commands == null) {
            $commands = [
                [
                    "cmd" => "_",
                    "path" => "/",
                    "method" => "root",
                    "schemaCommand" => null
                ],
                [
                    "cmd" => "_",
                    "path" => "/schema",
                    "method" => "getSchema",
                    "schemaCommand" => null
                ]
            ];
        }
        if ($schemaCommand == null) {
            $schemaCommand = $this->getSchema();
        }
        $run = Arr::get($schemaCommand, "run");
        if ($run) {
            $cmd = Arr::get($run, "cmd");
            $path = Arr::get($run, "path");
            $method = Arr::get($run, "method");
            if ($cmd && $path && $method) {
                $commands[] = [
                    "cmd" => $cmd,
                    "path" => $path,
                    "method" => $method,
                    "schemaCommand" => $schemaCommand
                ];
            }
        }
        foreach (Arr::get($schemaCommand, "commands", []) as $subCommand) {
            $commands = $this->getServerCommands($subCommand, $commands);
        }
        return $commands;
    }

    function root() {
        return ['ready' => true];
    }

    function getSchema() {
        return json_decode(
            file_get_contents(
                env('CLI_SCHEMA_JSON', '/home/cloudwm/cloudcli-server/cli_schema.json')
            ),
            true
        );
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
