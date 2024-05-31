<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

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

    public function checkUpdate()
    {
        return $this->client->post('checkUpdate', ['check' => true]);
    }
}
