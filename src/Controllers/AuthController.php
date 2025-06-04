<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    protected UserModel $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }


    public function showLogin()
    {
        $this->redirectIfLoggedIn(); // redirect to dashboard if already logged in
    
        View::render('page/auth/login', [
            'pageTitle' => 'Login',
        ]);
    }
    

    public function login()
    {
        $params = [
            'user' => $_POST['username'] ?? '',
            'password' => $_POST['password'] ?? ''
        ];
    
        if (!$params['user'] || !$params['password']) {
            View::render('page/auth/login', [
                'pageTitle' => 'Login',
                'error' => 'Username and password are required.'
            ]);
            return;
        }
    
        $user = $this->userModel->userAuth($params['user']);
        if ($user && $params['password'] === $user['password']) {
            session_start();
            $_SESSION['username'] = $user['username'];
            session_regenerate_id(true);
            header("Location: /dashboard");
            exit();
        } else {
            View::render('page/auth/login', [
                'pageTitle' => 'Login',
                'error' => 'Invalid username or password.'
            ]);
        }
    }
    


    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }

    // public function showRegister()
    // {
    //     View::render('auth/register', [
    //         'pageTitle' => 'Register'
    //     ]);
    // }

    // public function register()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         header('Location: /register');
    //         exit();
    //     }

    //     $username = $_POST['username'] ?? '';
    //     $password = $_POST['password'] ?? '';

    //     // TODO: Validate input and save to DB
    //     // This is just an example
    //     if (strlen($username) < 3 || strlen($password) < 6) {
    //         View::render('auth/register', [
    //             'pageTitle' => 'Register',
    //             'error' => 'Invalid input.'
    //         ]);
    //     } else {
    //         // Simulate success
    //         header('Location: /login');
    //         exit();
    //     }
    // }
}
