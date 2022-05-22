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

    static function getSchema($supports=null) {
        return self::getSchemaPart("root", null, $supports);
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

    static function isSupport($supports, $val) {
        return is_null($supports) or in_array($val, $supports);
    }

    static function getSchemaPart($partName, $context=null, $supports=null) {
        if (!$context) {
            $context = [];
        }
        foreach (self::CONTEXT_SCHEMA_PARTS as $v) {
            if (!Arr::has($context, "getSchemaPart ${v}") && $partName != $v) {
                $context["getSchemaPart ${v}"] = self::getSchemaPart($v, $context, $supports);
            }
        }
        switch ($partName) {
            case "root":
                return [
                    "schema_version" => self::getSchemaPart("version", $context, $supports),
                    "commands" => self::getSchemaPart("commands", $context, $supports),
                    "schema_generated_at" => (new \DateTime())->format(\DateTime::RFC3339)
                ];

            case "commands":
                $commands = [];
                $commands[] = self::getSchemaPart("commands/server", $context, $supports);
                if (self::isSupport($supports, "SimpleJsonServerResponse")) {
                    $commands[] = self::getSchemaPart("commands/network", $context, $supports);
                }
                $commands[] = self::getSchemaPart("commands/queue", $context, $supports);
                return $commands;

            case "commands/server":
                return [
                    "use" => "server",
                    "short" => "Server management",
                    "commands" => [
                        self::getSchemaPart("commands/server/list", $context, $supports),
                        self::getSchemaPart("commands/server/terminate", $context, $supports),
                        self::getSchemaPart("commands/server/power", ["use" => "poweron", "short" => "Power On", "power" => "on"], $supports),
                        self::getSchemaPart("commands/server/power", ["use" => "poweroff", "short" => "Power Off", "power" => "off"], $supports),
                        self::getSchemaPart("commands/server/power", ["use" => "reboot", "short" => "Reboot", "power" => "restart"], $supports),
                        self::getSchemaPart("commands/server/options", $context, $supports),
                        self::getCreateCloneServerSchemaPart(self::getSchemaPart("commands/server/create", $context, $supports), "create"),
                        self::getCreateCloneServerSchemaPart(self::getSchemaPart("commands/server/create", $context, $supports), "clone"),
                        self::getSchemaPart("commands/server/info", $context, $supports),
                        self::getSchemaPart("commands/server/attach", $context, $supports),
                        self::getSchemaPart("commands/server/password", $context, $supports),
                        self::getSchemaPart("commands/server/sshkey", $context, $supports),
                        self::getSchemaPart("commands/server/description", $context, $supports),
                        self::getSchemaPart("commands/server/snapshot", $context, $supports),
                        self::getSchemaPart("commands/server/network", $context, $supports),
                        self::getSchemaPart("commands/server/disk", $context, $supports),
                        self::getSchemaPart("commands/server/configure", $context, $supports),
                        self::getSchemaPart("commands/server/history", $context, $supports),
                        self::getSchemaPart("commands/server/rename", $context, $supports),
                        self::getSchemaPart("commands/server/statistics", $context, $supports),
                        self::getSchemaPart("commands/server/tags", $context, $supports),
                        self::getSchemaPart("commands/server/reports", $context, $supports),
                        self::getSchemaPart("commands/server/hdlib", $context, $supports),
                    ]
                ];

            case "commands/network":
                return [
                    "use" => "network",
                    "short" => "Network management",
                    "commands" => [
                        self::getSchemaPart("commands/network/list", $context, $supports),
                        self::getSchemaPart("commands/network/create", $context, $supports),
                        self::getSchemaPart("commands/network/subnet_list", $context, $supports),
                        self::getSchemaPart("commands/network/subnet_create", $context, $supports),
                        self::getSchemaPart("commands/network/subnet_edit", $context, $supports),
                        self::getSchemaPart("commands/network/subnet_delete", $context, $supports),
                        self::getSchemaPart("commands/network/delete", $context, $supports),
                    ]
                ];

            case "commands/queue":
                return [
                    "use" => "queue",
                    "short" => "Task queue management",
                    "commands" => [
                        self::getSchemaPart("commands/queue/list", null, $supports),
                        self::getSchemaPart("commands/queue/detail", null, $supports),
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
                self::parseFieldsFromFlags($data);
                return $data;
        }
    }

    static function parseFieldsFromFlags(&$data) {
        if (Arr::get($data, "run.fieldsFromFlags")) {
            unset($data["run"]["fieldsFromFlags"]);
            $fields = [];
            foreach ($data["flags"] as &$flag) {
                $field = Arr::get($flag, "__field", []);
                unset($flag["__field"]);
                $field["name"] = $flag["name"];
                $field["flag"] = $flag["name"];
                $fields[] = $field;
            }
            $data["run"]["fields"] = $fields;
        }
    }
}
