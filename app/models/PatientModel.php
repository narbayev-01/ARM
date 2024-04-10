<?php
class PatientModel {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getAllAnimals() {
        $sql = "SELECT * FROM animals";
        $result = $this->conn->query($sql);
        $animals = array();
        while ($row = $result->fetch_assoc()) {
            $animals[] = $row;
        }
        return $animals;
    }

    public function RegisterPatient($animal_id, $name, $age, $diagnosis, $prescriptions, $results) {
        $sql = 'INSERT INTO patients (animal_id, `name`, age, diagnosis, prescriptions, results) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($sql);
    
        if (!$stmt) {
            return 'Ошибка при подготовке запроса: ' . $this->conn->error;
        }
    
        $stmt->bind_param('isssss', $animal_id, $name, $age, $diagnosis, $prescriptions, $results);
    
        if (!$stmt) {
            return 'Ошибка при привязке значений: ' . $this->conn->error;
        }
    
        $result = $stmt->execute();
    
        if (!$result) {
            return 'Ошибка при выполнении запроса: ' . $this->conn->error;
        }
    
        $stmt->close();
    
        return true;
    }
    
}