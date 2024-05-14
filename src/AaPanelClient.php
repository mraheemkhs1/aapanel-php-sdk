<?php
namespace AaPanelSDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Cookie\CookieJar;

class AaPanelClient {
    private $apiKey;
    // private $baseUri;
    private $client;
    private $cookieJar;

    public function __construct($baseUri, $apiKey)
    {
        $this->apiKey = $apiKey;
        // $this->baseUri = $baseUri;
        $this->client = new Client(['base_uri' => $baseUri]);
        $this->cookieJar = new CookieJar();
    }

    private function generateToken()
    {
        $requestTime = time();
        $requestToken = md5($requestTime . md5($this->apiKey));
        return [
            'request_time' => $requestTime,
            'request_token' => $requestToken
        ];
    }

    public function post($uri, $data = [])
    {
        $auth = $this->generateToken();
        $data = array_merge($data, $auth);

        try {
            $response = $this->client->post($uri, [
                'form_params' => $data,
                'cookies' => $this->cookieJar
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
