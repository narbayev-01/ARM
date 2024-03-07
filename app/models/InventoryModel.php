<?php
class InventoryModel {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getAllMedicines() {
        $sql = "SELECT * FROM medicines";
        $result = $this->conn->query($sql);
        $medicines = array();
        while ($row = $result->fetch_assoc()) {
            $medicines[] = $row;
        }
        return $medicines;
    }
}