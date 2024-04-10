<?php
class Router {

    public function route() {
        $uri = $_SERVER['REQUEST_URI'];

        include 'app/controllers/PatientController.php';
        include 'app/controllers/ScheduleController.php';
        include 'app/controllers/InventoryController.php';
        
        include "app/core/Database.php";
        
        $db = new Database();

        include 'includes/header.php';

        switch ($uri) {
            case '/':
                echo 'Добро пожаловать в АРМ специалиста ветеринарной клиники!';
                break;

            case '/patient':
                $controller = new PatientController($db->conn);
                $controller->index();
                break;

            case '/registerPatient':
                $controller = new PatientController($db->conn);
                $controller->RegisterPatient();
                break;

            case '/schedule':
                $controller = new ScheduleController($db->conn);
                $controller->index();
                break;

            case '/createAppointment':
                $controller = new ScheduleController($db->conn);
                $controller->CreateAppointment();
                break;
        
            case '/inventory':
                $controller = new InventoryController($db->conn);
                $controller->index();
                break;

            case '/addProduct':
                $controller = new InventoryController($db->conn);
                $controller->AddProduct();
                break;

            default:
                // Ошибка 404
                header('HTTP/1.0 404 Not Found');
                echo 'Страница не найдена';
                break;
            }
    }
}
?>