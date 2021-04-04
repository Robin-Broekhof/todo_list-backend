<?php
    require("../../includes/head.php");

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
            if($data["status"] == "doing"){
                $selectoption = 2;
            }
            if($data["status"] == "done"){
                $selectoption = 3;
            }
        ?>
    




    <form method="POST">
        <label for="descriptions">Description:</label><input type="text" name="description" id="description" placeholder="" value="<?= $data["description"]?>"><br>
        
        
        <label for="status">Status:</label>
        <select  name="status" id="status">
            <option value="todo"  <?php if($selectoption == 1){print("selected");}?>        >todo</option>
            <option value="doing" <?php if($selectoption == 2){print("selected");}?>        >doing</option>
            <option value="done"  <?php if($selectoption == 3){print("selected");}?>         >done</option>
        </select><br>

    



        <label for="length">Length:</label><input type="number" min="0" max="120" step="5" name="length" id="length" placeholder="" value="<?= $data["length"]?>"><a>minutes</a>
        <br>
    
    
    
    
    
        <button name="submit" type="submit">Update</button>
    </form>

    <a href="../delete/deletetask.php?task_id=<?=$data["task_id"]?>" class="btn btn-danger">DELETE</a>

<?php
}
?>