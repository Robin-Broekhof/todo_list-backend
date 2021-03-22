<?php
    require("../includes/head.php");

    $listdata = getAllLists();
?>

<a href="createlist.php" class="btn btn-primary">add list</a><br>


<div class="row  container-fluid">
<?php
foreach($listdata as $data){
?>
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title"> <?= $data["name"] ?> </h3>
            <a href="update.php?list_id=<?=$data["list_id"]?>" class="btn btn-primary edit-lists">Update</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">task temp</li>
        </ul>
    </div>


<?php
}
?>


</div>
