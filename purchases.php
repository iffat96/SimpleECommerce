<?php
session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
        
        if($_SESSION['usertype'] != 4) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
    //Do stuff
    } else {
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
    }
?>


<HTML>  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <body>
        
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Estore</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="adminhome.php">Home</a></li>
      <li><a href="edititem.php">Edit Item</a></li>
      <li><a href="edituser.php">Edit User</a></li>
      <li class="active"><a href="purchases.php">Order Log</a></li>
      <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>


<div class="container">
      
    <?php
    if (isset($_SESSION['q']) and $_SESSION['q'] == 1) {
        echo "<div class='row'><div class='col-sm-4'></div><div class='col-sm-4'>Item(s) successfully purchased!</div></div>";
        $_SESSION['q'] = 0;
    }
    
    ?>

    <table style="text-align:center;width:100%">
        <tr><th>Purchased On</th><th>Order ID</th><th>Product ID</th><th>Customer ID</th><th>Customer</th><th>Product Name</th><th>Quantity</th><th>Before "Taxes"</th><th>Total Price</th><br></tr>
        <tr><th></th><th></th><th></th><th> <br><br><br></th><th></th><br></tr>
        
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

$q = "SELECT orderid, status, orders.userid, price, Users.firstname, Users.lastname, Products.productid, Products.name, time, quantity from Products, Users, orders WHERE  status='2' and orders.productid=Products.productid and orders.userid=Users.userid;";

$result = $conn->query($q);

$preprice = 0;
$total = 0;
$total2 = 0;

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
 $preprice = 0;
 $preprice = $preprice + $row['quantity'] * $row['price'];
 $post = $preprice * 1.07;
 $total2 += $preprice;
 $total = $total + $post;
 
    echo '<tr><th>' .$row['time'].'</th><th>' . $row['orderid']. '</th><th>'. $row['productid'] . '</th><th>' . $row['userid'] . '</th><th>' . $row['firstname'] . ' ' . $row['lastname'] . '</th><th>' . $row['name']. '</th><th>' . $row['quantity']. '</th><th>$ ' . $row['price'] .'</th><th>$ '. number_format($post, 2) .'</th></tr>';
    
    }
}

?> 
</table>
<br><br><br>
    <table><tr><th><span style="font-weight:normal">Revenue before the Uncle Sam robs us:  </span></th><th>  $
    
    <?php
    echo  number_format($total2, 2);
    ?>
    </th></tr>
    
    <tr><th><span style="font-weight:normal">Total Revenue:  </span></th><th> $
    
    <?php
    echo  number_format($total, 2);
    ?>
    </th></tr>
    
    <tr><th><span style="font-weight:normal">Amount he stole:  </span></th><th> $
    
    <?php
    echo  number_format($total - $total2, 2);
    ?>
    </th></tr>
    </table>
        <br>
  </div>
    </body>
</HTML>