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

$id = isset($_GET['id'])? $_GET['id'] : '';

$recipes = $conn->query("SELECT * FROM `recipes` WHERE `recipe_id` = '$id'");
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
<div class="container">
<?php
				
	if($recipes !== false) {
		?><div class="productRow"><?php					
		foreach($recipes as $recipe) {			

			$recipe_ingredient = $conn->query("SELECT * FROM `recipe_ingredients` WHERE `recipe_id` = '$id'");

			$recipe_step = $conn->query("SELECT * FROM `recipe_steps` WHERE `recipe_id` = '$id'");	
			
			$recipe_id = $recipe['recipe_id'];
			$recipe_title = $recipe['recipe_title'];
			$recipe_image = $recipe['recipe_image'];
			$recipe_blurb = $recipe['recipe_blurb'];
			$recipe_link = $recipe['recipe_link'];
			?><div class="row"><?php
				echo '<div style="text-align: center; color:orange; font-size: 38px;">' . $recipe_title . '</div>';
				echo '<div class="recipeImage" style="text-align: center;">';
				if ( !empty($recipe_image)){
					echo '<img src="images/' . $recipe_image . '" width=150px; height=150px; />';
				} else {
					echo '<img src="images/blank.png" width=150px; height=150px; />';
				}							
				echo '</div>';

				if ( !empty($recipe_blurb)){
					echo '<div class="recipe_blurb" style="text-align: center; color:black; font-size: 20px;  font-weight: bold; font-style: italic;"><textarea">' . $recipe_blurb . '</textarea></div>';
				} else {
					echo '<div class="recipe_blurb" style="text-align: left; color:black; font-size: 20px;"><textarea">No Blurb to Blurb about.</textarea></div>';
				}
			
				echo '<div class="recipe_ingredients" style="width:200px;"></div>';
				echo '<div style="text-align: center; color:green; font-size: 34px;">Ingredients</div>';
				foreach( $recipe_ingredient as $ingredient ){
					echo'<div><span style="width:200px; color:green; font-size:25px;">'. $ingredient['ri_amount'] . '</span><span style="width:200px; color:black; font-size:26px;"> ' . $ingredient['ri_ingredient'] . '</div>';
				}

				echo '<div class="recipe_steps" style="width:200px; font-size:22px;"></div>';
				echo '<div style="text-align: center; color:green; font-size: 34px;">Steps</div>';
				foreach( $recipe_step as $step ){
					echo'<div><span style="width:200px; color:green; font-size:25px;">'. $step['rs_step'] . '</span><span style="width:200px; color:black; font-size:26px;"> ' . $step['rs_description'] . '</div>';
				}
			
				echo '<div class="recipe_link" style="width:200px;"></div>';
				echo '<h2>Link</h2>';
				if ( !empty($recipe_link)){
					echo '<div class="recipe_link" style="text-align: left; color:black; font-size: 20px;">' . $recipe['recipe_link'] . '</div>';
				} else {
					echo '<div class="recipe_content" style="text-align: left; color:black; font-size: 20px;"><textarea">No Link to Link about.</textarea></div>';
				}

			?></div><?php // END row
		}
		?></div>
	</div>
	</div>
	<?php // END PRODUCTTYPE ROW
		echo '<div class="clear"></div>';
	}
	?>
<?php include( 'menu.php');?>					
</body>
</html>