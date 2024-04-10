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
        $medicines = $this->model->getAllMedicines();
        $this->view->render($medicines);
    }

    public function AddProduct() {
        // Получение данных из формы
        $medicine_id = $_POST['name'];
        $quantity = $_POST['quantity'];
        $expiration_date = $_POST['expiration_date'];

        // Валидация полей
        $errors = $this->validateProductData($medicine_id, $quantity, $expiration_date);

        // Добавление записи в базу данных
        if (empty($errors)) {
            $result = $this->model->addProduct($medicine_id, $quantity, $expiration_date);

            if ($result === true) {
                echo 'Товар успешно добавлен!';
                exit();
            } else {
                $errors[] = $result;
            }
        }

        // Вывод ошибок
        if (!empty($errors)) {
            echo '<ul style="color: red;">';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
        }
    }

    private function validateProductData($medicine_id, $quantity, $expiration_date) {
        $errors = array();

        if (empty($medicine_id)) {
            $errors[] = 'Выберите медикамент или расходный материал';
        } elseif (!is_numeric($medicine_id) || $medicine_id < 1) {
            $errors[] = 'Неверный идентификатор медикамента или расходного материала';
        }

        if (empty($quantity)) {
            $errors[] = 'Укажите количество';
        } elseif (!is_numeric($quantity) || $quantity < 1) {
            $errors[] = 'Неверное количество';
        }

        if (empty($expiration_date)) {
            $errors[] = 'Укажите срок годности';
        }

        return $errors;
    }
}