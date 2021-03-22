<?php
    function openDatabaseConn(){
        $servername= "localhost";
        $username="root";
        $password="";
        $dbname="todolist";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    catch (PDOException $e){
        echo "connection failed" . $e->getMessage();
    }
}

function getAllLists(){
    $conn = openDatabaseConn();
    $stmt = $conn->prepare("SELECT * FROM lists");
    $stmt->execute();
    return $result = $stmt->fetchAll();
}

function getSingleList(){
    $conn = openDatabaseConn();
    $id = $_GET["list_id"];
    $stmt = $conn->prepare("SELECT * FROM lists WHERE list_id='$id'");
    $stmt->execute();
    return $result = $stmt->fetchAll();
}

function updateList(){
    $conn = openDatabaseConn();
    if (isset($_POST['submit'])) {
        $id = $_GET['list_id'];
        $name = $_POST['name'];

        $stmt = $conn->prepare("UPDATE lists SET name = :name where list_id = '$id'");

        $stmt->bindParam(":name", $name);
        $stmt->execute();
        header("location: index.php");
    };
}


function createList(){
    $conn = openDatabaseConn();
    if (isset($_POST['submit'])) {
    
        $name = $_POST['name'];

        $stmt = $conn->prepare("INSERT INTO lists SET name = :name");

        $stmt->bindParam(":name", $name);
        $stmt->execute();
        header("location: index.php");
    };
}


function deleteList(){
    $conn = openDatabaseConn();
    $id = $_GET['list_id'];
    $stmt = $conn->prepare("DELETE FROM lists where list_id = '$id'");
    $stmt->execute();
    
}