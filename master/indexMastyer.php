<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file  
include('db.php');

// Initialize User class
require_once 'User.class.php';
$user = new User();

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Include the database config file 
//require_once 'dbConfig.php'; 

?>

<!DOCTYPE html>
<html><head>
  <title>Frontpage</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

</head>
<body>
	<?php
	$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	?>
  <div id="content">
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
      </a>
    </span>
	  <span>Insert Logo Here</span>
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
	  
	  
	  
	  <button class="accordion" style="background-color: lightgreen; font-style:strong;"><img src="images/cart.png" width=50px; height=50px; alt="Cart" title="Cart" />
	  <?php 		    
		  $items = $cart->contents();
		  
		  if ( $cart->total_items() > 0 ){
			  if( $cart->total_items() == 1 ){
				  echo $cart->total_items().' Item';
			  } else {
				  echo $cart->total_items().' Items';				  
			  }	
			  
			  if ( $cart->total() > 0 ){
				echo ' $ ' . number_format( $cart->total(), 2 , '.' , ',' );
			  } else {
				echo ' $ ' . number_format( 0 , 2 , '.' , ',' );
			  }
			  // add an image of the product in the cart and also the amount
			  echo '<table><tr>';
			  foreach ( $items as $item ){
				  echo '<td style="background-color: green; /* For browsers that do not support gradients */
	background-image: linear-gradient(to bottom, green, yellow); border-style:inset; padding: 10px;">' . $item['qty'] . ' ';
				  echo '<img src="images/' . $item['image'] . '" width="50px" height="50px" />';
				  echo '</td>';
				  echo '<td><img src="images/50x25_spacer.png" width="10px" height="10px" /></td>';
			  }
			  echo '</tr></table>';
			  		   
		  } else {
			  echo 'Trolley Empty... Start ordering today ...';
		  }
			
	  echo '</button>';
	  echo '<div class="panel">';
	  include( 'viewcart.php');
	  echo '</div>';
		  ?>
	 
<div class="shop">
<?php
		  $categoryQ = "SELECT * FROM `category` WHERE `cid` in(SELECT `cid` FROM `product` WHERE `status` = 1)";
		  $categoryR = $conn->query($categoryQ);

		  if($categoryR !== false) {
			foreach( $categoryR as $category){
				$cid = $category['cid'];
				
				echo '<button class="accordion" style="background-color: lightgreen; font-style:strong;"><img src="images/' . $category['categoryImage'] . '" width=50px; height=50px; />' . $category['categoryName'] . '</button>';
				
				echo '<div class="panel">';
				
				$ordeBy = 2;
				
				if( $ordeBy == 1 ) {
					$productTypeQ = "SELECT * FROM `producttype` WHERE `cid` = '$cid' && `status` = '1' && `archive` = '0' GROUP BY `ptName`, `pid`";
				} else if( $ordeBy == 2 ) {
					$productTypeQ = "SELECT * FROM `producttype` WHERE `cid` = '$cid' && `status` = '1' && `archive` = '0' GROUP BY `pid`, `ptname`";
				} else {
					$productTypeQ = "SELECT * FROM `producttype` WHERE `cid` = '$cid' && `status` = '1' && `archive` = '0' ORDER BY `ptname` ASC";
				}
				
				$productTypeR = $conn->query($productTypeQ);
				if($productTypeR !== false) {
					echo '<div class="productRow">';					
					foreach($productTypeR as $productType) {
						$ptid = $productType['ptid'];
						$rrp = $productType['rrp'];
						$ptImage = $productType['ptImage'];
						$ptBlurb = $productType['ptBlurb'];
						echo '<div class="child-left">';							
							echo '<div style="text-align: center; color:black;">' . $productType['ptName'] . '</div>';
							echo '<div class="productImage">';
							if ( !empty($ptImage)){
								echo '<img src="images/' . $productType['ptImage'] . '" width=50px; height=50px; />';
							} else {
								echo '<img src="images/blank.png" width=50px; height=50px; />';
							}							
							echo '</div>';
						
							/*echo '<div class="productPrice" style="text-align: center;">$' . number_format( $rrp , 2 , '.' , ',' ) . '</div>';*/
							
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
		
      	<a href="index.php">Shop</a>
		<?php			
			if( !isset( $_SESSION["loggedin"]) ){
				echo 'Login / Register';
				echo '<form method="post" action="login.php" name="signin-form">';
				echo '<div class="form-element">
						<label>Email</label>
						<input type="email" name="email" required />
					  </div>
					  <div class="form-element">
						<label>Password</label>
						<input type="password" name="password" required />
					  </div>
						<button type="submit" name="login" value="Login">Log In</button>
						
					</form>';
				echo '<div><a href="rego.html" style="text-decoration:none;">Register</a></div>';				
			} else {
				// give option to logout
				echo '<a href="logout.php" />logout</a>';
				foreach( $_SESSION as $key=>$value ){
					echo $key . ' ' . $value;
				}
				echo '
      	<a href="viewcart.php">Cart</a>
      	<a href="profile.php">Profile</a>';
			}
		?>		
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