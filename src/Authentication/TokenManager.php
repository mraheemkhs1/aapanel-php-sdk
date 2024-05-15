<?php

namespace AaPanelSDK\Authentication;

class TokenManager
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function generateToken()
    {
        $requestTime = time();
        $requestToken = md5($requestTime . md5($this->apiKey));
        return [
            'request_time' => $requestTime,
            'request_token' => $requestToken
        ];
    }
}
