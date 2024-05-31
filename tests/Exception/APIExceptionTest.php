<?php

namespace Mastercraft\AapanelPhpSdk\Tests\Exception;

use Mastercraft\AapanelPhpSdk\Exception\APIException;
use PHPUnit\Framework\TestCase;

class APIExceptionTest extends TestCase
{
    public function testAPIException()
    {
        $message = 'Test Exception';
        $code = 123;
        $exception = new APIException($message, $code);

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }
}
