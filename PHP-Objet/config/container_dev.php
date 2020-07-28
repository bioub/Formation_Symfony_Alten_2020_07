<?php

use Ajc\Logger\Logger;
use Ajc\Writer\VarDumpWriter;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->register('writer', VarDumpWriter::class);
$containerBuilder->register('logger', Logger::class)
              ->setArguments([$containerBuilder->get('writer')])->setPublic(true);

$containerBuilder->compile();

return $containerBuilder;

// Registry (Symfony 1)
// Dependency Injection Container (Symfony 2)