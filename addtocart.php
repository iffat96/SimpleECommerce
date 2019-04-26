<?php


session_start();

$pid = $_GET['eee']; //gets the actual thing that we need to add
$uname = $_SESSION['userid'];

$servername = "localhost:3306";
$username = "siddiiff_admin";
$password = "Testing123";
$dbname = "siddiiff_estore";

//START HERE


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$select = "SELECT quantity FROM orders WHERE userid='" . $uname . "' and status='1' and productid='" . $pid . "';";

$num = 0;

$result = $conn->query($select);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
        $num = $row["quantity"];
    }
    
$sql = "UPDATE orders set quantity='" . ($num + 1) . "' where userid='" . $uname . "' and productid='" . $pid . "' and status='1';";

$r2 = $conn->query($sql);

} else {

$sql = "INSERT INTO orders (productid, userid, quantity, status)
VALUES ('" . $pid ."', '" . $uname ."', '1', '1')";
$result = $conn->query($sql);
}


    $_SESSION["addtocart"] = 1;
    header('Location: home.php'); 

$conn ->close();

?>