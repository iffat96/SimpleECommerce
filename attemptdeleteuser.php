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

$userid = $_REQUEST['userid'];
$confirmuserid = $_REQUEST['confirmuserid'];

$query = "SELECT * FROM Users WHERE userid='" . $userid . "';";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "User does not exist.";
} else if ($userid != $confirmuserid){
    echo "UserIDs do not match.";
}
    else {
    $sql = "DELETE FROM `Users` WHERE `Users`.`userid` = $userid";
	
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






