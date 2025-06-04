<?php
// routes.php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\PatientController;

// The $container instance comes from bootstrap.php, so make sure bootstrap.php
// returns it and is required *before* this file

$authController = $container->get(AuthController::class);
$homeController = $container->get(HomeController::class);
$patientController = $container->get(PatientController::class);

Router::get('/dashboard', [$homeController, 'index']);
Router::get('/patient', [$patientController, 'index']);
Router::get('/login', [$authController, 'showLogin']);
Router::post('/login', [$authController, 'login']);
Router::get('/logout', [$authController, 'logout']);
