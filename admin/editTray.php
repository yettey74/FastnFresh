<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("SELECT *
						FROM `trays` 
						WHERE `tray_id` = :trayID");
	$result->bindParam(':trayID', $id);
	$result->execute();

	for( $i=0; $row = $result->fetch(); $i++ ){
		$tray_id = $row['tray_id'];
		$ptid = $row['ptid'] ;
		$item = $row['item'] ;
		$quantity = $row['quantity'] ;
		$uom_id = $row['uom_id'] ;
		$notes = $row['notes'] ;
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="updateTray.php" method="post">
			<center><h4><i class="icon-edit icon-large"></i> Edit Tray</h4></center>
			<hr>
			<div id="ac">
				<span style="text-align: center; color:red;"><strong>Tray Details</strong></span>
			<br>				
			<label>Tray ID</label>
			<input type="text" style="width:265px; height:30px;" name="tray_id" value="<?php echo $tray_id; ?>" />
			<br>
			<label>Variety ID</label>
			<input type="text" style="width:265px; height:30px;" name="ptid" value="<?php echo $ptid; ?>" />
			<br>
			<label>Item ID</label>
			<input type="text" style="width:265px; height:30px;" name="employee_phone" value="<?php echo $item; ?>" />
			<br>
			<label>Quantity</label>
			<input type="number" style="width:265px; height:30px;" name="payrate" value="<?php echo $quantity; ?>" />
			<br>
			<label>Units</label>
			<input type="number" style="width:265px; height:30px;" name="uom_id" value="<?php echo $row['uom_id']; ?>" />
			<br>
			<label>Notes</label>
			<input type="text" style="width:265px; height:30px;" name="employee_notes" value="<?php echo $row['notes']; ?>" />
			<br>
			
			<div style="float:right; margin-right:10px;">
			<input type="hidden" name="emp_id" value="<?php echo $id; ?>" />			
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>