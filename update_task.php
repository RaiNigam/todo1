<?php
include('db.php');


session_start();

ini_set('display_errors', 1);

if(!isset($_SESSION['email'])){
    header('Location:login.php');
}


$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $date = $_POST['date'];
    // If you are checking is it working? If not working point out the issue in this query.
//    $insertQuery = "UPDATE tbl_page (title, content, publish, updated_date)
//    VALUES ('$title', '$content', '$publish', '$date') WHERE id = $id";

    $updateQuery = "UPDATE tbl_task SET task='$task', date='$date' WHERE id = $id";
    $result = $conn->query($updateQuery);

    if ($conn->insert_id) {
        echo "Page updated successfully";
    } else {
        echo $conn->error;
    }

    header('Location:index.php'); // Redirect to page list
}

$sql = "SELECT id, task, date FROM tbl_task WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Page</h1>
</div>

<form method="post" action="">
    <div class="form-group">
        <label>Task/Activity</label>
        <input type="text" class="form-control" required name="task" value="<?php echo $row['task']; ?>"/>
    </div>

    <div class="form-group">
        <label>date</label>
        <input class="form-control"type="date" required name="date" value="<?php echo $row['date']; ?>"/>
    </div>

  

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
    </div>
</form>