<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

class Ssl
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getSslData()
    {
        return $this->client->post('getSslList');
    }

    public function getSslCertificates()
    {
        return $this->client->post('getDeployedSslCertificates');
    }

    public function getLetsEncryptInfo()
    {
        return $this->client->post('letsEncryptInfo');
    }

    public function applyForCertificate($data)
    {
        /*
            * $data = [
            *      'domains' => ['example.com', 'example2.com']
            *      'auth_type' => 'http'
            *      'auth_to' => 2
            *      'auto_wildcard' => 0 => false || 1 => true
            *      'id' => $siteId
            * ];

            * $response = [
                cert,
                cert_timeout,
                domains,
                msg: "Application successful!",
                private_key,
                root,
                save_path,
                status: true,
            ];
        */
        return $this->client->post('applyForletsEncryptCert', [
            'domains' => $data['domains'],
            'auth_type' => $data['auth_type'],
            'auth_to' => $data['auth_to'],
            'auto_wildcard' => $data['auto_wildcard'],
            'id' => $data['siteId']
        ]);
    }

    public function getRegisteredUserInfo()
    {
        return $this->client->post('getPanelSslUerInfo');
    }

    public function disableSsl($webname, $updateOf=1)
    {
        return $this->client->post('disableSsl', [
            'siteName' => $webname,
            'updateOf' => $updateOf
        ]);
    }

    public function enableSsl($data)
    {
        /*
            * $data = [
            *      'type' => 1
            *      'siteName' => $data['webName']
            *      'key' => $data['key'] // from $response->private_key of $this->applyForCertificate()
            *      'csr' => $data['csr'] // from $response->cert . '\n' .$response->root of $this->applyForCertificate()
            * ];

            * $response = [
                cert,
                cert_timeout,
                domains,
                msg: "Application successful!",
                private_key,
                root,
                save_path,
                status: true,
            ];
        */
        return $this->client->post('setSslCert', [
            'type' => $data['type'],
            'siteName' => $data['webName'],
            'key' => $data['key'],
            'csr' => $data['csr']
        ]);
    }
}
