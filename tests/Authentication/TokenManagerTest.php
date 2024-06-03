<?php

namespace Mastercraft\AapanelPhpSdk\Tests\Authentication;

use Mastercraft\AapanelPhpSdk\Authentication\TokenManager;
use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;

class TokenManagerTest extends TestCase
{
    private $apiKey;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__.'/../..');
        $dotenv->safeLoad();
        $this->apiKey = $_ENV['AAPANEL_API_KEY'];
    }

    public function testGenerateToken()
    {
        $tokenManager = new TokenManager($this->apiKey);
        $token = $tokenManager->generateToken();

        $this->assertArrayHasKey('request_time', $token);
        $this->assertArrayHasKey('request_token', $token);
        $this->assertNotEmpty($token['request_time']);
        $this->assertNotEmpty($token['request_token']);
    }
}
