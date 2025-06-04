<?php
namespace App\Core;

class Utils
{
    public static function url(string $path): string
    {
        return '/' . ltrim($path, '/');
    }

    public static function isActive(string $matchPath): string
    {
        $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return ($currentPath === self::url($matchPath)) ? 'active' : '';
    }

    public static function breadcrumbs(): string
    {
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $lastSegment = $path === '' ? 'Home' : ucfirst(str_replace('-', ' ', basename($path)));

        return '<span class="breadcrumb-item active">' . htmlspecialchars($lastSegment) . '</span>';
    }
}
