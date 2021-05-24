<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("SELECT *
						FROM `employee` 
						WHERE `emp_id` = :employeeID");
	$result->bindParam(':employeeID', $id);
	$result->execute();

	for( $i=0; $row = $result->fetch(); $i++ ){
		$emp_id = $row['emp_id'];
		$name = $row['employee_firstName'] . ' ' . $row['employee_lastName'] ;
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="updateEmployee.php" method="post">
			<center><h4><i class="icon-edit icon-large"></i> Edit Employee</h4></center>
			<hr>
			<div id="ac">
				<span style="text-align: center; color:red;"><strong>Employee Details</strong></span>
			<br>				
			<label>First Name</label>
			<input type="text" style="width:265px; height:30px;" name="employee_firstName" value="<?php echo $row['employee_firstName']; ?>" />
			<br>
			<label>Last Name</label>
			<input type="text" style="width:265px; height:30px;" name="employee_lastName" value="<?php echo $row['employee_lastName']; ?>" />
			<br>
			<label>Phone</label>
			<input type="text" style="width:265px; height:30px;" name="employee_phone" value="<?php echo $row['employee_phone']; ?>" />
			<br>
			<label>Pay Rate</label>
			<input type="number" style="width:265px; height:30px;" name="payrate" value="<?php echo $row['payrate']; ?>" />
			<br>
			<label>Tax File Number</label>
			<input type="number" style="width:265px; height:30px;" name="employee_tfn" value="<?php echo $row['employee_tfn']; ?>" />
			<br>
			<label>Commenced On</label>
			<input type="date" style="width:265px; height:30px;" name="employee_commencement" value="<?php echo $row['employee_commencement']; ?>" />
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
			<label>Notes</label>
			<input type="text" style="width:265px; height:30px;" name="employee_notes" value="<?php echo $row['employee_notes']; ?>" />
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