<?php

require_once 'vendor/autoload.php';

$handler = new \Monolog\Handler\StreamHandler('app.log');
$logger = new \Monolog\Logger('dev', [$handler]);

$logger->warning('Test');