<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Core\View;
use App\Core\Controller;
class PatientController extends Controller
{
    protected PatientModel $patientModel;

    public function __construct(PatientModel $patientModel)
    {
        $this->patientModel = $patientModel;
    }

    public function index(): void
    {
        $this->requireLogin();
        $patients = $this->patientModel->getAllPatients();
        View::render('page/patient/index', [
            'pageTitle' => 'Dashboard',
            'breadcrumbs' => ['Dashboard' => '/'],
            'patients' => $patients
        ]);
    }
    public function view(int $id)
    {
        $this->requireLogin();
    
        $patient = $this->patientModel->findPatientById($id);
    
        View::render('page/patient/view', [
            'pageTitle'   => 'View Patient',
            'breadcrumbsParams' => ['view' => 'id=' . $id],
            'patient'     => $patient
        ]);
    }
    
    public function update()
    {
        $this->requireLogin();
    
        $id = $_POST['id'];
        $data = [
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'middle_initial' => $_POST['middle_initial'],
            'occupation' => $_POST['occupation'],
            'religion' => $_POST['religion'],
            'address' => $_POST['address']  
        ];
    
        $this->patientModel->updatePatient($id, $data);
        var_dump($data);
        die();


        // header("Location: /patient/view/id=$id");
        // exit;
    }
    
}
