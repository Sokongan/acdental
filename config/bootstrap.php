<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use App\Core\View;
use League\Plates\Extension\Asset;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', 'http://localhost/acdental/public');

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([

    // PDO service
    PDO::class => function (): PDO {
        $host     = $_ENV['DB_HOST'];
        $port     = $_ENV['DB_PORT'] ?? '3306';
        $db       = $_ENV['DB_NAME'];
        $user     = $_ENV['DB_USER'];
        $pass     = $_ENV['DB_PASS'];
        $charset  = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
        return new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    },

    // Session service
    SessionInterface::class => function (): SessionInterface {
        $session = new Session();
        $session->start();
        return $session;
    },

    // View service (injects session)
    View::class => function ($container): View {
        /** @var SessionInterface $session */
        $session = $container->get(SessionInterface::class);

        $view = new View(BASE_PATH . '/src/Views', $session);

        // Register Plates asset extension
        $engine = $view->getEngine();
        // $engine->loadExtension(new Asset(BASE_URL . '/assets', true));

        return $view;
    },
]);

return $containerBuilder->build();
