<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecampaign.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Trainig M</h4>
	</center>
	<hr>
	<div id="ac">
		<input type="text" style="width:265px; height:30px;" name="training_title" placeholder="Training Name" Required /><br>
	<br>
		<br>
		<textarea style="width:265px; height:30px;" name="training_blurb" placeholder="Training Blurb" /></textarea><br>
	<br>
	<br>
		<label>Status</label>				
			<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="1" /><label for="active">On</label>

		<input type="radio" style="width:30px; height:30px;" id="active" name="status" value="0" /><label for="active">Off</label>
	<br>
		
	<div style="float:right; margin-right:10px;">
	<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
	</div>
	</div>
</form>
