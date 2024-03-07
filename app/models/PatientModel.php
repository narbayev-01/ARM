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
}