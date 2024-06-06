<?php

require __DIR__ . '/../vendor/autoload.php';

use Mastercraft\AapanelPhpSdk\AaPanelClient;
use Mastercraft\AapanelPhpSdk\Services\System;
use Mastercraft\AapanelPhpSdk\Services\Website;
use Mastercraft\AapanelPhpSdk\Services\Domain;
use Mastercraft\AapanelPhpSdk\Services\Ssl;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->safeLoad();

$baseUri = $_ENV['AAPANEL_URL'];
$apiKey = $_ENV['AAPANEL_API_KEY'];
$webName = 'storedev.top';

$client = new AaPanelClient($baseUri, $apiKey);
$system = new System($client);
$website = new Website($client);
$domain = new Domain($client);
$ssl = new Ssl($client);

// add new domain to website
// disable ssl
// Get all domains for website
// Get Auto Restart Rph
// Auto Restart Rph
// Apply for Certificate
// Set SSL Certificate
// Get Realtime Log in between (optional)

function getSiteId($siteName) {
    global $website;
    $sites = $website->getSites();
    $siteId = null;
    foreach ($sites['data'] as $site) {
        if ($site['name'] === $siteName) {
            $siteId = $site['id'];
            break;
        }
    }
    return $siteId;
}


// get $siteId
$siteId = getSiteId($webName);

// $newUrl = "storedev.top";
// $newDomain = $domain->addDomain($siteId, ['webname' => $webName, 'domain' => $newUrl]);
$status = $ssl->disableSsl($webName);
echo "Disabled Status Info: >>>>\n";
print_r($status);
echo "<<<<\n";

$allDomains = $domain->getSiteDomains($siteId);
echo "All Domains list: >>>>\n";
print_r($allDomains);
echo "<<<<\n";

$sslData = $ssl->applyForCertificate(['domains' => [$allDomains['domains']], 'siteId' => $siteId]);
echo "SSL Data >>>>\n";
print_r($sslData);
echo "<<<<\n";

// set ssl certificate
$status = $ssl->enableSsl([
    'webname' => $webName,
    'key' => $sslData['private_key'],
    'csr' => $sslData['cert'] . ' ' . $sslData['root'],
]);
echo "Enabled Status Info: >>>>\n";
print_r($status);
echo "<<<<\n";

// get and perform autorestartrph
$system->getAutoRestartRph($webName);
$system->autoRestartRph($webName);

$data = $ssl->getSslData();
$certList = $ssl->getSslCertificates();
echo "Data & Certificate: >>>>\n";
print_r($data);
echo "\n";
print_r($certList);
echo "<<<<\n";
