<?php

namespace AnatoliaFulfillment\Client;

class FulfillmentClientServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/fulfillment-client.php' => config_path('fulfillment-client.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/fulfillment-client.php', 'fulfillment-client');
    }
}