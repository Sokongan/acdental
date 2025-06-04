<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Controller;
class HomeController extends Controller
{
    public function index()
    {
        $this->requireLogin();
    
        View::render('page/home/dashboard', [
            'pageTitle'   => 'Dashboard',
            'breadcrumbs' => ['Dashboard' => '/']
        ]);
    }
    
}
