<?php

namespace AaPanelSDK\Services;

use AaPanelSDK\AaPanelClient;

class Log
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getLogs($limit = 10)
    {
        return $this->client->post('getLogs', [
            'table' => 'logs',
            'limit' => $limit
        ]);
    }
}
