<HTML>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<h1> <center>Create User</center></h1>
<div class="container">
    <form action="attemptcreateuser.php">
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
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <p><p>Already have an account? <a href="login.php">Login here</a>.</p></p>
  </form>
  
</div>
</HTML>