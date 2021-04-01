<?php
    require("../includes/head.php");

    $update = updateTask();
    $listdata = getSingleTask();
    $id = $_GET["task_id"];
?>

<?php
foreach($listdata as $data){
?>
    <form method="POST">
        <label for="descriptions">Description:</label><input type="text" name="description" id="description" value="<?= $data["description"]?>"><br>
        <label for="status">Status:</label><input type="text" name="status" id="status" value="<?= $data["status"]?>"><br>
    
    
    
    
    
        <button name="submit" type="submit">Update</button>
    </form>

    <a href="deletetask.php?task_id=<?=$data["task_id"]?>" class="btn btn-danger">DELETE</a>

<?php
}
?>