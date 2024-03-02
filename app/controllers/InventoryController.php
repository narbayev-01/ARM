<?php
require_once "app/views/InventoryView.php";
class InventoryController {
    // private $model;
    private $view;

    public function __construct($conn) {
        // $this->model = new GroupsModel($conn);
        $this->view = new InventoryView();
    }

    public function index() {
        $this->view->render();
    }
}