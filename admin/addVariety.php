<?php
include 'sec.layer.php';
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savevariety.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Variety</h4>
	</center>
	<hr>
	<div id="ac">
	<h3 style="color:blueviolet;">What Category and Product Group Does the Variety Belong To?</h3>
	<table>
		<thead>
			<th width="40%" style="color:blueviolet;">Category</th>
			<th width="20%" style="color:blueviolet;">&nbsp;</th>
			<th width="40%" style="color:blueviolet;">Product</th>
		</thead>
		<tbody>
			<tr>
				<td style="text-align:left";>
					<select name="cid" size="1" style="color:blueviolet;">
					<?php
					$categories = $conn->query( "SELECT cid, categoryName FROM `category`" );
					foreach($categories as $category)
					{
						echo '<option value="' . $category['cid']. '" >'  . $category['categoryName'] . ' </option>';
					}
					?>
					</select>
				</td>
				<td>&nbsp;</td>
				<td style="text-align:left"; >								
					<select name="pid" size="1" style="color:blueviolet;">
					<?php
					$products = $conn->query("SELECT pid, productName FROM `product`");
					foreach($products as $product)
					{
						echo '<option value="' . $product['pid'] . '" > ' . $product['productName'] . ' </option>';
					}
					?>
					</select>
				</td>					
			</tr>
		</tbody>		
	</table>		
		<br>			
			<hr>
				<!--<h2>What Does It Cost?</h2>		
		<table>
				<thead>					
					<th width="40%">Buy Price</th>
					<th width="20%">&nbsp;</th>
					<th width="40%">Stock Level</th>
					<th width="20%">&nbsp;</th>
					<th width="40%">Unit type</th>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:left";>
							<input type="number" style="width:100px; height:30px;" min="0"  step="0.1" name="buy" value="0" />
						</td>
						<td>&nbsp;</td>						
						<td style="text-align:left";>
							<input type="number" min="0" style="width:100px; height:30px;" name="variety_stock" min="0" step=".1" value="0" />
						</td>
						<td>&nbsp;</td>
						<td style="text-align:left";>								
						<?php
							/*echo '<select name="uom_id" size="1">';
							$uoms = $conn->query("SELECT uom_id, uomShort FROM `uom` ORDER BY `uomShort` ASC");
							foreach($uoms as $uom)
							{
								echo '<option value="' . $uom['uom_id'] . '" > ' . $uom['uomShort'] . ' </option>';
							}
							echo '</select>';*/
						?>
						</td>					
					</tr>
				</tbody>		
			</table>
		<br>	-->	
				<h3 style="color:blueviolet;">How Do I Order This Variety?</h3>		
		<table>
			<thead>					
				<th width="30%" style="color:blueviolet;">Size</th>
				<th width="30%" style="color:blueviolet;">Unit Type</th>
				<th width="30%" style="color:blueviolet;">Count Per Unit<br> ** @ OR Weight</th>
			</thead>
			<tbody>
				<tr>
					<td style="text-align:left";>								
					<?php
						echo '<select name="size_id" size="1">';
						$sizes = $conn->query("SELECT `size_id`, `size_title` FROM `sizes` ORDER BY `size_title` ASC");
						foreach($sizes as $size)
						{
							echo '<option value="' . $size['size_id'] . '" > ' . $size['size_title'] . ' </option>';
						}
						echo '</select>';
					?>
					</td>
					<td style="text-align:left";>								
					<?php
						echo '<select name="uom_id" size="1">';
						$uoms = $conn->query("SELECT uom_id, uomShort FROM `uom` ORDER BY `uomShort` ASC");
						foreach($uoms as $uom)
						{
							echo '<option value="' . $uom['uom_id'] . '" > ' . $uom['uomShort'] . ' </option>';
						}
						echo '</select>';
					?>
					</td>	
					<td><input type="number" name="count" min="0" step="1" value="0" /></td>
				</tr>
			</tbody>		
			</table>
		<br>	
			<hr>
				<h3 style="color:blueviolet;">What is the Varieties Name?</h3>
		<input type="text" style="width:265px; height:30px;" name="ptName" placeholder="Variety Name" Required />
		<br>
		<br>
		<input type="file" style="width:265px; height:30px;" name="ptImage" />
		<!--<input type="text" style="width:265px; height:30px;" name="box" placeholder="Box Price"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="kilo" placeholder="Kilo Price"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="punnet" placeholder="Punnet Price"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="bunch" placeholder="Bunch Price"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="single" placeholder="Single Price"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="tray" placeholder="Tray Price"  />
		<br>
		<br>
		<input type="text" style="width:265px; height:30px;" name="bag" placeholder="Bag Price"  />
		<br>-->
		<br>
		<textarea style="width:265px; height:30px;" name="ptBlurb" placeholder="Variety Blurb" /></textarea><br>
		<!--<br>
		<br>
		<textarea style="width:265px; height:30px;" name="ptReceipe" placeholder="Receipe" /></textarea><br>-->
		<br>
		<label style="color:blueviolet;">Variety Active</label>
		<br>
		<input style="color:blueviolet;" type="radio" name="status" value = "1" />On
		<input style="color:blueviolet;" type="radio" name="status" value = "0" />Off
		<br>
		<br>
	<div style="float:right; margin-right:10px;">
		
	<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
	</div>
	</div>
</form>
