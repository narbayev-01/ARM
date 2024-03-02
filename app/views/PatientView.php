<?php
class PatientView {
    public function render(){
       echo ' <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учет пациентов</title>
</head>
<body>
    <h1>Учет пациентов</h1>
    <form action="submit_patient.php" method="POST">
        <label for="species">Вид животного:</label><br>
        <input type="text" id="species" name="species"><br>

        <label for="name">Кличка:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="age">Возраст:</label><br>
        <input type="text" id="age" name="age"><br>

        <label for="diagnosis">Диагноз:</label><br>
        <textarea id="diagnosis" name="diagnosis" rows="4" cols="50"></textarea><br>

        <label for="prescriptions">Назначения:</label><br>
        <textarea id="prescriptions" name="prescriptions" rows="4" cols="50"></textarea><br>

        <label for="results">Результаты анализов:</label><br>
        <textarea id="results" name="results" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Добавить пациента">
    </form>
</body>
</html>';
    }
}