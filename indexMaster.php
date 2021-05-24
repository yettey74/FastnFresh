<?php
// Start session 
if(!session_id()){ 
    session_start();	
}
// Include the database config file  
include('db.php');

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/time.js" ></script>
	<script type="text/javascript" language="javascript" src="js/slide.js" ></script>
	
	<style>
		.carousel-inner > .item > img, .carousel-inner > .item > a > img { width: 20%;
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
	<?php 
	  $items = $cart->contents();
	  include( 'slide.php' ); 
	?> 	  
	  <hr>	  
	  <div>
		 <table>
			 <tr>			 
				 <div style="float: left;">
				 	<a href="cartview.php">
						<img src="images/cartYellow.png" width="135px" height="100px" alt="cart" title="cart" />
					</a>
				 </div>
				 
	  <?php 		    
		  
		  
		  if ( $cart->total_items() > 0 ){
			  
			  echo '<a href="cartview.php">
			  			<div style="float: right;
			  				color: gold;
							text-align: center;
							font-size: 30px;
				  			background-color: green; 
							background-image: linear-gradient(to bottom, green, yellow); 
							border-style:inset;
							border-spacing: 20px; 
							padding: 10px; 
							width: auto;
							min-width: 135px; 
							height: 100px;" >';
			  
				  if ( $cart->total() > 0 ){
					  echo ' $ ' . number_format( $cart->total(), 2 , '.' , ',' );					 
				  } else {
					  echo ' $ ' . number_format( 0, 2 , '.' , ',' );					 
				  }
			  	echo '<br>';
				  if( $cart->total_items() == 1 ){
					  echo '<span style="color:green;">' . $cart->total_items() . ' Item</span>';
				  } else {
					  echo '<span style="color:green;">' . $cart->total_items() . ' Items</span>';				  
				  }	
			  echo '</div></a>';
			  
			  echo '<div class="clear"></div>';
			  // add an image of the product in the cart and also the amount
			  
			  foreach ( $items as $item ){
				  echo '<div style="float: left; 
				  			color: green; 
				  			background-color: green; 
							background-image: linear-gradient(to bottom, green, yellow); 
							border-style: inset;
							border-spacing: 40px; 
							padding: 10px;
							width: auto;
							height: auto;
							min-width: 135px;  
							min-height: 100px;">';
					  echo '<span style="color: gold; font-size: 32px;">' . $item['qty'] . ' ' . $item['type'] . '</span><br>';
// insert up down option ... maybe
					  echo '<img src="images/' . $item['image'] . '" width="50px" height="50px" />';
				  	?>
				 		<button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;">
							<img src="images/trashRed.png" width="25px" height="25px" alt="Remove" title="Remove" /> 
							
						</button>
				 <?php
				  echo '</div>';				  
			  }
			  		   
		  } else { ?>
			    <div style="float: right;
			  				color: gold;
							text-align: center;
							font-size: 30px;
				  			background-color: green; 
							background-image: linear-gradient(to bottom, green, yellow); 
							border-style:inset;
							border-spacing: 20px;
							border-top: 20px;
							padding: 10px; 
							width: auto; 
							height: auto;
							min-width: 90px; 
							min-height: 100px;">
					<?php
			  echo ' $ ' . number_format( 0 , 2 , '.' , ',' );
			  echo '</div>';
		  }
			echo '<div class="clear"></div>';	
				 echo '<hr>';
				  include( 'specials.php' );
				 
?>
	</tr>
</table>		
</div>
	</div>
	  <hr>
	 
<div class="shop">
<?php
		  $categoryQ = "SELECT * FROM `category` WHERE `cid` in(SELECT `cid` FROM `product` WHERE `status` = 1)";
		  $categoryR = $conn->query($categoryQ);

		  if($categoryR !== false) {
			foreach( $categoryR as $category){
				$cid = $category['cid'];
				
				echo '<button class="accordion" style="background-color: lightgreen; font-style:strong;"><img src="images/' . $category['categoryImage'] . '" width=50px; height=50px; />' . $category['categoryName'] . '</button>';
				?>
				<div class="panel">
				<?php
				
				$productTypeQ = "SELECT `p`.`productName`, `pt`.* 
								 FROM `producttype` AS `pt`
								 LEFT JOIN `product` AS `p`
								 ON `p`.`pid` = `pt`.`pid`
								 WHERE `pt`.`cid` = '$cid' 
								 && `pt`.`status` = '1' 
								 && `pt`.`archive` = '0' 
								 GROUP BY `p`.`pid`, `pt`.`ptname`";
				
				$productTypeR = $conn->query($productTypeQ);
				
				if($productTypeR !== false) {
					?><div class="productRow"><?php					
					foreach($productTypeR as $productType) {
						$ptid = $productType['ptid'];
						$ptImage = $productType['ptImage'];
						$ptBlurb = $productType['ptBlurb'];
						?><div class="child-left"><?php
							echo '<div style="text-align: center; color:black;">' . $productType['ptName'] . '</div>';
							//echo '<div style="text-align: center; color:black;">' . $productType['productName'] . '</div>';
							echo '<div class="productImage">';
							if ( !empty($ptImage)){
								echo '<img src="images/' . $productType['ptImage'] . '" width=50px; height=50px; />';
							} else {
								echo '<img src="images/blank.png" width=50px; height=50px; />';
							}							
							echo '</div>';
							
							if ( !empty($ptBlurb)){
								echo '<div class="productBlurb" style="text-align: center;"><textarea">' . $productType['ptBlurb'] . '</textarea></div>';
							} else {
								echo '<div class="productBlurb" style="text-align: center;"><textarea">No Blurb to Blurb about.</textarea></div>';
							}
						
							echo '<div class="addToCart" style="text-align: center;">';
							echo '<a href="cartAction.php?action=addToCart&id=' . $ptid . '" class="btn btn-success"><img src="images/addCart.png" width="50px" height="50px" alt="Add to Cart" title="Add to Cart" /></a></div>';
						?></div><?php // END child-left
					}
					?></div><?php // END PRODUCTTYPE ROW
					echo '<div class="clear"></div>';
				}
				?></div><?php // END PANEL CLASS
			}
		  }
			echo '<button class="accordion" style="background-color: lightgreen; font-style:strong;"><img src="images/' . $category['categoryImage'] . '" width=50px; height=50px; />Recipes</button>';
				?>
				<div class="panel">
				<?php
				
				$recipes = $conn->query("SELECT `recipe_id`, `recipe_title`, `recipe_image`, `recipe_blurb` FROM recipes");				
				if($recipes !== false) {
					?><div class="productRow"><?php					
					foreach($recipes as $recipe) {
						$recipe_id = $recipe['recipe_id'];
						$recipe_title = $recipe['recipe_title'];
						$recipe_image = $recipe['recipe_image'];
						$recipe_blurb = $recipe['recipe_blurb'];
						?><a href="recipeview.php?id=<?php echo $recipe_id; ?>"><div class="child-left"><?php
							
							echo '<div class="recipeImage">';
							if ( !empty($recipe_image)){
								echo '<img src="images/' . $recipe['recipe_image'] . '" width=50px; height=50px; />';
							} else {
								echo '<img src="images/blank.png" width=50px; height=50px; />';
							}							
							echo '</div>';
						
							echo '<div style="text-align: center; color:black;">' . $recipe['recipe_title'] . '</div>';
							
							if ( !empty($recipe_blurb)){
								echo '<div class="recipe_blurb" style="text-align: center;"><textarea">' . $recipe['recipe_blurb'] . '</textarea></div>';
							} else {
								echo '<div class="recipe_blurb" style="text-align: center;"><textarea">No Blurb to Blurb about.</textarea></div>';
							}
																		
					?></div></a><?php // END child-left
					}
					?></div><?php // END PRODUCTTYPE ROW
					echo '<div class="clear"></div>';
				}?>
				</div>
	
	<button class="accordion" style="background-color: lightgreen; font-style:strong;"><img src="images/' . $category['categoryImage'] . '" width=50px; height=50px; />Storage hints n tips </button>
				
				<div class="panel">
				<?php
								
				$storages = $conn->query("SELECT `pt`.`ptImage`, `pt`.`ptName`, `st`.*
										 FROM `producttype` AS `pt`
										 LEFT JOIN `storage` AS `st`
										 ON `st`.`ptid` = `pt`.`ptid`");				
				if($storages !== false) {
					?><div class="productRow"><?php					
					foreach($storages as $storage) {
						$ptid = $storage['ptid'];
						$ptName = $storage['ptName'];
						$ptImage = $storage['ptImage'];
						$storage_id = $storage['storage_id'];
						$storage_title = $storage['storage_title'];
						$storage_blurb = $storage['storage_blurb'];
						?><div class="child-left"><?php
							
							echo '<div class="ptImage">';
							if ( !empty($ptImage)){
								echo '<img src="images/' . $ptImage . '" width=50px; height=50px; />';
							} else {
								echo '<img src="images/blank.png" width=50px; height=50px; />';
							}							
							echo '</div>';
						
							if ( !empty($storage_title)){
								echo '<div class="storage_blurb" style="text-align: center; font-size:24px;">' . $storage_title . '</div>';
							} else {
								echo '<div class="recipe_blurb" style="text-align: center; font-size:24px;">' . $ptName . ' Storage</div>';
							}
							if ( !empty($storage_blurb)){
								echo '<div class="storage_blurb" style="text-align: center;"><textarea">' . $storage_blurb . '</textarea></div>';
							} else {
								echo '<div class="recipe_blurb" style="text-align: center;"><textarea">No Storage Solution yet.</textarea></div>';
							}
																		
						?></div><?php // END child-left
					}
					?></div><?php // END PRODUCTTYPE ROW
					echo '<div class="clear"></div>';
				} ?> 
				</div> <!-- // END PANEL div -->
	
	</div><?php // END SHOP CLASS
include( 'jobs.php' ); 
//include( 'footer.php' ); 
include( 'menu.php' ); ?>
   
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
</body>
</html>