<?php
include 'sec.layer.php';

$id = isset($_GET['id'])? $_GET['id'] : '';

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Purchase Order View</title>
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
	<h2>Purchase Order Details</h2>

<div style="overflow-x:auto;">
<table class="table table-bordered fix_header_table" id="myTable" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; align-content: center; text-align:center; font-weight: bolder; font-style: italic; cursor: default;">
			<th width="5%"> ID </th>
			<th width="20%"> Name </th>	
			<th width="20%"> Total </th>	
			<th width="10%"> Date </th>	
			<th width="10%"> Time </th>
			<th width="5%"> Status </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$result = $conn->prepare("SELECT * FROM purchaseorders WHERE `po_id` = '$id'");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
				$po_id = $row['po_id'];
				$emp_id = $row['emp_id'] ;
				$grand_total = $row['grand_total'] ;
				$temp_date = $row['created_on'];
				$dt = new DateTime($temp_date);

				$date = $dt->format('d-m-Y');
				$time = $dt->format('h:i:s A');
				$status = $row['status'] ;			
			?>
			
				<td><?php echo $po_id; ?></td>
				<td><?php echo getEmployeeName( $conn,  $emp_id ); ?></td>
				<td><?php echo $grand_total; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $time; ?></td>
				<td><?php echo $status; ?></td>	
				</tr>
			<?php
			}
			?>
	</tbody>
	</table>

	<br>
		<h2>Purchase Order Items</h2>	
		<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="10%"> Variety </th>
			<th width="10%"> Quantity  </th>	
			<th width="10%"> Price </th>
			<th width="10%"> U.O.M  </th>
		</tr>
	</thead>
	<tbody>
		<?php
			$itemsQ = $conn->prepare("SELECT * FROM purchaseorder_items WHERE `order_id` = '$po_id'");
			$itemsQ->execute();
			for( $i = 0; $item = $itemsQ->fetch(); $i++ ){
				$id = $item['id'];
				$order_id = $item['order_id'];
				$ptid = $item['ptid'];
				$quantity = $item['quantity'];
				$price = $item['price'];
				$uom_id = $item['uom_id'];
				?>
				<tr>
					<td><?php echo getVarietyName( $conn, $ptid ); ?></td>
					<td><?php echo $quantity; ?></td>
					<td><?php echo $price; ?></td>
					<td><?php echo getUomLong( $conn, $uom_id); ?></td>
				</tr>
		<?php
		}
		?>		
	</tbody>
	</table>
	<br>
	<div class="clear"></div>
	
<div class="clearfix"></div>

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
	if(confirm("Are you sure you want to delete this Purchase Order?")){
		 $.ajax({
		   type: "GET",
		   url: "deletePurchaseOrder.php",
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