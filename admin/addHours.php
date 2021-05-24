<?php
include 'sec.layer.php';

$id = isset( $_GET['id'] )? $_GET['id'] : '';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveHours.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Hours</h4>
	</center>
	<hr>
	<div id="ac">			
		<input type="date" style="width:265px; height:30px;" name="startdate" Required /><br>	
		<input type="time" style="width:265px; height:30px;" name="starttime" Required /><br>		
		<input type="date" style="width:265px; height:30px;" name="enddate" Required /><br>			
		<input type="time" style="width:265px; height:30px;" name="endtime" Required /><br>	
		<textarea style="width:265px; height:30px;" name="shift_notes" placeholder="Shift Notes" /></textarea><br>
		<br>
		<br>
		<input type="hidden" name="id" value="<?php echo $id?>"
		<div style="float:right; margin-right:10px;">
			<button class="btn btn-success btn-block btn-large" style="width:267px;">
				<i class="icon icon-save icon-large"></i> Save
			</button>
		</div>
	</div>
</form>
