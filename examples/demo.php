<?php

require __DIR__ . '/../vendor/autoload.php';

use Mastercraft\AapanelPhpSdk\AaPanelClient;
use Mastercraft\AapanelPhpSdk\Services\System;
use Mastercraft\AapanelPhpSdk\Services\Website;
use Mastercraft\AapanelPhpSdk\Services\Files;
use Mastercraft\AapanelPhpSdk\Services\Monitoring;
use Mastercraft\AapanelPhpSdk\Services\Backup;
use Mastercraft\AapanelPhpSdk\Services\Domain;
use Mastercraft\AapanelPhpSdk\Services\PseudoStatic;
use Mastercraft\AapanelPhpSdk\Services\Log;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->safeLoad();

$baseUri = $_ENV['AAPANEL_URL'];
$apiKey = $_ENV['AAPANEL_API_KEY'];

$client = new AaPanelClient($baseUri, $apiKey);
$system = new System($client);
$website = new Website($client);
$files = new Files($client);
$monitoring = new Monitoring($client);
$backup = new Backup($client);
$domain = new Domain($client);
$pseudoStatic = new PseudoStatic($client);
$log = new Log($client);

// Get system info
// $systemInfo = $system->getSystemTotal();
// print_r($systemInfo);

// Get list of sites
$sites = $website->getSites();
print_r($sites);

// Create a new site
// $newSite = $website->createSite([
//     'webname' => '{"domain":"example.com","domainlist":[],"count":0}',
//     'path' => '/www/wwwroot/example.com',
//     'type_id' => 0,
//     'type' => 'PHP',
//     'version' => '72',
//     'port' => 80,
//     'ps' => 'test site',
//     'ftp' => true,
//     'ftp_username' => 'example_com',
//     'ftp_password' => 'password',
//     'sql' => true,
//     'codeing' => 'utf8',
//     'datauser' => 'example_com',
//     'datapassword' => 'password'
// ]);
// print_r($newSite);

// // Delete a site
// $siteId = 66;
// $deletedSite = $website->deleteSite($siteId, 'example.com');
// print_r($deletedSite);

// // List backups for a site
// $backups = $backup->listBackups($siteId);
// print_r($backups);

// // Create a new backup
// $newBackup = $backup->createBackup($siteId);
// print_r($newBackup);

// // Delete a backup
// $backupId = 121;
// $deletedBackup = $backup->deleteBackup($backupId);
// print_r($deletedBackup);

// // List domains for a site
// $domains = $domain->listDomains($siteId);
// print_r($domains);

// // Add a new domain to a site
// $newDomain = $domain->addDomain($siteId, ['webname' => 'w2->hao->com', 'domain' => 'w4->hao->com:81']);
// print_r($newDomain);

// // Delete a domain from a site
// $deletedDomain = $domain->deleteDomain($siteId, ['webname' => 'w2->hao->com', 'domain' => 'w4->hao->com', 'port' => 80]);
// print_r($deletedDomain);

// // Get pseudo-static rewrite list
// $rewriteList = $pseudoStatic->getRewriteList('w2->hao->com');
// print_r($rewriteList);

// // Get rewrite rule content
// $rewriteRule = $pseudoStatic->getRewriteRule('/www/server/panel/vhost/rewrite/nginx/name->conf');
// print_r($rewriteRule);

// // Save rewrite rule content
// $savedRewriteRule = $pseudoStatic->saveRewriteRule('/www/server/panel/vhost/rewrite/nginx/name->conf', 'new content');
// print_r($savedRewriteRule);

// // Get logs
// $logLimit = 10;
// $logs = $log->getLogs($logLimit);
// print_r($logs);

// // Get real-time status
// $realTimeStatus = $monitoring->getRealTimeStatus();
// print_r($realTimeStatus);

// // Check installation tasks
// $tasks = $monitoring->checkInstallationTasks();
// print_r($tasks);
