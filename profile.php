<?php
session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
    //Do stuff
    } else {
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
    }
    
$uname = strtolower($_REQUEST["username"]); //case insensitivity
$pass = $_REQUEST["pwd"];
    
$servername = "localhost:3306";
$username = "siddiiff_admin";
$password = "Testing123";
$dbname = "siddiiff_estore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `firstname`, `lastname`, `usertype`, `userid` FROM Users WHERE `username`= '" . $uname . "' and `password`='" . $pass . "';";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
        $_SESSION["firstname"] =$row["firstname"];
        $_SESSION["lastname"] =$row["lastname"];
        $_SESSION["userid"] =$row["userid"];
        $_SESSION["usertype"] =$row["usertype"];
        $_SESSION["username"] = $uname;
    }
?>

<HTML>  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

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
      <li ><a href="home.php">Browse</a></li>
      <li class="active"><a href="profile.php">Profile</a></li>
      <li><a href="basket.php">Current Basket</a></li>
      <li><a href="history.php">Recent Purchases</a></li>
      <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>

<?php
echo '<div class="container">';
    echo '<h3>' . "<p>User Info " ."</p>" . '</h3>';
    echo "<br>";
    echo '<h3>' . "<p>Username: ". $_SESSION["username"] ."</p>" . '</h3>';
    echo "<br>";
    echo '<h3>' . "<p>First name: ". $_SESSION["firstname"] ."</p>" . '</h3>';
    echo "<br>";
    echo '<h3>' . "<p>Last name: ". $_SESSION["lastname"] ."</p>" . '</h3>';
    echo "<br>";
echo '</div>';    
   
?>

<div class="container">
    <form action="attemptchangepass.php">
        
    <div class="form-group">
      <input type="password" class="form-control" pattern="[a-zA-Z0-9]*" placeholder="New Password" name="newpwd" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" pattern="[a-zA-Z0-9]*" placeholder="Confirm New Password" name="confirmnewpwd" required>
    </div>
    
    <button type="submit" class="btn btn-default">Change Password</button>
  </form>
</div>   

    </body>
</HTML>