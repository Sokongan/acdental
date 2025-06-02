<?php

class HomeController
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: /login');
            exit();
        }
    
        View::render('page/home/dashboard', [
            'pageTitle'   => 'Dashboard',
            'breadcrumbs' => ['Dashboard' => '/']
        ]);
    }
    
}
