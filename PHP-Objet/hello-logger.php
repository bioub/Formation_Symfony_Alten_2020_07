<?php

use Ajc\Writer\FileWriter;

$env = getenv('APP_ENV') ?? 'prod';

require_once 'vendor/autoload.php';
$container = require "config/container_$env.php";

$logger = $container->get('logger');
$logger->error('Une erreur 1');
$logger->error('Une erreur 2');

$user = new \Ajc\Entity\User();
$user->setUsername('romain')->setPassword('123456');

$admin = new \Ajc\Entity\Admin();
$admin->setUsername('romain')->setPassword('123456')->setCanCreateUser(true);

// polymorphisme
function hello(\Ajc\Entity\User $user, \Psr\Log\LoggerInterface $logger) {
    return "Hello " . $user->getUsername() . "\n";
}

// SOLID
// Single Responsability
// Open Close
// Liskov substitution
// Interface seggregation
// Dependency inversion principle