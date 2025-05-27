<?php
// config/bootstrap.php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create $pdo globally
$pdo = require_once __DIR__ . '/../lib/conn.php';
