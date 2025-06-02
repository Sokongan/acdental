<?php

declare(strict_types=1);

// Bootstrap the app (DI container, env, DB setup, etc.)
$container = require_once __DIR__ . '/../config/bootstrap.php';

// Load route definitions
require_once __DIR__ . '/../routes.php';

// Dispatch current request
Router::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
