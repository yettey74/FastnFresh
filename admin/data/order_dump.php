<?php
include '../sec.layer.php';

date_default_timezone_set("Australia/Sydney");//set you countary name from below
for ( $w = -10; $w <= 10; $w++){
	
	$orderLength = rand(10,30);
	$unixDate = date("Y-m-d H:i:s", strtotime("+$w day"));
	//echo $unixDate->format('Y-m-d H:i:s');

	//$statusArray = array( "Pending", "Delivery", "Completed", "Cancelled" );
	//$statusArray = array( "Pending", "Delivery", "Completed" );
	//$statusArray = array( "Pending", "Delivery" );
	$statusArray = array( "Pending" );
/*	$fruitArray = array();
	$vegetableArray = array();
	$herbArray = array();
	$spiceArray = array();
	$eggsArray = array();
*/
	
	for( $i = 1; $i <= $orderLength; $i++ ){
		$customer_id = rand(1,300) ;
		//$grand_total = rand(30,300);	
		$status = $statusArray[ rand( 0, sizeof( $statusArray ) -1 ) ];
		//echo 'Inserting into Database';
		$q = $conn->query(" INSERT INTO `orders` ( `customer_id`, `grand_total`, `created_on`, `status`) VALUES ('$customer_id', '0.00', '$unixDate', '$status')");

		// now insert order items into order_items
		// get last insert id
		$order_id = $conn->lastInsertId();
		$getUomAndPricesArray = array();
		$ptidArray = array();
		$checkArray = true;
		$itemListLength = rand(1, 3 );

		for ( $k = 1; $k <= $itemListLength; $k++ ){	
			$uom_id = 0;
			$price= 0.00;
			$ptid = rand(1, 6);
			$checkArray = checkArray ( $ptid, $ptidArray );
			//echo 'Check Array : ' . $checkArray . '<br>';
			while( $checkArray === true ){
				$ptid = rand(1, 6);
				$checkArray = checkArray ( $ptid, $ptidArray );
				if( $checkArray === false ){
					array_push($ptid, $ptid);
				}
			}

			$quantity = $quantity = rand( 5, 10 );
			$getUomAndPricesArray = getUomAndPrices( $conn, $ptid );
			$uom_id_temp = rand( 0, sizeof( $getUomAndPricesArray ) -1 );
			$counter = 0;
			foreach ($getUomAndPricesArray as $key => $value){
				if($counter == $uom_id_temp){
					$uom_id = $key;
					$price = $value;
				}
				$counter++;
			}

			$statusQ = $conn->query( "SELECT `status` FROM `orders` WHERE `id` = '$order_id'");
			$statusR = $statusQ->fetch();

			if( $statusR['status'] == 'Completed' ){
				$status = 4;
			} elseif( $statusR['status'] == 'Delivery' ){
				$status = 3;
			} else {
				$status = 1;
			}
			$q = $conn->query( "INSERT INTO `order_items` (`order_id`, `ptid`, `quantity`, `price`, `uom_id`, `status`) VALUES ('$order_id', '$ptid', '$quantity', '$price', '$uom_id', '$status')");		
		}

		$total = $conn->query(" SELECT SUM(`price`) AS `grand_total` FROM `order_items` WHERE `order_id` = '$order_id'");
		$thisTotal = $total->fetch();
		$grand_total = $thisTotal['grand_total'];
		$update = $conn->query( "UPDATE `orders` SET `grand_total` = '$grand_total' WHERE `id` = '$order_id'");		
	}

	echo 'INSERT ORDERS operation complete<br>';
}

		
		
		
?>