<?php
namespace AaPanelSDK;

use GuzzleHttp\Client as HttpClient;
use AaPanelSDK\Authentication\TokenManager;

class Client {
    private $http;
    private $tokenManager;

    public function __construct($server_url, $api_key) {
        $this->http = new HttpClient(['base_uri' => $server_url]);
        $this->tokenManager = new TokenManager($api_key);
    }

    public function get($uri, array $options = []) {
        $token = $this->tokenManager->getToken();
        $options = array_merge($options, ['headers' => ['Authorization' => "Bearer $token"]]);
        $response = $this->http->request('GET', $uri, $options);
        return json_decode($response->getBody()->getContents(), true);
    }
}
