<?php

class View
{
    public static function render(string $view, array $params = [], string $layout = 'main'): void
    {
        extract($params, EXTR_SKIP);

        ob_start();
        require BASE_PATH . "/views/{$view}.php"; // This is the dynamic content view (e.g., dashboard.php)
        $content = ob_get_clean();

        // Now inject $content into the layout
        require BASE_PATH . "/views/layout/{$layout}.php";
    }
}

