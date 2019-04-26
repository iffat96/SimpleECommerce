<?php
    session_start();
    ?>

<HTML>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<hr><hr><hr>
<body>
<div class = "container">>    
<h1> <center>Login</center></h1>

<div class="container"><div class="col-sm-4"></div><div class="col-sm-4">
    <?php
    if (isset($_SESSION['badloginattempt']))
{
    if ($_SESSION['badloginattempt'] == 1) {
        echo "<p> Invalid login, please try again. </p>";
    }
}

    ?>
  <form action="attemptlogin.php">
    <div class="form-group">
      <input type="text" class="form-control" id="username" placeholder="username" name="username">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="password" name="pwd">
    </div>
   <center> <button type="submit" class="btn btn-default">Submit</button></center>
  </form>
  
  <form action="createuser.php">
  <center>  <button type="submit" class="btn btn-default">Create User</button></center>
  </form>
</div>
</div></div></div></div>
</body>
</HTML>