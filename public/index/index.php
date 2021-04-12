<?php

    require("../../app/php/head.php");
    $taskdata = listToTaskJoin();
    $listdata = getAllLists();

    $timeDirection0 = "time_asc";
    $durationSqlSort = '';
    
    
    if(isset($_POST['time_asc'])) {

        $timeDirection0 = "time_desc";
        
      } 
      
      if(isset($_POST['time_desc'])) {
    
        $timeDirection0 = "time_asc";
    
        
    }
   
    
?>

<a href="../create/createlist.php" class="btn btn-primary">create list</a>




<form method="post" action="<?=$_SERVER['SCRIPT_NAME'];?>">
 Order by Week
 <button type="submit" name="<?=$timeDirection0?>" class="button" value="1"> Time </button>
 </form>








<div class=" row">
    <div class=" ">
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
</div>
