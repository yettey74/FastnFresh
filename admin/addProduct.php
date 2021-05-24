<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveProduct.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Product</h4>
	</center>
	<hr>
	<div id="ac">
		
	<span>Category</span><br>
		
	<?php include('db.php');
		echo '<select name="cid" size="1">';
			$categories = $conn->query("SELECT cid, categoryName FROM `category`");
			if ( $categories != FALSE ){
			  foreach($categories as $category)
				{
					echo '<option name="' . $category['categoryName'] . '" value="' . $category['cid'] . '">'  . $category['categoryName'] . ' </option>';
				}
				echo '</select>';
			} else {
				echo 'BAD DATA';

			}
	?>
		<br
		<br>		
		<input type="text" style="width:265px; height:30px;" name="productName" placeholder="Product Name" Required />
		<br>
		<br>
		<textarea style="height:60px; width:265px;" name="productBlurb" placeholder="Insert Product Blurb"></textarea><br>		
		<br>		
	<div style="float:right; margin-right:10px;">
		
	<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
	</div>
	</div>
</form>
