<?php
include 'sec.layer.php';

$a = isset($_POST['size'])? $_POST['size'] : '';

// query
$q = $conn->prepare("INSERT INTO `sizes` ( `size_title` ) 
					VALUES ( :a )");

$q->execute( array( ':a'=>$a ) );

header("location: production.php");
?>