<?php

class PatientController
{
    public function index()
    {
        View::render('page/patient/index', [
            'pageTitle' => 'Login'
        ]);
    }
}
