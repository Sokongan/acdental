<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Core\View;

class PatientController
{
    protected PatientModel $patientModel;

    public function __construct(PatientModel $patientModel)
    {
        $this->patientModel = $patientModel;
    }

    public function index(): void
    {
        if (!isset($_SESSION['username'])) {
            header('Location: /login');
            exit();
        }

        $patients = $this->patientModel->getAllPatients();
        View::render('page/patient/index', [
            'pageTitle' => 'Dashboard',
            'breadcrumbs' => ['Dashboard' => '/'],
            'patients' => $patients
        ]);
    }
}
