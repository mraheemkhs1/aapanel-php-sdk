<?php
namespace Mastercraft\AapanelPhpSdk;

use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Mastercraft\AapanelPhpSdk\Authentication\TokenManager;
use Mastercraft\AapanelPhpSdk\Exception\APIException;
use InvalidArgumentException;

class AaPanelClient {
    private $tokenManager;
    private $client;
    private $cookieJar;
    private $cookieFile;

    public function __construct($baseUri, $apiKey)
    {
        $this->tokenManager = new TokenManager($apiKey);
        $this->cookieFile = './' . md5($baseUri) . '.cookie';
        $this->cookieJar = new CookieJar();
        $this->client = new Client([
            'base_uri' => $baseUri,
            'cookies' => $this->cookieJar
        ]);
        $this->loadCookies();
    }

    private function loadCookies()
    {
        if (file_exists($this->cookieFile)) {
            $cookies = unserialize(file_get_contents($this->cookieFile));
            foreach ($cookies as $cookie) {
                $this->cookieJar->setCookie(new SetCookie($cookie));
            }
        }
    }

    private function saveCookies()
    {
        file_put_contents(
            $this->cookieFile, 
            serialize(
                $this->cookieJar->toArray()
            )
        );
    }

    public function post($urlKey, $data = [], $verifySsl = false)
    {

        try {
            $auth = $this->tokenManager->generateToken();
            $data = array_merge($auth, $data);
            $url = ApiEndpointsManager::getURL($urlKey);
            echo "Request URL: " . $this->client->getConfig('base_uri') . $url . "\n"; // Debugging line
            echo "Request Data: " . json_encode($data) . "\n"; // Debugging line
        } catch (InvalidArgumentException $e) {
            throw new APIException("Invalid API endpoint key: " . $urlKey, $e->getCode(), $e);
        }
        
        try {
            $response = $this->client->post($url, [
                'form_params' => $data,
                'cookies' => $this->cookieJar,
                'verify' => $verifySsl
            ]);
            $this->saveCookies();
            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['error'])) {
                throw new APIException($responseBody['error']);
            }

            return $responseBody;
        } catch (RequestException $e) {
            throw new APIException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
