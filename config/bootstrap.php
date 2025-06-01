<?php
// config/bootstrap.php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/acdental');

require_once BASE_PATH . '/core/Router.php';
require_once BASE_PATH . '/core/View.php';
require_once BASE_PATH . '/core/Container.php';
require_once BASE_PATH . '/lib/conn.php'; // this must return PDO

$pdo = require BASE_PATH . '/lib/conn.php';  // ✅ This line was missing

$container = new Container();
$container->set(PDO::class, $pdo);

return $container;
