<?php

namespace AaPanelSDK\Tests\Services;

use AaPanelSDK\AaPanelClient;
use AaPanelSDK\Services\System;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;

class SystemTest extends TestCase
{
    public function testGetSystemTotal()
    {
        // $mock = new MockHandler([
        //     new Response(200, [], json_encode(['cpuRealUsed' => 0.85])),
        // ]);
        // $handlerStack = HandlerStack::create($mock);
        // $client = new Client(['handler' => $handlerStack]);
        $apiKey = 'test_api_key';

        $aaPanelClient = new AaPanelClient('https://your-aapanel-url', $apiKey);
        $system = new System($aaPanelClient);
        $response = $system->getSystemTotal();

        $this->assertEquals(0.85, $response['cpuRealUsed']);
    }

    public function testGetDiskInfo()
    {
        $apiKey = 'test_api_key';

        $aaPanelClient = new AaPanelClient('https://your-aapanel-url', $apiKey);
        $system = new System($aaPanelClient);
        $response = $system->getDiskInfo();

        $this->assertEquals('/', $response[0]['path']);
        $this->assertEquals(["8675328", "148216", "8527112", "2%"], $response[0]['inodes']);
    }
}

