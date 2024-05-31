<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

class PseudoStatic
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getRewriteList($siteName)
    {
        return $this->client->post('getRewriteList', ['siteName' => $siteName]);
    }

    public function getRewriteRule($path)
    {
        return $this->client->post('getFileBody', ['path' => $path]);
    }

    public function saveRewriteRule($path, $data)
    {
        return $this->client->post('saveFileBody', [
            'path' => $path,
            'data' => $data,
            'encoding' => 'utf-8'
        ]);
    }
}
