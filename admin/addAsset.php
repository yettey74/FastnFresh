<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveasset.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Asset</h4>
	</center>
	<hr>
	<div id="ac">			
		<input type="text" style="width:265px; height:30px;" name="asset_title" placeholder="Asset Name" Required />
		<br>
		<br>
		<input type="number" style="width:265px; height:30px;" name="quantity" placeholder="Quantity" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="brand" placeholder="Brand Name" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="model" placeholder="Model Name" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="serial" placeholder="Serial Number" Required />
		<br>
		<br>
		<input type="date" style="width:265px; height:30px;" name="purchase_date" placeholder="Purchase Date" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="purchase_value" placeholder="Purchase Price" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="current_value" placeholder="Current Value" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="location" placeholder="Location" Required />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="department" placeholder="Department" Required />
		<br>
		<br>
		<input type="date" style="width:265px; height:30px;" name="disposal_date" placeholder="" />
		<br>
		<br>
		<textarea style="width:265px; height:30px;" name="description" placeholder="Desctiption of Asset" /></textarea>
		<br>
		<br>
		<input type="file" name="asset_image" />
	<!--<input type="text" style="width:265px; height:30px;" name="specialImage" placeholder="Image" Required /><br>-->		
		<br>
		<br>

		<div style="float:right; margin-right:10px;">
		<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
		</div>
	</div>
</form>
