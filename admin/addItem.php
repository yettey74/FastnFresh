<?php
include 'sec.layer.php';

$id = isset( $_GET['id'] )? $_GET['id'] : '';

?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveItem.php" method="post">
	<center>
		<h4><i class="icon-plus-sign icon-large"></i> Add Tray Item</h4>
	</center>
	<hr>
	<div id="ac">			
		<label>Product</label>
	<br>
			<?php
		echo '<select name="item" size="1">';
			$varieties = $conn->query("SELECT ptid, ptName FROM `producttype`");
			if ( $varieties != FALSE ){
			  foreach($varieties as $variety)
				{
					echo '<option name="' . $variety['ptName'] . '" value="' . $variety['ptid'] . '">'  . $variety['ptName'] . ' </option>';
				}
				echo '</select>';
			} else {
				echo 'BAD DATA';

			}
	?>
		<br>
		<br>
		<label>Unit</label><br>
	<?php
		echo '<select name="uom_id" size="1">';
			$uoms = $conn->query("SELECT uom_id, uomLong FROM `uom`");
			if ( $uoms != FALSE ){
			  foreach($uoms as $uom)
				{
					echo '<option name="' . $uom['uomLong'] . '" value="' . $uom['uom_id'] . '">'  . $uom['uomLong'] . ' </option>';
				}
				echo '</select>';
			} else {
				echo 'BAD DATA';

			}
	?>
		<br>
		<br>
		<label>Quantity</label><br>
		<input type="text" name="quantity" value="" />
		<br>
				
		<label>Notes</label><br>
		<input type="text" name="notes" value="" />
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
