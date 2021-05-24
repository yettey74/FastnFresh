<?php

session_start();
include('db.php');
include('seed.php');
setlocale(LC_MONETARY, 'en_AU.UTF-8');

/*********************************************
ADD NEW CATEGORY
*********************************************/
if ( !empty( $_POST[ 'category-add-submit' ] ) ){
	$categoryName = isset( $_POST[ 'categoryName' ] )? $_POST[ 'categoryName' ] : '';
	$addCategory = $conn->query("INSERT INTO `category` (`categoryName`) VALUES ('$categoryName')");
	
	if( $addCategory !== FALSE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Category has been added to the catalog.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Category failed to be added to the catalog.</div>
		</div>
		';		
	}
}

/*********************************************
UPDATE CATEGORY NAME
*********************************************/
if ( !empty( $_POST[ 'category-update-submit' ] ) ){
	$cid = isset( $_POST[ 'cid' ] )? $_POST[ 'cid' ] : '';	
	$categoryname = isset( $_POST[ 'categoryname' ] )? $_POST[ 'categoryname' ] : '';	
	$updateCategoryNameQ = "UPDATE `category` SET `categoryName` = '$categoryname' WHERE `cid` = '$cid'";
	if( $conn->query($updateCategoryNameQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Category has been updated.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Category failed to be updated.</div>
		</div>
		';		
	}
}

/*********************************************
UPDATE CATEGORY STATUS
*********************************************/
if ( isset( $_GET[ 'cid' ] ) && isset( $_GET[ 'status' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'update' ){
	//echo '<script> alert("'.$_GET[ 'status' ].'");</script>';
	$cid = strip_tags( trim( $_GET[ 'cid' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );	
	
	if ( $status == '0' ){
		$sql = "UPDATE `category` SET `status` = '1' WHERE `cid` = '$cid'";		
	} else {
		$sql = "UPDATE `category` SET `status` = '0' WHERE `cid` = '$cid'";		
	} 
	
	if( $conn->query($sql) == TRUE) {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Category Status has been updated.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Category Status Failed to updated.</div>
		</div>
		';
	}
}

/*********************************************
DELETE CATEGORY
*********************************************/
if ( isset( $_GET[ 'cid' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'delete' ){
	$cid = isset( $_GET[ 'cid' ] )? $_GET[ 'cid' ] : '';
	$archivecategoryQ = "UPDATE `category` SET `archive` = '1' WHERE `cid` = '$cid'";
	
	if( $conn->query($archivecategoryQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Category Has been archived successfully.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Category failed to archived.</div>
		</div>
		';		
	}	
}

/*********************************************
UPDATE PRODUCT STATUS
*********************************************/
if ( isset( $_GET[ 'pid' ] ) && isset( $_GET[ 'status' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'update' ){
	//echo '<script> alert("'.$_GET[ 'status' ].'");</script>';
	$pid = strip_tags( trim( $_GET[ 'pid' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );	
	
	if ( $status == '0' ){
		$sql = "UPDATE `product` SET `status` = '1' WHERE `pid` = '$pid'";		
	} else {
		$sql = "UPDATE `product` SET `status` = '0' WHERE `pid` = '$pid'";		
	} 
	
	if( $conn->query($sql) == TRUE) {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Product Status has been updated.</div>
			' . $sql . '
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Product Status Failed to updated.</div>
		</div>
		';
	}
} else {
	// we have not passd the right data
}

/*********************************************
UPDATE PRODUCT TYPE STATUS
*********************************************/
if ( isset( $_GET[ 'id' ] ) && isset( $_GET[ 'status' ] ) && isset( $_GET[ 'action' ] ) ){
	//echo '<script> alert("'.$_GET[ 'status' ].'");</script>';
	$ptid = strip_tags( trim( $_GET[ 'id' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );
	
	if ( $status == '0' ){
		$sql = "UPDATE `producttype` SET `status` = '1' WHERE `ptid` = '$ptid'";		
	} else {
		$sql = "UPDATE `producttype` SET `status` = '0' WHERE `ptid` = '$ptid'";		
	} 
	
	if( $conn->query($sql) == TRUE) {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Variety Status has been updated.
			' . $sql . '</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Variety Status Failed to updated.</div>
		</div>
		';
	}
} else {
	// we have not passd the right data
}

/*********************************************
UPDATE PRODUCT TYPE UOM
*********************************************/
if ( isset( $_GET[ 'ptid' ] ) && isset( $_GET[ 'uom' ] ) && isset( $_GET[ 'status' ] ) ){
	$ptid = strip_tags( trim( $_GET[ 'ptid' ] ) );
	$status = strip_tags( trim( $_GET[ 'status' ] ) );
	
	if ( $status == '0' ){
		$sql = "UPDATE `producttype` SET `$uom` = '0' WHERE `ptid` = '$ptid'";		
	} else {
		$sql = "UPDATE `producttype` SET `$uom` = '1' WHERE `ptid` = '$ptid'";		
	} 
	
	if( $conn->query($sql) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Variety unit of measure has been updated.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Variety unit of measure Failed to updated.</div>
		</div>
		';
	}
} else {
	// we have not passd the right data
}


/*********************************************
PRODUCT ADD, UPDATE, DELETE
*********************************************/
/*********************************************
ADD PRODUCT
*********************************************/
if ( !empty( $_POST[ 'product-submit' ] ) ){
	$cid = isset( $_POST[ 'cid' ] )? $_POST[ 'cid' ] : '';
	$productname = isset( $_POST[ 'productname' ] )? $_POST[ 'productname' ] : '';
	$productblurb = isset( $_POST[ 'productblurb' ] )? $_POST[ 'productblurb' ] : '';
	$addProductQ = "INSERT INTO `product` (`productname`, `productBlurb`, `cid`) VALUES ('$productname', '$productblurb', '$cid' )";
	
	if( $conn->query($addProductQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Product has been added.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Product failed to be added.</div>
		</div>
		';
	}
	
}

/*********************************************
UPDATE PRODUCT NAME
*********************************************/
if ( !empty( $_POST[ 'productname-submit' ] ) ){
	$pid = isset( $_POST[ 'pid' ] )? $_POST[ 'pid' ] : '';
	$productname = isset( $_POST[ 'productname' ] )? $_POST[ 'productname' ] : '';
	$updateProductQ = "UPDATE `product` SET `productname` = '$productname' WHERE `pid` = '$pid'";
	
	if( $conn->query($updateProductQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Product name been updated.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Product name failed to updated.</div>
		</div>
		';
	}
	
}

/*********************************************
DELETE PRODUCT
*********************************************/
if ( isset( $_GET[ 'pid' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'delete' ){
	$pid = isset( $_GET[ 'pid' ] )? $_GET[ 'pid' ] : '';
	$archiveproductQ = "UPDATE `product` SET `archive` = '1' WHERE `pid` = '$pid'";
	
	if( $conn->query($archiveproductQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Product has been archived successfuly.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Product failed to be archived.</div>
		</div>
		';
	}
}
	
/*********************************************
UPDATE STATUS VARIETY
*********************************************/
if ( isset( $_GET[ 'ptid' ] ) && isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'delete' ){
	$ptid = isset( $_GET[ 'ptid' ] )? $_GET[ 'ptid' ] : '';
	$archiveproducttypeQ = "UPDATE `producttype` SET `status` = '0', `archive` = '1' WHERE `ptid` = '$ptid'";
	
	if( $conn->query($archiveproducttypeQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Variety status has been updated successfuly.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Variety status falied to updated.</div>
		</div>
		';
	}	
}
	
// UPDATE Product VARIETY
if ( !empty( $_FILES['ptimage'] ) && isset( $_POST[ 'ptimage-update' ] )){
	//echo '<script> alert("ptupdate submit clicked");</script>';
	$ptid = isset( $_POST[ 'ptid' ] )? $_POST[ 'ptid' ] : '';
	$ptimage = isset($_FILES['ptimage'])? wc_upload_image_return_url($_FILES['ptimage']) : '';	
	$updateImageQ = "UPDATE `producttype` SET `ptImage` = '$ptimage' WHERE `ptid` = '$ptid'";
	//echo $updateImageQ;
	if( $conn->query($updateImageQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Variety Image has been updated successfuly.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Variety Image falied to updated.</div>
		</div>
		';
	}
}

// UPDATE Product VARIETY
if ( !empty( $_POST[ 'ptupdate-submit' ] ) ){
	//echo '<script> alert("ptupdate submit clicked");</script>';
	$cid = isset( $_POST[ 'cid' ] )? $_POST[ 'cid' ] : '';
	$pid = isset( $_POST[ 'pid' ] )? $_POST[ 'pid' ] : '';
	$ptid = isset( $_POST[ 'ptid' ] )? $_POST[ 'ptid' ] : '';
	$kilo = isset( $_POST[ 'kilo' ] )? $_POST[ 'kilo' ] : '';
	$box = isset( $_POST[ 'box' ] )? $_POST[ 'box' ] : '';
	$punnet = isset( $_POST[ 'punnet' ] )? $_POST[ 'punnet' ] : '';
	$bunch = isset( $_POST[ 'bunch' ] )? $_POST[ 'bunch' ] : '';
	$single = isset( $_POST[ 'single' ] )? $_POST[ 'single' ] : '';
	$ptname = isset( $_POST[ 'ptname' ] )? $_POST[ 'ptname' ] : '';
	$ptblurb = isset( $_POST[ 'ptblurb' ] )? $_POST[ 'ptblurb' ] : '';
	$receipe = isset( $_POST[ 'ptreceipe' ] )? $_POST[ 'ptreceipe' ] : '';
	$ptstatus = isset( $_POST[ 'ptstatus' ] )? $_POST[ 'ptstatus' ] : '';
	
	$updateQ = "UPDATE `producttype` SET `ptname` = '$ptname', `kilo` = '$kilo', `box` = '$box', `punnet` = '$punnet', `bunch` = '$bunch',  `single` = '$single', `ptblurb` = '$ptblurb', `varietyRecipe` = '$receipe', `pid` = '$pid', `cid` = '$cid' WHERE `ptid` = '$ptid'";
		
	if( $conn->query($updateQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Variety has been updated successfuly.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Variety falied to updated.</div>
		</div>
		';
	}
}

// ADD PRODUCT VARIETY
if ( !empty( $_POST[ 'ptadd-submit' ] ) ){
	$cid = isset( $_POST[ 'categoryTypeGroup' ] )? $_POST[ 'categoryTypeGroup' ] : '';
	$pid = isset( $_POST[ 'productTypeGroup' ] )? $_POST[ 'productTypeGroup' ] : '';
	$kilo = isset( $_POST[ 'kilo' ] )? $_POST[ 'kilo' ] : '';
	$box = isset( $_POST[ 'box' ] )? $_POST[ 'box' ] : '';
	$punnet = isset( $_POST[ 'punnet' ] )? $_POST[ 'punnet' ] : '';
	$bunch = isset( $_POST[ 'bunch' ] )? $_POST[ 'bunch' ] : '';
	$ptname = isset( $_POST[ 'ptname' ] )? $_POST[ 'ptname' ] : '';
	$ptblurb = isset( $_POST[ 'ptblurb' ] )? $_POST[ 'ptblurb' ] : '';
	$ptreceipe = isset( $_POST[ 'ptreceipe' ] )? $_POST[ 'ptreceipe' ] : '';
	$ptstatus = isset( $_POST[ 'ptstatus' ] )? $_POST[ 'ptstatus' ] : '';
	
	$addQ = "INSERT INTO `producttype` (`ptname`, `kilo`, `ptblurb`, `ptreceipe`, `status`, `pid`, `cid`) VALUES ('$ptname', '$kilo', '$ptblurb', '$ptreceipe', '$ptstatus', '$pid', '$cid')";
		
	if( $conn->query($addQ) == TRUE ){
		echo '		
		<div class="col-md-12">
			<div class="alert alert-warning">Variety has been added successfuly to catalog.</div>
		</div>
		';
	} else {
		echo '		
		<div class="col-md-12">
			<div class="alert alert-danger">Variety falied to be added to catalog.</div>
		</div>
		';
	}
}

// Update status of order to delivery
if ( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == "delivery" ) {
	if ( isset( $_GET['oid'] ) ){
		$id = $_GET['oid'];
		
		// update order table status to delivery
		$updateOrderQ = "UPDATE `orders` SET `status` = 'Delivery' WHERE `id` = $id";		
		if( $conn->query($updateOrderQ) == TRUE ){
			echo '		
			<div class="col-md-12">
				<div class="alert alert-warning">Order ready for delivery.</div>
			</div>
			';
		} else {
			echo '		
			<div class="col-md-12">
				<div class="alert alert-danger">Order failed to updated, Please try again.</div>
			</div>
			';
		}
	} 	
}

// Update status of order to complete

if ( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == "complete" ) {
	if ( isset( $_GET['oid'] ) ){
		$id = $_GET['oid'];
		// update order table status to delivery
		$updateOrderCompleteQ = "UPDATE `orders` SET `status` = 'Completed' WHERE `id` = $id";
		if( $conn->query($updateOrderCompleteQ) == TRUE ){
			echo '		
			<div class="col-md-12">
				<div class="alert alert-warning">Order has been finalised.</div>
			</div>
			';
		} else {
			echo '		
			<div class="col-md-12">
				<div class="alert alert-danger">Order failed to be finalised, Please try again.</div>
			</div>
			';
		}
	} 	
} 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Admin</title>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/styleAdmin.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/search.css">
  <link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>	

	
	<style>
/* Formatting search box */
    .product-search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .product-search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
		text-color: black;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(top left, green, yellow);
		background-image: -o-linear-gradient(top left, green, yellow);
		background-image: linear-gradient(to bottom right, green, yellow);
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .product-search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
		filter:alpha(opacity=150); /* IE */
		-moz-opacity:1.5; /* Mozilla */
		opacity: 1.5; /* CSS3 */
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(left, green, yellow);
		background-image: -o-linear-gradient(left, green, yellow);
		background-image: linear-gradient(left, green, yellow);
    }
    .result p:hover{
        background: orange;
    }
	</style>
<style>
/* Formatting search box */
    .order-search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .order-search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
		text-color: black;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(top left, green, yellow);
		background-image: -o-linear-gradient(top left, green, yellow);
		background-image: linear-gradient(to bottom right, green, yellow);
    }
    .orderResult{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .order-search-box input[type="text"], .orderResult{
        width: 100%;
        box-sizing: border-box;
		filter:alpha(opacity=150); /* IE */
		-moz-opacity:1.5; /* Mozilla */
		opacity: 1.5; /* CSS3 */
    }
    /* Formatting result items */
    .orderResult p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(left, green, yellow);
		background-image: -o-linear-gradient(left, green, yellow);
		background-image: linear-gradient(left, green, yellow);
    }
    .orderResult p:hover{
        background: orange;
    }
</style>
<style>
/* Formatting search box */
    .customer-search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .customer-search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
		text-color: black;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(top left, green, yellow);
		background-image: -o-linear-gradient(top left, green, yellow);
		background-image: linear-gradient(to bottom right, green, yellow);
    }
    .customerResult{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .customer-search-box input[type="text"], .customerResult{
        width: 100%;
        box-sizing: border-box;
		filter:alpha(opacity=150); /* IE */
		-moz-opacity:1.5; /* Mozilla */
		opacity: 1.5; /* CSS3 */
    }
    /* Formatting result items */
    .customerResult p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
		background-color: green; /* For browsers that do not support gradients */
		background-image: -webkit-linear-gradient(left, green, yellow);
		background-image: -o-linear-gradient(left, green, yellow);
		background-image: linear-gradient(left, green, yellow);
    }
    .customerResult p:hover{
        background: orange;
    }
	</style>
	
	<script>
	  function openSlideMenu(){
		document.getElementById('menu').style.width = '250px';
		document.getElementById('content').style.marginLeft = '250px';
	  }
	  function closeSlideMenu(){
		document.getElementById('menu').style.width = '0';
		document.getElementById('content').style.marginLeft = '0';
	  }	
    </script>
	
<script type="text/javascript">
$(document).ready(function(){
    $('.product-search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("product-backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parents(".product-search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".result").empty();
		
		// redirect may be required
    });
});
</script>
	
<script type="text/javascript">
$(document).ready(function(){
    $('.order-search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var orderResultDropdown = $(this).siblings(".orderResult");
        if(inputVal.length){
            $.get("order-backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                orderResultDropdown.html(data);
            });
        } else{
            orderResultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".orderResult p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parents(".order-search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".orderResult").empty();
		
		// redirect may be required
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.customer-search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var customerResultDropdown = $(this).siblings(".customerResult");
        if(inputVal.length){
            $.get("customer-backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                customerResultDropdown.html(data);
            });
        } else{
            customerResultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".customerResult p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parents(".customer-search-box").find('input[type="text"]').val('');
		// load into session cart
		
		// empty result div
		$(this).parent(".customerResult").empty();
		
		// redirect may be required
    });
});
</script>
</head>
<body>
	<?php
	$msgType = "";
	$msgContent = "";	
	?>
  <div id="content">
	  <?php
	  include ('slide.php');
		  // Get status message from session 
			$sessData = !empty($_SESSION['sessData'])? $_SESSION['sessData'] : ''; 
			if( !empty( $sessData['status']['msg'] ) ){ 
				$statusMsg = $sessData['status']['msg']; 
				$statusMsgType = $sessData['status']['type']; 
				unset( $_SESSION['sessData']['status'] ); 
			}
		  ?>
		  <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
					<div class="col-md-12">
						<div class="alert alert-success"><?php echo $statusMsg; ?></div>
					</div>
                <?php } elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
					<div class="col-md-12">
						<div class="alert alert-danger"><?php echo $statusMsg; ?></div>
					</div>
                <?php } ?>
		  </div>
<div class="shop">
<ul class="breadcrumb">
	<span>
		<form name="clock">
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
		</form>
	</span>
	<li><a href="door.php">Dashboard</a></li>
	<li>Shop</li>

<div style="margin-top: -19px; margin-bottom: 21px;">
<?php 
	include('db.php');
	$pending = $conn->prepare("SELECT * FROM orders WHERE status='Pending'");
		$pending->execute();
		$pendingCount = $pending->rowcount();
	
	$delivered = $conn->prepare("SELECT * FROM orders WHERE status='Delivered'");
		$delivered->execute();
		$deliveredCount = $delivered->rowcount();
	
	$complete = $conn->prepare("SELECT * FROM orders WHERE status='Completed'");
		$complete->execute();
		$completeCount = $complete->rowcount();
	
	$cancelled = $conn->prepare("SELECT * FROM orders WHERE status='Cancelled'");
		$cancelled->execute();
		$cancelledCount = $pending->rowcount();
	?>
	<div id="count" style="text-align:center;">
		Total to be packed: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $pendingCount;?></font>
	</div>
	<div id="count" style="text-align:center;">
		Total delivered: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $deliveredCount;?></font>
	</div>
	<div id="count" style="text-align:center;">
		Total Completed: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $completeCount;?></font>
	</div>
	<div id="count" style="text-align:center;">
		Total Cancelled: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $cancelledCount;?></font>
	</div>
</div>
</div>
	  <div class="product-search-box">
        <input type="text" autocomplete="off" placeholder="Search Products..." id="searchProduct" name="searchProduct" onBlur="clear()" value=""/>
        <div class="result"></div>
      </div>
		  <div class="order-search-box">
        <input type="text" autocomplete="off" placeholder="Search Orders..." id="searchOrder" name="searchOrder" onBlur="clear()" value=""/>
        <div class="orderResult"></div>
      </div>
	  <div class="customer-search-box">
        <input type="text" autocomplete="off" placeholder="Search Customers..." id="searchCustomer" name="searchCustomer" onBlur="clear()" value=""/>
        <div class="customerResult"></div>
      </div>
	</ul><br><br>
	  <?php
	  // LOAD MESSAGE IF ANY
	  if ( $msgType ){
		  echo $msgContent;
	  }
	  $orderPendingQ = $conn->query("SELECT COUNT(id) AS `orderCount` FROM `orders` WHERE `status` = 'pending'");
	  if( $orderPendingQ == TRUE ){  
         while($pending = $orderPendingQ->fetch()){ 
			 $orderCount = $pending['orderCount'];
		 }
	  } else {
		  $orderCount = 0;
	  }
	  
	  $deliveryPendingQ = $conn->query("SELECT COUNT(id) AS `deliveryCount` FROM `orders` WHERE `status` = 'delivery'");
	  if( $deliveryPendingQ == TRUE ){  
         while($delivery = $deliveryPendingQ->fetch()){ 
			 $deliveryCount = $delivery['deliveryCount'];
		 }
	  } else {
		  $deliveryCount = 0;
	  }  
	  
	  $completedPendingQ = $conn->query("SELECT COUNT(id) AS `completedCount` FROM `orders` WHERE `status` = 'completed'");
	  if( $completedPendingQ == TRUE ){  
         while($completed = $completedPendingQ->fetch()){ 
			 $completedCount = $completed['completedCount'];
		 }
	  } else {
		  $completedCount = 0;
	  }  
	  
	  ?>
	  
	  
	<!-- ORDERS PENDING BUTTON -->
	  
	  <button class="accordion"><img src="images/packed.png" width="25px" height="25px" alt="Pending Packing" title="Pending Packing" /><?php echo $orderCount; ?> Orders to be Packed</button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <?php
	  $orderInfoQ = "SELECT `o`.*, `c`.`first_name`, `c`.`last_name`, `c`.`address`, `c`.`email`, `c`.`phone` 
					  FROM `orders` as `o` 
					   LEFT JOIN `customers` AS `c` ON `c`.`id` = `o`.`customer_id`
					   WHERE `o`.`status` = 'pending'";
	  $orderInfoR = $conn->query($orderInfoQ);
	  if($orderInfoR !== false) {
			foreach( $orderInfoR as $orderInfo){
				
				$orderID = $orderInfo['id'];
				$first_name = $orderInfo['first_name'];
				$last_name = $orderInfo['last_name'];
				$phone = $orderInfo['phone'];
				$address = $orderInfo['address'];
				$timestamp = $orderInfo['created'];
				$date = date('Y-m-d',strtotime($timestamp));
				$time = date('H:i:s',strtotime($timestamp));
				
				echo '<button class="accordion">Order ' . $orderID . ' placed by ' . $first_name . ' ' . $last_name . '</button>
				<div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">	';
				echo '<div>Address ' . $address .'</div>';
				echo '<div>Phone ' . $phone .'</div>';
				echo '<div>Ordered on ' . $date . ' at ' . $time .'</div>';
				
				$orderItemsQ = "SELECT i.*, p.ptName
							    FROM `order_items` AS `i` 
							     LEFT JOIN `producttype` AS `p` ON `p`.`ptid` = `i`.`ptid` 
								WHERE `i`.`order_id` = " . $orderID;
				$orderItemsR = $conn->query($orderItemsQ);
				
                if($orderItemsR !== false) {
					foreach( $orderItemsR as $item){
							echo '<div>' . $item["quantity"] . ' ' . $item["ptName"] . '</div>';
					}				
				}
				echo '<div><a href="shop.php?action=delivery&oid=' . $orderID . '">
						<img src="images/packed.png" width="25px" height"25px" alt="Packed" title="Packed" />';
				echo '</a>Order Packed';
				echo '</div>';
				echo '</div>';		
				echo '</div>';
				echo '</p>';				
				echo '</div>';	
			}		  
	  }
	  ?>
			  </div>
		  </div>
		  </p>
	  </div>
	
	<!-- DELIVERIES BUTTON -->
	
	<button class="accordion"><img src="../images/truck.png" width="25px" height="25px" alt="Delivery Ready" title="Delivery Ready" /> <?php echo $deliveryCount; ?> Deliveries to be attended</button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <?php
	  $deliveryInfoQ = "SELECT `o`.*, `c`.`first_name`, `c`.`last_name`, `c`.`address`, `c`.`email`, `c`.`phone` 
					  FROM `orders` as `o` 
					   LEFT JOIN `customers` AS `c` ON `c`.`id` = `o`.`customer_id`
					   WHERE `o`.`status` = 'delivery'";
	  $deliveryInfoR = $conn->query($deliveryInfoQ);
	  if($deliveryInfoR !== false) {
			foreach( $deliveryInfoR as $deliveryInfo){
				
				$orderID = $deliveryInfo['id'];
				$first_name = $deliveryInfo['first_name'];
				$last_name = $deliveryInfo['last_name'];
				$phone = $deliveryInfo['phone'];
				$address = $deliveryInfo['address'];
				$timestamp = $deliveryInfo['created'];
				$date = date('Y-m-d',strtotime($timestamp));
				$time = date('H:i:s',strtotime($timestamp));
				
				echo '<button class="accordion">Order ' . $orderID . ' placed by ' . $first_name . ' ' . $last_name . '</button>
				<div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">	';
				echo '<div>Address ' . $address .'</div>';
				echo '<div>Phone ' . $phone .'</div>';
				echo '<div>Ordered on ' . $date . ' at ' . $time .'</div>';
				
				$deliveryItemsQ = "SELECT i.*, p.ptName 
							    FROM `order_items` AS `i` 
							     LEFT JOIN `producttype` AS `p` ON `p`.`ptid` = `i`.`ptid` 
								WHERE `i`.`order_id` = " . $orderID;
				$deliveryItemsR = $conn->query($deliveryItemsQ);
				
                if($deliveryItemsR !== false) {
					foreach( $deliveryItemsR as $deliveryItems){
							echo '<div>' . $deliveryItems["quantity"] . ' ' . $deliveryItems["ptName"] . '</div>';
					}				
				}
				echo '<div><a href="shop.php?action=complete&oid=' . $orderID . '">
						<img src="images/truck.png" width="25px" height"25px" alt="Delivery Ready" title="Delivery Ready" />';
				echo '</a>Delivery Ready';
				echo '</div>';
				echo '</div>';		
				echo '</div>';
				echo '</p>';				
				echo '</div>';	
			}		  
	  }
	  ?>
			  </div>
		  </div>
		  </p>
	  </div>
	
	<!-- COMPLETED BUTTON -->
	
	<button class="accordion"><img src="../images/complete.png" width="25px" height="25px" alt="25px" title="25px" /> <?php echo $completedCount; ?> Completed Deliveries </button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <?php
	  $completeInfoQ = "SELECT `o`.*, `c`.`first_name`, `c`.`last_name`, `c`.`address`, `c`.`email`, `c`.`phone` 
					  FROM `orders` as `o` 
					   LEFT JOIN `customers` AS `c` ON `c`.`id` = `o`.`customer_id`
					   WHERE `o`.`status` = 'completed'";
	  $completeInfoR = $conn->query($completeInfoQ);
	  if($completeInfoR !== false) {
			foreach( $completeInfoR as $completeInfo){
				
				$orderID = $completeInfo['id'];
				$first_name = $completeInfo['first_name'];
				$last_name = $completeInfo['last_name'];
				$phone = $completeInfo['phone'];
				$address = $completeInfo['address'];
				$timestamp = $completeInfo['created'];
				$date = date('Y-m-d',strtotime($timestamp));
				$time = date('H:i:s',strtotime($timestamp));
				
				echo '<button class="accordion">Order ' . $orderID . ' placed by ' . $first_name . ' ' . $last_name . '</button>
				<div class="panel">
				  <p>
					<div id="parent">
					  <div id="child-left">	';
						echo '<div>Ordered on ' . $date . ' at ' . $time .'</div>';
						echo '<div>Address<br> ' . $address .'</div>';
						echo '<div>Phone<br> ' . $phone .'</div>';

						$orderItemsQ = "SELECT i.*, p.ptName
										FROM `order_items` AS `i` 
										 LEFT JOIN `producttype` AS `p` ON `p`.`ptid` = `i`.`ptid` 
										WHERE `i`.`order_id` = " . $orderID;
						$orderItemsR = $conn->query($orderItemsQ);

						if($orderItemsR !== false) {
							foreach( $orderItemsR as $item){
								echo '<div>' . $item["quantity"] . ' ' . $item["ptName"] . '</div>';
							}				
						}
						echo '</div>';
						echo '</div>';
				echo '</p>';				
				echo '</div>';	
			}		  
	  }
	  ?>
			  </div>
		  </div>
		  </p>
	  </div>
<?php
echo '<div class="shop">';
/************************************
ADD Functions
************************************/

/************************************
ADD CATEGORY
************************************/
	echo '<button class="accordion"><img src="../images/hulk.png" width="50px" height="50px" alt="Add" title="Add" />Add Catergory, Product, Variety</button>';
	echo '<div class="panel">';
	echo '<button class="collapsible">Add Category</button>';
		echo '<div class="content">';
			echo '<form action="shop.php" method="post">';
				echo '<table>';
				echo '<tr><td>Category Group</td></tr>';
				echo '<tr><td>';
				echo '<input type="text" value="" name="categoryName" placeholder="Category Name" required>';	
				echo '</td></tr>';
				echo'<tr><td><input type="submit" value="Submit" name="category-add-submit"></td></tr>';
				echo '</table>';				
			echo '</form>';
		echo '</div>';
/************************************
ADD PRODUCT
************************************/
		echo '<button class="collapsible">Add Product</button>';
		echo '<div class="content">';
		echo '<form action="shop.php" method="post" name="product-add" id="product-add">';
			echo '<table>';
			echo '<tr><td>Category Group</td></tr>';
			echo '<tr><td>';
			echo '<select name="cid" size="1">';
			$categoryQ = "SELECT * FROM `category`";
			$categoryR = $conn->query( $categoryQ );
			if ( $categoryR != FALSE ){
			  foreach($categoryR as $category)
				{
					echo '<option name="' . $category['categoryName'] . '" value="' . $category['cid'] . '"> ' . $category['categoryName'] . ' </option>';
				}
				echo '</select>';
			} else {
				echo 'BAD DATA';

			}
			echo '</td></tr>';

			echo '<tr><td>Product Group</td></tr>';
			echo '<tr><td>';
			echo '<input type="text" value="" id="productname" name="productname" placeholder="Product Name" required>';
			echo '</td></tr>';

			echo '<tr><td>';
			echo '<input type="text" value="" id="productblurb" name="productblurb" placeholder="Product Blurb" required>';
			echo '</td></tr>';

			echo'<tr><td><input type="submit" value="Submit" name="product-submit"></td></tr>';
			echo '</table>';				
			echo '</form>';		
		echo '</div>';
/************************************
START ADD VARIETY
************************************/		
		echo '<button class="collapsible">Add Product Variety</button>
				<div class="content">';
		$categoryQ = "SELECT * FROM `category`";
		$categoryR = $conn->query($categoryQ);
		
		$productQ = "SELECT * FROM `product`";
		$productR = $conn->query($productQ);		
		
		echo '<form action="shop.php" method="post" name="ptadd" id="ptadd">';
		echo '<table>';
		echo '<tr><td>Category Group</td></tr>';
		echo '<tr><td>';
		echo '<select name="categoryTypeGroup" size="1">';
		foreach($categoryR as $category)
		{
			echo '<option name="' . $category['categoryName'] . '" value="' . $category['cid'] . '"> ' . $category['categoryName'] . ' </option>';
		}
		echo '</select>';
		echo '</td></tr>';
		echo '<tr><td>Product Group</td></tr>';
		echo '<tr><td>';
		echo '<select name="productTypeGroup" size="1">';
		foreach($productR as $product)
		{
			echo '<option name="' . $product['productName'] . '" value="' . $product['pid'] . '"> ' . $product['productName'] . ' </option>';
		}
		echo '</select>';
		echo '</td></tr>';
		echo '<tr>';				
			echo '<td>';
			echo '<input type="radio" name="ptstatus" value="1" checked>';
			echo '<label for="active">Active</label>';
			echo '<input type="radio" name="ptstatus" value="0">';
			echo '<label for="hold">Hold</label>';
			echo '</td>';	 
		echo '</tr>';
		echo '<tr>';
		echo '<td><input type="text" placeholder="Variety Name" value="" name="ptname"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td><input type="text" placeholder="Variety Blurb" value="" name="ptblurb"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td><input type="text" placeholder="Variety Receipe" value="" name="ptreceipe"></td>';
		echo '</tr>';

		echo'<tr><td><input type="submit" value="submit" name="ptadd-submit"></td></tr>';
		echo '</table>';				
		echo '</form>';	
		echo '</div>';
		echo '</div>';
/************************************
END ADD VARIETY
************************************/			
/************************************
START VARIETY FORM
************************************/

		$catArray = [];	
		$categoryNames = $conn->query("SELECT`cid`, `categoryName` FROM `category` WHERE `status` = '1' && `archive` = '0'  ORDER BY `categoryName` ASC");
		if( $categoryNames !== FALSE ){
			foreach( $categoryNames as $category){
				$catArray[$category['cid']] = $category['categoryName'];
			}
		} else {
			
		}

		// setup product array so we dont tap db constantly
		$prodArray = [];
		$productNames = $conn->query("SELECT `pid`, `productName` FROM `product` WHERE `status` = '1' && `archive` = '0' ORDER BY `productName` ASC");								
		if( $productNames !== FALSE ){
			foreach( $productNames as $product){
				$prodArray[$product['pid']] = $product['productName'];
			}
		}

		$categories = $conn->query("SELECT * FROM `category` WHERE `status` = '1' && `archive` = '0'");
		if($categories !== false) {
			foreach( $categories as $category){
				$cid = $category['cid'];
				
				echo '<button class="accordion" style="background-color: lightgreen; font-style:bold;"><img src="../images/' . $category['categoryImage'] . '" width=50px; height=50px; />' . $category['categoryName'];
				
				echo '</button>';
				
				echo '<div class="panel">';				
				$productTypeQ = "SELECT `c`.`cid`, `c`.`categoryName`, `p`.`pid`, `p`.`productName`, `pt`.* 
								 FROM `producttype` AS `pt`
								 LEFT JOIN `category` AS `c`
								 ON `c`.`cid` = `pt`.`cid`
								 RIGHT JOIN `product` AS `p`
								 ON `p`.`pid` = `pt`.`pid`
								 WHERE `pt`.`cid` = '$cid' 
								 && `c`.`archive` = '0' 
								 && `p`.`archive` = '0' 
								 && `pt`.`archive` = '0'
								 ORDER BY `p`.`productName`";
				$productTypeR = $conn->query($productTypeQ);
				if($productTypeR !== false) {

					echo '<div class="productRow">';

					foreach($productTypeR as $productType) {
						
						$pid = $productType['pid'];
						$ptid = $productType['ptid'];
						$status = $productType['status'];
						$image = $productType['ptImage'];

						echo '<div class="child-left">';

						/****************************************************
						 UPDATE VARIETY IMAGE FORM
						 ***************************************************/
						echo '<form enctype="multipart/form-data" action="shop.php" method="post" name="ptimageupdate">';
						if ( $image !== ''){
							echo '<div class="productImage"><img src="../images/' . $image  . '" width=50px; height=50px; alt=' . $image . ' title=' . $image . ' /></div>';
						} else {
							echo '<div class="productImage"><img src="../images/50x25_spacer_green.png" width=50px; height=50px; /></div>';							
						}
						

						echo '<label>Upload New Image';
						echo '<input type  = "file" 
									 name  = "ptimage" />';

						echo '<div class="productSubmit" style="text-align:center";><input type="submit" value="Update Image" name="ptimage-update"></div>';
						echo '<input type="hidden" name="ptid" value="' . $ptid .'">';
						echo '</label>';
						echo '</form>';
						echo '<hr>';

						/****************************************************
						 UPDATE VARIETY FORM
						 ***************************************************/
						// setup category array so we dont tap db constantly
						

						// setup Variety Form
						echo '<form action="shop.php" method="post" name="ptupdate">';
						
						// Category Info
						echo '<div class= "categoryName" style="text-align: center; color:black;">';
							echo '<select class="selectpicker form-control categoryName-method" name="cid">';
							foreach( $catArray as $key => $value ){							
								if( $key == $cid ){
									echo '<option value="' . $key . '" selected />' . $value . '</option>';
								} else {
									echo '<option value="' . $key . '" />' . $value . '</option>';
								}
							}
							echo '</select>';
						echo '</div>';

						/*echo '<div class= "categoryName" style="text-align: center; color:black;"><input type="text" name="categoryName" value="' . $productType['categoryName'] . '"/></div>';	*/
						
						
						// Product Info
						echo '<div class= "productName" style="text-align: center; color:black;">';
						echo '<select class="selectpicker form-control productName-method" name="pid">';
							foreach( $prodArray as $key => $value ){						
								if( $key == $pid ){
									echo '<option value="' . $key . '" selected />' . $value . '</option>';
								} else {
									echo '<option value="' . $key . '" />' . $value . '</option>';
								}
							}
							echo '</select>';
						echo '</div>';
											
						
						// Variety Info
						echo '<div class= "productName" style="text-align: center; color:black;"><input type="text" name="ptname" value="' . $productType['ptName'] . '" /></div>';	

						echo '<div class="box" style="text-align: right;">Box <span style="font-size: 16px;">$ </span><input type="number" name="box" size="7" step="0.01" min="0" value="' . $productType['box'] . '"></div>';

						echo '<div class="kilo" style="text-align: right;">Kilo <span style="font-size: 16px;">$ </span><input type="number" name="kilo" size="7" step="0.01" min="0" value="' . $productType['kilo'] . '"></div>';

						echo '<div class="bunch" style="text-align: right;">Bunch <span style="font-size: 16px;">$ </span><input type="number" name="bunch" size="7" step="0.01" min="0" value="' . $productType['bunch'] . '"  ></div>';

						echo '<div class="punnet" style="text-align: right;">Punnet <span style="font-size: 16px;">$ </span><input type="number" name="punnet" size="7" step="0.01" min="0" value="' . $productType['punnet'] . '"  ></div>';

						echo '<div class="single" style="text-align: right;">Single <span style="font-size: 16px;">$ </span><input type="number" name="single" size="7" step="0.01" min="0" value="' . $productType['single'] . '"  ></div>';

						echo '<div class="productBlurb" style="text-align: left; inline:block; width:220px; height:30px"><textarea name="ptblurb" wrap="soft" cols="25" max="25">' . $productType['ptBlurb'] . '</textarea></div>';

						if ( $status == '0' ){
							echo '<div class="status" style="text-align: center;"><a href="shop.php?id='. $ptid .'&status=0&action=update"> <img src="../images/hold.png" width="50px" height="50px" alt="Hold" title="Hold"></a></div>';
						} else {
							echo '<div class="status" style="text-align: center;"><a href="shop.php?id='. $ptid .'&status=1&action=update"> <img src="../images/active.png" width="50px" height="50px" alt="Active" title="Active"></a></div>';
						}					

						echo '<input type="submit" value="Update" name="ptupdate-submit">';


						echo '<input type="hidden" name="categoryTypeGroup" value="' . $category['cid'] . '">';
						echo '<input type="hidden" name="productTypeGroup" value="' . $product['pid'] .'">';
						echo '<input type="hidden" name="ptid" value="' . $ptid .'">';								
						echo '<input type="hidden" name="ptimageCurrent" value="' . $productType['ptImage'] .'">';

						echo '</div>'; // END CHILD-LEFT

						echo '</form>';	
					}
					echo '</div>'; // END PRODUCTTYPE ROW
					echo '<div class="clear"></div>';
				}
				echo '</div>';
			} 	
			echo '</div>'; // END PANEL CLASS
		  }
?>
	<button class="accordion"><i class="fas fa-folder"></i>Archives</button>
	  <div class="panel">
		  <p>
			<div id="parent">
    		  <div id="child-left">
				  <i class="fas fa-folder fa-3x"></i>
			  </div>
		  </div>
		  </p>
	  </div> 
	</div> <!-- END OF SHOP CLASS --> 
    
<?php include( 'menu.php'); ?>
	  <script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
			  panel.style.display = "none";
			} else {
			  panel.style.display = "block";
			}
		  });
		}

		  function update( id  ){
			var itemID = document.getElementsById( id );
			var itemAmount = document.getElementsById( id ).value;
			var cart = [];
			  alert("you added" + itemAmount + " " + itemID );
			if ( cart.length === 0 ){
				cart.add([ itemID, itemAmount]);
				// update dom
				alert("you added" + itemAmount + " " + itemID );
			} 
		}
		  
		var coll = document.getElementsByClassName("collapsible");
		var k;

		for (k = 0; k < coll.length; k++) {
		  coll[k].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
			  content.style.maxHeight = null;
			} else {
			  content.style.maxHeight = content.scrollHeight + "px";
			} 
		  });
		}
</script>
</body>
</html>