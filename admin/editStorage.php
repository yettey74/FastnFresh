<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("SELECT *
						FROM `storage` 
						WHERE `storage_id` = :storageID");
	$result->bindParam(':storageID', $id);
	$result->execute();

	for( $i=0; $row = $result->fetch(); $i++ ){
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="updateStorage.php" method="post">
			<center><h4><i class="icon-edit icon-large"></i> Edit Storage</h4></center>
			<hr>
			<div id="ac">
				<span style="text-align: center; color:red;"><strong>Storage Details</strong></span>
			<br>
			<?php
		echo '<select name="ptid" size="1">';
			$varieties = $conn->query("SELECT ptid, ptName FROM `producttype`");
			if ( $varieties != FALSE ){
			  foreach($varieties as $variety)
				{
				  if( $variety['ptid'] == $row['ptid'] ){
					echo '<option name="' . $variety['ptName'] . '" value="' . $variety['ptid'] . '" selected >'  . $variety['ptName'] . ' </option>';
				  } else {					  
					echo '<option name="' . $variety['ptName'] . '" value="' . $variety['ptid'] . '" >'  . $variety['ptName'] . ' </option>';
				  }
				}
				echo '</select>';
			} else {
				echo 'BAD DATA';

			}
	?>
	<br><br>
				
			<label>Name</label>
			<input type="text" style="width:265px; height:30px;" name="storage_title" value="<?php echo $row['storage_title']; ?>" />
			<br>
			<label>Blurb</label>
			<input type="text" style="width:265px; height:30px;" name="storage_blurb" value="<?php echo $row['storage_blurb']; ?>" />
			<br>
			<label>Status</label>
				<?php if( $row['status'] == 1 ){?>
				<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="1" checked="checked" /><label for="active">On</label>
				
				<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="0" /><label for="active">Off</label>
				
				<?php } else { ?>
				
				<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="1" /><label for="active">On</label>
								
				<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="0" checked="checked"/><label for="active">Off</label>
				<?php } ?>
			<br>	
			
			<div style="float:right; margin-right:10px;">
			<input type="hidden" name="storage_id" value="<?php echo $row['storage_id']; ?>" />			
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>