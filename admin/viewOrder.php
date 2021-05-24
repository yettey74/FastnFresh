<?php
include 'sec.layer.php';

$id = isset($_GET['id'])? $_GET['id'] : '';
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Order View</title>
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
	<li>Order View</li>
	</ul>
	<br>
	<br>
	</ul>
	

	<h2>Order Details</h2>
<div style="overflow-x:auto;">
<table class="table table-bordered fix_header_table" id="myTable" data-responsive="table" style="text-align: left;">			<thead>
		<tr style="background: #0AFF00; align-content: center; font-weight: bolder; font-style: italic; cursor: default;">
			<th width="5%"> ID </th>
			<th width="20%"> Customer Name </th>	
			<th width="10%"> Total </th>
			<th width="10%"> Date </th>	
			<th width="10%"> Time </th>
			<th width="10%"> Status </th>
			<!--<th width="10%"> Action </th>-->
		</tr>
	</thead>
	<tbody>		
		<?php
		$result = $conn->prepare("SELECT * FROM orders WHERE `id` = '$id'");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			
			$order_id = $row['id'];
			$name = getCustomerName( $conn, $row['customer_id'] );
			
			$starts = new DateTime($row['created_on'] );
			$start = $starts->format('Y/m/d H:i:s');
			$ends = new DateTime();				
			$end = $ends->format('Y/m/d H:i:s');
			$interval = $ends->diff( $starts );
			$year = $interval->format('%y');
			$month = $interval->format('%m');
			$day = $interval->format('%d');
			$hour = $interval->format('%h');
			$minute = $interval->format('%m');
			$second = $interval->format('%s');
			
			$total = $row['grand_total'];
			$status = $row['status'];
		?>
		
		<td><?php echo $order_id; ?></td>
		<td><?php echo $name; ?></td>
		<td>$<?php echo $total; ?></td>
		<td><?php echo $row['created_on']; ?></td>		
		<td><?php echo $row['created_on']; ?></td>
		<td><?php echo $row['status']; ?></td>
	<!--	<td>
			<a title="Click To Edit Employee" rel="facebox" href="editEmployee.php?id=<?php // echo $id; ?>">
				<button class="btn btn-warning btn-mini">
					<i class="icon-edit"></i> Edit  
				</button>
			</a>
			<a href="#" id="<?php //echo $id; ?>" class="delbutton" title="Click To Delete">
				<button class="btn btn-danger btn-mini">
					<i class="icon-trash"></i> Delete
				</button>
			</a>
		</td>-->
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
	
	<br>
	<h2>Order Items 
		<a title="Click To Add Items" rel="facebox" href="addItem.php?id=<?php echo $id; ?>">
			<button class="btn btn-info btn-mini">
				<i class="icon-edit"></i> Add Items  
			</button>
		</a></h2>
		<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="10%"> Variety </th>
			<th width="10%"> Quantity </th>	
			<th width="10%"> Unit </th>	
			<th width="10%"> Price </th>
			<th width="10%"> Total  </th>
		<!--<th width="10%"> Action </th>-->
		</tr>
	</thead>
	<tbody>
		<?php
				$itemsQ = $conn->prepare("SELECT * FROM order_items WHERE `order_id` = '$id'");
				$itemsQ->execute();
				for( $i = 0; $item = $itemsQ->fetch(); $i++ ){
					$ptid = $item['ptid'];
					$quantity = $item['quantity'];
					$price = $item['price'];
					$uom_id = $item['uom_id'];
					?>

					<td><?php echo getVarietyName( $conn, $ptid); ?></td>
					<td><?php echo $quantity; ?></td>
					<td><?php echo getUomLong( $conn, $uom_id); ?></td>	
					<td><?php echo $price; ?></td>
					<td>$<?php echo $quantity * $price; ?></td>	
					<!--<td>
				<a title="Click To Edit Hours" rel="facebox" href="editHours.php?id=<?php //echo $id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
				<a href="#" id="<?php //echo $roster_id; ?>" class="delHourbutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete
					</button>
				</a>
			</td>-->
			</tr>
			<?php
			}
			?>
		
	</tbody>
	</table>
	<br>
	<div class="clear"></div>	
</div>

<script src="js/jquery.js"></script>

<script type="text/javascript">
$(function() {

	$(".delbutton").click(function(){

	//Save the link in a variable called element
	var element = $(this);

	//Find the id of the link that was clicked
	var del_id = element.attr("id");

	//Build a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this Employee?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteEmployee.php",
		   data: info,
		   success: function(){}
		 });
		 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
	
	 }

	return false;

	});

});
</script>

<script type="text/javascript">
$(function() {

	$(".delHourbutton").click(function(){

	//Save the link in a variable called element
	var element = $(this);

	//Find the id of the link that was clicked
	var del_id = element.attr("id");

	//Build a url to send
	var info = 'id=' + del_id;
	if(confirm("Are you sure you want to delete this Employees Rostered Hours?")){
		 $.ajax({
		   type: "GET",
		   url: "deleteHours.php",
		   data: info,
		   success: function(){}
		 });
		 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
	
	 }

	return false;

	});

});
</script>
</div> <!-- END OF SHOP CLASS -->
<?php include( 'menu.php'); ?>