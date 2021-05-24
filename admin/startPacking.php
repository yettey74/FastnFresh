<?php
include 'sec.layer.php';

	$ptid = $_GET['ptid'];
	$oid = $_GET['oid'];
if( isset($_POST['itempacked']){
	
}

?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />

  <form action="updateOrderItem.php" method="post">
	<center><h4><i class="icon-edit icon-large"></i> Item To Pack</h4></center>
	<hr>
	<div id="ac">
		<div class="row">
			<div class="col-md-4">
				<label>Variety</label>
			<?php echo getVarietyName( $conn, $ptid ). ' ' .  getorderItemAmount( $conn, $ptid, $oid ) . ' ' . getUomLong( $conn, getorderItemUom( $conn, $ptid, $oid )); ?>
			</div>
		</div>
	<br>
		<div style="float:right; margin-right:10px;">
			<input type="hidden" name="ptid" value="<?php echo $ptid; ?>" />
			<input type="hidden" name="oid" value="<?php echo $oid; ?>" />
			<button class="btn btn-success btn-block btn-large" name="itempacked"style="width:267px;">
				<i class="icon icon-save icon-large"></i> Item Packed
			</button>
			
			<button class="btn btn-success btn-block btn-large" name="unavailableItem" style="width:267px;">
				<i class="icon icon-save icon-large"></i> Item Unavailable
			</button>
			
		</div>
	
	</div>
  </form>
