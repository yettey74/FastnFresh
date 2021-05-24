<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savevariety.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Variety</h4>
	</center>
	<hr>
	<div id="ac">
	<!--<span>Category</span>
		<input type="text" style="width:265px; height:30px;" name="categoryName" placeholder="Category" disabled/>-->
	<?php
		echo '<select name="cid" size="1">';
			$categoryQ = "SELECT cid, categoryName, categoryImage FROM `category`";
			$categoryR = $conn->query( $categoryQ );
			if ( $categoryR != FALSE ){
			  foreach($categoryR as $category)
				{
					echo '<option name="' . $category['categoryName'] . '" value="' . $category['cid'] . '">'  . $category['categoryName'] . ' </option>';
				}
				echo '</select>';
			} else {
				echo 'BAD DATA';

			}
	?>
	<br>
		
	<span>Product</span>
		<input type="text" style="width:265px; height:30px;" name="productName" placeholder="Product" Required /><br>
		
	<span>Variety</span><input type="text" style="width:265px; height:30px;" name="varietyName" placeholder="Variety" Required /><br>
		
	<span>Image</span>
		<input type="text" style="width:265px; height:30px;" name="varietyImage" placeholder="Variety Imaged" /><br>
				
	<span>Active</span>
		<input type="radio" name="vActive[]" value = "1" />On
		<input type="radio" name="vActive[]" value = "0" />Off
		<br>

	<span>Variety Blurb </span>
		<textarea style="height:60px; width:265px;" name="varietyBlurb"></textarea><br>
		
	<div style="float:right; margin-right:10px;">
		
	<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
	</div>
	</div>
</form>
