<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savesupplier.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4>
	</center>
	<hr>
	<div id="ac">			
		<input type="text" style="width:265px; height:30px;" name="supplier_name" placeholder="Supplier Name" Required />
		<br>
		<br>
		<input type="number" style="width:265px; height:30px;" name="company" placeholder="Company" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="address1" placeholder="address1" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="address2" placeholder="address2" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="address3" placeholder="address3" />
		<br>
		<br>
		<input type="date" style="width:265px; height:30px;" name="address4" placeholder="address4" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="address5" placeholder="address5" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="contact" placeholder="Contact" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="alt_contact" placeholder="Alternate Contact" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="phone1" placeholder="Phone 1"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="phone2" placeholder="Phone 2"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="fax" placeholder="Department"  />
		<br>
		<br>
		<input type="email" style="width:265px; height:30px;" name="email" placeholder="Email Address" />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="chequeName" placeholder="Cheque Name"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="account_number" placeholder="Account Number"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="supplier_type" placeholder="Supplier Type"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="terms" placeholder="Terms"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="credit_limit" placeholder="Credit Limit"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="tax_id" placeholder="Tax ID"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="note" placeholder="Note"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="status" placeholder="Status"  />
		
	<!--	<br>
		<br>
		<input type="file" name="asset_image" />
	<input type="text" style="width:265px; height:30px;" name="specialImage" placeholder="Image" Required /><br>-->		
		<br>
		<br>

		<div style="float:right; margin-right:10px;">
		<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
		</div>
	</div>
</form>
