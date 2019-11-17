<?php

require_once '../vendor/autoload.php';

$logger = new Katzgrau\KLogger\Logger('../log/', Psr\Log\LogLevel::INFO, array (
    'extension' => 'log', // changes the log file extension
));

$logger->info(basename(__FILE__).':' . __LINE__ . '\\tReturned a million search results');
$logger->error('Oh dear.');
?>