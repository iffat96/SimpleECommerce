<?php
session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
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
      <li ><a href="home.php">Browse</a></li>
      <li ><a href="profile.php">Profile</a></li>
      <li class="active"><a href="basket.php">Current Basket</a></li>
      <li><a href="history.php">Recent Purchases</a></li>
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
        <tr><th><span> </span></th><th>Order ID</th><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Last Modified</th><br></tr>
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

$q = "SELECT orderid, status, userid, price, Products.productid, Products.name, time, quantity from Products, orders WHERE userid = '" . $_SESSION["userid"] ."' and status='1' and orders.productid=Products.productid ;";

$result = $conn->query($q);

$preprice = 0;

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
    
 $preprice = $preprice + $row['quantity'] * $row['price'];
    echo '<tr><th><form action="remove.php"> <input type="hidden" name="eee" value="' . $row["orderid"] . '"><button type="submit">Remove</button></form></th><th>' . $row['orderid']. '</th><th>'. $row['productid'] . '</th><th>' . $row['name'] . '</th><th>' . $row['quantity'] . '</th><th>' .$row['time'].'</th></tr>';
    
       
        
    }
    

}

$conn ->close();

?> 
</table>
<br><br><br>
<form action="buyitems.php">
    <table><tr><th><span style="font-weight:normal">Before tax: </span></th><th> $
    
    <?php
    echo  number_format($preprice, 2);
    ?>
    </th>
    <tr><th><span style="font-weight:normal">tax:  </span></th><th> $ <?php 
    $tax = $preprice * .07;
    
      echo number_format($tax, 2);
    
    ?></th></tr>
        <tr><th><span style="font-weight:normal">Total: </span></th><th> $ <?php
        $post = $preprice + $tax;
        
$_SESSION['post'] = $post;
    echo  number_format($post, 2);
        ?></th></tr></table>
        <br>
    <button type="submit">Purchase items</button>
</form></div>
    </body>
</HTML>