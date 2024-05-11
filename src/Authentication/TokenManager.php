<?php
namespace AaPanelSDK\Authentication;

class TokenManager {
    private $apiKey;

    public function __construct() {
        $this->apiKey = 'your_api_key';
    }

    public function getToken() {
        return md5(time() . md5($this->apiKey));
    }
}
