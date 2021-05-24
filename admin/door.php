<?php
include 'sec.layer.php';

$pending = $conn->prepare("SELECT * FROM orders WHERE status = 'Pending'");
$pending->execute();
$pendingCount = $pending->rowcount();

$delivered = $conn->prepare("SELECT * FROM orders WHERE status = 'Delivery'");
$delivered->execute();
$deliveredCount = $delivered->rowcount();

$complete = $conn->prepare("SELECT * FROM orders WHERE status = 'Completed'");
$complete->execute();
$completeCount = $complete->rowcount();

$cancelled = $conn->prepare("SELECT * FROM orders WHERE status = 'Cancelled'");
$cancelled->execute();
$cancelledCount = $cancelled->rowcount();

$recipes = $conn->prepare("SELECT * FROM recipes WHERE status = '1'");
$recipes->execute();
$recipeCount = $recipes->rowcount();

$storage = $conn->prepare("SELECT * FROM storage WHERE status = '1'");
$storage->execute();
$storageCount = $storage->rowcount();

$produceSoldCountQ = $conn->prepare("SELECT DISTINCT(`pt`.`ptName` )
								FROM `order_items` AS `oi` 
								LEFT JOIN `producttype` AS `pt` 
								ON `pt`.`ptid` = `oi`.`ptid`");
$produceSoldCountQ->execute();
$produceSoldCount = $produceSoldCountQ->rowcount();

$produceSold = $conn->prepare("SELECT DISTINCT(`pt`.`ptName` )
								FROM `order_items` AS `oi` 
								LEFT JOIN `producttype` AS `pt` 
								ON `pt`.`ptid` = `oi`.`ptid`");
$produceSold->execute();

$special = $conn->prepare("SELECT * FROM special");
$special->execute();
$specialCount = $special->rowcount();

$ytd = $conn->query("SELECT SUM(grand_total) AS `total` FROM `orders`");
$ytd->execute();
$ytdSales = $ytd->fetch();

$supplier_balance = $conn->query("SELECT ROUND(SUM(balance),2) AS `total` FROM `suppliers` WHERE `balance` IS NOT NULL");
$supplier_balance->execute();
$supplierbalance = $supplier_balance->fetch();

$monthly = $conn->prepare("SELECT YEAR(created_on) as year, MONTH(created_on) as month, SUM(grand_total) as total
							 FROM `orders`
							 GROUP BY YEAR(created_on), MONTH(created_on)
							 ORDER BY YEAR(created_on), MONTH(created_on)");
$monthly->execute();

$supplier_balance = $conn->query("SELECT ROUND(SUM(balance),2) AS `total` FROM `suppliers` WHERE `balance` IS NOT NULL");
$supplier_balance->execute();
$supplierbalance = $supplier_balance->fetch();

/*$stocks = $conn->prepare("SELECT pt.variety_stock, pt.uom_id, pt.kilo, pt.box, pt.punnet, pt.bunch, pt.single, pt.bag, pt.tray, u.uomLong FROM producttype as pt LEFT JOIN uom as u on pt.uom_id = u.uom_id");
$stocks->execute();
$stockCount = $stocks->fetch();

$tv = 0; // total value
$tvPrice = 0;
foreach( $stocks as $stock ){
	$uom = $stock['uomLong'];
	$onhand = $stock['variety_stock'];

	if ( $uom == 'Kilo' ){
		$tvPrice = $stock['kilo'];
	}
	if ( $uom == 'Box' ){
		$tvPrice = $stock['box'];
	}
	if ( $uom == 'Punnet' ){
		$tvPrice = $stock['punnet'];
	}
	if ( $uom == 'Bunch' ){
		$tvPrice = $stock['bunch'];
	}
	if ( $uom == 'Single' ){
		$tvPrice = $stock['single'];
	}
	if ( $uom == 'Bag' ){
		$tvPrice = $stock['bag'];
	}
	if ( $uom == 'Tray' ){
		$tvPrice = $stock['tray'];
	}

	$tv = $tv + ( $onhand * $tvPrice );
}
	*/				
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Admin Panel</title>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/door.css">
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
  <div id="content">
    <?php
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
	
	<div class="row" style="text-align:center;">
		<?php
		/*foreach( $_SESSION as $key=>$value ){
			echo $key .' '. $value . '<br>';
		}*/
		?>
	</div>
	<?php if ( $_SESSION['access'] == 9 ){ ?>
	<div class="row" style="text-align:center;">
		<hr>
	  <div class="row" style="width: 100%; font-size: 28px; text-align:center;" >Super User Dashboard</div>
		<a href="srm.php">
		  <div class="erp" id="srm" style="float: left;">
			  <a href="super.php?action=customerorders">
				<button type="button" class="btn btn-danger" name="customerorders" width="300px"/>Truncate Orders</button>
			  </a>			
			  <a href="super.php?action=purchaseorders">
				<button type="button" class="btn btn-warning" name="purchaseorders" width="300px" />Truncate Purchase Orders</button>
			  </a>			
			  <a href="super.php?action=categories">
				<button type="button" class="btn btn-success" name="categories" width="300px" />Truncate Categories</button>
		 	  </a>			
			  <a href="super.php?action=products">
				<button type="button" class="btn btn-info" name="products" width="300px" />Truncate Products</button>
	 		  </a>			
			  <a href="super.php?action=varieties">
				<button type="button" class="btn btn-primary" name="varieties" width="300px" />Truncate Varieties</button>
			  </a>
		  </div>
		</a>
	</div>
	<?php } ?>
		
	<div class="row" style="text-align:center;">
		<hr>
	  <div class="row" style="width: 100%; font-size: 28px; text-align:center;" >Business Dashboard</div>
<!--	<a href="srm.php">
	  <div class="erp" id="srm" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Procurement</span>
		<br><br>
		  Stock Required 0
		<br><br>
		  Total Cost 0
	  </div>
	</a>-->
		
	  <a href="production.php">
	  <div class="erp" id="plm" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Warehouse</span>
		<br><br>
		  <div>$<?php //echo number_format( $tv, 2, '.',','); ?> Stock on hand. </div><br>
		<br><br>
		  <div>$<?php //echo number_format( 0, 2, '.',','); ?> Total Cost. </div><br>
	  </div>
	  </a>
		
	  <!--<a href="transport.php">
	  <div class="erp" id="trans" style="float: left;">
	  	<span style="font-size:22px; color:black; text-decoration: underline;">Transport</span>		  	  
	  </div>-->
	 <!-- </a>-->
	  <a href="shop.php">
	  <div class="erp" id="shop" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Distribution</span>
		  <br>
		  <div><?php echo $pendingCount; ?> Orders to be Packed. </div><br>
		  <div><?php echo $deliveredCount; ?> Deliveries to be attended. </div><br>
		  <div><?php echo $completeCount; ?> Deliveries completed. </div><br>
		  <div><?php echo $cancelledCount; ?> Orders Cancelled. </div>	
		 
	  </div>
	  </a>
	  
	  <!--<a href="buildabox.php">
	  <div class="erp" id="buildabox" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Build-A-Box</span>
		  <br>
		  <div><?php echo $pendingCount; ?> Boxes Available. </div><br>	 
	  </div>-->
	<!--  </a>-->
		
		<!--<a href="recipes.php">
	  <div class="erp" id="recipe" style="float: left;">
	  	<span style="font-size:22px; color:black; text-decoration: underline;">Recipes</span>
		<br><br>		 
		  <div><?php echo $recipeCount; ?> Recipes. </div>	
	  </div>-->
<!--	  </a>
		<a href="storage.php">
	  <div class="erp" id="storage" style="float: left;">
	  	<span style="font-size:22px; color:black; text-decoration: underline;">Storage Hints &amp; Tips</span>
		<br><br>
		  <div><?php echo $storageCount; ?> Storage Hints &amp; Tips. </div>
	  </div>-->
	  <!--</a>-->
	</div><!-- END OF ROW CLASS --> 
	
	<div class="row" style="text-align:center;">
		<hr>
	  <div class="row" style="width: 100%; font-size: 28px; text-align:center;" >Executive Dashboard</div>
	  
	  <a href="sales.php">
	  <div class="erp" id="sales" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Sales</span>
	  	
		  <div>Total Sales (Y.T.D) <?php echo $ytdSales['total']; ?> </div>
		  <br>
		  <div><strong>Average Monthly Sales</strong></div>
		  <?php
		  foreach( $monthly as $sales){
			 echo '<div>' . date($sales['month']) . ' / ' . $sales['year'] . ' $' . $sales['total'] . ' </div>'; 
		  }
		  ?>
	  </div>
	  </a>
	  <a href="marketing.php">
	  <div class="erp" id="market" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Marketing</span>
		  <br><br>		  
		  <div><?php echo $specialCount; ?> Specials. </div>
		  <div>Total Campaign Budget $0 </div>
		  <div>Total Revenue $0 </div>
	  </div>
	  </a>
	  <a href="customers.php" title="These are your Debtors">
	  <div class="erp" id="crm" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Customers</span>
		  <br><br>
		  <div><?php echo getCount( $conn, 'fnfcustomer' ); ?> Customers</div>
	  </div>
	  </a>
	  <!--<a href="acc.php">
	  <div class="erp" id="acc" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Accounts</span>	
		  <br><br>
		  Total In $0
		  <br><br>
		  Total Out $0
	  </div>-->
     <!-- </a>	-->	
	  <a href="assets.php" title="This is all your Fixed Assets">
		<div class="ass" style="float: left;">
	  	<span style="font-size:22px; color:black; text-decoration: underline;">Assets</span>
		<br><br>
			<div>
			  Total Asset Value $<?php echo ( totalAssetValue( $conn ) < 0 )? '<span style="color:red;">' . totalAssetValue( $conn ) : '<span style="color:green;">' . totalAssetValue( $conn ); ?>
			</div>			  
		<br><br>
		  <div>Total Compliance 0%</div>
	  </div>
	  </a>		
	  <a href="suppliers.php" title="These are your Creditors">
		<div class="ass" style="float: left;">
	  	<span style="font-size:22px; color:black; text-decoration: underline;">Suppliers</span>
		<br><br>
		  <div>
			  Supplier debit $<?php echo ($supplierbalance['total'] < 0 )? '<span style="color:red;">' . $supplierbalance['total'] : '<span style="color:blue;">' . $supplierbalance['total']; ?>
			</div>		  
		<br><br>
	  </div>
	  </a>
		
	</div><!-- END OF ROW CLASS --> 
	
		<hr>
	<div class="row" style="text-align:center;">		
	<div class="row" style="width: 100%; font-size: 28px; text-align:center;" >Administration Dashboard</div>
	 <!-- <a href="corporate.php">-->
	 <!-- <div class="erp" id="cpg" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Corporate</span>
		  <br><br>
		  <div>Total Compliance 0%</div>	  
	  </div>-->
	 <!-- </a>-->
	  <a href="employee.php">
	  <div class="erp" id="hrm" style="float: left;">
	  	<span style="font-size:22px; color:black; text-decoration: underline;">Employees</span>
		  <br>
		  <div><?php echo getActiveCount( $conn, 'employee' ); ?> Employees are active</div>
	  </div>
	  </a>
<!--	  <a href="ohs.php">
	  <div class="erp" id="ohs" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">O.H &amp S</span>	  	
		  <br>
		  <div>Total Compliance 0%</div>
	  </div>-->
<!--	  </a>	  
	  <a href="training.php">-->
	  <!--<div class="erp" id="train" style="float: left;">
		  <span style="font-size:22px; color:black; text-decoration: underline;">Training</span>
		  <br><br>
		  <div>Total Compliance 0%</div>
	  </div>-->
<!--	  </a>  
	  <a href="payroll.php">-->
	 <!-- <div class="erp" id="pay" style="float: left;">	  	
		  <span style="font-size:22px; color:black; text-decoration: underline;">Payroll</span>
		  <br><br>
		  <div>Total Wages Y.T.D $<?php echo number_format( 8*6000, 2, '.', ',' )  ; ?></div>
	  </div>-->
	<!--  </a>-->
	</div>	 <!-- END OF ROW CLASS -->
		<hr> 

<?php include( 'menu.php'); ?>