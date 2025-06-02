<?php

class PatientController
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: /login');
            exit();
        }
    
        View::render('page/patient/index', [
            'pageTitle'   => 'Dashboard',
            'breadcrumbs' => ['Dashboard' => '/']
        ]);
    }
}    
