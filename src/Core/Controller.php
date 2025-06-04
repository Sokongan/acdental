<?php 

// src/Core/Controller.php

namespace App\Core;

abstract class Controller
{
    protected function requireLogin(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION['username'])) {
            header('Location: /login');
            exit();
        }
    }

    protected function redirectIfLoggedIn(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!empty($_SESSION['username'])) {
            header('Location: /dashboard');
            exit();
        }
    }
}
