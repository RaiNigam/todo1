<?php
session_start();
include("db.php");
$msg="";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];
    $_SESSION['username'] = $username;
    $sql = "SELECT id, email,username, password FROM tbl_user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    

    if ($result->num_rows == 1) {
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['email'] = $row['email'];      
        header('Location:index.php');
    } else {
        
        $msg="Please enter Valid Details!";
        
        
    }
}


	
 
?>

<div class="container">

    <div class="row">
        <div class="col-12 mt-5">
            
            <form method="post" action="">
            <h4  style="color: red"><?php echo "$msg";  ?></h4>
                <label>Email</label>
                <input type="email" name="email" required/>

                <label>Password</label>
                <input type="password" name="password" required/>

                <input type="submit" name="login" value="login" />
            </form>
        </div>
    </div>
</div>