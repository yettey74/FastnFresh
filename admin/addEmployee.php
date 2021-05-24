<?php
include 'sec.layer.php';
?>

<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveEmployee.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Employee</h4>
	</center>
	<hr>
	<div id="ac">			
		<input type="file" style="width:265px; height:30px;" name="employee_image" /><br>
		<br>			
		<input type="text" style="width:265px; height:30px;" name="employee_firstName" placeholder="First Name" Required /><br>			
		<input type="text" style="width:265px; height:30px;" name="employee_lastName" placeholder="Last Name" Required /><br>			
		<input type="text" style="width:265px; height:30px;" name="employee_phone" placeholder="Phone Number" Required /><br>			
		<input type="text" style="width:265px; height:30px;" name="employee_tfn" placeholder="Tax File Number" Required /><br>			
		<input type="text" style="width:265px; height:30px;" name="payrate" placeholder="Payrate" Required /><br>
		<br>
		<label>Commencement Date</label>
		<input type="date" style="width:265px; height:30px;" name="employee_commencement" />
		<br>
		<br>
		<br>
		<textarea style="width:265px; height:30px;" name="employee_notes" placeholder="Employee Notes" /></textarea><br>
		<br>
		<br>
		<br>
		
		<div style="float:right; margin-right:10px;">
			<button class="btn btn-success btn-block btn-large" style="width:267px;">
				<i class="icon icon-save icon-large"></i> Save
			</button>
		</div>
	</div>
</form>
