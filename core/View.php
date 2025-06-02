<?php

class View
{
    /**
     * Render a view with optional parameters and layout.
     *
     * @param string      $view   The view file path relative to the views directory (without .php)
     * @param array       $params Variables to extract and make available in the view
     * @param string|null $layout Optional layout file to wrap the view
     *
     * @throws RuntimeException If view or layout files are missing
     */
    public static function render(string $view, array $params = [], ?string $layout = null): void
    {
        $viewFile = BASE_PATH . "/views/{$view}.php";

        if (!is_file($viewFile) || !is_readable($viewFile)) {
            throw new RuntimeException("View file not found or not readable: {$viewFile}");
        }

        // Extract parameters safely, skip existing vars to avoid overwriting
        extract($params, EXTR_SKIP);

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // Auto-select layout if not explicitly set
        if ($layout === null) {
            $layout = (isset($_SESSION['username']) && !empty($_SESSION['username'])) ? 'main' : 'auth';
        }
        
        $layoutFile = BASE_PATH . "/views/layout/{$layout}.php";

        if (!is_file($layoutFile) || !is_readable($layoutFile)) {
            throw new RuntimeException("Layout file not found or not readable: {$layoutFile}");
        }

        // The layout files should echo $content where the view is injected
        require $layoutFile;
    }
}
