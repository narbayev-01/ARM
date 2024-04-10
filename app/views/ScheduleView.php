<?php
class ScheduleView {
    public function render($doctors, $patients) {
        echo '
            <h1>Планирование приемов</h1>
            <form action="createAppointment" method="POST">
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
                <select id="patient" name="patient">';

        foreach ($patients as $patient) {
            echo '<option value="' . $patient['id'] . '">' . $patient['name'] . '</option>';
        }

        echo '<br>
                <input type="submit" value="Назначить прием">
            </form>
        ';
    }    
}