<?php
include('db.php');
if(isset($_POST['submit'])) {
    $task = $_POST['task'];
   
    $date = $_POST['date'];

    $insertQuery = "INSERT INTO tbl_task(task,date,status) 
    VALUES ('$task','$date','Undone')";
    $result = $conn->query($insertQuery);

    if($conn->insert_id){
        // echo "Page created successfully";
    }else{
        echo $conn->error;
    }  
    header('location:index.php');
}
?>
<!-- <?php
	require_once 'db.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
            $date = $_POST['date'];
 
			$conn->query("INSERT INTO `tbl_task` VALUES('', '$task', '$date')");
			header('location:index.php');
		}
	}
?> -->