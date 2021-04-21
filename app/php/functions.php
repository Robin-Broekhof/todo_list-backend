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

    



/** get all list data */
function getAllLists(){
    $conn = openDatabaseConn();
    $stmt = $conn->prepare("SELECT * FROM lists");
    $stmt->execute();
    return $result = $stmt->fetchAll();
}
/** to link tasks to their respective list */
function listToTaskJoin(){
    
    /** if's for sorting by duration */
    $durationSqlSort = "";
    if(isset($_GET['duration'])) {
        if($_GET["duration"] == "time_asc"){
            $durationSqlSort = "ORDER BY tasks.duration asc";
        }
        elseif($_GET["duration"] == "time_desc"){
            $durationSqlSort = "ORDER BY tasks.duration desc";
        }
    }

    /** if's for sorting by a status */
    $statusSqlSort = "";
    if(isset($_GET["status"])){
        if($_GET["status"] == "all"){
            
        }
        elseif($_GET["status"] == "todo" or $_GET["status"] == "doing" or $_GET["status"] == "done"){
            $statusSqlSort = $_GET["status"];
            $statusSqlSort = "WHERE tasks.status='$statusSqlSort'";
        }
    }


    $conn = openDatabaseConn();
    $stmt = $conn->prepare("SELECT lists.list_id, lists.name, tasks.task_id, tasks.description, tasks.status, tasks.duration
                            FROM lists
                            INNER JOIN tasks 
                            ON lists.list_id=tasks.list_id
                            $statusSqlSort
                            $durationSqlSort   
                            ");
    $stmt->execute();
    return $result = $stmt->fetchAll();
}



/** used for update to get old data*/
function getSingleList(){
    $conn = openDatabaseConn();
    $id = $_GET["list_id"];
    $stmt = $conn->prepare("SELECT * FROM lists WHERE list_id='$id'");
    $stmt->execute();
    return $result = $stmt->fetchAll();
}
function getSingleTask(){
    $conn = openDatabaseConn();
    $id = $_GET["task_id"];
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE task_id='$id'");
    $stmt->execute();
    return $result = $stmt->fetchAll();
}






/** update functions */
function updateList(){
    $conn = openDatabaseConn();
    if (isset($_POST['submit'])) {
        $id = $_GET['list_id'];
        $name = $_POST['name'];

        $stmt = $conn->prepare("UPDATE lists SET name = :name WHERE list_id = '$id'");

        $stmt->bindParam(":name", $name);
        $stmt->execute();
        indexReturn();
    };
}
function updateTask(){
    $conn = openDatabaseConn();
    if (isset($_POST['submit'])) {
        $id = $_GET['task_id'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $duration = $_POST['duration'];


        $stmt = $conn->prepare("UPDATE tasks SET description = :description, status = :status, duration = :duration WHERE task_id = '$id'");

        
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":duration", $duration);
        $stmt->execute();
        indexReturn();
    };
}







/** create functions */
function createList(){
    $conn = openDatabaseConn();
    if (isset($_POST['submit'])) {
    
        $name = $_POST['name'];

        $stmt = $conn->prepare("INSERT INTO lists SET name = :name");

        $stmt->bindParam(":name", $name);
        $stmt->execute();
        indexReturn();
    };
}
function createTask(){
    $conn = openDatabaseConn();
    if (isset($_POST['submit'])) {
        $list_id = $_GET['list_id'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $duration = $_POST['duration'];

        $stmt = $conn->prepare("INSERT INTO tasks SET description = :description, status = :status, duration = :duration, list_id =:list_id");

        $stmt->bindParam(":list_id", $list_id);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":duration", $duration);
        $stmt->execute();
        indexReturn();
    };
}





/** delete functions */
function deleteList(){
    $conn = openDatabaseConn();
    $id = $_GET['list_id'];
    $stmt = $conn->prepare("DELETE FROM lists where list_id = '$id'");
    $stmt->execute();
    indexReturn();
}
function deleteTask(){
    $conn = openDatabaseConn();
    $id = $_GET['task_id'];
    $stmt = $conn->prepare("DELETE FROM tasks where task_id = '$id'");
    $stmt->execute();
    indexReturn();
}






/** function to return to the main page */
function indexReturn(){ 
    header("location: ../index/index.php");
}
















