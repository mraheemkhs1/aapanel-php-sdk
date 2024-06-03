<?php

namespace Mastercraft\AapanelPhpSdk\Tests;

use Mastercraft\AapanelPhpSdk\AaPanelClient;
use Mastercraft\AapanelPhpSdk\Exception\APIException;
use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;

class AaPanelClientTest extends TestCase
{
    private $apiKey;
    private $baseUri;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/..');
        $dotenv->safeLoad();
        $this->apiKey = $_ENV['AAPANEL_API_KEY'];
        $this->baseUri = $_ENV['AAPANEL_URL'];
    }

    public function testPost()
    {
        $aaPanelClient = new AaPanelClient($this->baseUri, $this->apiKey);
        $response = $aaPanelClient->post('getSystemTotal');

        $this->assertEquals(['status' => 'success'], $response);
    }

    public function testPostInvalidEndpoint()
    {
        $this->expectException(APIException::class);
        
        $aaPanelClient = new AaPanelClient($this->baseUri, $this->apiKey);
        $aaPanelClient->post('invalidKey');
    }
}
