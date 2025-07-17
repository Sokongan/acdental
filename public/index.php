<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dotenv\Dotenv;

// Load env
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

// Build DI container
$container = require __DIR__ . '/../config/bootstrap.php';

// Create Request
$request = Request::createFromGlobals();

// Load router/dispatcher
$dispatcher = require __DIR__ . '/../routes.php';

// Dispatch request
$httpMethod = $request->getMethod();
$uri = rawurldecode($request->getPathInfo());

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $response = new Response('404 Not Found', 404);
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response = new Response('405 Method Not Allowed', 405);
        break;

    case FastRoute\Dispatcher::FOUND:
        [$controllerClass, $method] = $routeInfo[1];
        $vars = $routeInfo[2];

        /** @var object $controller */
        $controller = $container->get($controllerClass);

        /** @var Response $response */
        $response = $controller->$method($request, $vars);
        break;

    default:
        $response = new Response('500 Internal Server Error', 500);
}

// Send response to browser
$response->send();
