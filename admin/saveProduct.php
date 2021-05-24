<?php
include 'sec.layer.php';

$a = isset($_POST['productName'])? $_POST['productName'] : '';
$b = isset($_POST['productBlurb'])? $_POST['productBlurb'] : '';
$c = 1;
$d = 0;
$e = isset( $_POST['cid'])? $_POST['cid'] : '';

// query
$q = $conn->prepare("INSERT INTO `product` ( `productName`, `productBlurb`, `status`, `archive`, cid ) 
					VALUES ( :a, :b, :c, :d, :e )");

$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':d'=>$d, ':e'=>$e ) );

header("location: production.php");
?>