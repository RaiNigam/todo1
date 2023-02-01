 <?php
include("db.php");
if($_GET['id']){
    $id = $_GET['id'];

    $conn->query("DELETE FROM `tbl_task` WHERE `id` = $id") or die(mysqli_errno($conn));
    header("location: index.php");
}	
?>
