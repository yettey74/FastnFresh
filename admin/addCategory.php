<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveCategory.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Category</h4>
	</center>
	<hr>
	<div id="ac">
		<input type="text" style="width:265px; height:30px;" name="categoryName" placeholder="Category Name" Required />
		<br>
		<br>
		<input type="file" style="width:265px; height:30px;" name="categoryImage" />
		<br>
		<br>
		<div style="float:left; margin-left:15px; margin-right:15px;">		
			<button class="btn btn-success btn-block btn-large" style="width:267px;">
				<i class="icon icon-save icon-large"></i> Save
			</button>			
		</div>
	</div>
</form>
