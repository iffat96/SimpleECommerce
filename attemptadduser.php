<?php

session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
        
        if($_SESSION['usertype'] != (4 or 2)) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
    //Do stuff
    } else {
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
    }

$servername = "localhost:3306";
$uname = "siddiiff_admin";
$password = "Testing123";
$dbname = "siddiiff_estore";

// Create connection
$conn = new mysqli($servername, $uname, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$type = $_REQUEST['usertype'];
$first = $_REQUEST['firstname'];
$last = $_REQUEST['lastname'];
$pass = $_REQUEST['pwd'];
$confirmpass = $_REQUEST['confirmpwd'];
$username = $_REQUEST['username'];
$salt = rand();

if ($pwd == $confirmpwd){
    $passcount = 0;
}
else {
    $passcount = 1;
}

$query = "SELECT * FROM Users WHERE username='" . $username . "';";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "User already exists. User updated.";
    $sql = "UPDATE Users (firstname, lastname, username, password, salt, usertype)
    VALUES ('" . $first ."', '" . $last ."',  '" . $username ."', 
	        '" . $pass . "', '" . $salt ."', '" . $type ."')";
	        
	        echo $sql;
	
    $result = $conn->query($sql);
}
    else if ($passcount > 0){
    echo "Password does not match.";
	
} 
    else {
    $sql = "INSERT INTO Users (firstname, lastname, username, password, salt, usertype)
    VALUES ('" . $first ."', '" . $last ."',  '" . $username ."', 
	        '" . $pass . "', '" . $salt ."', '" . $type ."')";
	
    $result = $conn->query($sql);
    if($_SESSION['usertype'] = 4){
        header('Location: edituser.php');
    }
    else if ($_SESSION['usertype'] = 2){
        header('Location: hredituser.php');
    }
}

$conn ->close();
?>
