<?php

include('db.php');
if(isset($_POST['submit'])) {
    $task = $_POST['task'];
   
    $date = $_POST['date'];

    $insertQuery = "INSERT INTO tbl_task(task,date) 
    VALUES ('$task','$date')";
    $result = $conn->query($insertQuery);

    if($conn->insert_id){
        echo "Page created successfully";
    }else{
        echo $conn->error;
    }

   
}
header("location:index.php");
?>