<?php

session_start();

$salt = rand();
$usertype = 1; 

$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$username = strtolower($_REQUEST["username"]); //case insensitivity
$pwd = $_REQUEST["pwd"];
$confirmpwd = $_REQUEST["confirmpwd"];

if ($pwd == $confirmpwd){
    $passcount = 0;
}
else {
    $passcount = 1;
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

$query = "SELECT * FROM Users WHERE username='" . $username . "';";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "Invalid login, please try again.";
}
    else if ($passcount > 0){
    echo "Password does not match.";
	
} 
    else {
	$sql = "INSERT INTO Users (firstname, lastname, username, password, salt, usertype)
    VALUES ('" . $firstname ."', '" . $lastname ."', 
	        '" . $username ."', '" . $pwd ."', '" . $salt ."',
	        '" . $usertype ."')";
    $result = $conn->query($sql);
    
    $_SESSION["validsession"] = 1;
    $_SESSION["badloginattempt"] = 0;
}

$conn ->close();

?>

<html>
     <p><p>User has been created. Go back to return to previous page.</p></p>
</html>