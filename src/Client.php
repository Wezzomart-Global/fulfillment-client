<?php

namespace AnatoliaFulfillment\Client;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client
{
    protected GuzzleHttpClient $client;
    public function __construct(
        public string $accessToken,
    ) {
        $this->client = new GuzzleHttpClient([
            'base_uri' => 'https://tfm.wezzomart.io',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
        ]);
    }

    public function order(): Request\Order
    {
        return new Request\Order($this->client);
    }
}
