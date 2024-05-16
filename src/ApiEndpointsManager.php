<?php

namespace AaPanelSDK;

class ApiEndpointsManager
{

    public static function getURL($key)
    {
        $endpoints = [
            'getSystemTotal' => '/system?action=GetSystemTotal',
            'getDiskInfo' => '/system?action=GetDiskInfo',
            'getNetwork' => '/system?action=GetNetWork',
            'checkUpdate' => '/ajax?action=UpdatePanel',
            'getSites' => '/data?action=getData&table=sites',
            'createSite' => '/site?action=AddSite',
            'deleteSite' => '/site?action=DeleteSite',
        ];

        return $endpoints[$key];
    }
}
