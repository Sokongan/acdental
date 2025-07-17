<?php

namespace App\Core;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{
    protected SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    protected function requireLogin(Request $request): ?RedirectResponse
    {
        if (!$this->session->has('username')) {
            return $this->redirect('/login');
        }
        return null;
    }

    protected function redirectIfAuthenticated(Request $request): ?RedirectResponse
    {
        if ($this->session->has('username')) {
            return $this->redirect('/');
        }
        return null;
    }


    protected function redirect(string $path): RedirectResponse
    {
        return new RedirectResponse(BASE_URL . '/' . ltrim($path, '/'));
    }
}
