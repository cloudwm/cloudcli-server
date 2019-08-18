<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

$cloudcli_server = resolve(\App\Cloudcli\BaseServer::class);

foreach ($cloudcli_server->getServerCommands() as $command) {
    if ($command["cmd"] == "post") {
        Route::post($command["path"], function(Request $request) use ($command, &$cloudcli_server) {
            return $cloudcli_server->handleRequest($request, $command);
        });
    } else {
        Route::get($command["path"], function(Request $request) use ($command, &$cloudcli_server) {
            return $cloudcli_server->handleRequest($request, $command);
        });
    }
}

Route::get("/svc", function(Request $request) use (&$cloudcli_server) {
    return $cloudcli_server->handleSvcRequest($request);
});

