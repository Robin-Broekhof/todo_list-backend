<?php
    require("../includes/head.php");
    $taskdata = listToTaskJoin();
    $listdata = getAllLists();
?>

<a href="createlist.php" class="btn btn-primary">add list</a><br>


<div class="row  container-fluid">
<?php
foreach($listdata as $data0){
?>
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title"> <?= $data0["name"] ?> </h3>
            <a href="updatelist.php?list_id=<?=$data0["list_id"]?>" class="btn btn-primary edit-lists">Update</a>
            <a href="createtask.php?list_id=<?=$data0["list_id"]?>" class="btn btn-primary edit-lists">Create task</a>
        </div>
        <ul class="list-group list-group-flush">
        <?php
        foreach($taskdata as $data1){
        
            if($data0["list_id"] == $data1["list_id"]){
            ?>
                <a><?= $data1["description"] ?></a>
                <a><?= $data1["status"] ?></a>
                <a href="updatetask.php?task_id=<?=$data1["task_id"]?>" class="btn btn-primary edit-lists">Update</a>
                <br>

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
