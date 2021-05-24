<?php
include 'sec.layer.php';

//////////////////////
// Variety Details
//////////////////////
$ptid = isset( $_POST['ptid'] )? $_POST['ptid'] : '';
$pti = isset( $_POST['pti'] )? $_POST['pti'] : '';
$ptName = isset($_POST['ptName'])? $_POST['ptName'] : '';
$ptImage = isset($_POST['ptImage'])? $_POST['ptImage'] : '';
$variety_stock = isset($_POST['variety_stock'])? $_POST['variety_stock'] : '';
$uom_id = isset($_POST['uom_id'])? $_POST['uom_id'] : '';
$size_id = isset($_POST['size_id'])? $_POST['size_id'] : '';
$count = isset($_POST['count'])? $_POST['count'] : '';
$ptBlurb = isset($_POST['ptBlurb'])? $_POST['ptBlurb'] : '';
$status = isset($_POST['status'])? $_POST['status'] : '';
$pid = isset($_POST['pid'])? $_POST['pid'] : '';
$cid = isset($_POST['cid'])? $_POST['cid'] : '';
$status = isset($_POST['status'])? $_POST['status'] : '';

$picture = !empty( $ptImage )? $ptImage : $pti;

// echo  'Picture<br>' . $picture;
//echo '<script>alert("' . $cid . '");</script>';
//echo '<script>alert("' . $pid . '");</script>';

$varietyUpdate = $conn->prepare("UPDATE producttype SET
								`ptName`= ?, 
								`ptImage`= ?, 
								`uom_id`= ?,
								`size_id`= ?,
								`count`= ?,
								`ptBlurb`= ?, 
								`status` = ?,
								`pid` = ?,
								`cid` = ?
							  	WHERE `ptid` = ?");

$varietyUpdate->execute(array( $ptName, $picture, $uom_id, $size_id, $count, $ptBlurb, $status, $pid, $cid, $ptid ) );

$kilo = isset($_POST['kilo'])? $_POST['kilo'] : '';
$kilo_h = isset($_POST['kilo_h'])? $_POST['kilo_h'] : '';
$box = isset($_POST['box'])? $_POST['box'] : '';
$box_h = isset($_POST['box_h'])? $_POST['box_h'] : '';
$punnet = isset($_POST['punnet'])? $_POST['punnet'] : '';
$punnet_h = isset($_POST['punnet_h'])? $_POST['punnet_h'] : '';
$bunch = isset($_POST['bunch'])? $_POST['bunch'] : '';
$bunch_h = isset($_POST['bunch_h'])? $_POST['bunch_h'] : '';
$single = isset($_POST['single'])? $_POST['single'] : '';
$single_h = isset($_POST['$single_h'])? $_POST['$single_h'] : '';
$tray = isset($_POST['tray'])? $_POST['tray'] : '';
$tray_h = isset($_POST['tray_h'])? $_POST['tray_h'] : '';
$bag = isset($_POST['bag'])? $_POST['bag'] : '';
$bag_h = isset($_POST['bag_h'])? $_POST['bag_h'] : '';

$uom_id1 = 1;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id1 );
if ( $isRow == true && $box > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id1, $box ); // de-activate old price
	insertCostPrice( $conn, $ptid, $uom_id1, $box ); // add new price	
} elseif ( $isRow !== true && $box > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id1, $box ); // add new price	
}

$uom_id2 = 2;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id2 );
if ( $isRow == true && $kilo > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id2, $kilo );	
	insertCostPrice( $conn, $ptid, $uom_id2, $kilo );
} elseif ( $isRow !== true && $kilo > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id2, $kilo );
}

$uom_id3 = 3;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id3 );
if ( $isRow == true && $punnet > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id3, $punnet );	
	insertCostPrice( $conn, $ptid, $uom_id3, $punnet );
} elseif ( $isRow !== true && $punnet > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id3, $punnet );
}

$uom_id4 = 4;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id4 );
if ( $isRow == true && $bunch > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id4, $bunch );	
	insertCostPrice( $conn, $ptid, $uom_id4, $bunch );
} elseif ( $isRow !== true && $bunch > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id4, $bunch );
}

$uom_id5 = 5;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id5 );
if ( $isRow == true && $single > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id5, $single );	
	insertCostPrice( $conn, $ptid, $uom_id5, $single );
} elseif ( $isRow !== true && $single > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id5, $single );
}

$uom_id6 = 6;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id6 );
if ( $isRow == true && $tray > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id6, $tray );
	insertCostPrice( $conn, $ptid, $uom_id6, $tray );	
} elseif ( $isRow !== true && $tray > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id6, $tray );
}

$uom_id7 = 7;
$isRow = isVarietyCostPrice( $conn, $ptid, $uom_id7 );
if ( $isRow == true && $bag > 0 ){
	updateCostPrice( $conn, $ptid, $uom_id7, $bag );
	insertCostPrice( $conn, $ptid, $uom_id7, $bag );		
} elseif ( $isRow !== true && $bag > 0 ){	
	insertCostPrice( $conn, $ptid, $uom_id7, $bag );
}

header("location: production.php");
?>