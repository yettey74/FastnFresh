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

	$id = $_GET['id'];

?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />

  <form action="updateItem.php" method="post">
	<center><h4><i class="icon-edit icon-large"></i> Edit Item</h4></center>
	<hr>
	<div id="ac">
		<span style="text-align: center; color:red;"><strong>Item Details</strong></span>
	<br>				
	<br>
	<?php

	$result = $conn->prepare("SELECT *
							FROM `trays` 
							WHERE `tray_id` = :trayID");
	$result->bindParam(':trayID', $id);
	$result->execute();

	for( $i=0; $row = $result->fetch(); $i++ ){
	?>
		<!--<input type="text" value="<?php // echo $id; ?>" /><br>-->
		
		<select name="ptid" size="1">
		<?php
		$varieties = $conn->query( "SELECT ptid, ptName FROM `producttype`" );
		  foreach($varieties as $variety)
			{
			  if ( $variety['ptid'] == $row['ptid'] ){
				echo '<option value="' . $variety['ptid'] . '" selected>'  . $variety['ptName'] . ' </option>';
			  } else {
				echo '<option value="' . $variety['ptid']. '" >'  . $variety['ptName'] . ' </option>';
			  }
			}
		?>
		</select>
		
		<input type="number" style="width:265px; height:30px;" name="quantity" min="0" value="<?php echo $row['quantity']; ?>" />
		<br>
		<br>
		<select name="uom_id" size="1">
		<?php
		$uoms = $conn->query( "SELECT uom_id, uomLong FROM `uom`" );
		  foreach($uoms as $uom)
			{
			  if ( $uom['uom_id'] == $row['uom_id'] ){
				echo '<option value="' . $uom['uom_id'] . '" selected>'  . $uom['uomLong'] . ' </option>';
			  } else {
				echo '<option value="' . $uom['uom_id']. '" >'  . $uom['uomLong'] . ' </option>';
			  }
			}
		?>
		</select>
		<br>
		<input type="text" style="width:265px; height:30px;" name="notes" placeholder="Tray Notes" value="<?php echo $row['notes']; ?>" />
					
		<div style="float:right; margin-right:10px;">
				
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
		</div>
		<?php
}
?>
	</div>
  </form>
