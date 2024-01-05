<?php

namespace AnatoliaFulfillment\Client\Request;

use GuzzleHttp\Client;

class Current
{
    final public function __construct(
        protected Client $client,
    ) {
    }

    public function get(): array
    {
        $response = $this->client->get('/currents');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function create(array $data): array
    {
        $response = $this->client->post('/current', [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function update(int $id, array $data): array
    {
        $response = $this->client->put(sprintf('/current/%d', $id), [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
