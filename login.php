<?php
session_start();
include("db.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];

    $sql = "SELECT id, email, password FROM tbl_user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if ($result->num_rows == 1) {
        $_SESSION['email'] = $row['email'];      
        header('Location:index.php');
    } else {
        header('Location:login.php');
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <form method="post" action="">
                <label>Email</label>
                <input type="email" name="email" required/>

                <label>Password</label>
                <input type="password" name="password" required/>

                <input type="submit" name="submit" />
            </form>
        </div>
    </div>
</div>