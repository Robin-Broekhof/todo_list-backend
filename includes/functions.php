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



