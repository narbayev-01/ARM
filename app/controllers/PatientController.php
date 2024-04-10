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

    public function RegisterPatient() {
        // получение значений полей из POST-запроса
        $animal_id = $_POST['species'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $diagnosis = $_POST['diagnosis'];
        $prescriptions = $_POST['prescriptions'];
        $results = $_POST['results'];
    
        // валидация полей
        $errors = $this->validatePatientData($animal_id, $name, $age, $diagnosis, $prescriptions, $results);
    
        if (empty($errors)) {
            // если нет ошибок, вызываем метод модели для добавления пациента
            $result = $this->model->RegisterPatient($animal_id, $name, $age, $diagnosis, $prescriptions, $results);
    
            if ($result === true) {
                // если пациент добавлен успешно, выводим сообщение об успехе
                echo 'Запись успешно добавлена!';
                exit();
            } else {
                // если произошла ошибка при добавлении пациента, выводим сообщение об ошибке
                $errors[] = $result;
            }
        }
    
        // если есть ошибки, выводим их на странице
        if (!empty($errors)) {
            echo '<ul style="color: red;">';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
        }
    }
    
    private function validatePatientData($animal_id, $name, $age, $diagnosis, $prescriptions, $results) {
        $errors = array();
    
        if (empty($animal_id)) {
            $errors[] = 'Выберите вид животного';
        }
    
        if (empty($name)) {
            $errors[] = 'Укажите кличку животного';
        }
    
        if (empty($age)) {
            $errors[] = 'Укажите возраст животного';
        } elseif (!is_numeric($age) || $age < 0) {
            $errors[] = 'Возраст должен быть целым неотрицательным числом';
        }
    
        if (empty($diagnosis)) {
            $errors[] = 'Укажите диагноз';
        }
    
        if (empty($prescriptions)) {
            $errors[] = 'Укажите назначенное лечение';
        }
    
        if (empty($results)) {
            $errors[] = 'Укажите результаты обследования';
        }
    
        return $errors;
    }         
}