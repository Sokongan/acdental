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

    public static function breadcrumbs(array $params = []): string
    {
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        if ($path === '') {
            return '<span class="breadcrumb-item active">Home</span>';
        }
    
        $segments = explode('/', $path);
        $breadcrumbs = [];
        $accumPath = '';
    
        foreach ($segments as $i => $segment) {
            if (str_contains($segment, '=')) {
                continue; // Hide `id=123` from label
            }
    
            $accumPath .= '/' . $segment;
    
            // If this segment requires extra params, append them
            if (isset($params[$segment])) {
                $accumPath .= '/' . $params[$segment];
            }
    
            $name = ucfirst(str_replace('-', ' ', $segment));
            $isLast = $i === count($segments) - 1;
    
            if ($isLast) {
                $breadcrumbs[] = '<span class="breadcrumb-item active">' . htmlspecialchars($name) . '</span>';
            } else {
                $breadcrumbs[] = '<a class="breadcrumb-item" href="' . htmlspecialchars($accumPath) . '">' . htmlspecialchars($name) . '</a>';
            }
        }
    
        return implode('', $breadcrumbs);
    }
    
    
}
