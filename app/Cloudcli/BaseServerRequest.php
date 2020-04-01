<?php

namespace App\Cloudcli;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BaseServerRequest {

    static function handleSvcRequest(Request $request, $server) {
        $path = $request->get("path");
        if (strpos($path, "serverCreate/datacenterConfiguration/") === 0) {
            $datacenter = explode("/", $path)[2];
            return $server->handleDatacenterConfigurationRequest($request, $datacenter);
        } else {
            return response()->json(["error" => true], 404);
        }
    }

    static function handleRequest($request, $command, $server) {
        if ($command["cmd"] == "_") {
            // special server-only commands, must be called without a request
            $request = null;
        }
        try {
            $res = call_user_func([$server, $command['method']], $request, $command);
        } catch (Exception $e) {
            \Log::error($e->getTraceAsString());
            $res = [
                "error" => true,
                "message" => $command['method'] == 'post' ? 'Failed to run command ('.$command['schemaCommand']['use'].')' : "Failed to run command method (${command['method']})"
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
                $jsonResponse = ["message" => implode('. ', $messages)];
            } else {
                if (count($unhandledResponses) > 0) {
                    $res["responses"] = $unhandledResponses;
                }
                if (count($messages) > 0) {
                    $res["message"] = implode('. ', $messages);
                }
                $jsonResponse = $res;
            }
        } else {
            $jsonResponse = $res;
            $status_code = 200;
        }
        if ($request->header('X-CLOUDCLI-STATUSINJSON', '') == 'true') {
            return response()->json(['response' => $jsonResponse, 'status' => $status_code], 200);
        } else {
            return response()->json($jsonResponse, $status_code);
        }
    }

}
