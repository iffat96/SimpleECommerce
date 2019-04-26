<?php
session_start();

$genre = $_REQUEST['genre'];
$category = $_REQUEST['category']; //case insensitivity
$title = $_REQUEST["title"];
$minyear = intval($_REQUEST["minyear"]); //years should be integers
$maxyear = intval($_REQUEST["maxyear"]);
$minprice = $_REQUEST["minprice"];
$maxprice = $_REQUEST["maxprice"];


$where = "WHERE ";
$first = 0;

if ($minprice > 0) {
    $where = $where . " `price` >= " . $minprice . " ";
    $first = 1;
}

if ($maxprice > 0) {
    
    if ($first == 1) {
        $where =  $where ." AND ";
    }
    $where =  $where . " `price` <= " . $maxprice . " ";
    $first = 1;
}


if ($minyear > 0) {
    
    if ($first == 1) {
        $where =  $where ." AND ";
    }
    $where =  $where . " `year`>= " . $minyear . " ";
    $first = 1;
}

if ($maxyear > 0) {
    
    if ($first == 1) {
        $where =  $where ." AND ";
    }
    $where =  $where . " `year`<= " . $maxyear . " ";
    $first = 1;
}

if ($category != "any") {
    
    if ($first == 1) {
        $where =  $where ." AND ";
    }
    $where =  $where . " `category` = '" . $category . "'";
    $first = 1;
}

if ($title != "") {
    
    if ($first == 1) {
        $where =  $where ." AND ";
    }
    $where =  $where . " `name` LIKE '%" . $title . "%' or `description` LIKE '%" . $title . "%' " ;
    $first = 1;
}




if ($genre == "any") {
    
    if ($where == "WHERE ") {
    $where = "";
}

$sql = "SELECT `name`, `productid`, `category`,  `year`, `description`, `stock`, `price`, `imageurl` FROM Products " . $where . ";";

} 

if ($genre != "any") {
    
      if ($first == 1) {
        $where =  $where ." AND ";
    }
    
    $where =  $where . " `productid` = `gameid` and `genre` =  '" . $genre . "'";

    $first = 1;
    
    
      if ($first == 0) {
        $where = "";
    }
    
$sql = "SELECT `name`, `productid`, `category`,  `year`, `description`, `stock`, `price`, `imageurl` FROM Products, games " . $where . ";";
    
}



$_SESSION['storequery'] = $sql;


header('Location: home.php');

$conn ->close();
?>