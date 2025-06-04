<?php
namespace App\Core;

use RuntimeException;

class View
{
    public static function render(string $view, array $params = [], ?string $layout = null): void
    {
        $viewFile = BASE_PATH . "/src/Views/{$view}.php";

        if (!is_file($viewFile) || !is_readable($viewFile)) {
            throw new RuntimeException("View file not found or not readable: {$viewFile}");
        }

        extract($params, EXTR_SKIP);

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        if ($layout === null) {
            $layout = (isset($_SESSION['username']) && !empty($_SESSION['username'])) ? 'main' : 'auth';
        }

        $layoutFile = BASE_PATH . "/src/Views/layout/{$layout}.php";

        if (!is_file($layoutFile) || !is_readable($layoutFile)) {
            throw new RuntimeException("Layout file not found or not readable: {$layoutFile}");
        }

        require $layoutFile;
    }
}
