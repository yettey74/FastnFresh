<?php
include 'sec.layer.php';

	$id = $_GET['id'];

// get uom choices
	$uomQ = $conn->query("SELECT `uom_id`, `uomShort` FROM `uom`");
	$uomR = $uomQ->execute();

	$result = $conn->prepare("SELECT `c`.`cid`,`c`.`categoryName`, `c`.`categoryImage`, `p`.`pid`, `p`.`productName`, `pt`.`ptid`, `pt`.`ptName`, `pt`.`ptImage`, `pt`.`size_id`, `pt`.`count`, `pt`.`variety_stock`, `pt`.`ptBlurb`, `pt`.`varietyRecipe`, `pt`.`status`, `pt`.`uom_id`
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

			<center><h2><i class="icon-edit icon-large"></i> Edit Variety</h2></center>
		<hr>
<form action="updateVariety.php" method="post">
<button class="btn btn-success btn-block btn-large" style="width:350px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
<hr>
<span style="font-size: 30px";>
		<?php 
			$categoryName = $row['categoryName'];
			$ptid = $row['ptid'];
			$ptImage = $row['ptImage'];
			$productName = $row['productName'];
			$ptName = $row['ptName'];

			if ( $ptImage !== '' ){
				echo '<img src="../images/' . $ptImage . '" width="50px" height="50px" alt="' .  $ptImage . '" title="' .  $ptImage . '" />';
			} else {
				echo '<img src="../images/50x25_spacer_green.png" width="50px" height="50px" alt="Variety Image" title="No Title" />';
			}
		echo '&nbsp;' . $ptName . '<br>';	
		?>
	<td>
		<input type="file" name="ptImage" value="<?php echo $ptImage; ?>" />
	</td>
</span>
	<?php 
	  if( $categoryName == "Fruit & Veg Trays" ){?>
		<a href="editCategory.php">
			<a href="trayview.php?id=<?php echo $ptid; ?>" class="btn btn-block btn-warning" style="float:center; width:230px; height:35px;">Edit Tray Items</a>
		</a>
<br>
<?php } ?>
			<hr>			
			<div id="ac">
				<h3 style="color:blueviolet;">What Product Group?								
					<span style="color:black; font-size:16px;"><select name="pid" size="1">
					<?php
					$products = $conn->query("SELECT pid, productName FROM `product`");
					foreach($products as $product)
					{
						if ( $product['pid'] == $row['pid'] ){
							echo '<option value="' . $product['pid'] . '" selected>'  . $product['productName'] . ' </option>';
						  } else {
							echo '<option value="' . $product['pid'] . '" > ' . $product['productName'] . ' </option>';
						}
					}
					?>
					</select></span></h3>	
			<table>
				<thead>					
					<th width="30%" style="color:blueviolet; text-align: center;"></th>
					<th width="40%" style="color:blueviolet;">Details</th>
					<th width="30%" style="color:blueviolet;"></th>
				</thead>
				<tbody>
					<tr>
						<td>&nbsp;</td>
						<td style="align-content: center; text-align:center";>								
						<?php
							echo 'Size : ' . $row['size_id'] . '<br>';
							echo 'Unit : ' . $row['uom_id'] . '<br>';
							/*echo 'Count : ' . $row['count'] . '<br>';*/							
						?>
						</td>			
						<td>&nbsp;</td>			
					</tr>
				</tbody>		
			</table>		
			
			<br>
			<hr>
			
			<span style="text-align: center;">
				<label>
					<strong>Variety Details</strong>
				</label>
			</span
				<br>
			<label>Name</label>
			<input type="text" style="width:265px; height:30px;" name="ptName" value="<?php echo $ptName; ?>" />
			<br>		
			
			<?php
				$uoms = getUom_ids( $conn );
		
				foreach ($uoms as $uom_id ){					
					$uomName = getUomLong( $conn, $uom_id );					
					$price = getRRP( $conn, $ptid, $uom_id );
					
					echo '<label>' . $uomName . ' $</label>';
					echo '<input type="text" style="width:265px; height:30px;" name="' . $uomName .'" value="' . $price . '" /><br>';
					echo '<input type="hidden" name="' . $uomName .'_h" value="' . $price. '" />';
				}				
			?>
				
			<hr>
			<span style="text-align: center; color:red;"><strong>Blurb</strong> Should be<strong> NO</strong> more than 25 words.</span><br>
			<textarea style="width:265px; height:30px;" name="ptBlurb" ><?php echo $row['ptBlurb']; ?></textarea>
			
			<br>
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
				
			<div style="float:right; margin-right:10px;">
			<input type="hidden" name="cid" value="<?php echo $row['cid'] ?>" />
			<input type="hidden" name="ptid" value="<?php echo $row['ptid']; ?>" />	
			<input type="hidden" name="pti" value="<?php echo $row['ptImage']; ?>" />				
			<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
			</div>
			</div>
		</form>
<?php
}
?>