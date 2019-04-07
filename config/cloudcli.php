<?php

return [

    /*
     * Supported providers:
     *
     *   base - returns empty responses
     *   test - returns mock responses
     *
     */
    'provider' => env('CLOUDCLI_PROVIDER', 'test'),

];
