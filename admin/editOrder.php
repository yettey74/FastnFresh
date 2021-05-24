<?php
include 'sec.layer.php';

$id = isset($_GET['id'])? $_GET['id'] : '';
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Edit Order</title>
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>	
	
	<script type="text/javascript">
	  $(document).ready(function($) {
		$('a[rel*=facebox]').facebox({
		  loadingImage : 'src/loading.gif',
		  closeImage   : 'src/closelabel.png'
		})
	  })
	</script>
</head>
<body>
	<?php
	$msgType = "";
	$msgContent = "";	
	?>
  <div id="content"><?php
	  include ('slide.php');
	  ?>
	  <?php
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
	  </span>
	  <?php
	  // LOAD MESSAGE IF ANY
	  if ( $msgType ){
		  echo $msgContent;
	  }
	?>   
	   
<div class="shop">
<ul class="breadcrumb">
	<span>
		<form name="clock">
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
		</form>
	</span>
	<li><a href="door.php">Dashboard</a></li>
	<li><a href="sales.php">Sales</a></li>
	<li>Edit Order</li>
	</ul>
	<br>
	<br>
	</ul>
	
<?php
	$result = $conn->prepare("SELECT *
						FROM `orders` 
						WHERE `id` = :orderID");
	$result->bindParam(':orderID', $id);
	$result->execute();

	for( $i=0; $row = $result->fetch(); $i++ ){
		
		$date = strtotime($row['created_on']);
		
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="updateOrder.php" method="post">
									
			<center><h4><i class="icon-edit icon-large"></i> Edit Customer Order</h4></center>
			<hr>
			<div id="ac">
				<div style="float:right; margin-right:10px;">		
				<button class="btn btn-success btn-block btn-large" style="width:267px;">
					<i class="icon icon-save icon-large"></i> Save Changes
				</button>
			</div>
			<br>
			<label>Order ID</label><br>
			<input type="text" style="width:265px; height:30px;" name="customer_id" value="<?php echo $id; ?>" disabled/>
			<br>
			<label>Customer ID</label><br>
			<input type="text" style="width:265px; height:30px;" name="customer_id" value="<?php echo $row['customer_id']; ?>" disabled/>
			<br>
			<label>Total</label><br>
			<input type="text" style="width:265px; height:30px;" name="grand_total" value="<?php echo $row['grand_total']; ?>" disabled/>
			<br>
			<label>Submit Time</label><br>
			<input type="text" style="width:265px; height:30px;" name="createTime" value="<?php echo date('H:i:s A', $date); ?>" disabled />
			<br>
			<label>Submit Date</label><br>
			<input type="text" style="width:265px; height:30px;" name="createDate" value="<?php echo date('d/m/Y', $date); ?>" disabled />
			<br>
				
			<div class="row">
        	<div class="cart">
            	<div class="col-12">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th class="text-center" width="17%">Variety</th>
									<th class="text-center" width="17%">Type</th>
									<th class="text-center" width="10%">Quantity</th>
									<th class="text-center" width="17%">Price</th>
									<th class="text-right" width="20%">Sub Total</th>
									<th class="text-right" width="5%">Action</th>
								</tr>
                        	</thead>
                        	<tbody>
							<?php
							$order_items = $conn->query("SELECT * FROM order_items WHERE order_id = '$id'");
							$order_items->execute();

							foreach( $order_items as $item ){
								$sub = $item['price'] * $item['quantity'] ;
								echo '<tr>';
								echo '<td>' . $item['ptid'] . '</td>';
								echo '<td>' . $item['uom_id'] . '</td>';
								echo '<td>' . $item['quantity'] . '</td>';
								echo '<td>' . $item['price'] . '</td>';
								echo '<td>' . $sub . '</td>';?>
								<td><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='adminCartAction.php?action=removeCartItem&id=<?php echo $item["ptid"]; ?>':false;">
										<img src="../images/trashRed.png" width="25px" height="25px" alt="Remove" title="Remove" /> 
									</button></td>
								<?php

							}
		
			?>
							</tbody>
							<tfoot>
								<tr>
									<th class="text-center" width="17%">Variety</th>
									<th class="text-center" width="17%">Type</th>
									<th class="text-center" width="10%">Quantity</th>
									<th class="text-center" width="17%">Price</th>
									<th class="text-right" width="20%">Sub Total</th>
									<th class="text-right" width="5%">Action</th>
								</tr>
                        	</tfoot>
			
					</div>
					</div>
					</div>
					</div>
		</form>
<?php
}
?>