<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

class Website
{
    // Website & Backup class to interact with the website API endpoints
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function getSites($page = 1, $limit = 15)
    {
        return $this->client->post('getSites', [
            'p' => $page,
            'limit' => $limit
        ]);
    }

    public function createSite($siteData)
    {
        return $this->client->post('createSite', $siteData);
    }

    public function deleteSite($id, $webname, $options = [])
    {
        $params = array_merge(['id' => $id, 'webname' => $webname], $options);
        return $this->client->post('deleteSite', $params);
    }
}
