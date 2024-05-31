<?php

namespace Mastercraft\AapanelPhpSdk\Services;

use Mastercraft\AapanelPhpSdk\AaPanelClient;

class Backup
{
    private $client;

    public function __construct(AaPanelClient $client)
    {
        $this->client = $client;
    }

    public function listBackups($siteId, $page = 1, $limit = 5)
    {
        return $this->client->post('listBackups', [
            'search' => $siteId,
            'p' => $page,
            'limit' => $limit,
            'type' => 0
        ]);
    }

    public function createBackup($siteId)
    {
        return $this->client->post('createBackup', ['id' => $siteId]);
    }

    public function deleteBackup($backupId)
    {
        return $this->client->post('deleteBackup', ['id' => $backupId]);
    }
}
