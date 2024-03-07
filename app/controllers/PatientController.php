<?php

require_once "app/models/PatientModel.php";
require_once "app/views/PatientView.php";

class PatientController {
    private $model;
    private $view;

    public function __construct($conn) {
        $this->model = new PatientModel($conn);
        $this->view = new PatientView();
    }

    public function index() {
        $animals = $this->model->getAllAnimals();
        $this->view->render($animals);
    }
}