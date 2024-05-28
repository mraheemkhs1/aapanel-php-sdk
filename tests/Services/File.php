<?php

namespace AaPanelSDK\Services;

use AaPanelSDK\AaPanelClient;

class Files
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getFileBody($path)
    {
        return $this->client->post('getFileBody', ['path' => $path]);
    }

    public function saveFileBody($path, $data, $encoding = 'utf-8')
    {
        return $this->client->post('saveFileBody', [
            'path' => $path,
            'data' => $data,
            'encoding' => $encoding
        ]);
    }
}
