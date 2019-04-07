<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $message = $exception->getMessage();
        $class_name = get_class($exception);
        if ($class_name == "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException") {
            $http_status = 404;
            if (empty($message)) $message = "Not Found";
        } else {
            $http_status = 500;
            $message = $exception->getMessage();
        }
        $debugres = [
            "error" => true,
            "message" => $message,
            "code" => $exception->getCode(),
            "exception" => $class_name,
            "trace" => $exception->getTraceAsString()
        ];
        if ($http_status == 404) {
            \Log::warning('not found exception', $debugres);
        } else {
            \Log::error('unexpected exception', $debugres);
        }
        \Log::error('app.debug: '.config('app.debug', false));
        if (config('app.debug', false)) {
            $res = $debugres;
        } else {
            $res = [
                "error" => true,
                "message" => $message,
            ];
        }
        return response()->json($res, $http_status);
        // return parent::render($request, $exception);
    }
}
