<?php

namespace AaPanelSDK\Exception;

use Exception;

class APIException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}