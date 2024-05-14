<?php

namespace AaPanelSDK\Tests;

use AaPanelSDK\AaPanelClient;
use AaPanelSDK\Authentication\TokenManager;
use AaPanelSDK\Exception\APIException;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;

class AaPanelClientTest extends TestCase
{
    public function testPost()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['status' => 'success'])),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $apiKey = 'test_api_key';
        $tokenManager = new TokenManager($apiKey);

        $aaPanelClient = new AaPanelClient('https://your-aapanel-url', $apiKey);
        $response = $aaPanelClient->post('getSystemTotal');

        $this->assertEquals(['status' => 'success'], $response);
    }

    public function testPostInvalidEndpoint()
    {
        $this->expectException(APIException::class);

        $aaPanelClient = new AaPanelClient('https://your-aapanel-url', 'test_api_key');
        $aaPanelClient->post('invalidKey');
    }
}
