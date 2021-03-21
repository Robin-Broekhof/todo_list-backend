<?php
    require("../includes/head.php");

    $listdata = getAllLists();
?>

<div class="row  container-fluid">

<?php
foreach($listdata as $data){
?>
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title"> <?= $data["name"] ?> </h3>
            <a href="update.php?list_id=<?=$data["list_id"]?>" class="btn btn-primary edit-lists">Update</a>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
        </ul>
    </div>


<?php
}
?>


</div>
