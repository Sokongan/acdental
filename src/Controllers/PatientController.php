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

        $patients = $this->patientModel->getAllPatients();
        View::render('page/patient/index', [
            'pageTitle' => 'Dashboard',
            'breadcrumbs' => ['Dashboard' => '/'],
            'patients' => $patients
        ]);
    }

    public function view( int $id )
    {
        $patient = $this->patientModel->findPatientById($id);

        View::render('page/patient/view', [
            'pageTitle' => 'View Patient',
            'breadcrumbs' => ['Dashboard' => '/', 'Patient' => '/patient'],
            'patient' => $patient
        ]);
    }
}
