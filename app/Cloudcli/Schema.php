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

    static function getCreateCloneServerSchemaPart($schema, $type) {
        if ($type == "clone") {
            $schema['use'] = $schema["cloneUse"];
            $schema['short'] = $schema["cloneShort"];
            unset($schema['interactive']);
            $schema['isServerClone'] = true;
            $schema['run']['path'] = '/service/cloneServer';
        } else {
            $schema['isServerClone'] = false;
        }
        unset($schema["cloneUse"]);
        unset($schema["cloneShort"]);
        if ($type == "clone") {
            $flags = [
                [
                    "name" => "source-id",
                    "usage" => "Source server ID to clone"
                ],
                [
                    "name" => "source-name",
                    "usage" => "Source server name or regular expression matching a single server to clone"
                ]
            ];
        } else {
            $flags = [];
        }
        foreach($schema['flags'] as $flag) {
            if ($type == "create") {
                $flags[] = $flag;
            } else if (!in_array($flag['name'], ['interactive', 'datacenter', 'image'])) {
                if (Arr::get($flag, 'cloneUsage')) {
                    $flag['usage'] = $flag['cloneUsage'];
                }
                $flag['__cloneDefault'] = Arr::get($flag, 'default');
                unset($flag['default']);
                if (Arr::has($flag, 'cloneDefault')) {
                    $flag['default'] = $flag['cloneDefault'];
                }
                $flags[] = $flag;
            }
            unset($flag['cloneUsage']);
        }
        $schema['flags'] = $flags;
        if ($type == 'clone') {
            $schema['run']['method'] = 'post';
        }
        if ($type == "clone") {
            $serverPostProcessing = [];
            foreach ($schema['run']['serverPostProcessing'] as $p) {
                if ($p['method'] != 'validateDiskImageId') {
                    $serverPostProcessing[] = $p;
                }
            }
            $schema['run']['serverPostProcessing'] = $serverPostProcessing;
        }
        if ($type == "clone") {
            $fields = [
                [
                    "name" => "source-id",
                    "flag" => "source-id"
                ],
                [
                    "name" => "source-name",
                    "flag" => "source-name"
                ]
            ];
        } else {
            $fields = [];
        }
        foreach ($schema['run']['fields'] as $field) {
            if ($type == "create" || !in_array($field['name'], ['datacenter', 'image'])) {
                $fields[] = $field;
            }
        }
        $schema['run']['fields'] = $fields;
        return $schema;
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
                        self::getCreateCloneServerSchemaPart(self::getSchemaPart("commands/server/create", $context), "create"),
                        self::getCreateCloneServerSchemaPart(self::getSchemaPart("commands/server/create", $context), "clone"),
                        self::getSchemaPart("commands/server/info", $context),
                        self::getSchemaPart("commands/server/attach", $context),
                        self::getSchemaPart("commands/server/password", $context),
                        self::getSchemaPart("commands/server/sshkey", $context),
                        self::getSchemaPart("commands/server/description", $context),
                        self::getSchemaPart("commands/server/snapshot", $context),
                        self::getSchemaPart("commands/server/network", $context),
                        self::getSchemaPart("commands/server/disk", $context),
                        self::getSchemaPart("commands/server/configure", $context),
                        self::getSchemaPart("commands/server/history", $context),
                        self::getSchemaPart("commands/server/rename", $context),
                        self::getSchemaPart("commands/server/statistics", $context),
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
