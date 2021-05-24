<?php
include 'sec.layer.php';

$id = isset( $_POST['id'] )? $_POST['id'] : '';

$date = date_create();

$a = isset($_POST['asset_title'])? $_POST['asset_title'] : '';/*
$b = isset($_POST['asset_image'])? $_POST['asset_image'] : '';
$c = isset($_POST['description'])? $_POST['description'] : '';
$d = isset($_POST['quantity'])? $_POST['quantity'] : '';
$e = isset($_POST['brand'])? $_POST['brand'] : '';
$f = isset($_POST['model'])? $_POST['model'] : '';
$g = isset($_POST['serial'])? $_POST['serial'] : '';
$h = isset($_POST['purchase_value'])? $_POST['purchase_value'] : '';
$i = isset($_POST['purchase_price'])? $_POST['purchase_price'] : '';
$j = isset($_POST['current_value'])? $_POST['current_value'] : '';
$k = isset($_POST['location'])? $_POST['location'] : '';
$l = isset($_POST['department'])? $_POST['department'] : '';
$m = isset($_POST['disposal_date'])? $_POST['disposal_date'] : '';
$n = isset($_POST['asset_image'])? $_POST['asset_image'] : '';
$o = date_timestamp_get( $date ); // Modified On*/

/*$q = $conn->prepare("UPDATE `assets` SET 
					   `asset_title` = ?,
					   `asset_image` = ?,
					   `description` = ?,
					   `quantity` = ?,
					   `brand` = ?,
					   `model` = ?,
					   `serial` = ?,
					   `purchase_value` = ?,
					   `purchase_price` = ?,
					   `current_value` = ?,
					   `location` = ?,
					   `department` = ?,
					   `disposal_date` = ?,
					   `modified_on` = ?
					   	WHERE `asset_id` = ? ) 
						VALUES ( :a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k, :l, :m, :n, :o, :id )
					");

$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':d'=>$d, ':e'=>$e, ':f'=>$f, ':g'=>$g, ':h'=>$h, ':i'=>$i, ':j'=>$j, 'k'=>$k, ':l'=>$l, ':m'=>$m, ':n'=>$n, ':o'=>$o, ':id'=>$id ) );*/
/*
$q = $conn->prepare("UPDATE `assets` SET 
					   `asset_title` = ?
					 WHERE `asset_id` = ? ) 
						VALUES ( :a, :id )
					");*/

echo 'id :' . $id .'<br>';
echo 'title :' . $a . '<br>';
//$q->execute( array( ':a'=>$a, ':id'=>$id ) );


// header("location: assets.php");
?>