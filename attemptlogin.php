<?php
session_start();

$firstname = $lastname = $username = $password = "";


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

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
        $_SESSION["firstname"] =$row["firstname"];
        $_SESSION["lastname"] =$row["lastname"];
        $_SESSION["userid"] =$row["userid"];
        $_SESSION["usertype"] =$row["usertype"];
        $_SESSION["username"] = $uname;
    }
    
    $_SESSION["validsession"] = 1;
    $_SESSION["badloginattempt"] = 0;
    
$sql = "SELECT `name`, `productid`, `description`, `stock`, `price`, `imageurl` FROM Products;";

if($_SESSION["usertype"] == 4) {
    header('Location: adminhome.php');
} 
else if($_SESSION["usertype"] == 3) {
    header('Location: employeehome.php');
}
else if($_SESSION["usertype"] == 2) {
    header('Location: hrhome.php');
}
else {
$_SESSION['storequery'] = $sql;
    header('Location: home.php');
}

} else {
    
    $_SESSION["validsession"] = 0;
    $_SESSION["badloginattempt"] = 1;
    header('Location: login.php'); 
} 

$conn ->close();
?>