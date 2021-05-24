<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("SELECT *
						FROM `assets` 
						WHERE `asset_id` = :assetID");
	$result->bindParam(':assetID', $id);
	$result->execute();

	for( $i=0; $row = $result->fetch(); $i++ ){
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="updateAsset.php" method="post">
		<center><h4><i class="icon-edit icon-large"></i> Edit Asset</h4></center>
		<hr>
		<div id="ac">
			<span style="text-align: center; color:red;"><strong>Asset Details</strong></span>
		<br>				
		<br>
		
		<input type="text" style="width:265px; height:30px;" name="id" placeholder="Asset ID" value="<?php echo $row['asset_id']; ?>" disabled />
		<br>
		<br>
			
		<input type="text" style="width:265px; height:30px;" name="asset_title" placeholder="Asset Name" value="<?php echo $row['asset_title']; ?>" />
		<br>
		<br>
			
			<label>Asset Image</label>
		<?php
			if ( $row['asset_image'] != '' ){
				echo '<img src="admin/images/assets/' . $row['asset_image'] . '" width="100px" height="100px" alt="' . $row['asset_image'] . ' title="' . $row['asset_image'] . '" />';
			} else {
				echo '<img src="images/blank.png" width="100px" height="100px" alt="Asset Image" title="Asset Image"/>';
			}
	   ?>
		<input type="file" name="asset_image" />
			<br>
			<br>

		<input type="number" style="width:265px; height:30px;" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity']; ?>" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="brand" placeholder="Brand Name" value="<?php echo $row['brand']; ?>" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="model" placeholder="Model Name" value="<?php echo $row['model']; ?>" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="serial" placeholder="Serial Number" value="<?php echo $row['serial']; ?>" />
		<br>
		<br>
			<label>Purchase Value</label>
		<input type="text" style="width:265px; height:30px;" name="purchase_value" placeholder="Purchase Value" value="<?php echo $row['purchase_value']; ?>" />
		<br>
		<br>
			<label>Purchase Date</label>
		<input type="date" style="width:265px; height:30px;" name="purchase_date" placeholder="Purchase Price" value="<?php echo $row['purchase_date']; ?>" />
		<br>
		<br>
			<label>Current Value</label>
		<input type="text" style="width:265px; height:30px;" name="current_value" placeholder="Current Value" value="<?php echo $row['current_value']; ?>" />
		<br>
		<br>
			<label>Location</label>
		<input type="text" style="width:265px; height:30px;" name="location" placeholder="Location" value="<?php echo $row['location']; ?>" />
		<br>
		<br>
			<label>Department</label>
		<input type="text" style="width:265px; height:30px;" name="department" placeholder="Department" value="<?php echo $row['department']; ?>" />
		<br>
		<br>
			<label>Disposal Date</label>
		<input type="date" style="width:265px; height:30px;" name="disposal_date" placeholder="" />
		<br>
		<br>
			<label>Description of Asset</label>
		<textarea style="width:265px; height:30px;" name="description" placeholder="Desctiption of Asset" /><?php echo $row['description']; ?></textarea>
		
			
			<div style="float:right; margin-right:10px;">
				
			<!--<input type="hidden" name="asset_id" value="<?php // $row['id']; ?>" />	-->		
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>