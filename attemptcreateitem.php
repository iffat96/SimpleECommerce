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


    $currentDir = getcwd();
    $uploadDirectory = "/images/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
    

    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

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

$n = $_REQUEST['itemname'];
$s = $_REQUEST['stock'];
$p = $_REQUEST['price'];
$d = $_REQUEST['description'];
$c = $_REQUEST['category'];
$genre = $_REQUEST['genre'];

$year = $_REQUEST['release'];
$year = date('Y', strtotime($year));

$sql = "INSERT INTO Products (name, stock, sold, year, price, description, category, imageurl)
    VALUES ('" . $n ."', '" . $s ."', '0', 
	        '" . $year . "', '" . $p ."', '" . $d ."', '" . $c ."',
	        '" .basename($fileName) . "')";
	
    $result = $conn->query($sql);
    $_SESSION["validsession"] = 1;
    $_SESSION["badloginattempt"] = 0;
    
    if($_SESSION['usertype'] = 4){
        header('Location: edititem.php');
    }
    else if ($_SESSION['usertype'] = 3){
        header('Location: employeeedititem.php');
    }

$conn ->close();
    }
?>