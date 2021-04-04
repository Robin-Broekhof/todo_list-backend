<?php
    require("../../includes/head.php");

    $id = $_GET['list_id'];
    $create = createTask();
?>

    <form method="POST">
        <label for="id">id:</label><input type="text" name="id" id="id" value=" <?= $id ?>" ><br>
        <label for="description">description:</label><input type="text" name="description" id="description" value="" ><br><label for="status">Status:</label>
        <select  name="status" id="status">
            <option value="todo" >todo</option>
            <option value="doing">doing</option>
            <option value="done"  >done</option>
        </select><br>
        <label for="length">Length:</label><input type="number" min="0" max="120" step="5" name="length" id="length"><a>minutes (max 120)</a><br>
       
    

    
    
        <button name="submit" type="submit">Update</button>
    </form>
