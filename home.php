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
<link rel="stylesheet" href="css/stuff.css">

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
      <li class="active"><a href="home.php">Browse</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="basket.php">Current Basket</a></li>
      <li><a href="history.php">Recent Purchases</a></li>
      <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    
    <div class="row">
    <div class="col-sm-3"></div><div class="col-sm-6">
        <form action="buildsearchquery.php">
            
        <select name="category">
  <option value="any">Any Category</option>
  <option value="game">Game</option>
  <option value="accessory">Accessory</option>
  <option value="console">Console</option>
  <option value="arcade">Arcade</option>
  <option value="miscellaneous">Miscellaneous</option>
</select>

   <select name="genre">
  <option value="any">Any Genre</option>
  <option value="platformer">Platformer</option>
  <option value="rpg">RPG</option>
 
  <option value="action">Action</option>
  <option value="puzzle">Puzzle</option>
</select>

<br>


<input type="text"name="title" placeholder="search words">

<br>

<input type="number" name="minyear" placeholder="min year">
<input type="number" name="maxyear" placeholder="max year">

<br>
<input type="number" name="minprice" placeholder="min price">
<input type="number" name="maxprice" placeholder="max price">

<button type="submit"  class="btn btn-default">Filter Search</button>

</form>
    </div>    
        
    </div>
    
    
    <div class="col-sm-3"></div><div class="col-sm-6">

<!--okay so this is gonna be where we load all the stuff from the search bar -->


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


$result = $conn->query($_SESSION['storequery']);

if (isset($_SESSION["addtocart"]) && $_SESSION["addtocart"] == 1) {
    echo "<div class='card' ><br>Item has been added to card successfully!<br></div>";
    $_SESSION["addtocart"] = 0;
}
//echo $_SESSION['storequery'] . "<br><br>";

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
   echo '<div class="row card">';
    
        echo '<div class="col-sm-6">';
        
       echo "<img src='images/" . $row['imageurl'] . '\' alt="hi" width="100%" >';
       
       echo '</div><div class="col-sm-6">';
       
        echo '<h3>'. $row["name"] .'</h3>';
        echo "<br>";
        
        
        echo "<p> Price: $" .$row["price"] . "</p>";
   
        
        echo "<p>Only " . $row["stock"] . " left!</p>";
        
        echo "<p>Description: " . $row["description"] . "</p>";
        
        echo '<form action="addtocart.php"> <input type="hidden" name="eee" value="' . $row["productid"] . '"><button type="submit" class="btn">Add to Cart</button></form>';
        
       echo '</div></div>';
       
       echo '<br>';
        
    }
$conn ->close();
}
else {
    echo "No results found.";
    $conn ->close();
}

?>
</div>

</div>
    </body>
</HTML>