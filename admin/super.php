<?php
include 'sec.layer.php';

if( isset( $_GET['action'] ) ){
	if( $_GET['action'] == 'customerorders' ){
		
		$oi = $conn->query("TRUNCATE `order_items`");
		$oi->execute();
		echo 'Items removed : ' . $oi->rowcount();
		/*$o = $conn->query("SET FOREIGN_KEY_CHECKS = 0; 
							TRUNCATE `orders`; 
							SET FOREIGN_KEY_CHECKS = 1;");*/
		/*$o = $conn->query("DELETE FROM `orders`");
		$o->execute();
		echo '<br>Orders removed : ' . $o->rowcount();*/
		
	} elseif ( $_GET['action'] == 'purchaseorders' ){
		$oi = $conn->query("TRUNCATE `purchaseorder_items`");
		$oi->execute();
		echo 'Purchase Order Items removed : ' . $oi->rowcount();
		/*$o = $conn->query("SET FOREIGN_KEY_CHECKS = 0; 
							TRUNCATE `orders`; 
							SET FOREIGN_KEY_CHECKS = 1;");*/
	/*	$o = $conn->query("DELETE FROM `purchaseorders`");
		$o->execute();
		echo '<br>Purchase Orders removed : ' . $o->rowcount();	*/
	} elseif ( $_GET['action'] == 'categories' ){
		echo 'Categories Truncated';	
	} elseif ( $_GET['action'] == 'products' ){
		echo 'Products Truncated';	
	} elseif ( $_GET['action'] == 'varieties' ){
		echo 'Varieties Truncated';	
	} else {
		echo "Nothing to do";
	}	
}


?>