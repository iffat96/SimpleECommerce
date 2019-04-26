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

$q = "DELETE FROM `orders` WHERE orders.orderid='" . $_REQUEST['eee'] . "';";

//echo $q;

$result = $conn->query($q);

   header('Location: basket.php');
?>