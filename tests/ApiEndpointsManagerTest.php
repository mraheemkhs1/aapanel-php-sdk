<?php

namespace Mastercraft\AapanelPhpSdk\Tests;

use Mastercraft\AapanelPhpSdk\ApiEndpointsManager;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class ApiEndpointsManagerTest extends TestCase
{
    public function testGetURL()
    {
        $url = ApiEndpointsManager::getURL('getSystemTotal');
        $this->assertEquals('/system?action=GetSystemTotal', $url);
    }

    public function testGetURLInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        ApiEndpointsManager::getURL('invalidKey');
    }
}
