<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveSize.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Size</h4>
	</center>
	<hr>
	<div id="ac">
		<input type="text" style="width:265px; height:30px;" name="size" placeholder="Variety Size" Required />
		<br>
		<br>
		<div style="float:left; margin-left:15px; margin-right:15px;">		
			<button class="btn btn-success btn-block btn-large" style="width:267px;">
				<i class="icon icon-save icon-large"></i> Save Size
			</button>			
		</div>
	</div>
</form>
