<?php

namespace AnatoliaFulfillment\Client;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client
{
    protected GuzzleHttpClient $client;

    public function __construct()
    {
        $this->client = new GuzzleHttpClient([
            'base_uri' => config('fulfillment-client.base_uri'),
            'headers' => [
                'Authorization' => sprintf('Bearer %s', config('fulfillment-client.access_token')),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
        ]);
    }

    public function order(): Request\Order
    {
        return new Request\Order($this->client);
    }

    public function current(): Request\Current
    {
        return new Request\Current($this->client);
    }
}
