<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

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
