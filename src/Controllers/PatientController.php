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
        unset($_SESSION['edit_mode']);
        $patient = $this->patientModel->findPatientById($id);
        View::render('page/patient/view', [
            'pageTitle'   => 'View Patient',
            'breadcrumbsParams' => ['view' => 'id=' . $id],
            'patient'     => $patient
        ]);
    }

    public function update(int $id)
    {

        $_SESSION['edit_mode'] = true;
        $id = $_POST['id'];

        $data = [

            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'middle_initial' => $_POST['middle_initial'],
            'address' => $_POST['address']
        ];

        var_dump($id,$_SESSION['edit_mode'],$data);
        die();
    }

    public function createForm()
    {
        return View::render('page/patient/create');
    }

    public function store() 
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        exit;
    }

}
