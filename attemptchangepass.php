<?php
session_start();

$newpwd = $_REQUEST["newpwd"];
$confirmnewpwd = $_REQUEST["confirmnewpwd"];
$uid = $_SESSION['userid'];

if ($newpwd == $confirmnewpwd){
    $passmatch = 0;
}
else {
    $passmatch = 1;
}


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

if ($passmatch > 0)
{
    echo "Passwords do not match.";    
}else {
    $sql = "UPDATE Users SET password = '$newpwd' 
            WHERE 'userid' = '$uid'. ;";
    $result = $conn->query($sql);
    echo "Your password has successfully been changed.";
}

$conn ->close();
?>

<html>
     <p><p> <a href="profile.php">Return to profile.</a></p></p>
</html>