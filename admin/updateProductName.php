<?php
include 'sec.layer.php';

$id = ($_POST['pid'])? $_POST['pid'] : '';
$a = ($_POST['productName'])? $_POST['productName'] : '';
$b = ($_POST['productBlurb'])? $_POST['productBlurb'] : '';

// echo 'ID : ' . $id . ', PN : ' . $a . ', PB : ' . $b;
// query
$sql = $conn->prepare("UPDATE product SET
						`productName`= ?, 
						`productBlurb`= ?
					  WHERE pid=?");
$sql->execute(array($a, $b, $id));

header("location: editProduct.php");

?>