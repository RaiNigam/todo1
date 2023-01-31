<?php
include("db.php");
$id = $_GET['id'];

$deleteQuery = "DELETE FROM tbl_task WHERE id = $id";
$conn->query($deleteQuery);
header('Location:index.php');
?>