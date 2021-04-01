<?php
    require("../includes/head.php");

    $id = $_GET['list_id'];
    $create = createTask();
?>

    <form method="POST">
        <label for="id">id:</label><input type="text" name="id" id="id" value=" <?= $id ?>" ><br>
        <label for="description">description:</label><input type="text" name="description" id="description" value="" ><br>
        <label for="status">status:</label><input type="text" name="status" id="status" value="" ><br>
    
    

    
    
        <button name="submit" type="submit">Update</button>
    </form>
