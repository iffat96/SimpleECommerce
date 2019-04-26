<?php

session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
        
        if($_SESSION['usertype'] != (4 or 3)) {
            
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

$productid = $_REQUEST['productid'];
$confirmproductid = $_REQUEST['confirmproductid'];

$query = "SELECT * FROM Products WHERE productid='" . $productid . "';";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Product does not exist.";
} else if ($productid != $confirmproductid){
    echo "ProductIDs do not match.";
}
    else {
    $sql = "DELETE FROM `Products` WHERE `Products`.`productid` = $productid";
	
    $result = $conn->query($sql);	
    
    if($_SESSION['usertype'] = 4){
        header('Location: edititem.php');
    }
    else if ($_SESSION['usertype'] = 3){
        header('Location: employeeedititem.php');
    }
}

$conn ->close();
?>





