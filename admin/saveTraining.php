<?php
include 'sec.layer.php';

$a = isset($_POST['specialTitle'])? $_POST['training_title'] : '';
$b = isset($_POST['specialBlurb'])? $_POST['training_blurb'] : '';
$c = isset($_POST['status'])? $_POST['status'] : '';

$q = $conn->prepare("INSERT INTO `special` ( `training_title`, `training_blurb`, `status` ) VALUES ( :a, :b, :c )");

$q->execute( array( ':a'=>$a,':b'=>$b,':c'=>$c ) );
header("location: training.php");
?>