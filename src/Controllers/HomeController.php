<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class HomeController extends Controller
{
    private View $view;

    public function __construct(View $view, SessionInterface $session)
    {
        parent::__construct($session);   // initialize $this->session
        $this->view = $view;
    }

    public function index(Request $request): Response
    {
           
        if ($redirect = $this->requireLogin($request)) {
            return $redirect;
        }

        $html = $this->view->render('page/home/dashboard', [
            'pageTitle' => 'Dashboard',
        ]);

        return new Response($html);
    }
}

