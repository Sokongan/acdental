<?php

class Router
{
    private static array $routes = [];

    public static function get(string $path, callable $handler)
    {
        self::$routes['GET'][$path] = $handler;
    }

    public static function post(string $path, callable $handler)
    {
        self::$routes['POST'][$path] = $handler;
    }

    public static function dispatch(string $uri, string $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        $handler = self::$routes[$method][$uri] ?? null;

        if ($handler) {
            call_user_func($handler);
        } else {
            http_response_code(404);
            include BASE_PATH . '/views/404.php';  // safer than ../../
        }
    }
}
