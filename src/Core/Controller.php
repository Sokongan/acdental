<?php 

// src/Core/Controller.php

namespace App\Core;

abstract class Controller
{
    protected function startSession(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    protected function requireLogin(): void
    {
        $this->startSession();

        if (empty($_SESSION['username'])) {
            header('Location: /login');
            exit;
        }
    }

    protected function redirectIfAuthenticated(): void
    {
        $this->startSession();

        if (!empty($_SESSION['username'])) {
            header('Location: /');
            exit;
        }
    }
}


