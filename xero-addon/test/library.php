<?php

require_once '../vendor/autoload.php';

use XeroPHP\Application\PrivateApplication;
use XeroPHP\Models\Accounting;
//These are the minimum settings - for more options, refer to examples/config.php

$config = [
    'oauth' => [
        'callback' => 'http://localhost/',
        'consumer_key' => 'JSDHBLHLEBRKLI1UPNFMJLGPEZ3QLJ',
        'consumer_secret' => 'G5NSVCWJUVUC9Q9GOLQATMKIC0HOOS',
        'rsa_private_key' => file_get_contents('../cfg/xero/privatekey.pem')
    ],
];
$xero = new PrivateApplication($config);
$contacts = $xero->load('Accounting\\Contact')->execute();
foreach ($contacts as $contact) {
    print_r($contact);
}
?>