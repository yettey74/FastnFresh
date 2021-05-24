<?php
include 'sec.layer.php';

$a = isset($_POST['categoryName'])? $_POST['categoryName'] : '';
$b = isset($_POST['categoryImage'])? $_POST['categoryImage'] : '';
$c = 1;
$d = 0;

// query
$q = $conn->prepare("INSERT INTO `category` ( `categoryName`, `categoryImage`, `status`, `archive` ) 
					VALUES ( :a, :b, :c, :d )");

$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':d'=>$d ) );

header("location: production.php");
?>