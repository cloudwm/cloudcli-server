<?php

namespace App\Providers;

use App\Cloudcli\BaseServer;
use App\Cloudcli\ProxyEchoServer;
use App\Cloudcli\ProxyServer;
use App\Cloudcli\TestServer;
use Illuminate\Support\ServiceProvider;
use Throwable;

class CloudcliServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BaseServer::class, function ($app) {
            $provider = config("cloudcli.provider");
            switch ($provider) {
                case "base":
                    return new BaseServer();
                case "test":
                    return new TestServer();
                case "proxy":
                    return new ProxyServer();
                case "proxy-echo":
                    return new ProxyEchoServer();
                default:
                    throw new CloudcliInvalidProviderException($provider);
            }
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

class CloudcliInvalidProviderException extends \Exception {

    function __construct($provider)
    {
        parent::__construct("Invalid cloudcli provider: $provider");
    }

}
