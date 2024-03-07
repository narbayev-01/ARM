<?php
class ScheduleModel {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getAllDoctors() {
        $sql = "SELECT * FROM doctors";
        $result = $this->conn->query($sql);
        $doctors = array();
        while ($row = $result->fetch_assoc()) {
            $doctors[] = $row;
        }
        return $doctors;
    }
}