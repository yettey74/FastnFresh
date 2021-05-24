<?php
include 'sec.layer.php';


$order_id = $_GET['oid'];
$customer_id = getOrderCustomerID( $conn, $order_id );

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Delivery Floor</title>
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
		<li><a href="shop.php">Shop</a></li>
		<li>Delivery Floor</li>

	<div style="margin-top: 5px; margin-bottom: 10px;">
		<div id="count" style="text-align:center;">
			<h2>Order Details</h2>
		</div>
		
		<div id="count" style="text-align:center;">
			<font color="green" style="font:bold 22px 'Aleo';"><?php echo getFirstName( $conn, $customer_id );?></font>
		</div>
		<div id="count" style="text-align:center;">
			<font color="green" style="font:bold 22px 'Aleo';"><?php echo getLastName( $conn, $customer_id );?></font>
		</div>
		<div id="count" style="text-align:center;">
			<font color="green" style="font:bold 22px 'Aleo';">
				<a href="tel:<?php echo getPhone( $conn, $customer_id );?>" /><img src="images/mobile.png" width="50px" height="50px" /></a><?php echo getPhone( $conn, $customer_id );?>
			</font>
		</div>
		<div id="count" style="text-align:center;">
			<font color="green" style="font:bold 22px 'Aleo';"><?php echo getAddress( $conn, $customer_id );?></font>
		</div>		
	</div>
</div>	 
	</ul>
	  <br>
	  <br>
	  <?php
	  // LOAD MESSAGE IF ANY
	  if ( $msgType ){
		  echo $msgContent;
	  }
 
	  ?>
	  <div class="row" >
	  	<div class="col-md-6" style="background-color: lightgreen; text-align: center;">
			<h3>Customer Items For Delivery</h3>
		  <table>
			  <thead>
			  	<tr>
					<th style="width: 30%; text-align: center; align-content: center; vertical-align: middle">&nbsp;</th>    
				</tr>
			  </thead>
			  <tbody>
				<?php
				  $orderInfoQ = "SELECT * FROM `order_items` WHERE `order_id` = '$order_id' && `status` = '2'";
				  $orderInfoR = $conn->query($orderInfoQ);
				  if($orderInfoR !== false) {
					foreach( $orderInfoR as $orderInfo){	
						$quantity = $orderInfo['quantity'];
						$uom_id = $orderInfo['uom_id'];						
				?>
						  <tr>
							  <td style="padding: 5px;">
								  <a title="Click to Deliver Item" class="facebox" href="updateOrderItem.php?ptid=<?php echo  $orderInfo['ptid']; ?>&oid=<?php echo $order_id; ?>&action=itemdelivered" >
									  <button type="button" class="btn btn-success" style="float:center; width:250px;" />
									Deliver <?php echo $quantity . ' ' . getUomLong( $conn, $uom_id) . '<br>' . getVarietyName( $conn , $orderInfo['ptid']); ?>
									  </button>
								  </a>
							  </td>
						  </tr>
				<?php
			}
	  } 
				  ?>
			  </tbody>
		  </table>
		</div>
	  	<div class="col-md-6" style="background-color: lightgoldenrodyellow; text-align: center;">
			<h3>Items Delivered</h3>
		  <table>
			  <thead>
			  	<tr>
					<th style="width: 30%; text-align: center; align-content: center; vertical-align: middle">&nbsp;</th>   
				</tr>			  
			  </thead>
			  <tbody>
				  <?php
				  $orderInfoQ = "SELECT * FROM `order_items` WHERE `order_id` = '$order_id' && `status` = '3'";
				  $orderInfoR = $conn->query($orderInfoQ);
				  if($orderInfoR !== false) {
					foreach( $orderInfoR as $orderInfo){
						$quantity = $orderInfo['quantity'];
						$uom_id = $orderInfo['uom_id'];
				?>
				   <tr>
					  <td style="padding: 5px;">
						  <a title="Click to Undeliver Item" class="facebox" href="updateOrderItem.php?ptid=<?php echo  $orderInfo['ptid']; ?>&oid=<?php echo $order_id; ?>&action=undeliverItem" >
							  <button type="button" class="btn btn-warning" style="float:center; width:250px;" />
							Undeliver<?php echo $quantity . ' ' . getUomLong( $conn, $uom_id) . '<br>' . getVarietyName( $conn , $orderInfo['ptid']); ?>
							  </button>
						  </a>
					  </td>
				  </tr>
				<?php
			}
	  } 	  ?>			  
			  </tbody>			
		  </table>		  
		</div>
	  	
		</div>	  
	  </div>
</body>
</html>