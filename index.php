<?php
session_start();

ini_set('display_errors', 1);

if(!isset($_SESSION['email'])){
    header('Location:login.php');
}


include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0c9a88a792.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" 
           rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">   
     
    <title>Todo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo" height="50px" 
          width="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data- 
         target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
           aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#" id="home">Home <span class="sr-only">(current)</span></a>
            </li>
          
          </ul>
            <a href="./logout.php"><button class="btn logOutBtn btn-outline-success my-2 my-sm-0" 
             >Logout</button></a>
          
        </div>
      </nav>
      <div class="container-fluid content">
        <h1 class="welcomeMsg">Hi <?php
				include'db.php';
 
 
				$query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `email`='$_SESSION[email]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
				echo "<span class='text-success'>".$fetch['username']."</span>";
			?>, Welcome to our site.</h1>
       
        <div class="container tasks">
            <h2 class="appTitle">TODO Application</h2>
            <table class="table table-bordered table-hover">
        <form action="create.php" method="post">
          <div class="d-flex">
            <div class="p-2 text-lg-center"><label for="exampleInputEmail1" >Tasks</label>
              <input type="text" class="form-control activity" name="task" placeholder="Enter Your Task Here" 
               required></div>
            <div class="p-2 text-lg-center"><label for="#">Date</label>
              <input type="date" class="form-control inputDate" name="date" placeholder="Date" required></div>
            <div class="p-2 align-self-end"><button type="submit" name="submit" class="btn btn-primary p-2">Add</button>
            </div>
          </div>
      </form>
      
               
      <thead>
        <tr class="table-info table_header">
          <th class="col-1">S.No.</th>
          <th class="col-7">Task/Activity</th>
          <th class="col-2 date">Date</th>
          <th class="col-1">Status</th>
          <th class="col-1">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
            	require 'db.php';
              $query = $conn->query("SELECT * FROM `tbl_task`");
              $count = 1;
              while($fetch = $query->fetch_array()){
            ?>
            <tr>
              <td class="data"><?php echo $count++?></td>
              <td class="data task"><?php echo $fetch['task']?></td>
              <td class="data date"><?php echo $fetch['date']?></td>
              <td><?php if ($fetch['status']==1){
                echo '<a class="statusDone" href="status.php?id='.$fetch['id'].'&status=0">Done</a>';
              }else{
                echo '<a class="statusUndone" href="status.php?id='.$fetch['id'].'&status=1">Undone</a>';
              }
              ?></td>
              
             
              <td>
              
							<?php

								if($fetch['status'] != 1){
									echo 
									'<a href="update_task.php?id='.$fetch['id'].'" ><i class="fa-solid fa-pen-to-square edited" title="edit"></i></a>';
								}
							?>
							 <a href="delete.php?id=<?php echo $fetch['id']?>" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can deleted" title="delete"></i></a>
						
					</td>
				</tr>
				<?php
					}
				?>
      </tbody>
              </table>
        </div>

      </div>

</body>




</html>