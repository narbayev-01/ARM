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

    public function getAllPatients() {
        $sql = "SELECT * FROM patients";
        $result = $this->conn->query($sql);
        $patients = array();
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
        return $patients;
    }

    public function CreateAppointment($date, $time, $doctor_id, $patient) {
        $sql = 'INSERT INTO appointments (`date`, `time`, doctor_id, patient) VALUES (?, ?, ?, ?)';
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            return 'Ошибка при подготовке запроса: ' . $this->conn->error;
        }

        $stmt->bind_param('ssii', $date, $time, $doctor_id, $patient);

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