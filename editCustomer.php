<?php
	include('db.php');
	$id = $_GET['id'];
	$result = $conn->prepare("SELECT * FROM `fnfCustomer` WHERE `customer_ID` = :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
		<link href="admin/main/css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="saveeditcustomer.php" method="post">
			<center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
			<hr>
			<div id="ac">
			<input type="hidden" name="customer_ID" value="<?php echo $id; ?>" />
				
			<span>First Name</span>
				<input type="text" style="width:265px; height:30px;" name="firstName" value="<?php echo $row['firstName']; ?>" /><br>
				
			<span>Last Name</span>
				<input type="text" style="width:265px; height:30px;" name="lastName" value="<?php echo $row['lastName']; ?>" /><br>
			
			<span>Contact</span>
				<input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['contact']; ?>" /><br>
				
			<span>Terms</span>
				<input type="text" style="width:265px; height:30px;" name="terms" value="<?php echo $row['terms']; ?>" /><br>
				
			<span>Phone 1</span>
				<input type="text" style="width:265px; height:30px;" name="phone1" value="<?php echo $row['phone1']; ?>" /><br>

			<span>Phone 2</span>
				<input type="text" style="width:265px; height:30px;" name="phone2" value="<?php echo $row['phone2']; ?>" /><br>
			
			<span>Email</span>
				<input type="text" style="width:265px; height:30px;" name="email" value="<?php echo $row['email']; ?>" /><br>
				
			<span>Fax</span>
				<input type="text" style="width:265px; height:30px;" name="fax" value="<?php echo $row['fax']; ?>" /><br>
			
			<hr>
				<span>Billing Details</span>
			<span>Address Line 1</span>
				<input type="text" style="width:265px; height:30px;" name="billAddress1" value="<?php echo $row['billAddress1']; ?>" /><br>			
				
			<span>Address Line 2</span>
				<input type="text" style="width:265px; height:30px;" name="billAddress2" value="<?php echo $row['billAddress2']; ?>" /><br>
			
			<span>Flat</span>
				<input type="text" style="width:265px; height:30px;" name="billFlat" value="<?php echo $row['billAddress2']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Number</span>
				<input type="text" style="width:265px; height:30px;" name="billStreetNumber" value="<?php echo $row['billStreetNumber']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Name</span>
				<input type="text" style="width:265px; height:30px;" name="billStreet" value="<?php echo $row['billStreet']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Type</span>
				<input type="text" style="width:265px; height:30px;" name="billStreetType" value="<?php echo $row['billStreetType']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Bill Suburb</span>
				<input type="text" style="width:265px; height:30px;" name="billSuburb" value="<?php echo $row['billSuburb']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Billing City</span>
				<input type="text" style="width:265px; height:30px;" name="billCity" value="<?php echo $row['billCity']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Bill State</span>
				<input type="text" style="width:265px; height:30px;" name="billState" value="<?php echo $row['billState']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Bill Postcode</span>
				<input type="text" style="width:265px; height:30px;" name="billPostcode" value="<?php echo $row['billPostcode']; ?>" /><br>
				
			<span>Billing Notes</span>
				<textarea style="height:60px; width:265px;" name="billNotes"><?php echo $row['billNotes'];?></textarea><br>

			<hr>
			<span>Delivery Details</span><br>
			<span>Address Line 1</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryTitle1" value="<?php echo $row['deliveryTitle1']; ?>" /><br>			
				
			<span>Address Line 2</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryTitle2" value="<?php echo $row['deliveryTitle2']; ?>" /><br>
			
			<span>Flat</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryFlat" value="<?php echo $row['deliveryFlat']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Number</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryStreetNumber" value="<?php echo $row['deliveryStreetNumber']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Name</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryStreetName" value="<?php echo $row['deliveryStreetName']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Type</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryStreetType" value="<?php echo $row['deliveryStreetType']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Bill Suburb</span>
				<input type="text" style="width:265px; height:30px;" name="deliverySuburb" value="<?php echo $row['deliverySuburb']; ?>" /><br>
				
			<span>
				<img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Billing City
			</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryCity" value="<?php echo $row['deliveryCity']; ?>" /><br>
				
			<span>
				<img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Bill State
			</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryState" value="<?php echo $row['deliveryState']; ?>" /><br>
				
			<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Bill Postcode</span>
				<input type="text" style="width:265px; height:30px;" name="deliveryPostcode" value="<?php echo $row['deliveryPostcode']; ?>" /><br>			
				
			<span>Delivery Notes</span>
				<textarea style="height:60px; width:265px;" name="deliveryNotes"><?php echo $row['deliveryNotes'];?></textarea><br>

			<div style="float:right; margin-right:10px;">

			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>