<?php

namespace App\Cloudcli;

use Illuminate\Support\Arr;


class Schema {

    // these parts can be rendered within json files using:
    // "<< getSchemaPart PART_NAME >>"
    // for objects, the entire string, including the quotes will be replaced
    const CONTEXT_SCHEMA_PARTS = [
        "flags/wait"
    ];

    static function getServerCommands($schemaCommand=null, $commands=null) {
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
            $schemaCommand = self::getSchema();
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
            $commands = self::getServerCommands($subCommand, $commands);
        }
        return $commands;
    }

    static function getSchema() {
        return self::getSchemaPart("root");
    }

    static function getSchemaPart($partName, $context=null) {
        if (!$context) {
            $context = [];
        }
        foreach (self::CONTEXT_SCHEMA_PARTS as $v) {
            if (!Arr::has($context, "getSchemaPart ${v}") && $partName != $v) {
                $context["getSchemaPart ${v}"] = self::getSchemaPart($v, $context);
            }
        }
        switch ($partName) {
            case "root":
                return [
                    "schema_version" => self::getSchemaPart("version", $context),
                    "commands" => self::getSchemaPart("commands", $context),
                    "schema_generated_at" => (new \DateTime())->format(\DateTime::RFC3339)
                ];

            case "commands":
                return [
                    self::getSchemaPart("commands/server", $context),
                    self::getSchemaPart("commands/queue", $context),
                ];

            case "commands/server":
                return [
                    "use" => "server",
                    "short" => "Server management",
                    "commands" => [
                        self::getSchemaPart("commands/server/list", $context),
                        self::getSchemaPart("commands/server/terminate", $context),
                        self::getSchemaPart("commands/server/power", ["use" => "poweron", "short" => "Power On", "power" => "on"]),
                        self::getSchemaPart("commands/server/power", ["use" => "poweroff", "short" => "Power Off", "power" => "off"]),
                        self::getSchemaPart("commands/server/power", ["use" => "reboot", "short" => "Reboot", "power" => "restart"]),
                        self::getSchemaPart("commands/server/options", $context),
                        self::getSchemaPart("commands/server/create", $context),
                        self::getSchemaPart("commands/server/info", $context),
                        self::getSchemaPart("commands/server/attach", $context),
                        self::getSchemaPart("commands/server/password", $context),
                        self::getSchemaPart("commands/server/sshkey", $context),
                        self::getSchemaPart("commands/server/description", $context),
                        self::getSchemaPart("commands/server/snapshot", $context),
                        self::getSchemaPart("commands/server/network", $context),
                    ]
                ];

            case "commands/queue":
                return [
                    "use" => "queue",
                    "short" => "Task queue management",
                    "commands" => [
                        self::getSchemaPart("commands/queue/list"),
                        self::getSchemaPart("commands/queue/detail"),
                    ]
                ];

            /* default renderer decodes from a json file named as the partName */
            default:
                $data = file_get_contents(
                    env('CLI_SCHEMA_JSON_DIR', '/home/cloudwm/cloudcli-server/cli_schema')."/".$partName.".json"
                );
                foreach ($context as $k=>$v) {
                    if (is_array($v) && Arr::isAssoc($v)) {
                        $data = str_replace("\"<< ${k} >>\"", json_encode($v), $data);
                    } else {
                        $data = str_replace("<< ${k} >>", $v, $data);
                    }
                }
                $data = json_decode($data, true);
                if (Arr::isAssoc($data)) {
                    $data = Arr::except($data, ["__comments__"]);
                }
                return $data;
        }
    }

}
