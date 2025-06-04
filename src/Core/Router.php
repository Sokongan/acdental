<?php
namespace App\Core;

class Router
{
    private static array $routes = [];

    public static function get(string $path, callable $handler): void
    {
        self::addRoute('GET', $path, $handler);
    }

    public static function post(string $path, callable $handler): void
    {
        self::addRoute('POST', $path, $handler);
    }

    private static function addRoute(string $method, string $path, callable $handler): void
    {
        $pattern = preg_replace('#\{([\w]+)\}#', '(?P<\1>[^/]+)', $path);
        $pattern = "#^" . rtrim($pattern, '/') . "/?$#";
        self::$routes[$method][] = ['pattern' => $pattern, 'handler' => $handler];
    }

    public static function dispatch(string $uri, string $method): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        foreach (self::$routes[$method] ?? [] as $route) {
            if (preg_match($route['pattern'], $uri, $matches)) {
                $params = array_filter($matches, fn($k) => is_string($k), ARRAY_FILTER_USE_KEY);
                call_user_func_array($route['handler'], $params);
                return;
            }
        }

        http_response_code(404);
        include BASE_PATH . '/src/Views/404.php';
    }
}
