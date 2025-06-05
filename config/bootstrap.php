<?php
// config/bootstrap.php

declare(strict_types=1);
use App\Core\Container;
require_once __DIR__ . '/../vendor/autoload.php';
session_start();

// Enable strict error reporting for dev
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/');

// Load and return PDO connection
$container = new Container();
$pdo = require BASE_PATH . '/lib/conn.php';  // Make sure conn.php returns PDO instance
$container->set(PDO::class, $pdo);

return $container;
