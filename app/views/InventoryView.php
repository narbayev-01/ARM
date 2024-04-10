<?php
class InventoryView {
    public function render($medicines) {
        echo '
            <h1>Управление медикаментами и расходными материалами</h1>
            <form action="addProduct" method="POST">
                <label for="name">Наименование товара:</label><br>
                <select id="name" name="name">';
                
        foreach ($medicines as $medicine) {
            echo '<option value="' . $medicine['id'] . '">' . $medicine['medicine_name'] . '</option>';
        }
    
        echo '
            </select><br>
                <label for="quantity">Количество:</label><br>
                <input type="number" id="quantity" name="quantity" min="1"><br>
        
                <label for="expiration_date">Срок годности:</label><br>
                <input type="date" id="expiration_date" name="expiration_date"><br>
        
                <input type="submit" value="Добавить товар">
            </form>
        ';
    }
    
}