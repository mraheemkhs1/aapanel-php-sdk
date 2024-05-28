<?php

namespace AaPanelSDK;

class ApiEndpointsManager
{

    private static $endpoints = [
        'getSystemTotal' => '/system?action=GetSystemTotal',
        'getDiskInfo' => '/system?action=GetDiskInfo',
        'getNetwork' => '/system?action=GetNetWork',
        'checkUpdate' => '/ajax?action=UpdatePanel',
        'getSites' => '/data?action=getData&table=sites',
        'createSite' => '/site?action=AddSite',
        'deleteSite' => '/site?action=DeleteSite',
        'getFileBody' => '/files?action=GetFileBody',
        'saveFileBody' => '/files?action=SaveFileBody',
        'getRealTimeStatus' => '/system?action=GetNetWork',
        'checkInstallationTasks' => '/ajax?action=GetTaskCount',
        'listBackups' => '/data?action=getData&table=backup',
        'createBackup' => '/site?action=ToBackup',
        'deleteBackup' => '/site?action=DelBackup',
        'listDomains' => '/data?action=getData&table=domain',
        'addDomain' => '/site?action=AddDomain',
        'deleteDomain' => '/site?action=DelDomain',
        'getRewriteList' => '/site?action=GetRewriteList',
    ];

    public static function getURL($key)
    {
        if (array_key_exists($key, self::$endpoints)) {
            return self::$endpoints[$key];
        }

        throw new \InvalidArgumentException("The endpoint key '{$key}' does not exist.");
    }
}
