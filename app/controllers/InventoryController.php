<?php

require_once "app/models/InventoryModel.php";
require_once "app/views/InventoryView.php";

class InventoryController {
    private $model;
    private $view;

    public function __construct($conn) {
        $this->model = new InventoryModel($conn);
        $this->view = new InventoryView();
    }

    public function index() {
        $this->view->render();
    }
}