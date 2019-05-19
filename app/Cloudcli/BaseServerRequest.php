<?php

namespace App\Cloudcli;

use Exception;
use Illuminate\Support\Arr;

class BaseServerRequest {

    static function handleRequest($request, $command, $server) {
        if ($command["cmd"] == "_") {
            // special server-only commands, must be called without a request
            $request = null;
        }
        try {
            $res = call_user_func([$server, $command['method']], $request, $command);
        } catch (Exception $e) {
            $res = [
                "error" => true,
                "message" => "Failed to run command method (${command['method']})"
            ];
            if (config('app.debug', false)) {
                $res['message'] = $res['message'].': '.$e->getMessage(); //."\n".$e->getTraceAsString();
            }
        }
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

}
