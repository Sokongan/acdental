<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\UserModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class AuthController extends Controller
{
    private UserModel $userModel;
    private View $view;

    public function __construct(UserModel $userModel, View $view, SessionInterface $session)
    {
        parent::__construct($session);
        $this->userModel = $userModel;
        $this->view = $view;
    }

    public function showLogin(Request $request): Response
    {
        if ($redirect = $this->redirectIfAuthenticated($request)) {
            return $redirect;
        }
        $html = $this->view->render('page/auth/login', [
            'pageTitle' => 'Login',
        ]);

        return new Response($html);
    }

    public function login(Request $request): Response
    {
        $username = trim((string) $request->request->get('username', ''));
        $password = trim((string) $request->request->get('password', ''));

        if (!$username || !$password) {
            return new Response(
                $this->view->render('page/auth/login', [
                    'pageTitle' => 'Login',
                    'error'     => 'Username and password are required.'
                ]),
                400
            );
        }

        $user = $this->userModel->findByUsername($username);

        if ($user && $password === $user['password']) {
            $this->session->set('username', $user['username']);
            $this->session->migrate(true);
            return $this->redirect('/');
        }

        return new Response(
            $this->view->render('page/auth/login', [
                'pageTitle' => 'Login',
                'error'     => 'Invalid username or password.'
            ]),
            401
        );
    }


    public function logout(): Response
    {
        $this->session->clear();
        return $this->redirect('/login');
    }
}
