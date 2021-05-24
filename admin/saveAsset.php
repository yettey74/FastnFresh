<?php
include 'sec.layer.php';
// new data
// $id = ($_POST['customer_ID'])? $_POST['customer_ID'] : '';
$date=date_create();
$a = isset($_POST['asset_title'])? $_POST['asset_title'] : '';
$b = isset($_POST['quantity'])? $_POST['quantity'] : '';
$d = isset($_POST['brand'])? $_POST['brand'] : '';
$e = isset($_POST['model'])? $_POST['model'] : '';
$f = isset($_POST['serial'])? $_POST['serial'] : '';
$g = isset($_POST['purchase_date'])? $_POST['purchase_date'] : '';
$h = isset($_POST['purchase_price'])? $_POST['purchase_price'] : '';
$i = isset($_POST['current_value'])? $_POST['current_value'] : '';
$j = isset($_POST['location'])? $_POST['location'] : '';
$k = isset($_POST['department'])? $_POST['department'] : '';
$l = isset($_POST['disposal_date'])? $_POST['disposal_date'] : '';
$m = isset($_POST['description'])? $_POST['description'] : '';
$n = isset($_POST['asset_image'])? $_POST['asset_image'] : '';
$o = date_timestamp_get($date);
// query
$q = $conn->prepare("INSERT INTO `assets` ( `asset_title`, `quantity`, `brand`, `model`, `serial`, `purchase_value`, `purchase_date`, `current_value`, `location`, `department`, `disposal_date`, `description`, `asset_image`, `created_on` ) 
		VALUES ( :a, :b, :d, :e, :f, :g, :h, :i, :j, :k, :l, :m, :n, :o )");

$q->execute( array( ':a'=>$a,':b'=>$b,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,'k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n,':o'=>$o ) );
header("location: assets.php");
?>