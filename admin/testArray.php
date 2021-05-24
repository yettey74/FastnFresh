<?php
include 'db.php';
include 'apple/seed.php';

$array = array();
$q = $conn->query("SELECT `uom_id`, `cost_price` FROM `product_cost_price` WHERE `ptid` = '2' && `enddate` IS NULL ");

foreach( $q as $r ){
	$array[$r['uom_id'] ] = $r['cost_price'];
}

foreach( $array as $key=>$value ){
	echo $key . ' ' . $value . '<br>';
}

?>