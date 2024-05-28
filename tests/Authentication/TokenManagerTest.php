<?php

namespace AaPanelSDK\Tests\Authentication;

use AaPanelSDK\Authentication\TokenManager;
use PHPUnit\Framework\TestCase;

class TokenManagerTest extends TestCase
{
    public function testGenerateToken()
    {
        $apiKey = 'test_api_key';
        $tokenManager = new TokenManager($apiKey);
        $token = $tokenManager->generateToken();

        $this->assertArrayHasKey('request_time', $token);
        $this->assertArrayHasKey('request_token', $token);
        $this->assertNotEmpty($token['request_time']);
        $this->assertNotEmpty($token['request_token']);
    }
}
