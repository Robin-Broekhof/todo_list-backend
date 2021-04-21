<?php
    require("../../app/php/head.php");

    $id = $_GET['list_id'];
    $create = createTask();
?>

    <form method="POST">
        <label hidden for="id">id:</label><input hidden type="text" name="id" value="<?= $id ?>" >
        <label for="description">description:</label><input type="text" name="description"><br>
        <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="todo" >todo</option>
                <option value="doing">doing</option>
                <option value="done"  >done</option>
            </select><br>

        <label for="duration">Duration:</label><input type="number" min="0" max="999" step="5" name="duration"><a>minutes (intervals of 5)</a><br>
       
    

    
    
        <button name="submit" type="submit">Update</button>
    </form>

