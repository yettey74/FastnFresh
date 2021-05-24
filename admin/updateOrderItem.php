<?php
include 'sec.layer.php';

$ptid = ( $_GET['ptid'] )? $_GET['ptid'] : '';
$oid = ( $_GET['oid'] )? $_GET['oid'] : '';

/*
if ( isset( $_POST['itemreplacement'] ) ){
	updateOrderStatus( $conn, $order_id, '4' );	
	header('location: deliveryfloor.php?oid=' . $oid );		
}

if ( isset( $_POST['itemdelivered'] ) ){
	updateOrderItemStatus( $conn, $order_id, '3' );
	
	/*if ( isAnymoreToDeliver( $conn, $ptid, $oid) !== true ){
		updateOrderStatus( $conn, $oid, 'Delivery' );
	} else {
		header('location: deliveryfloor.php?oid=' . $oid );	
	}*/
	// header('location: shop.php?oid=' . $oid );	
	//header('location: deliveryfloor.php?oid=' . $oid );	
//}
	
if ( isset( $_POST['unpackItem'] ) ){
	updateOrderStatus( $conn, $order_id, '0' );
	header('location: packingfloor.php?oid=' . $oid );	
}

/*if ( isset( $_GET['itempacked'] ) ){
	
	updateOrderItemStatus( $conn, $oid, $ptid, '1' );
	
	if ( isAnymoreToPack( $conn, $ptid, $oid) !== true ){
		updateOrderStatus( $conn, $oid, 'Delivery' );	
	} else {
		header('location: packingfloor.php?oid=' . $oid );	
	}
	
	header('location: shop.php');
}
*/
if ( isset( $_GET['action'] ) ){
	
	if( $_GET['action'] == 'removeItem' ){
		updateOrderItemStatus( $conn, $oid, $ptid, '1' );
		header('location: packingfloor.php?oid=' . $oid );
		
	} elseif( $_GET['action'] == 'itempacked') {
		updateOrderItemStatus( $conn, $oid, $ptid, '2' );
		
		if( isAnymoreToPack( $conn, $oid ) == 0 ){
			updateOrderStatus( $conn, $oid, 'Delivery' );
			header('location: shop.php?oid=' . $oid );
		} else {
			header('location: packingfloor.php?oid=' . $oid );
		}		
		
	} elseif ( $_GET['action'] == 'itemdelivered' ){
		updateOrderItemStatus( $conn, $oid, $ptid, '3' );
		
		if( isAnymoreToDeliver( $conn, $oid) == 0 ){
			updateOrderStatus( $conn, $oid, 'Completed' );
			header('location: shop.php?oid=' . $oid );
		} else {
			header('location: deliveryfloor.php?oid=' . $oid );
		}
		
	} elseif ( $_GET['action'] == 'undeliverItem' ){
		updateOrderItemStatus( $conn, $oid, $ptid, '2' );
		header('location: deliveryfloor.php?oid=' . $oid );
			
		
	} elseif ( $_GET['action'] == 'unavailableItem' ){
		updateOrderItemStatus( $conn, $oid, $ptid, '7' );
		header('location: packingfloor.php?oid=' . $oid );
		
	}
}
?>