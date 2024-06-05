<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

class Log
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    // public function getLogs($limit = 10)
    // {
    //     return $this->client->post('getLogs', [
    //         'table' => 'logs',
    //         'limit' => $limit
    //     ]);
    // }

    public function getRealtimeLog($logPath)
    {
        return $this->client->post('getLineLog', [
            'num' => 10,
            'filename' => $logPath
        ]);
    }
}
