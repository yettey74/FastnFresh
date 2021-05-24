<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

if ( $_SESSION['loggedin'] == false || $_SESSION['access'] >= 1 ){
header("location: index.php");
}

include 'db.php';
include 'apple/seed.php';

setlocale(LC_MONETARY, 'en_AU.UTF-8');

$id = isset($_GET['id'])? $_GET['id'] : '';

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Tray View</title>
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
	<li><a href="production.php">Warehouse</a></li>
	<li>Tray View</li>
	</ul>
	<br>
	<br>
	</ul>	

	<h2>Tray Details</h2>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="5%"> ID </th>
			<th width="20%"> Name </th>	
			<th width="20%"> Notes </th>
			<th width="5%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$result = $conn->prepare("SELECT `t`.*, `pt`.*, `p`.`pid`, `p`.`productName` 
					FROM `trays` AS `t` 
					LEFT JOIN `producttype` AS `pt` ON `t`.`ptid` = `pt`.`ptid`
					JOIN `product` AS `p` ON `p`.`pid` = `pt`.`pid` 
					WHERE `t`.`ptid` = '$id'");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
				$tray_id = $row['tray_id'];
				$ptid = $row['ptid'] ;
				$varietyName = $row['ptName'];
				$varietyImage = $row['ptImage'];	
			?>
			<div class="profilePicture"><img src="images/<?php echo $row['ptImage']; ?>" width="250px" height="250px" alt="<?php echo $varietyName; ?>"</div>
			<td><?php echo $tray_id; ?></td>
			<td><?php echo $varietyName; ?></td>
			<td><?php echo $row['notes']; ?></td>			
			<td>
				<a title="Click To Edit Tray" rel="facebox" href="editTray.php?id=<?php echo $id; ?>">
					<button class="btn btn-warning btn-mini">
						<i class="icon-edit"></i> Edit  
					</button>
				</a>
				<a href="#" id="<?php echo $emp_id; ?>" class="delTraybutton" title="Click To Delete">
					<button class="btn btn-danger btn-mini">
						<i class="icon-trash"></i> Delete
					</button>
				</a>
			</td>
			</tr>
			<?php
			}
			?>
	</tbody>
	</table>
	<br>
	<h2>Tray Items</h2>
		<a title="Click To Add Item" rel="facebox" href="addItem.php?id=<?php echo $id; ?>">
			<button class="btn btn-info btn-mini">
				<i class="icon-edit"></i> Add Item  
			</button>
		</a>
		<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align:center;">
			<th width="10%"> ID </th>
			<th width="10%"> Tray Name </th>	
			<th width="10%"> Variety </th>	
			<th width="10%"> Quantity</th>
			<th width="10%"> Unit  </th>
			<th width="10%"> Notes  </th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php
				$itemQ = $conn->prepare("SELECT * FROM trays WHERE `ptid` = '$id'");
				$itemQ->execute();
				for( $i = 0; $items = $itemQ->fetch(); $i++ ){
					$tray_id = $items['tray_id'];
					$ptid = $items['ptid'];
					$item = $items['item'];
					$quantity = $items['quantity'];
					$uom_id = $items['uom_id'];
					$notes = $items['notes'];
					?>

					<td><?php echo $tray_id ; ?></td>
					<td><?php echo $ptid; ?></td>
					<td><?php echo $item; ?></td>
					<td><?php echo $quantity; ?></td>
					<td><?php echo $uom_id; ?></td>					
					<td><?php echo $notes; ?></td>		
					<td>
						<a title="Click To Edit Item" rel="facebox" href="editItem.php?id=<?php echo $tray_id; ?>">
							<button class="btn btn-warning btn-mini">
								<i class="icon-edit"></i> Edit  
							</button>
						</a>
						<a href="#" id="<?php echo $tray_id; ?>" class="delItembutton" title="Click To Delete">
							<button class="btn btn-danger btn-mini">
								<i class="icon-trash"></i> Delete
							</button>
						</a>
					</td>
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