<?php
function cerealise( $flake ){
	return $str = implode ("SEPARATOR", $flake);
}

function getEmployeeName( $conn,  $emp_id){
	$q = $conn->query("SELECT `employee_firstName`, `employee_lastName` FROM `employee` WHERE `emp_id` = '$emp_id'");
	$row = $q->fetch();
	return $row['employee_firstName'] . ' ' . $row['employee_lastName'] ;
}

function totalAssetValue( $conn ){
	$q = $conn->query("SELECT SUM(`current_value`) as `total` FROM `assets`");
	$row = $q->fetch();
	return $row['total'];
}
function checkArray ( $ptid, $array ){
	return in_array( $ptid, $array );	
}

function getUomAndPrices( $conn, $ptid ){
	$array = array();
	$q = $conn->query("SELECT `uom_id`, `cost_price` FROM `product_cost_price` WHERE `ptid` = '$ptid' && `enddate` IS NULL ");	
	foreach( $q as $r ){
		$array[$r['uom_id'] ] = $r['cost_price'];
	}
	return $array;
}

function getCount( $conn, $table ){
	$q = $conn->query("SELECT * FROM `$table`");
	$q->execute();
	return $q->rowcount();
}

function getActiveCount( $conn, $table ){
	$q = $conn->prepare("SELECT * FROM `$table` WHERE `status` = '1'");
	$q->execute();
	return $q->rowcount();
}

function updateOrderItemStatus( $conn, $oid, $ptid, $status ){
	$q = $conn->prepare( "UPDATE `order_items` SET `status`= ? WHERE `order_id` = ? && `ptid` = ?" );
	$q->execute( array( $status, $oid, $ptid ) );	
	return $q->rowcount();
}

function updateOrderStatus( $conn, $oid, $status ){
	$q = $conn->prepare( "UPDATE `orders` SET `status`= ? WHERE `id` = ? " );
	$q->execute( array( $status, $oid ) );	
	return $q->rowcount();	
}

function isAnymoreToPack( $conn, $oid){
	$q = $conn->query("SELECT * FROM order_items WHERE `order_id` = '$oid' && `status`='1'");
	$q->execute();
	return $q->rowcount();
}

function isAnymoreToDeliver( $conn, $oid){
	$q = $conn->query("SELECT * FROM order_items WHERE `order_id` = '$oid' && `status`='2' ");
	$q->execute();
	return $q->rowcount();	
}

function  getPrice( $conn, $ptid, $oid ){
	$q = $conn->query( "SELECT `cost_price` FROM `order_items` WHERE `ptid` = '$ptid' && `order_id` = '$oid'");
	$q->execute();
	$row = $q->fetch();
	return $row['quantity'];		
}

function  getorderItemAmount( $conn, $ptid, $oid ){
	$q = $conn->query( "SELECT `quantity` FROM `order_items` WHERE `ptid` = '$ptid' && `order_id` = '$oid'");
	$q->execute();
	$row = $q->fetch();
	return $row['quantity'];		
}

function  getorderItemUom( $conn, $ptid, $oid ){
	$q = $conn->query( "SELECT `uom_id` FROM `order_items` WHERE `ptid` = '$ptid' && `order_id` = '$oid'");
	$q->execute();
	$row = $q->fetch();
	return $row['uom_id'];
}

function getOrderCustomerID( $conn, $order_id ){
	$q = $conn->query( "SELECT `customer_id` FROM `orders` WHERE `id` = '$order_id'");
	$q->execute();
	$row = $q->fetch();
	return $row['customer_id'];	
}

function getFirstName( $conn, $customer_id ){
	$q = $conn->query( "SELECT `first_name` FROM `fnfcustomer` WHERE `customer_id` = '$customer_id'");
	$q->execute();
	$row = $q->fetch();
	return $row['first_name'];		
}

function getLastName( $conn, $customer_id ){
	$q = $conn->query( "SELECT `last_name` FROM `fnfcustomer` WHERE `customer_id` = '$customer_id'");
	$q->execute();
	$row = $q->fetch();
	return $row['last_name'];		
}

function getAddress( $conn, $customer_id ){
	$q = $conn->query( "SELECT * FROM `fnfcustomer` WHERE `customer_id` = '$customer_id'");
	$q->execute();
	$row = $q->fetch();
	$billAddress1 = $row['billAddress1'];
	$billAddress2 = $row['billAddress2'];
	$billFlat = $row['billFlat'];
	$billStreetNumber = $row['billStreetNumber'];
	$billStreet = $row['billStreet'];
	$billStreetType = $row['billStreetType'];
	$billSuburb = $row['billSuburb'];
	$billCity = $row['billCity'];
	$billState = $row['billState'];
	$billPostcode = $row['billPostcode'];
	$billAddress = !empty($billFlat)?? $billFlat . ' / ';
	$billAddress .= $billStreetNumber . ' ' . $billStreet . ' ' . $billStreetType;					
	$billAddress .= !empty($billSuburb)? ', ' . $billSuburb : '';
	$billAddress .= !empty($billCity)? ', ' . $billCity : '';
	$billAddress .= ', ' . $billState . ', ' . $billPostcode;
	return $billAddress;		
}

function getPhone( $conn, $customer_id ){
	$q = $conn->query( "SELECT `phone` fROM `fnfcustomer` WHERE `customer_id` = '$customer_id'");
	$q->execute();
	$row = $q->fetch();
	return $row['phone'];		
}

function pendingCount( $conn ){
	$q = $conn->prepare("SELECT * FROM orders WHERE status='Pending'");
	$q->execute();
	return $q->rowcount();
}

function totalPackCountYesterday( $conn ){
	$q = $conn->prepare("SELECT * FROM `orders` WHERE DATE(`created_on`) = CURDATE()-1");
	$q->execute();
	return $q->rowcount();
}

function totalPackCountToday( $conn ){
	$q = $conn->prepare("SELECT * FROM `orders` WHERE DATE(`created_on`) = CURDATE()");
	$q->execute();
	return $q->rowcount();
}

function totalPackCountTomorrow( $conn ){
	$q = $conn->prepare("SELECT * FROM `orders` WHERE DATE(`created_on`) = CURDATE()+1");
	$q->execute();
	return $q->rowcount();
}

function deliveryCount( $conn ){
	$q = $conn->prepare("SELECT * FROM orders WHERE status='Delivery'");
	$q->execute();
	return $q->rowcount();
}

function completeCount( $conn ){
	$pending = $conn->prepare("SELECT * FROM orders WHERE status='Completed'");
	$pending->execute();
	return $pending->rowcount();
}

function cancelledCount( $conn ){
	$pending = $conn->prepare("SELECT * FROM orders WHERE status='Cancelled'");
	$pending->execute();
	return $pending->rowcount();
}

function ytdSales( $conn, $year ){
	$q = $conn->query( "SELECT SUM(grand_total) AS total FROM orders WHERE `created_on` BETWEEN '$year-01-01' AND '$year-12-31'");
	$q->execute();
	$row = $q->fetch();
	return $row['total'];	
}

function getVarietyName( $conn, $ptid ){
	$q = $conn->query("SELECT `ptName` FROM `producttype` WHERE `ptid` = '$ptid'");
	$q->execute();
	$row = $q->fetch();
	return $row['ptName'];	
}

function totalSales( $conn ){
	$q = $conn->prepare("SELECT * FROM orders");
	$q->execute();
	return $rowcount = $q->rowcount();
}

function getCustomerName( $conn, $customer_id ){
	$q = $conn->query("SELECT `first_name`, `last_name` FROM `fnfcustomer` WHERE `customer_id` = '$customer_id'");
	$q->execute();
	$row = $q->fetch();
	
	return $row['first_name'] . ' ' . $row['last_name'];
}

function getSizeTitle( $conn, $size_id ){
	$q = $conn->query("SELECT `size_title` FROM `sizes` WHERE `size_id` = '$size_id'");
	$q->execute();
	$row = $q->fetch();
	
	return $row['size_title'];					  
}

function getSpecialCount ( $conn ){
	$q = $conn->query("SELECT COUNT(*) AS `count` FROM `special`");
	$q->execute();
	$row = $q->fetch();
	
	return $row['categoryName'];	
}

function getCategoryName( $conn, $cid ){
	$q = $conn->query("SELECT `categoryName` FROM `category` WHERE `cid` = '$cid' ");
	$q->execute();
	$row = $q->fetch();
	
	return $row['categoryName'];		
}

function getCategoryimage( $conn, $cid ){
	$q = $conn->query("SELECT `categoryImage` FROM `category` WHERE `cid` = '$cid' ");
	$q->execute();
	$row = $q->fetch();
	
	return $row['categoryImage'];		
}

function getUom_ids( $conn ){
	$array = [];
	$q = $conn->query( "SELECT uom_id FROM `uom`" );
	foreach( $q as $r ){
		$array[] = $r['uom_id'];
	}
	return $array;
}

function getUomLong( $conn, $uom_id ){
	$q = $conn->query("SELECT `uomLong` FROM `uom` WHERE `uom_id` = '$uom_id' ");
	$q->execute();
	$row = $q->fetch();
	
	return strtolower($row['uomLong']);	
}


function isVarietyCostPrice( $conn, $ptid, $uom_id ){
	
	$q = $conn->query("SELECT COUNT(*) AS count FROM `product_cost_price` WHERE `ptid` = '$ptid' && `uom_id` = '$uom_id' && `endDate` = 'NULL' ");
	return ($q->fetchColumn())?  TRUE : FALSE;
}

function insertCostPrice( $conn, $ptid, $uom_id, $price ){
	$q = $conn->query("INSERT INTO `product_cost_price` (`po_id`, `ptid`, `uom_id`, `cost_price`, `startDate`) 
						VALUES ('1', '$ptid', '$uom_id', '$price', Now() )");
	return ($q->fetchColumn())?  TRUE : FALSE;
}

function updateCostPrice ( $conn, $ptid, $uom_id, $price ){	
	$q = $conn->query("UPDATE `product_cost_price` SET `endDate` = NOW() WHERE `ptid` = '$ptid' && `uom_id` = '$uom_id'");
	return ( $q->fetchColumn() )? true : false ;	
}

function getRRP( $conn, $ptid, $uom_id ){
	$price = 0;
	$q = $conn->query("SELECT `cost_price` FROM `product_cost_price` WHERE `ptid` = '$ptid' && `uom_id` = '$uom_id' && endDate IS NULL");
	foreach( $q as $r ){
		$price = $r['cost_price'];
	}
	
	return $price;
}

function insertLog( $conn, $event ){
	$str = print_r($event);
	
	$sql = $conn->query( "INSERT INTO `logevent` ( event ) VALUES( $str )" );
	
	// echo $sql;
	
	if( $sql !== FALSE ){
		return TRUE;
	}
	
	// return ( $conn->query("INSERT INTO `logevent` ( event ) VALUES( $str ) ") !== FALSE )? TRUE : FALSE;		
}

function insertLogError( $conn, $event ){
	$sql = $conn->query( "INSERT INTO `logerror` ( event ) VALUES( $event )" );
	
	if( $sql !== FALSE ){
		return TRUE;
	}
	
	return FALSE;	
}

function wc_upload_image_return_url($image_submit) {
	if(empty($image_submit) && $image_submit['error'] != 0) {
		return _( "Nothing uploaded" );
	}
	
	$fileType = $image_submit["type"];
	$fileSize = $image_submit["size"];

	if( $fileSize/1024 > "2048" ) {
		//Its good idea to restrict large files to be uploaded.
		return _( "Filesize is not correct it should equal to 2 MB or less than 2 MB." );
		exit();
	} //FileSize Checking

	if(
		$fileType != "image/png" &&
		$fileType != "image/gif" &&
		$fileType != "image/jpg" &&
		$fileType != "image/jpeg"
		/*$fileType != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
		$fileType != "application/zip" &&
		$fileType != "application/pdf"*/
	) {
		return _("Sorry this file type is not supported we accept only : Jpeg, Gif, PNG");
		exit();
		} //file type checking ends here.
	
	$filename 	= $image_submit["name"];
	//$upFile 	= ROOT_DIR."/images/" . $filename;
	$upFile = $filename;
	
	if(is_uploaded_file($image_submit["tmp_name"])) {
		if(!move_uploaded_file($image_submit["tmp_name"], $upFile)) {
			return _("");
			exit;
		} else {
			$return_file = $filename;
		}
	} else {
		return _("Problem: Possible file upload attack. Filename: ").$image_submit['name'];
		exit;
	}
	return $return_file;
}


/*********************************************
CATEGORY FUNCTIONS
*********************************************/
function categoryName( $conn, $category ){
	return ( $conn->query("INSERT INTO `category` (`categoryName`, `status`) VALUES ('" . $category['categoryName'] . "', '1')") !== FALSE )? TRUE : FALSE;	
}

function updateCategory( $conn, $category ){
	
	$sql = "UPDATE `category` SET ";
	foreach( $variety as $key=>$value){
		$sql .= '`' . $key . '` = `' . $value . '`';
	}
	$sql = " WHERE `cid` = '" . $category['cid'] . "'";	
	$result = $conn->query($sql);
	
	if( $result !== FALSE ){
		return TRUE;
	}
	return FALSE;
}

function categoryStatus( $conn, $category ){
	return ( $conn->query("UPDATE `category` SET `status` = '1' WHERE `cid` = '" . $category['cid'] . "'") !== FALSE )? TRUE : FALSE;
}

function categoryArchive( $conn, $category ){
	return ( $conn->query("UPDATE `category` SET `archive` = '1' WHERE `cid` = '" . $category['pcidid'] . "'") !== FALSE )? TRUE : FALSE;
}

/*********************************************
PRODUCT FUNCTIONS
*********************************************/
function addProduct( $conn, $product ){
	$addProduct = "INSERT INTO `product` (`productName`, `productBlurb`, `status`, `archive`, `cid`) VALUES ( ";
	foreach( $variety as $key=>$value){
		$addVariety .= '`' . $key . '` = `' . $value . '`';
	}
	$addVariety = ")";
	$result = $conn->query($addVariety);
	
	if( $result !== FALSE ){
		return TRUE;
	}
	
	return FALSE;
	
}

function updateProduct( $conn, $product ){
		
	$updateProduct = "UPDATE `product` SET ";
	foreach( $variety as $key=>$value){
		$updateProduct .= '`' . $key . '` = `' . $value . '`';
	}
	$updateProduct = " WHERE `pid` = '" . $product['pid'] . "'";	
	$result = $conn->query($updateProduct);
	
	if( $result !== FALSE ){
		return TRUE;
	}
	return FALSE;
}

function updateProductStatus( $conn, $product ){
	( $conn->query("UPDATE `product` SET `status` = '1' WHERE `pid` = '" . $product['pid'] . "'") !== FALSE )? TRUE : FALSE;
}

function archiveProduct( $conn, $product ){	
	( $conn->query("UPDATE `product` SET `archive` = '1' WHERE `pid` = '" . $product['pid'] . "'") !== FALSE )? TRUE : FALSE;
}

/*********************************************
VARIETY FUNCTIONS
*********************************************/
function addVariety( $conn, $variety ){
	$addVariety = "INSERT INTO `variety` (`ptname`, `kilo`, `ptblurb`, `ptreceipe`, `status`, `pid`, `cid`) VALUES ( ";
	foreach( $variety as $key=>$value){
		$addVariety .= '`' . $key . '` = `' . $value . '`';
	}
	$addVariety = ")";
	$result = $conn->query($addVariety);
	
	if( $result !== FALSE ){
		return TRUE;
	}
	
	return FALSE;
}

function updateVariety( $conn, $variety ){
	
	$updateVariety = "UPDATE `producttype` SET ";
	foreach( $variety as $key=>$value){
		$updateVariety .= '`' . $key . '` = `' . $value . '`';
	}
	$updateVariety = " WHERE `ptid` = '" . $variety['ptid'] . "'";	
	$result = $conn->query($updateVariety);
	
	if( $result !== FALSE ){
		return TRUE;
	}
	
	return FALSE;
}

function varietyStatus( $conn, $variety ){
		
	$varietyStatus = $conn->query("UPDATE `variety` SET `status` = '1' WHERE `ptid` = '" . $variety['ptid'] . "'");	
	
	if( $varietyStatus !== FALSE ){
		return TRUE;
	}
	return FALSE;
}

function archiveVariety( $conn, $variety ){
	
	$archiveVariety = $conn->query("UPDATE `variety` SET `archive` = '1' WHERE `ptid` = '" . $variety['ptid'] . "'");	
	
	if( $archiveVariety !== FALSE ){
		return TRUE;
	}
	return FALSE;
}

/*********************************************
ORDER FUNCTIONS
*********************************************/
function orderStatus( $conn, $action ){
	$orderStatus = $conn->query("UPDATE `orders` SET `status` = '" . $order['action'] . "' WHERE `id` = '" . $order['id'] . "'");
	
	if( $orderStatus !== FALSE ){
		return TRUE;
	}
	return FALSE;
}

function orderStatus1( $conn, $order ){
	$updateOrderQ = $conn->query("UPDATE `orders` SET `status` = 'Delivery' WHERE `id` = '" . $order['id'] . "'");
	if( $updateOrderQ !== FALSE ){
		return TRUE;
	}
	return FALSE;
}


?>