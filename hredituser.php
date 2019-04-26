<?php
session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
        
        if($_SESSION['usertype'] != 2) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
    //Do stuff
    } else {
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
    }
?>

<HTML>  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/stuff.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <body>
        
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Estore</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="hrhome.php">Home</a></li>
      <li class="active"><a href="hreditusers.php">Edit Users</a></li>
      <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>

<head><h1><center>Add Employee</center></h1></head>
<p><center>User Type Key: HR = 2, Employee = 3</center></p>
<div class="container">
    <form action="attemptadduser.php">
    <div class="form-group">
      <input type="text" class="form-control" pattern="[2-3]" placeholder="User Type" name="usertype" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="[a-zA-Z]*" placeholder="First" name="firstname" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="[a-zA-Z]*" placeholder="Last" name="lastname" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="[a-zA-Z0-9]*" placeholder="Username" name="username" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" pattern=".{6,}[a-zA-Z0-9]*" placeholder="Password" name="pwd" required required title="6 characters minimum">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" pattern=".{6,}[a-zA-Z0-9]*" placeholder="Confirm Password" name="confirmpwd" required required title="6 characters minimum">
      <br>
    <button type="submit" class="btn btn-default">Add Employee</button>
  </form>
  </div>

<br><br>
<head><h1><center>Delete Employee</center></h1></head>
<div class="container">
    <form action="attemptdeleteuser.php">
    <div class="form-group">
      <input type="text" class="form-control" pattern="[0-9]*" placeholder="UserID" name="userid" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="[0-9]*" placeholder="Confirm UserID" name="confirmuserid" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="CONFIRM" placeholder="Please type CONFIRM" name="confirm" required>
    </div>
    <button type="submit" class="btn btn-default">Delete User</button>
  </form>
  </div>  
    </body>
</HTML>