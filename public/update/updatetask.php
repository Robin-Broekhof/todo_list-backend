<?php
    require("../../app/php/head.php");

    $update = updateTask();
    $listdata = getSingleTask();
    $id = $_GET["task_id"];
    $selectoption = 0;
?>

<?php
foreach($listdata as $data){
?>
 <?php
            if($data["status"] == "todo"){
                $selectoption = 1;
            }
            elseif($data["status"] == "doing"){
                $selectoption = 2;
            }
            elseif($data["status"] == "done"){
                $selectoption = 3;
            }
        ?>
    




    <form method="POST">
        <label for="descriptions">Description:</label><input type="text" name="description" value="<?= $data["description"]?>"><br>
        
        
        <label for="status">Status:</label>
        <select  name="status" id="status">
            <option value="todo"  <?php if($selectoption == 1){print("selected");}?>        >todo</option>
            <option value="doing" <?php if($selectoption == 2){print("selected");}?>        >doing</option>
            <option value="done"  <?php if($selectoption == 3){print("selected");}?>         >done</option>
        </select><br>

    



        <label for="duration">Duration:</label><input type="number" min="0" max="120" step="5" name="duration" value="<?= $data["duration"]?>"><a>minutes  (intervals of 5)</a>
        <br>
    
    
    
    
    
        <button name="submit" type="submit">Update</button>
    </form>

    <a href="../delete/deletetask.php?task_id=<?=$data["task_id"]?>" class="btn btn-danger">DELETE</a>

<?php
}
?>