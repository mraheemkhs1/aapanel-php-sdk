<?php

namespace Mastercraft\AapanelPhpSdk;

class ApiEndpointsManager
{

    private static $endpoints = [
        'getSystemTotal' => '/system?action=GetSystemTotal',
        'getDiskInfo' => '/system?action=GetDiskInfo',
        'getNetwork' => '/system?action=GetNetWork',
        'getRestartRph' => '/site?action=get_auto_restart_rph',
        'restartRph' => '/site?action=auto_restart_rph',
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
        'siteDomains' => '/site?action=GetSiteDomains',
        'addDomain' => '/site?action=AddDomain',
        'deleteDomain' => '/site?action=DelDomain',
        'getRewriteList' => '/site?action=GetRewriteList',
        'getSslList' => '/site?action=GetSSL',
        'getDeployedSslCertificates' => '/ssl?action=GetCertList',
        'letsEncryptInfo' => '/acme?action=get_account_info',
        'applyCert' => '/acme?action=apply_cert_api',
        'getLineLog' => '/ajax?action=get_lines',
        'disableSsl' => '/site?action=CloseSSLConf',
        'setSslCert' => '/site?action=SetSSL',
        'getPanelSslUerInfo' => '/ssl?action=GetUserInfo',
    ];

    public static function getURL($key)
    {
        if (array_key_exists($key, self::$endpoints)) {
            return self::$endpoints[$key];
        }

        throw new \InvalidArgumentException("The endpoint key '{$key}' does not exist.");
    }
}
