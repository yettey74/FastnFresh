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
<html><head>
  <title>Frontpage</title>
  <meta charset="utf-8">
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
	<script>
	  function openSlideMenu(){
		document.getElementById('menu').style.width = '250px';
		document.getElementById('content').style.marginLeft = '250px';
	  }
	  function closeSlideMenu(){
		document.getElementById('menu').style.width = '0';
		document.getElementById('content').style.marginLeft = '0';
	  }		
    </script>
	
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
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
		  <img src="images/store_logo300x200.png" width="300px" height="100px" alt="logo" title="logo" />
      </a>
		  <form name="clock">
		  	<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
		  </form>
	  </span>
	  
	  <div class="advert" style="text-align: center;">
	  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#special">Specials </button>
	  <div id="special" class="collapse">
	  	<div class="adverts" style="background-color: #FCD299; border-radius:185px;">
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				  
			  <!-- Indicators -->
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
						$specialQ = "SELECT s.*, `pt`.* 
									FROM `special` AS `s`
									JOIN `producttype` AS `pt`  
									ON`s`.`ptid` = `pt`.`ptid`
									WHERE `active` = '1'";
						if ( $conn->query($specialQ) == TRUE ){	
						  $count = 0;						
						  $specialR = $conn->query($specialQ);
						  if( $specialR !== false ) {
							foreach( $specialR as $special){
								$ptid = $special['ptid'];
								if( $count == 0 ){
						  			echo '<div class="item active">';
									$count = $count + 1;							
								} else {
						  			echo '<div class="item">';
								}
								echo'<img src="images/' . $special['specialImage'] . '" alt="' .  $special['specialTitle']. ' " title="' .  $special['specialTitle']. '" width="50px" height="50px">
										<div class="carousel-caption">
										  <h3> ' . $special['specialTitle'] . '</h3>
										  <p>' . $special['specialBlurb'] . '</p>
										</div>
									</div>';
							} 
						  } else {
							  echo 'Error';
						  }
						} else {
							echo "<div>No Specials Available.</div>";
						}					
					?>			 
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		  </div>
		  </div>
	  </div><!-- END advert-->
	  
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
		  $items = $cart->contents();
		  
		  if ( $cart->total_items() > 0 ){
			  
			  echo '<div style="float: right;
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
							height: 100px;">';
			  
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
			  echo '</div>';
			  
			  echo '<div class="clear"></div>';
			  // add an image of the product in the cart and also the amount
			  
			  foreach ( $items as $item ){
				  echo '<div style="float: left; 
				  			background-color: green; 
							background-image: linear-gradient(to bottom, green, yellow); 
							border-style:inset;
							border-spacing: 20px; 
							padding: 10px;
							width: auto;
							min-width: 135px;  
							height: 100px;">';
					  echo '<span style="color: gold; font-size: 32px;">' . $item['qty'] . '</span>';
// insert up down option ... maybe
					  echo '<img src="images/' . $item['image'] . '" width="50px" height="50px" />';
				  	?>
				 		<button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;">
							<img src="images/trashRed.png" width="25px" height="25px" alt="Remove" title="Remove" /> 
						</button>
				 <?php
				  echo '</div>';				  
			  }
			  		   
		  } else {
			  echo '<div style="float: right;
			  				color: gold;
							text-align: center;
							font-size: 30px;
				  			background-color: green; 
							background-image: linear-gradient(to bottom, green, yellow); 
							border-style:inset;
							border-spacing: 20px; 
							padding: 10px; 
							width: auto;
							min-width: 90px; 
							height: 100px;">';
			  echo ' $ ' . number_format( 0 , 2 , '.' , ',' );
			  echo '</div>';
		  }
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
				
				echo '<div class="panel">';	
				
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
					echo '<div class="productRow">';					
					foreach($productTypeR as $productType) {
						$ptid = $productType['ptid'];
						$ptImage = $productType['ptImage'];
						$ptBlurb = $productType['ptBlurb'];
						echo '<div class="child-left">';
							echo '<div style="text-align: center; color:black;">' . $productType['ptName'] . '</div>';
							echo '<div style="text-align: center; color:black;">' . $productType['productName'] . '</div>';
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
							echo '<a href="cartAction.php?action=addToCart&id=' . $ptid . '" class="btn btn-success"><img src="images/addCart.png" width="50px" height="50px" alt="Add to Cart" title="Add to Cart" /></a>';
							echo '</div>'; // END addToCart
						echo '</div>'; // END child-left
					}
					echo '</div>'; // END PRODUCTTYPE ROW
					echo '<div class="clear"></div>';
				}
				echo '</div>'; // END ??
			}
			echo '</div>'; // END PANEL CLASS
		  }
?>
</div> <!-- END OF SHOP CLASS -->
	
    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
		<?php if (isset($_SESSION["loggedin"] ) && $_SESSION["loggedin"] == TRUE ) { ?>
		<hr>
		Welcome <?php echo $_SESSION['uid']; ?>
		<hr>
		<?php
}
		?>
		
      	
		<?php			
			if( !isset( $_SESSION["loggedin"]) ){
				echo 'Login / Register';
				echo '<form method="post" action="login.php" name="signin-form">';
				echo '<div class="form-element">
						<label>Email</label>
						<br>
						<input type="email" name="email" required />
					  </div>
					  <div class="form-element">
						<label>Password</label>
						<br>
						<input type="password" name="password" required />
					  </div>
						<button type="submit" name="login" value="Login">Log In</button>
						
					</form>';
				echo '<div><a href="rego.html" style="text-decoration:none;">Register</a></div>';				
			} else {
				// give option to logout
				echo '<a href="logout.php" />logout</a>';
				/*foreach( $_SESSION as $key=>$value ){
					echo $key . ' ' . $value;
				}*/
				//echo '<a href="viewcart.php">Cart</a>';
				//echo '<a href="profile.php">Profile</a>';
			}
		?>
		<a href="index.php">Shop</a>
		<a href="policy.php">Policy &amp; Cookies</a>
		<a href="terms.php">Terms &amp; Conditions</a>
		<a href="shipping.php">Shipping &amp; Returns</a>
		<a href="contact.php">Contact Us</a>
  	</div>
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