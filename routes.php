<?php

require_once BASE_PATH . '/controllers/HomeController.php';
require_once BASE_PATH . '/controllers/AuthController.php';
require_once BASE_PATH . '/controllers/PatientController.php';

// Use the DI container from index.php

$authController = $container->get(AuthController::class);
$homeController = $container->get(HomeController::class);
$patientController = $container->get(PatientController::class);

Router::get('/dashboard', [$homeController, 'index']);

Router::get('/patient',[$patientController,'index']);

Router::get('/login', [$authController, 'showLogin']);
Router::post('/login', [$authController, 'login']);
Router::get('/logout', [$authController, 'logout']);


