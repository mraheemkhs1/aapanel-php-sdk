<?php

namespace AaPanelSDK;

class ApiEndpointsManager
{

    private static $endpoints = [
        'getSystemTotal' => '/system?action=GetSystemTotal',
        'getDiskInfo' => '/system?action=GetDiskInfo',
        'getNetwork' => '/system?action=GetNetWork',
        'getRealTimeStatus' => '/system?action=GetNetWork',
        'checkInstallationTasks' => '/ajax?action=GetTaskCount',
        'checkUpdate' => '/ajax?action=UpdatePanel',
        'getSites' => '/data?action=getData&table=sites',
        'createSite' => '/site?action=AddSite',
        'deleteSite' => '/site?action=DeleteSite',
        'getFileBody' => '/files?action=GetFileBody',
        'saveFileBody' => '/files?action=SaveFileBody',
    ];

    public static function getURL($key)
    {
        if (array_key_exists($key, self::$endpoints)) {
            return self::$endpoints[$key];
        }

        throw new \InvalidArgumentException("The endpoint key '{$key}' does not exist.");
    }
}
