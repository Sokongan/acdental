<?php

declare(strict_types=1);

use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';


// Bootstrap returns DI container instance
$container = require_once __DIR__ . '/../config/bootstrap.php';

// Load routes file (which uses $container and Router)
require_once __DIR__ . '/../routes.php';

// Dispatch the request using your Router
Router::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
