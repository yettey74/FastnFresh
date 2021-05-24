<?php
session_start();
include('../db.php');
// new data
// $id = ($_POST['customer_ID'])? $_POST['customer_ID'] : '';
$a = isset($_POST['specialTitle'])? $_POST['specialTitle'] : '';
$b = isset($_POST['specialBlurb'])? $_POST['specialBlurb'] : '';
$c = isset($_POST['specialImage'])? $_POST['specialImage'] : '';
$d = isset($_POST['ptid'])? $_POST['ptid'] : '';

// query
$q = $conn->prepare("INSERT INTO `special` ( `specialTitle`, `specialBlurb`, `specialImage`, `ptid` ) 
		VALUES ( :a, :b, :c, :d )");

$q->execute( array( ':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d ) );
header("location: marketing.php");
?>