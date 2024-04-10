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

    public function AddProduct($medicine_id, $quantity, $expiration_date) {
        $sql = 'INSERT INTO inventory (medicine_id, quantity, expiration_date) VALUES (?, ?, ?)';
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return 'Ошибка при подготовке запроса: ' . $this->conn->error;
        }

        $stmt->bind_param('iis', $medicine_id, $quantity, $expiration_date);

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