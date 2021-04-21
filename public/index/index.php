<?php
    require("../../app/php/head.php");
    $taskdata = listToTaskJoin();
    $listdata = getAllLists();

    $timeDirection0 = "time_asc";
    $durationSqlSort = "";
    $currentDuration = "";
    $selectoption = "";
    

    if(isset($_GET["duration"])){
        if($_GET["duration"] == "time_asc"){
            $timeDirection0 = "time_desc";
            $currentDuration = "time_asc";
        }
        elseif($_GET["duration"] == "time_desc"){
            $timeDirection0 = "time_asc";
            $currentDuration = "time_desc";
        }
    }

    if(isset($_GET["status"])){
        if($_GET["status"] == "todo"){
            $selectoption = 1;
        }
        if($_GET["status"] == "doing"){
            $selectoption = 2;
        }
        if($_GET["status"] == "done"){
            $selectoption = 3;
        }
    }



?>





<form method="GET" action="<?=$_SERVER["SCRIPT_NAME"];?>"> Sort by status
    <select name="status">
        <option value="all"   >all</option>
        <option value="todo"  <?php if($selectoption == 1){print("selected");}?>>todo</option>
        <option value="doing" <?php if($selectoption == 2){print("selected");}?>>doing</option>
        <option value="done"  <?php if($selectoption == 3){print("selected");}?>>done</option>
    </select>
    <button type="submit"> Sort </button>
    <button type="submit" name="duration" value="<?=$timeDirection0?>"> Time </button>
</form>



<form method="GET" action="<?=$_SERVER["SCRIPT_NAME"];?>"> 
    <button type="submit" name="sort" value="null"> RESET </button>
</form><br>



<a href="../create/createlist.php" class="btn btn-primary">create list</a>


    <div class="card-wrapper">
<?php
foreach($listdata as $data0){
?>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"> <?= $data0["name"] ?> </h3>
            <a href="../update/updatelist.php?list_id=<?=$data0["list_id"]?>" class="btn btn-warning edit-lists">Update</a>
            <a href="../create/createtask.php?list_id=<?=$data0["list_id"]?>" class="btn btn-success edit-lists">Create task</a>
        </div>
        <ul class="list-group list-group-flush">
        <?php
        foreach($taskdata as $data1){
        
            if($data0["list_id"] == $data1["list_id"]){
            ?>
                <div class="task-card">
                    <a class="description-block"><?= $data1["description"] ?></a>
                    <div class="task-whitespace"></div>
                    <div class="row container-fluid task-bottom-block">
                        <div class="col-4 task-status-block">
                            <a class="task-status-text"><?= $data1["status"] ?></a>
                        </div>
                        <div class="col-4">
                            <a>~<?= $data1["duration"] ?> minutes</a>
                        </div>
                        <div class="col-4">
                            <a href="../update/updatetask.php?task_id=<?=$data1["task_id"]?>" class="btn btn-warning edit-lists">Update</a>
                        </div>
                        <br>
                    </div>
                </div>
            <?php
            }

            else{
            ?>
                
            <?php
            }
            ?>



            
            
            
        <?php
        }
        ?>


        </ul>
    </div>


<?php
}
?>

</div>