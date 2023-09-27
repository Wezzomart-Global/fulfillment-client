<?php

namespace AnatoliaFulfillment\Client\Request;

use AnatoliaFulfillment\Client\Response\Order as ResponseOrder;
use GuzzleHttp\Client as GuzzleHttpClient;

class Order
{
    public function __construct(
        protected GuzzleHttpClient $client,
    ) {
    }

    public function create(array $data): ResponseOrder
    {
        $response = $this->client->post('/api/orders', [
            'json' => $data,
        ]);

        if ($response->getStatusCode() >= 400) {
            throw new \Exception('Order not created');
        }

        return new ResponseOrder(
            data_get(json_decode($response->getBody()->getContents(), true), 'data')
        );
    }

    public function update(string $id, array $data): array
    {
        $response = $this->client->put("/api/orders/{$id}", [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function get(string $id): array
    {
        $response = $this->client->get("/api/orders/{$id}");

        return json_decode($response->getBody()->getContents(), true);
    }

    public function list(array $query = []): array
    {
        $response = $this->client->get('/api/orders', [
            'query' => $query,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
