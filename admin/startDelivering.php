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

$ptid = $_GET['ptid'];
$oid = $_GET['oid'];

updateOrderItemStatus( $conn, $order_id, $ptid, '3' );

header('location: deliveryfloor.php?oid=' . $oid );

?><!--
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />

  <form action="updateOrderItem.php" method="post">
	<center><h4><i class="icon-edit icon-large"></i> Item To Be Delivered</h4></center>
	<hr>
	<div id="ac">
		<div class="row">
			<div class="col-md-4">
				<label>Variety</label>
			<?php //echo getVarietyName( $conn, $ptid ). ' ' .  getorderItemAmount( $conn, $ptid, $oid ) . ' ' . getUomLong( $conn, getorderItemUom( $conn, $ptid, $oid )); ?>
			</div>
		</div>
	<br>
		<div style="float:right; margin-right:10px;">
			<input type="hidden" name="ptid" value="<?php //echo $ptid; ?>" />
			<input type="hidden" name="oid" value="<?php //echo $oid; ?>" />
			
			<button class="btn btn-success btn-block btn-large" name="itemdelivered"style="width:267px;">
				<i class="icon icon-save icon-large"></i> Item Delivered
			</button>
		<!--	<button class="btn btn-success btn-block btn-large" name="itemreplace"style="width:267px;">
				<i class="icon icon-save icon-large"></i> Item for Replacement
			</button>
		</div>	
	</div>
  </form>-->
