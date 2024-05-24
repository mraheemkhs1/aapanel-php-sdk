<?php

namespace AaPanelSDK\Services;

use AaPanelSDK\AaPanelClient;

class Monitoring
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getRealTimeStatus()
    {
        return $this->client->post('getRealTimeStatus');
    }

    public function checkInstallationTasks()
    {
        return $this->client->post('checkInstallationTasks');
    }
}
