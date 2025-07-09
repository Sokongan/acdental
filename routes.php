<?php
// routes.php

use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\PatientController;

$authController = $container->get(AuthController::class);
$homeController = $container->get(HomeController::class);
$patientController = $container->get(PatientController::class);

Router::get('/', [$homeController, 'index']);

// Group routes under "/patient"
Router::group('/patient', function () use ($patientController) {
    Router::get('/', [$patientController, 'index']);
    Router::get('/create', [$patientController, 'createForm']);
    Router::post('/create', [$patientController, 'store']);
    Router::get('/view/id={id}', [$patientController, 'view']);
    Router::get('/update/id={id}', [$patientController, 'update']);
    Router::post('/update/id={id}', [$patientController, 'update']);
});


// Auth routes
Router::group('/', function () use ($authController) {
    Router::get('/login', [$authController, 'showLogin']);
    Router::post('/login', [$authController, 'login']);
    Router::get('/logout', [$authController, 'logout']);
});
