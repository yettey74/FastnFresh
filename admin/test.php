<?php

include 'db.php';
include 'apple/seed.php';

echo 'start.<br>';
$itemType = array();

echo 'Array started.<br>';

$query = $conn->query("SELECT `uom_id`, `cost_price` FROM `product_cost_price` WHERE `ptid` = '1' && `endDate` = 'NULL'"); 
$result = $query->execute();

echo 'Query Complete.<br>';

for( $i = 0; $price = $query->fetch(); $i++ ){
	$itemType[$price['uom_id']] = $price['cost_price'];
}

echo 'Item Array Complete.<br>';
 
foreach( $itemType as $key=>$value ){
	echo $key . ' => ' . $value . '<br>';
}
?>
<select id="unitType" name="unitType" tabindex=""  onchange="updateCartPrice(this, '<?php echo $item["rowid"] ; ?>')">
	<?php
	// load this from the db and not from the cached cart
	//echo '<option value="" selected="">Weigh By</option>';
	foreach ( $itemType as $key=>$value ){
		if( $key == 1 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Box $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option value="' . $key .'">Box $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}

		if( $key == 2 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Kilo $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option value="' . $key .'">Kilo $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}

		if( $key == 3 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Punnet $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option value="' . $key .'">Punnet $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}

		if( $key == 4 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Bunch $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option value="' . $key .'">Bunch $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}

		if( $key == 5 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Single $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option name="single" value="' . $key .'">Single $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}

		if( $key == 6 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Tray $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option name="single" value="' . $key.'">Tray $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}

		if( $key == 7 ){	
			if( $value == $item['price']){
				echo '<option value="' . $key .'" selected="">Bag $' . number_format( $value, 2, '.', ',') . '</option>';	
			} else {
				echo '<option name="single" value="' . $key .'">Bag $' . number_format( $value, 2, '.', ',') .'</option>';
			}
		}
	}
	?>
	</select>