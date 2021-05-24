<?php
include 'db.php';
include 'apple/seed.php';

$q = $conn->query("SELECT COUNT(*) as count FROM `producttype`");
$r = $q->fetch();
$count = $r['count'];
echo $count. '<br>';

for( $i = 1; $i <= $count; $i++ ){
	echo '#' . $i;
	
	$q = $conn->query("SELECT `ptid`, `box`, `kilo`, `punnet`, `bunch`, `single`, `tray`, `bag` FROM `producttype` WHERE `ptid` = '$i'");
	
	$r = $q->fetch();

	$ptid = $r['ptid'];
	
	if ( $ptid == $i && $ptid > 0 && $ptid != '' && $ptid != NULL ){
	
		$box = $r['box'];
		$uom_id1 = 1;
		//$isRow = isVarietyUom( $conn, $ptid, $uom_id1 );
		//echo $isRow. '<br>';
		( $box > 0 ) ? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id1', '$box', Now() )") : '';
		
				
		$kilo = $r['kilo'];
		$uom_id2 = 2;
		( $kilo > 0 )? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id2', '$kilo', Now() )") : '';

		$punnet = $r['punnet'];
		$uom_id3 = 3;		
		( $punnet > 0 ) ? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id3', '$punnet', Now() )") : '';

		$bunch = $r['bunch'];
		$uom_id4 = 4;		
		( $bunch > 0 ) ? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id4', '$bunch', Now() )") : '';

		$single = $r['single'];
		$uom_id5 = 5;	
		( $single > 0 ) ? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id5', '$single', Now() )") : '';

		$tray = $r['tray'];
		$uom_id6 = 6;	
		( $tray > 0 ) ? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id6', '$tray', Now() )") : '';

		$bag = $r['bag'];
		$uom_id7 = 7;	
		( $bag > 0 ) ? $conn->query("INSERT INTO `product_cost_price` (`ptid`, `uom_id`, `cost_price`, `startDate`) VALUES ('$ptid', '$uom_id6', '$bag', Now() )") : '';/**/
	}
}

?>