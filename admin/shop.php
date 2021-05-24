<?php
include 'sec.layer.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Shop</title>
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
	<script language="javascript" type="text/javascript" src="js/fixHeader.js"></script>

</head>
<body>
  <div id="content">
	  <?php
	  include ('slide.php');
	  ?>
<div class="shop">
	<ul class="breadcrumb">
		<span>
			<form name="clock">
				<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
			</form>
		</span>
		<li><a href="door.php">Dashboard</a></li>
		<li>Shop</li>

	<div style="margin-top: 5px; margin-bottom: 10px;">
	<?php 
		include('db.php');
		$pendingCount = pendingCount( $conn );
		$totalPackCountYesterday = totalPackCountYesterday( $conn );
		$totalPackCountToday = totalPackCountToday( $conn );
		$totalPackCountTomorrow = totalPackCountTomorrow( $conn );
		$deliveryCount = deliveryCount( $conn );
		$completeCount = completeCount( $conn );
		$cancelledCount = cancelledCount( $conn );		
		?>
		<div id="count" style="text-align:center;">
			Total to be packed: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $pendingCount;?></font>
		</div>
		<div id="count" style="text-align:center;">
			Total Orders <strong>YESTERDAY</strong> : <font color="green" style="font:bold 22px 'Aleo';"><?php echo $totalPackCountYesterday;?></font>
		</div>
		<div id="count" style="text-align:center;">
			Total to be packed <strong>TODAY</strong> : <font color="green" style="font:bold 22px 'Aleo';"><?php echo $totalPackCountToday;?></font>
		</div>
		<div id="count" style="text-align:center;">
			Total Orders <strong>TOMORROW</strong> : <font color="green" style="font:bold 22px 'Aleo';"><?php echo $totalPackCountTomorrow;?></font>
		</div>
		<div id="count" style="text-align:center;">
			Total Deliveries: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $deliveryCount;?></font>
		</div>
		<div id="count" style="text-align:center;">
			Total Completed: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $completeCount;?></font>
		</div>
		<div id="count" style="text-align:center;">
			Total Cancelled: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $cancelledCount;?></font>
		</div>
	</div>
</div>	 
	</ul>
	  <br>
	  <br>	 
	  <div class="row" >
	  	<div class="col-md-4" style="background-color: lightcoral; text-align: center;">
			<h3>Pending Orders</h3>
		  <table>
			  <thead>
			  	<tr>
					<th width="30%"><?php echo date('d-m-Y'); ?></th> 
				</tr>
			  </thead>
			  <tbody>
				  <?php
				   $orderInfoQ = "SELECT `o`.*, `c`.*
					 FROM `orders` as `o` 
					  LEFT JOIN `fnfcustomer` AS `c` ON `c`.`customer_id` = `o`.`customer_id`
					 WHERE `o`.`status` = 'Pending'
					 && DATE(`o`.`created_on`) = CURDATE()";
	  $orderInfoR = $conn->query($orderInfoQ);
	  if($orderInfoR !== false) {
			foreach( $orderInfoR as $orderInfo){
				
				$orderID = $orderInfo['id'];
				$first_name = $orderInfo['first_name'];
				$last_name = $orderInfo['last_name'];
				$phone = $orderInfo['phone'];
				//$address = $orderInfo['address'];
				//$billAddress1 = $row['billAddress1'];
				//$billAddress2 = $row['billAddress2'];
				$billFlat = $orderInfo['billFlat'];
				$billStreetNumber = $orderInfo['billStreetNumber'];
				$billStreet = $orderInfo['billStreet'];
				$billStreetType = $orderInfo['billStreetType'];
				$billSuburb = $orderInfo['billSuburb'];
				$billCity = $orderInfo['billCity'];
				$billState = $orderInfo['billState'];
				$billPostcode = $orderInfo['billPostcode'];
				$billAddress = !empty($billFlat)?? $billFlat . ' / ';
				$billAddress .= $billStreetNumber . ' ' . $billStreet . ' ' . $billStreetType . ', ';					
				$billAddress .= !empty($billSuburb)? ', ' . $billSuburb : '';					
				$billAddress .= '<br>';
				$billAddress .= !empty($billCity)? ', ' . $billCity : '';
				$billAddress .= ', ' . $billState . '. ' . $billPostcode;
				$timestamp = $orderInfo['created_on'];
				$date = date('Y-m-d',strtotime($timestamp));
				$time = date('H:i:s',strtotime($timestamp));
				?>
				  <tr>
					  <td style="padding: 5px;">
						  <a href="packingFloor.php?oid=<?php echo $orderID; ?>">
							  <button type="button" class="btn btn-danger" style="float:center;" />
						  	<?php echo $orderInfo['first_name'] . ' ' . $orderInfo['last_name'] . '<br>' . $billAddress . '<br>' . $phone; ?>
			  			  	  </button>
						  </a>
			  		  </td>
				  </tr>
				<?php
			}
	  } else {
		  echo '<tr><td colspan="3">No Pending Orders</td></tr>';
	  }
				  ?>
			  </tbody>
		  </table>
		</div>
	  	<div class="col-md-4" style="background-color: lightgoldenrodyellow; text-align: center;">
			<h3>Deliveries Ready</h3>
		  <table>
			  <thead>
			  	<tr>
					<th width="30%">Show Todays Date</th> 
				</tr>			  
			  </thead>
			  <tbody>
				  <?php
				   $orderInfoQ = "SELECT `o`.*, `c`.*
					 FROM `orders` as `o` 
					  LEFT JOIN `fnfcustomer` AS `c` ON `c`.`customer_id` = `o`.`customer_id`
					 WHERE `o`.`status` = 'Delivery'";
	  $orderInfoR = $conn->query($orderInfoQ);
	  if($orderInfoR !== false) {
			foreach( $orderInfoR as $orderInfo){
				
				$orderID = $orderInfo['id'];
				$first_name = $orderInfo['first_name'];
				$last_name = $orderInfo['last_name'];
				$phone = $orderInfo['phone'];
				//$address = $orderInfo['address'];
				//$billAddress1 = $row['billAddress1'];
				//$billAddress2 = $row['billAddress2'];
				$billFlat = $orderInfo['billFlat'];
				$billStreetNumber = $orderInfo['billStreetNumber'];
				$billStreet = $orderInfo['billStreet'];
				$billStreetType = $orderInfo['billStreetType'];
				$billSuburb = $orderInfo['billSuburb'];
				$billCity = $orderInfo['billCity'];
				$billState = $orderInfo['billState'];
				$billPostcode = $orderInfo['billPostcode'];
				$billAddress = !empty($billFlat)?? $billFlat . ' / ';
				$billAddress .= $billStreetNumber . ' ' . $billStreet . ' ' . $billStreetType . ', ';					
				$billAddress .= !empty($billSuburb)? ', ' . $billSuburb : '';					
				$billAddress .= '<br>';
				$billAddress .= !empty($billCity)? ', ' . $billCity : '';
				$billAddress .= ', ' . $billState . '. ' . $billPostcode;
				$timestamp = $orderInfo['created_on'];
				$date = date('Y-m-d',strtotime($timestamp));
				$time = date('H:i:s',strtotime($timestamp));
				?>
				   <tr>
					  <td style="padding: 5px;">
						  <a href="deliveryFloor.php?oid=<?php echo $orderID; ?>">
							  <button type="button" class="btn btn-warning" style="float:center;" />
						  	<?php echo $orderInfo['first_name'] . ' ' . $orderInfo['last_name'] . '<br>' . $billAddress . '<br>' . $phone; ?>
			  			  	  </button>
						  </a>
			  		  </td>
				  </tr>
				<?php
			}
	  } else {
		  echo '<tr><td colspan="3">No Orders Ready</td></tr>';
	  }
				  ?>			  
			  </tbody>			
		  </table>		  
		</div>
	  	<div class="col-md-4" style="background-color: lightgreen; text-align: center;" >
			<h3>Completed Orders</h3>
		  <table>
			  <thead>
			  	<tr>
					<th width="30%">Show Todays Date</th> 
				</tr>			  
			  </thead>
			  <tbody>
				  <?php
				   $orderInfoQ = "SELECT `o`.*, `c`.*
					 FROM `orders` as `o` 
					  LEFT JOIN `fnfcustomer` AS `c` ON `c`.`customer_id` = `o`.`customer_id`
					 WHERE `o`.`status` = 'Completed'";
	  $orderInfoR = $conn->query($orderInfoQ);
	  if($orderInfoR !== false) {
			foreach( $orderInfoR as $orderInfo){
				
				$orderID = $orderInfo['id'];
				$first_name = $orderInfo['first_name'];
				$last_name = $orderInfo['last_name'];
				$phone = $orderInfo['phone'];
				//$address = $orderInfo['address'];
				//$billAddress1 = $row['billAddress1'];
				//$billAddress2 = $row['billAddress2'];
				$billFlat = $orderInfo['billFlat'];
				$billStreetNumber = $orderInfo['billStreetNumber'];
				$billStreet = $orderInfo['billStreet'];
				$billStreetType = $orderInfo['billStreetType'];
				$billSuburb = $orderInfo['billSuburb'];
				$billCity = $orderInfo['billCity'];
				$billState = $orderInfo['billState'];
				$billPostcode = $orderInfo['billPostcode'];
				$billAddress = !empty($billFlat)?? $billFlat . ' / ';
				$billAddress .= $billStreetNumber . ' ' . $billStreet . ' ' . $billStreetType . ', ';					
				$billAddress .= !empty($billSuburb)? ', ' . $billSuburb : '';					
				$billAddress .= '<br>';
				$billAddress .= !empty($billCity)? ', ' . $billCity : '';
				$billAddress .= ', ' . $billState . '. ' . $billPostcode;
				
				$timestamp = $orderInfo['created_on'];
				$date = date('Y-m-d',strtotime($timestamp));
				$time = date('H:i:s',strtotime($timestamp));
				?>
				 <tr>
					  <td style="padding: 5px;">
							  <button type="button" class="btn btn-success" style="float:center;" />
						  	<?php echo $orderInfo['first_name'] . ' ' . $orderInfo['last_name'] . '<br>' . $billAddress . '<br>' . $phone; ?>
			  			  	  </button>
			  		  </td>
				  </tr>
				<?php
			}
	  } else {
		  echo '<tr><td colspan="3">No Completed Orders</td></tr>';
	  }
				  ?>			  
			  </tbody>			
		  </table>		  
		</div>	  
	  </div>
	  
<script>	  
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
<?php include( 'menu.php'); ?>
</html>