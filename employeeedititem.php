<?php
session_start();
    if (isset($_SESSION['validsession']))
    {
        if ($_SESSION['validsession'] == 0) {
            
      $_SESSION["validsession"] = 0;
      header('Location: login.php');
        }
        
        if($_SESSION['usertype'] != 3) {
            
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
      <li><a href="employeehome.php">Home</a></li>
      <li class="active"><a href="employeeedititem.php">Add Item</a></li>
      <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
<head><h1><center>Add Item</center></h1></head>
<div class="container">
   <form  enctype="multipart/form-data" method="post" action="attemptcreateitem.php">
       
    <div class="form-group">
      <input type="text" class="form-control" pattern="[a-zA-Z]*" placeholder="item name" name="itemname" required>
    </div>
      <input type="textarea" class="form-control"  placeholder="item description" name="description" rows="4" required></textarea>
<br>
    <div class="form-group">
    Item Category:    <select name="category">
  <option value="game">Game</option>
  <option value="accessory">Accessory</option>
  <option value="console">Console</option>
  <option value="console">Arcade</option>
  <option value="console">Miscellaneous</option>
</select>
    </div>
    
    
     Genre Category:   <select name="genre">
         
  <option value="none">Not a Game</option>
  <option value="platformer">Platformer</option>
  <option value="rpg">RPG</option>
  <option value="action">Action</option>
  <option value="puzzle">Puzzle</option>
</select>
<br><br>
    
    
  <input type="number"  class="form-control" placeholder="Item Price" name="price" step=".01" min="0" required>
  <br>
  
    <input type="number"  class="form-control" placeholder="Item Stock" name="stock" step="1" min="0" required>
  <br><br>
    
  <input type="file"  class="form-control" name="myfile" accept="image/*">
  <br><br>
  
        <input type="date" id="release" name="release"
       value="2018-07-22"
       min="1970-01-01" max="2030-12-31">
       
  <br><br>
        <input type="submit" name="submit" value="Launch Item" >
  </form>
  </div>
 
 <br><br>
<head><h1><center>Delete Item</center></h1></head>
<div class="container">
    <form action="attemptdeleteitem.php">
    <div class="form-group">
      <input type="text" class="form-control" pattern="[0-9]*" placeholder="ProductID" name="productid" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="[0-9]*" placeholder="Confirm ProductID" name="confirmproductid" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" pattern="CONFIRM" placeholder="Please type CONFIRM" name="confirm" required>
    </div>
    <button type="submit" class="btn btn-default">Delete Item</button>
  </form>
  </div>   
    </body>
</HTML>