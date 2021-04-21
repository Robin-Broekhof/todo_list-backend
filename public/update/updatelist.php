<?php
    require("../../app/php/head.php");

    $update = updateList();
    $listdata = getSingleList();
    $id = $_GET["list_id"];
?>

<?php
foreach($listdata as $data){
?>
    <form method="POST">
        <label for="name">Name:</label><input type="text" name="name" value="<?= $data["name"]?>"><br>
    
    
    
    
    
        <button name="submit" type="submit">Update</button>
    </form>

    <a href="../delete/deletelist.php?list_id=<?=$data["list_id"]?>" class="btn btn-danger">DELETE</a>

<?php
}
?>