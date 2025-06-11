<?php

use Dotenv\Dotenv;

$basePath = dirname(__DIR__);

require_once $basePath . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

