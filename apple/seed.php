<?php
function cerealise( $flake ){
	return $str = implode ("SEPARATOR", $flake);
}

function getCartptids( $conn, $cart ){
	
	$itemArray = array();
	
	if( $cart->contents() > 0 ){
		
		$items = $cart->contents();
		
		foreach( $items as $key=>$value ){
			if ( $key == "id" ){
				array_push( $value, $itemArray);
			}
		}
	}
	
	return $itemArray;
}
	
function categoryHasVariety( $conn, $cid ){
	$q = $conn->query("SELECT COUNT(*) AS count FROM `producttype` WHERE `cid` = '$cid' ");
	$q->execute();
	$row = $q->fetch();
	
	return $row['count'];		
}

function getMinimumPriceandUom( $conn, $ptid ){
	$q = $conn->query("SELECT cost_price, uom_id
						FROM product_cost_price
						WHERE cost_price = ( SELECT MIN(cost_price) 
											 FROM product_cost_price ) 
						&& `enddate` IS NULL ");	
	$row = $q->fetch();
	return array( $row['uom_id'] , $row['cost_price']);	
}

/*function getMinimumUom( $conn, $ptid )	{
	$q = $conn->query("SELECT uom_id FROM `product_cost_price` WHERE `ptid` = '$ptid' && `enddate` IS NULL && `cost_price` = MIN('cost_price') ");	
	$row = $q->fetch();
	return $row['uom_id'];	
}*/

function getMinimumPrice( $conn, $ptid ){
	$q = $conn->query("SELECT MIN(`cost_price`) AS min_price FROM `product_cost_price` WHERE `ptid` = '$ptid' && `enddate` IS NULL ");	
	$row = $q->fetch();
	return $row['min_price'];	
}

function getUomAndPrices( $conn, $ptid ){
	$array = array();
	$q = $conn->query("SELECT `uom_id`, `cost_price` FROM `product_cost_price` WHERE `ptid` = '$ptid' && `enddate` IS NULL ");	
	foreach( $q as $r ){
		$array[$r['uom_id'] ] = $r['cost_price'];
	}
	return $array;
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
	
	return $row['uomLong'];	
}

function isPrice( $conn, $ptid ){
	$q = $conn->query("SELECT COUNT(*) AS count FROM `product_cost_price` WHERE `ptid` = '$ptid' && `endDate` IS NULL");
	$q->execute();
	$row = $q->fetch();
	
	return $row['count'];
}
function getUom_price( $conn, $uom_id, $ptid ){
	$q = $conn->query( "SELECT cost_price FROM `product_cost_price` WHERE `ptid` = '$ptid' && `uom_id` = '$uom_id' && `enddate` IS NULL");
	$q->execute();
	$row = $q->fetch();
	
	return $row['cost_price'];
}

function getSpecialCount( $conn ){
	$q = $conn->query("SELECT COUNT(*) AS `count` FROM `special`");
	$row = $q->fetch();	
	return $row['count'];	
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



function isVarietyCostPrice( $conn, $ptid, $uom_id ){
	
	$q = $conn->query("SELECT COUNT(*) AS count FROM `product_cost_price` WHERE `ptid` = '$ptid' && `uom_id` = '$uom_id' && `endDate` IS NULL ");
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
	$sql = " WHERE `cid` = '" . $$category['cid'] . "'";	
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