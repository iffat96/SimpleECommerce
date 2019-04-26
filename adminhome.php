<?php
session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
        
        if($_SESSION['usertype'] != 4) {
            
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
      <li class="active"><a href="adminhome.php">Home</a></li>
      <li><a href="edititem.php">Edit Item</a></li>
      <li><a href="edituser.php">Edit User</a></li>
      <li><a href="purchases.php">Order Log</a></li>
      <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
<head><h1><center>Home</center></h1></head>
<p><h5><center>User Type Key: Customer = 1, HR = 2, Employee = 3, Admin = 4</center></h5></p>
<p><h3><b>  User List: </b></h3></p>
<?php

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

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
    
    echo '<div class>';;
    echo "<p> Username: " .$row["username"] . "</p>";
    echo "<p> First name: " .$row["firstname"] . "</p>";
    echo "<p> Last name: " .$row["lastname"] . "</p>";
    echo "<p> User type: " .$row["usertype"] . "</p>";
    echo "<p> -------------------------------------"."</p>";
    echo "<br>";
    }
$conn ->close();
}

?>
<p><h3><b>  Product List: </b></h3></p>
<?php

$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
} 

$sql2 = "SELECT * FROM Products";
$result2 = $conn2->query($sql2);
if ($result2->num_rows > 0) {

while($row2 = $result2->fetch_assoc()) {
    
    echo '<div class>';;
    echo "<p> Product ID: " .$row2["productid"] . "</p>";
    echo "<p> Product Name: " .$row2["name"] . "</p>";
    echo "<p> Stock: " .$row2["stock"] . "</p>";
    echo "<p> Price: " .$row2["price"] . "</p>";
    echo "<p> -------------------------------------"."</p>";
    echo "<br>";
    }
$conn2 ->close();
}
?>
    </body>
</HTML>