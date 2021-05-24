<?php
	include('../db.php');
	$id = $_GET['id'];

	$result = $conn->prepare("SELECT *
						FROM `special` 
						WHERE `sid` = :specialID");
	$result->bindParam(':specialID', $id);
	$result->execute();
	for( $i=0; $row = $result->fetch(); $i++ ){
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="saveditcampaign.php" method="post">
			<center><h4><i class="icon-edit icon-large"></i> Edit Special</h4></center>
			<hr>
			<div id="ac">
			<input type="hidden" name="sid" value="<?php echo $id; ?>" />
				<span style="text-align: center; color:red;"><strong>Special Details</strong></span>
			<br>
				
			<label>Name</label>
			<input type="text" style="width:265px; height:30px;" name="specialTitle" value="<?php echo $row['specialTitle']; ?>" />
			<br>
			<label>Blurb</label>
			<input type="text" style="width:265px; height:30px;" name="specialBlurb" value="<?php echo $row['specialBlurb']; ?>" />
			<br>
			<label>Image</label>
			<input type="text" style="width:265px; height:30px;" name="specialImage" value="<?php echo $row['specialImage']; ?>" />
			<br>
			
			<div style="float:right; margin-right:10px;">
			<input type="hidden" name="cid" value="<?php echo $row['sid']; ?>" />			
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>