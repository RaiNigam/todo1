<?php
	require_once 'db.php';
 
	if($_GET['id'] != ""){
		$id= $_GET['id'];
 
		$conn->query("UPDATE `tbl_task` SET `status` = 'Done' WHERE `id` = $id") or die(mysqli_errno($conn));
		header('location: index.php');
	}
?>