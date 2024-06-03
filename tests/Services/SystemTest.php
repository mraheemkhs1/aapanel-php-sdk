<?php

namespace Mastercraft\AapanelPhpSdk\Tests\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;
use Mastercraft\AapanelPhpSdk\Services\System;
use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;

class SystemTest extends TestCase
{
    private $apiKey;
    private $baseUri;
    
    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/../..');
        $dotenv->safeLoad();
        $this->apiKey = $_ENV['AAPANEL_API_KEY'];
        $this->baseUri = $_ENV['AAPANEL_URL'];
    }

    public function testGetSystemTotal()
    {
        $aaPanelClient = new AaPanelClient($this->baseUri, $this->apiKey);
        $system = new System($aaPanelClient);
        $response = $system->getSystemTotal();

        $this->assertEquals(0.85, $response['cpuRealUsed']);
    }

    public function testGetDiskInfo()
    {
        $aaPanelClient = new AaPanelClient($this->baseUri, $this->apiKey);
        $system = new System($aaPanelClient);
        $response = $system->getDiskInfo();

        $this->assertEquals('/', $response[0]['path']);
        $this->assertEquals(["8675328", "148216", "8527112", "2%"], $response[0]['inodes']);
    }
}

