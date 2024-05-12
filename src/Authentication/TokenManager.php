<?php
namespace AaPanelSDK\Authentication;

class TokenManager {
    private $apiKey;

    public function __construct($api_key) {
        $this->apiKey = $api_key;
    }

    public function getToken() {
        return md5(time() . md5($this->apiKey));
    }
}
