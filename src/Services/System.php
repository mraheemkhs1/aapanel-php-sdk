<?php

namespace AaPanelSDK\Services;

use AaPanelSDK\AaPanelClient;

class System
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getSystemTotal()
    {
        return $this->client->post('getSystemTotal');
    }

    public function getDiskInfo()
    {
        return $this->client->post('getDiskInfo');
    }

    public function getNetwork()
    {
        return $this->client->post('getNetwork');
    }

    public function getRealTimeStatus()
    {
        return $this->client->post('getRealTimeStatus');
    }

    public function checkInstallationTasks()
    {
        return $this->client->post('checkInstallationTasks');
    }

    public function checkUpdate()
    {
        return $this->client->post('checkUpdate', ['check' => true]);
    }
}
