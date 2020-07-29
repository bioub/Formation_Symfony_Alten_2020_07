<?php

use Ajc\Writer\FileWriter;

$env = getenv('APP_ENV') ?? 'prod';

require_once 'vendor/autoload.php';
$container = require "config/container_$env.php";

$logger = $container->get('logger');
$logger->error('Une erreur 1');
$logger->error('Une erreur 2');
