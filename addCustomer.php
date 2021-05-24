<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4>
	</center>
	<hr>
	<div id="ac">
<!--	<span>Customer ID</span><input type="text" style="width:265px; height:30px;" name="customer_ID" placeholder="Customer ID" disabled/><br>-->
		
		<input type="text" style="width:265px; height:30px;" name="firstName" placeholder="First Name" Required /><br>
		
		<input type="text" style="width:265px; height:30px;" name="lastName" placeholder="Last Name" Required /><br>
		
		<input type="text" style="width:265px; height:30px;" name="contact" placeholder="Contact Name" Required /><br>
				
		<input type="text" style="width:265px; height:30px;" name="terms" placeholder="Terms" /><br>

		<input type="text" style="width:265px; height:30px;" name="phone1" placeholder="Phone Number" required /><br>
		
		<input type="text" style="width:265px; height:30px;" name="phone2" placeholder="Phone Number" /><br>

		<input type="email" style="width:265px; height:30px;" name="email" placeholder="Email Address" required /><br>

		<input type="text" style="width:265px; height:30px;" name="fax" placeholder="Fax Number" /><br>

	<hr>
		<span>Billing Details</span>
		<span>Address Line 1</span>
			<input type="text" style="width:265px; height:30px;" name="billAddress1" placeholder="Address Line 1" /><br>			

	<span>Address Line 2</span>
		<input type="text" style="width:265px; height:30px;" name="billAddress2" placeholder="Address Line 1" /><br>

	<span>Flat</span>
		<input type="text" style="width:265px; height:30px;" name="billFlat" placeholder="Flat" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Number</span>
		<input type="text" style="width:265px; height:30px;" name="billStreetNumber" placeholder="Street Number" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Name</span>
		<input type="text" style="width:265px; height:30px;" name="billStreet" placeholder="Street Name" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Type</span>
		<input type="text" style="width:265px; height:30px;" name="billStreetType" placeholder="Street Type" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/> Suburb</span>
		<input type="text" style="width:265px; height:30px;" name="billSuburb" placeholder="Suburb" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/> City</span>
		<input type="text" style="width:265px; height:30px;" name="billCity" placeholder="City" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/> State</span>
		<input type="text" style="width:265px; height:30px;" name="billState" placeholder="State" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/> Postcode</span>
		<input type="text" style="width:265px; height:30px;" name="billPostcode" placeholder="Postcode" /><br>

	<span>Billing Notes</span>
		<textarea style="height:60px; width:265px;" name="billNotes"></textarea><br>

	<hr>
	<span>Delivery Details</span><br>
	<span>Address Line 1</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryTitle1" placeholder="Address Line 1" /><br>			

	<span>Address Line 2</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryTitle2" placeholder="Address Line 2" /><br>

	<span>Flat</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryFlat" placeholder="Flat" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Number</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryStreetNumber" placeholder="Street Number" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Name</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryStreetName" placeholder="Street Name" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Street Type</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryStreetType" placeholder="Street Type" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/> Suburb</span>
		<input type="text" style="width:265px; height:30px;" name="deliverySuburb" placeholder="Suburb" /><br>

	<span>
		<img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>City
	</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryCity" placeholder="City" /><br>

	<span>
		<img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>State
	</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryState" placeholder="State" /><br>

	<span><img src="images/street.png" width="25px" height="25px" alt="Street" title="Street"/>Postcode</span>
		<input type="text" style="width:265px; height:30px;" name="deliveryPostcode" placeholder="Postcode" /><br>			

	<span>Delivery Notes</span>
		<textarea style="height:60px; width:265px;" name="deliveryNotes"></textarea><br>
		
	<div style="float:right; margin-right:10px;">
		
	<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
	</div>
	</div>
</form>
