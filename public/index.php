<?php

$container = require_once __DIR__ . '/../config/bootstrap.php';

require_once __DIR__ . '/../routes.php'; // do NOT redeclare $container inside routes.php

Router::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
