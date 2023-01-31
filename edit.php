<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish = isset($_POST['publish']) ? 1 : 0;
    $date = date('Y-m-d H:i:s');  // 2022-12-13 07:45:24

    // If you are checking is it working? If not working point out the issue in this query.
//    $insertQuery = "UPDATE tbl_page (title, content, publish, updated_date)
//    VALUES ('$title', '$content', '$publish', '$date') WHERE id = $id";

    $updateQuery = "UPDATE tbl_page SET title='$title', content='$content', publish='$publish', updated_date='$date' WHERE id = $id";
    $result = $conn->query($updateQuery);

    if ($conn->insert_id) {
        echo "Page updated successfully";
    } else {
        echo $conn->error;
    }

    header('Location:?page=pages&action=list'); // Redirect to page list
}

$sql = "SELECT id, title, content, publish FROM tbl_page WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>