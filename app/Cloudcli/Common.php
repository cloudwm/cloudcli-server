<?php

namespace App\Cloudcli;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Psy\Formatter\TraceFormatter;
use Illuminate\Support\Facades\Log;

class Common
{
    static function returnParseFlagsErrors($errors) {
        $messages = [];
        foreach ($errors as $name => $error) {
            $messages[] = "{$name}: {$error}";
        }
        return ["error" => true, "message" => join("\n", $messages)];
    }

    static function parseFlags($request, $command) {
        $values = [];
        $errors = [];
        foreach ($command["schemaCommand"]["flags"] as $flag) {
            $value = $request->input($flag["name"]);
            if (is_null($value)) {
                $value = "";
            }
            if (Arr::get($flag, "required") && $value === "") {
                $errors[$flag["name"]] = "required";
            } else {
                if (Arr::get($flag, "string_to_uppercase")) {
                    $value = Str::upper($value);
                }
                if (Arr::get($flag, "type") == "integer") {
                    if ((string)(int) $value == (string) $value) {
                        $value = (int) $value;
                    } else {
                        $errors[$flag["name"]] = "invalid value ('$value'), must be an integer";
                    }
                }
                $values[$flag["name"]] = $value;
            }
        }
        return [$values, $errors];
    }

    static function handleException(\Throwable $e, $message="Unexpected error, please try again later") {
        Log::error(join("\n", TraceFormatter::formatTrace($e)));
        Log::error($e->getMessage());
        return ["error" => true, "message" => $message];
    }

    static function info(string $message, array $context = []) {
        //Log::info($message, $context);
    }

    static function renderServerPath($path, $values) {
        foreach ($values as $key => $value) {
            $path = str_replace("<{$key}>", $value, $path);
        }
        return $path;
    }

    static function requestHandler($request, $command, $callback) {
        try {
            [$values, $errors] = Common::parseFlags($request, $command);
            if (count($errors) > 0) {
                return Common::returnParseFlagsErrors($errors);
            } else {
                return call_user_func($callback, $values);
            }
        } catch (\Exception $e) {
            return Common::handleException($e);
        }
    }
}
