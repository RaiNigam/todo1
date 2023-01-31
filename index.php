<?php
include('db.php');
if(isset($_POST['submit'])) {
    $task = $_POST['task'];
   
    $date = $_POST['date'];

    $insertQuery = "INSERT INTO tbl_task(task,date) 
    VALUES ('$task','$date')";
    $result = $conn->query($insertQuery);

    if($conn->insert_id){
        // echo "Page created successfully";
    }else{
        echo $conn->error;
    }  
}
$sql = "SELECT id, task, date FROM tbl_task";
$result = $conn->query($sql);

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
            <button class="btn logOutBtn btn-outline-success my-2 my-sm-0" 
             type="submit">Logout</button>
          
        </div>
      </nav>
      <div class="container-fluid content">
        <h1 class="welcomeMsg">Hi Username, Welcome to our site.</h1>
       
        <div class="container tasks">
            <h2 class="appTitle">TODO Application</h2>
            <table class="table table-bordered table-hover">
        <form action="resubmit.php" method="post">
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
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['task'] ?></td>
                    <td class="date"><?php echo $row['date'] ?></td>

                    <td></td>
                    <td> <a href="?page=pages&action=edit&id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square edited" title="edit"></i></a>
                        <a href="?page=pages&action=delete&id=<?php echo $row['id']?>" onclick="return confirm('Are you sure?')" ><i class="fa-solid fa-trash-can deleted" title="delete"></i></a></td>      
                </tr>
            <?php
                }
            }
            ?>
      </tbody>
              </table>
        </div>

      </div>

</body>

<script src="js/bootstrap.bundle.min.js"></script>
</html>