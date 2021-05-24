<?php
include 'sec.layer.php';


$ptName = isset($_POST['ptName'])? $_POST['ptName'] : '';
$ptImage = isset($_POST['ptImage'])? $_POST['ptImage'] : '';
$variety_stock = isset($_POST['variety_stock'])? $_POST['variety_stock'] : '';
$uom_id = isset($_POST['uom_id'])? $_POST['uom_id'] : '';
$size_id = isset($_POST['size_id'])? $_POST['size_id'] : '';
$count = isset($_POST['count'])? $_POST['count'] : '';
$buy = isset($_POST['buy'])? $_POST['buy'] : '';
$ptBlurb = isset($_POST['ptBlurb'])? $_POST['ptBlurb'] : '';
$status = isset($_POST['status'])? $_POST['status'] : '';
$pid = isset($_POST['pid'])? $_POST['pid'] : '';
$cid = isset($_POST['cid'])? $_POST['cid'] : '';
$status = isset($_POST['status'])? $_POST['status'] : '';

// query
$sql = "INSERT INTO `producttype` ( `ptName`,  `ptImage`, `uom_id`, `size_id`, `count`, `variety_stock`, `ptBlurb`, `status`, `pid`, `cid` ) 
		VALUES ( :a, :b, :c, :d, :e, :g, :h, :i, :j, :k )";

$q = $conn->prepare($sql);

$q->execute( array( ':a'=>$ptName, ':b'=>$ptImage, ':c'=>$uom_id, ':d'=>$size_id, ':e'=>$count, ':g'=>$variety_stock, ':h'=>$ptBlurb, ':i'=>$status, ':j'=>$pid, ':k'=>$cid ) );

// Insert into ptid_product_price

//insert into ptid_stock
// `uom_id`, `size`, `count`,
// INSERT INTO product_cost_price
/*$ptid = $conn->lastInsertId();
$box = isset($_POST['box'])? $_POST['box'] : '';
$kilo = isset($_POST['kilo'])? $_POST['kilo'] : '';
$punnet = isset($_POST['punnet'])? $_POST['punnet'] : '';
$bunch = isset($_POST['bunch'])? $_POST['bunch'] : '';
$single = isset($_POST['single'])? $_POST['single'] : '';
$tray = isset($_POST['tray'])? $_POST['tray'] : '';
$bag = isset($_POST['bag'])? $_POST['bag'] : '';
	
$uom_id1 = 1;

$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id1 );

if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id1, $box );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id1, $box );
}

$uom_id2 = 2;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id2 );
if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id2, $kilo );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id2, $kilo );
}

$uom_id3 = 3;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id3 );
if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id3, $punnet );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id3, $punnet );
}

$uom_id4 = 4;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id4 );
if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id4, $bunch );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id4, $bunch );
}

$uom_id5 = 5;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id5 );
if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id5, $single );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id5, $single );
}

$uom_id6 = 6;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id6 );
if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id6, $tray );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id6, $tray );
}

$uom_id7 = 7;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id7 );
if ( $isRow == true ){
	updateCostPrice( $conn, $ptid, $uom_id7, $bag );	
} else {	
	insertCostPrice( $conn, $ptid, $uom_id7, $bag );
}*/

header("location: production.php");

?>