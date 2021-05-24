<?php
	include('db.php');
	$id = $_GET['id'];
	//$id = 1;
	//$result = $conn->prepare("SELECT * FROM category WHERE `cid` = :varietyID");
	
	/*$result = $conn->prepare("SELECT `c`.`cid`,`c`.`categoryName`, `c`.`categoryImage`, `c`.`status` AS `cStatus`, `c`.`archive` AS `cArchive`, `p`.`pid`, `p`.`productName`, `p`.`productBlurb`, `p`.`status` AS `pStatus` , `p`.`archive` AS `pArchive` ,`pt`.`ptid`, `pt`.`ptName`, `pt`.`ptImage`, `pt`.`kilo`, `pt`.`box`, `pt`.`punnet`, `pt`.`bunch`, `pt`.`single`, `pt`.`ptBlurb`, `pt`.`varietyRecipe`,  `pt`.`status` AS `ptStatus`, `pt`.`archive` AS `ptArchive`
						FROM `category` AS `c` 
						LEFT JOIN `product` AS `p` 
						ON `c`.`cid` = `p`.`cid` 
						RIGHT JOIN `producttype` AS `pt` 
						ON `p`.`pid` = `pt`.`pid`
						WHERE `pt`.`ptid` = :varietyID");*/

$result = $conn->prepare("SELECT `c`.`cid`,`c`.`categoryName`, `c`.`categoryImage`, `p`.`pid`, `pt`.`ptid`, `pt`.`ptName`, `pt`.`ptImage`, `pt`.`kilo`, `pt`.`box`, `pt`.`punnet`, `pt`.`bunch`, `pt`.`single`, `pt`.`ptBlurb`, `pt`.`varietyRecipe`
						FROM `category` AS `c` 
						LEFT JOIN `product` AS `p` 
						ON `c`.`cid` = `p`.`cid` 
						RIGHT JOIN `producttype` AS `pt` 
						ON `p`.`pid` = `pt`.`pid`
						WHERE `pt`.`ptid` = :varietyID");
	$result->bindParam(':varietyID', $id);
	$result->execute();
	for( $i=0; $row = $result->fetch(); $i++ ){
?>
		<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
		<form action="savevariety.php" method="post">
			<center><h4><i class="icon-edit icon-large"></i> Edit Variety</h4></center>
			<hr>
			<div id="ac">
			<input type="hidden" name="ptid" value="<?php echo $id; ?>" />
			<span>Category Details</span>
			<br>
			<?php
			echo '<select name="cid" size="1">';
			$categories = $conn->query( "SELECT cid, categoryName FROM `category`" );
			  foreach($categories as $category)
				{
				  if ( $category['cid'] == $row['cid'] ){
					echo '<option value="' . $category['cid'] . '" selected>'  . $category['categoryName'] . ' </option>';
				  } else {
					echo '<option value="' . $category['cid'] . '" >'  . $category['categoryName'] . ' </option>';
				  }
				}
			echo '</select>';
			?>
			<br>
				<hr>
				<span>Product Details</span><br>
			<!--<input type="text" style="width:265px; height:30px;" name="productName" value="<?php // echo $row['productName']; ?>" />
			<br>-->
			
			<?php
			echo '<select name="pid" size="1">';
			$products = $conn->query("SELECT pid, productName FROM `product`");
			foreach($products as $product)
			{
				if ( $product['pid'] == $row['pid'] ){
					echo '<option value="' . $product['pid'] . '" selected>'  . $product['productName'] . ' </option>';
				  } else {
					echo '<option value="' . $product['pid'] . '" > ' . $product['productName'] . ' </option>';
				}
			}
			echo '</select>';
			?>
				
			<hr>
			<span>Variety Details</span><br>
			<label>Name</label>
			<input type="text" style="width:265px; height:30px;" name="ptName" value="<?php echo $row['ptName']; ?>" />
			<br>			
			<label>Image</label>		
			<input type="text" style="width:265px; height:30px;" name="ptImage" value="<?php echo $row['ptImage']; ?>" />
			<br>
			<label>Kilo $</label>		
			<input type="text" style="width:265px; height:30px;" name="kilo" value="<?php echo  $row['kilo']; ?>" />
			<br>
			<label>Box $</label>					
			<input type="text" style="width:265px; height:30px;" name="box"	value="<?php echo  $row['box']; ?>" />
			<br>
			<label>Punnet $</label>					
			<input type="text" style="width:265px; height:30px;" name="punnet" value="<?php echo $row['punnet']; ?>" />
			<br>
			<label>Bunch $</label>				
			<input type="text" style="width:265px; height:30px;" name="bunch" value="<?php echo $row['bunch']; ?>" />
			<br>
			<label>Single $</label>			
			<input type="text" style="width:265px; height:30px;" name="single" value="<?php $row['single']; ?>"/>
			<br>
																					  
			<hr>
				<span>Blurb Should be<strong> NO</strong> more than 25 words.</span><br>
				<input type="text" style="width:265px; height:30px;" name="ptBlurb" value="<?php echo $row['ptBlurb']; ?>" /><br>			
				
			<!--<span>Recipe</span><br>
				<input type="text" style="width:265px; height:30px;" name="varietyReceipe" value="<?php// echo $row['varietyRecipe']; ?>" /><br>-->
				
			<span>Product Storage Notes</span><br>
				<textarea style="height:60px; width:265px;" name="deliveryNotes"><?php //echo $row['deliveryNotes'];?></textarea><br>
			
			Cid  <?php echo $row['cid']; ?> <br>
			Pid  <?php echo $row['pid']; ?><br>
			Ptid <?php echo $row['ptid']; ?><br>

			<div style="float:right; margin-right:10px;">
			<input type="hidden" name="cid" value="<?php echo $row['cid']; ?>" />
			<input type="hidden" name="pid" value="<?php echo $row['pid']; ?>" />
			<input type="hidden" name="ptid" value="<?php echo $row['ptid']; ?>" />				
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>