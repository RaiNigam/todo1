<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    // Insert data into database
    $sql = "INSERT INTO tbl_user (name, email, password, submit) VALUES ($name, $email, $password, $submit)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
    mysqli_stmt_execute($stmt);

    // Check if insertion was successful
    if (mysqli_affected_rows($conn) > 0) {
        echo "User created successfully.";
        header('Location:login.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/0c9a88a792.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9f0469db40.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginout.css">
    <title>Todo - log in or sign up</title>
</head>
<body>
    <main class="container">
        <div class="container">
            <form action="" method="post" class="user-signup">
                <header class="row head">
                    <div class="col">
                        <h1 class="sign-up">Sign Up</h1>
                        <p class="discript">It's quick and easy.</p>
                    </div>
                </header>
                <main class="row row-main">
                    <div class="col col-main">
                        <input class="user-name" type="text" placeholder="Username" name="username" title="What's your username?"/><br/>
                        <input class="Email" type="email" placeholder="Enter your Email" name="email" title="Enter your email ID"/><br/>
                        <input class="Password" type="password" placeholder="New password" name="password" title="Password must be 8 character long"/><br/>
                    </div>
                </main>
                <footer class="row signup-btn">
                    <div class="col">
                        <button type="submit" name="submit" class="signing-up">Sign Up</button>
                    </div>
                </footer>
            </form>
        </div>
    </main>
</body>
</html>