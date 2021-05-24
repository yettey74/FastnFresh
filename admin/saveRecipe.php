<?php
include 'sec.layer.php';
$datetime = new DateTime();

$a = isset($_POST['ptid'])? $_POST['ptid'] : '';
$b = isset($_POST['recipe_title'])? $_POST['recipe_title'] : '';
$c = isset($_POST['recipe_image'])? $_POST['recipe_image'] : '';
$d = isset($_POST['recipe_blurb'])? $_POST['recipe_blurb'] : '';
$e = isset($_POST['recipe_link'])? $_POST['recipe_link'] : '';
$f = isset($_POST['status'])? $_POST['status'] : '';
$g = $datetime->format('Y-m-d H:i:s');

$q = $conn->prepare("INSERT INTO `recipes` ( `ptid`, `recipe_title`, `recipe_image`, `recipe_blurb`, `recipe_link`, `status`, `created_on` ) VALUES ( :a, :b, :c, :d, :e, :f, :g )");

$q->execute( array( ':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g ) );
header("location: recipes.php");
?>