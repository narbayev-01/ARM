<?php
class InventoryView {
    public function render($medicines) {
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Управление медикаментами и расходными материалами</title>
        </head>
        <body>
            <h1>Управление медикаментами и расходными материалами</h1>
            <form action="submit_inventory.php" method="POST">
                <label for="name">Наименование товара:</label><br>
                <select id="name" name="name">';
                
        foreach ($medicines as $medicine) {
            echo '<option value="' . $medicine['id'] . '">' . $medicine['medicine_name'] . '</option>';
        }
    
        echo '</select><br>
            <label for="quantity">Количество:</label><br>
            <input type="number" id="quantity" name="quantity" min="1"><br>
    
            <label for="expiration_date">Срок годности:</label><br>
            <input type="date" id="expiration_date" name="expiration_date"><br>
    
            <input type="submit" value="Добавить товар">
        </form>
        </body>
        </html>';
    }
    
}