<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file 
include 'db.php';
include 'apple/seed.php';

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Shopfront</title>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script defer src="js/all.js"></script>
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" language="javascript" src="js/slide.js" ></script>
	
	<style>
		.carousel-inner > .item > img, .carousel-inner > .item > a > img 
		{
			width: 30%;
			margin: auto;
		}
	</style>
	
	<style>
		::placeholder {
		  color: black;
		  opacity: 1; /* Firefox */
		}

		:-ms-input-placeholder { /* Internet Explorer 10-11 */
		 color: black;
		}

		::-ms-input-placeholder { /* Microsoft Edge */
		 color: black;
		}
	</style>
</head>
<body>
<div id="content">	 
	<div class="shop">
		<div class="container">
			<?php 			
				$items = $cart->contents();
				$specials = getSpecialCount( $conn );

				include( 'slide.php' );

				echo '<div class="clear"></div>';

				if ( $specials > 0 ){
					include 'specials.php';
					echo '<div class="clear"></div>';
				}

$categoryQ = "SELECT * FROM `category` WHERE `status` = 1";
$categoryR = $conn->query($categoryQ);
/* foreach( $categoryR as $cat )
{
	echo $cat['cid'];
} */

$counter = 0;
if( $categoryR !== false ) {

	foreach( $categoryR as $category){

		$cid = $category['cid'];

		if( categoryHasVariety( $conn, $cid ) > 0 ){
			echo '<button class="accordion" style="background-color: lightgreen; font-style:strong;">
					<img src="images/' . $category['categoryImage'] . '" width=50px; height=50px; />'
					 . $category['categoryName'] 
					 . '</button>';			
			echo '<div class="panel">';
				echo '<div class="productRow">';
				$productTypeQ = "SELECT `p`.`productName`, `pt`.`ptid`, `pt`.`ptName`, `pt`.`ptImage`, `pt`.`ptBlurb` 
								FROM `producttype` AS `pt`
								LEFT JOIN `product` AS `p`
								ON `p`.`pid` = `pt`.`pid`
								WHERE `pt`.`cid` = '$cid' 
								&& `pt`.`status` = '1' 
								&& `pt`.`archive` = '0' 
								GROUP BY `p`.`pid`, `pt`.`ptname`";

				$productTypeR = $conn->query($productTypeQ);

				foreach($productTypeR as $productType) {
					$ptid = $productType['ptid'];
					$ptName = $productType['ptName'];
					$ptImage = $productType['ptImage'];
					$ptBlurb = $productType['ptBlurb'];
					$isPrice = isPrice( $conn, $ptid );
					$thisQty = '0';
					$row_id = '0';
					
					if( $counter == 0 ){
						echo '<div class="child-left">';
						//$counter++;
					} else {
						echo '<div class="child-next">';
					}

					echo '<form action="cartAction.php" method="get">';
						echo '<div class="productImage">';				
						if ( !empty($ptImage)){
							echo '<div style="text-align: center; color:black;"><img src="images/' . $ptImage . '" width="25px" height="25px" alt="' . $ptName . '" title="' . $ptName . '" /></div>';					
						} else {
							echo '<div style="text-align: center; color:black;">' . $ptid . '</div>';
						}							
						echo '</div>';
						echo '<div class="productName">';
						echo $ptName;
						echo '</div>';

						echo '<div class="productAmount" style="float:left;">';						
						echo '<label>Amount</label><br>';
						echo '<input class="form-control" type="number" name="qty" min="0" value="' . $thisQty . '"/>';
						echo '</div>';
						?>
						
						<div class="productUOM" style="float:left;">		
							<label>Unit</label><br>
							<select name="unitType" tabindex="">
							<?php
							// load this from the db and not from the cached cart
							// echo '<option value="" selected="">Weigh By</option>';
							$uom_ids = getuomids( $conn );

							foreach( $uom_ids as $uom_id ){
								$price = getUom_price( $conn, $uom_id, $ptid );
								$uomLong = getUomLong( $conn, $uom_id );
								
								if( $price > 0 ){
									if( $price == $item['price']){
										echo '<option value="' . $uom_id . '" selected="">' . $uomLong . ' $' . number_format( $price, 2, '.', ',') . '</option>';	
									} else {
										echo '<option value="' . $uom_id . '">' . $uomLong . ' $' . number_format( $price, 2, '.', ',') . '</option>';
									}
								} 
								
							}	
							?>
							</select>
						</div>
						<?php

						echo '<div class="clear"></div>';

						/* echo '<div class="productBlurb">';
						if ( !empty($ptBlurb)){
							echo '<div style="text-align: center;"><textarea">' . $ptBlurb . '</textarea></div>';
						} else {
							echo '<div style="text-align: center;"><textarea">No Blurb to Blurb about.</textarea></div>';
						}
						echo '</div>'; */

						echo '<div class="clear"></div>';

						echo '<input type="hidden" name="row_id" value="' . $row_id . '"/>';
						echo '<input type="hidden" name="ptid" value="' . $ptid . '"/>';
						/* echo '<input type="hidden" name="thisQty" value="' . $thisQty . '"/>'; */
						echo '<div class="productSubmit" style="text-align: center; content-align:center;">';
							echo '<button type="submit" class="btn btn-sm btn-default" name="addToCartFrontPage" value="">';
							echo '<img src="images/basket_green.png" width="50px" height="50px" alt="Add to Cart" title="Add to Cart" />';
							echo '</button>';
						echo '</div>';
						echo '</form>';
					echo '</div>';
				}
				$counter = 0;
			
				echo '</div> <!-- END PRODCT ROW CLASS -->';
				echo '<div class="clear"></div>';
			echo '</div> <!-- END PANEL CLASS -->'; 
		}
	}
}
?>
   
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
	this.classList.toggle("active");
	var panel = this.nextElementSibling;
	if (panel.style.display === "block") {
	  panel.style.display = "none";
	} else {
	  panel.style.display = "block";
	}
  });
}
</script>
<?php 
include( 'menu.php' ); ?>
</body>
</html>