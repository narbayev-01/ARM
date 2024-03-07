<?php

require_once "app/models/ScheduleModel.php";
require_once "app/views/ScheduleView.php";

class ScheduleController{
    private $model;
    private $view;

    public function __construct($conn) {
        $this->model = new ScheduleModel($conn);
        $this->view = new ScheduleView();
    }

    public function index() {
        $this->view->render();
    }
}