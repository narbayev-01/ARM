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
        $doctors = $this->model->getAllDoctors();
        $patients =  $this->model->getAllPatients();
        $this->view->render($doctors, $patients);
    }
    
    public function CreateAppointment() {
        // Получение данных из формы
        $date = $_POST['date'];
        $time = $_POST['time'];
        $doctor_id = $_POST['doctor'];
        $patient = $_POST['patient'];

        // Валидация полей
        $errors = $this->validateAppointmentData($date, $time, $doctor_id, $patient);

        // Добавление записи в базу данных
        if (empty($errors)) {
            $result = $this->model->CreateAppointment($date, $time, $doctor_id, $patient);

            if ($result === true) {
                echo 'Прием успешно назначен!';
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

    private function validateAppointmentData($date, $time, $doctor_id, $patient_id) {
        $errors = array();

        if (empty($date)) {
            $errors[] = 'Укажите дату приема';
        }

        if (empty($time)) {
            $errors[] = 'Укажите время приема';
        } elseif (!preg_match('/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/', $time)) {
            $errors[] = 'Неверный формат времени';
        }

        if (empty($doctor_id)) {
            $errors[] = 'Выберите врача';
        } elseif (!is_numeric($doctor_id) || $doctor_id < 1) {
            $errors[] = 'Неверный идентификатор врача';
        }

        if (empty($patient_id)) {
            $errors[] = 'Укажите пациента';
        } elseif (!is_numeric($patient_id) || $patient_id < 1) {
            $errors[] = 'Неверный идентификатор врача';
        }

        return $errors;
    }
}