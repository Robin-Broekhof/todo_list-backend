<?php
    require("../includes/head.php");

    $id = $_GET["list_id"];

    deleteList();
    header("location: index.php");
?>
