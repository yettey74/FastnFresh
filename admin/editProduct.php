<?php
include 'sec.layer.php';

$products = $conn->query("SELECT * FROM `product` ORDER BY `productName` ASC");
$products->execute();

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Edit Product</title>
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
	<li><a href="production.php">Production</a></li>
	<li>Edit Product</li>
	</ul>
	<br>
	<br>
</ul>		
	<center><h2><i class="icon-edit icon-large"></i> Edit Products</h2></center>
	<br>
	<br>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr style="background: #0AFF00; text-align: center; font-weight: bold; cursor: default;">
			<th width="6%"> ID </th>
			<th width="6%"> Product </th>
			<th width="6%"> Blurb </th>
			<th width="6%"> Action </th>
		</tr>
	</thead>
	<tfoot>
		<tr style="background: #0AFF00; text-align:center;font-weight: bold; cursor: default;">
			<th width="6%"> ID </th>
			<th width="6%"> Product </th>
			<th width="6%"> Blurb </th>
			<th width="6%"> Action </th>
		</tr>
	</tfoot>
	<tbody>
			<hr>
			<div id="ac">
				<?php
				foreach ( $products as $product ){	
					$pid = $product['pid'];
					$productName = $product['productName'];
					$productBlurb = $product['productBlurb'];
				?>
				<form action="updateProductName.php" method="post">
				<tr class="record">
					<td><?php echo $pid; ?></td>
					<td>
						<input type="text" name="productName" value="<?php echo !empty($productName)? $productName : '';?>" />
					</td>
					<td>
						<input type="text" name="productBlurb" value="<?php echo !empty($productBlurb)? $productBlurb : '';?>" />
					</td>
					<td>
						<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
						<button class="btn btn-success btn-block btn-large" style="width:267px;">
							<i class="icon icon-save icon-large"></i> Update <?php echo $productName; ?>
						</button>
					</td>
				</tr>
			</form>
				<?php } ?>
	</tbody>
</table>
	</div>
<div class="clearfix"></div>

<script src="js/jquery.js"></script>

<?php include( 'menu.php'); ?>