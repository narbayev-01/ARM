<?php
class ScheduleView {
    public function render($doctors) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Планирование приемов</title>
        </head>
        <body>
            <h1>Планирование приемов</h1>
            <form action="schedule_appointment.php" method="POST">
                <label for="date">Дата приема:</label><br>
                <input type="date" id="date" name="date"><br>
    
                <label for="time">Время приема:</label><br>
                <input type="time" id="time" name="time"><br>
    
                <label for="doctor">Врач:</label><br>
                <select id="doctor" name="doctor">';
                
        foreach ($doctors as $doctor) {
            echo '<option value="' . $doctor['id'] . '">' . $doctor['first_name'] . ' ' . $doctor['last_name'] . '</option>';
        }
    
        echo '</select><br>
    
                <label for="patient">Пациент:</label><br>
                <input type="text" id="patient" name="patient"><br>
    
                <input type="submit" value="Назначить прием">
            </form>
        </body>
        </html>';
    }    
}