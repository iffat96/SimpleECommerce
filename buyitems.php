<?php

$servername = "localhost:3306";
$username = "siddiiff_admin";
$password = "Testing123";
$dbname = "siddiiff_estore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

session_start();
if ($_SESSION['post'] == 0) {
    header('Location: basket.php');
    
}

else {
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();

$q = 'UPDATE `orders` SET `status`= \'2\'  WHERE userid = "'. $_SESSION['userid'].'" and status="1"';

$_SESSION['q'] = 1;

$result = $conn->query($q);

   header('Location: history.php');
   
   
$conn ->close();
}
?>