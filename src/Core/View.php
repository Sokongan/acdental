<?php
declare(strict_types=1);

namespace App\Core;

use League\Plates\Engine;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class View
{
    private Engine $engine;

    public function __construct(string $viewsPath, SessionInterface $session)
    {
        $this->engine = new Engine($viewsPath);

        // register global function asset() so it's available in ALL templates and partials
        $this->engine->registerFunction('asset', function (string $path): string {
            $baseUrl = rtrim(BASE_URL, '/');
            return $baseUrl . '/' . ltrim($path, '/');
        });

        // add global data (like username)
        $this->engine->addData([
            'username' => $session->get('username', 'Guest')
        ]);
    }

    public function render(string $template, array $data = []): string
    {
        return $this->engine->render($template, $data);
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }
}
