<div id="menu" class="nav">
  <a href="#" class="close" onclick="closeSlideMenu()">
	<i class="fas fa-times"></i>
  </a>
	<!--<form name="clock" style="text-align: center;">
		<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
	  </form>-->
	<?php 
	//create resource
	$uri = $_SERVER['REQUEST_URI'];	
	$page = '';	
	// check needle in stack
	if ( ($pos = strpos( $uri, "/" ) ) !== FALSE ) { 		
		$page_temp = substr( $uri, $pos + 1 ); 
		if ( ($pos = strpos( $page_temp, "/" ) ) !== FALSE ) {
			$pos2 = strpos( $page_temp, "/" );
			$page = substr( $page_temp, $pos2 + 1 ); 
		}
	}	
	
	if (isset($_SESSION["loggedin"] ) && $_SESSION["loggedin"] == TRUE ) 
	{ ?>
	<hr>
	<div style="text-align:center;">
		Welcome <?php echo isset( $_SESSION['first_name'])? $_SESSION['first_name'] : '' ; ?><a href="logout.php" style="text-decoration:none;"/>logout</a>
	<?php
	}
		
	
	foreach($_SESSION as $key=>$value){
		//echo $key . '=>' . $value . '<br>';
	}			
	if( !isset( $_SESSION["loggedin"]) ){
		echo '<div style="text-align:center;">';
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
			  </div>';
		echo '<div class="row">';
		echo '<button type="submit" class="btn btn-sm btn-success" name="login" value="Login">Log In</button>';
		echo '&nbsp;&nbsp;&nbsp;';
		?>
		<button type="button" class="btn btn-sm btn-warning" onclick="window.location.href='registration.php';" name="register" value="Register">Register</button>
	<?php
		echo '</div>';
		echo '</form>';
		echo '</div>';				
	}
	if ( isset( $_SESSION['access'] ) ){
		if( $_SESSION['access'] == 1 ){
			echo '<a href="admin/door.php" style="text-decoration:none;">Admin</a>';			
		}
	}
	if( $page != "index.php" ){
		echo '<a href="index.php" style="text-decoration:none;">Shopfront</a>';
	}
	if( $page != "cartView.php" ){
		echo '<a href="cartView.php" style="text-decoration:none;">Cart</a>';
	}
	if( isset( $_SESSION["loggedin"]) ){
		echo '<a href="profile.php" style="text-decoration:none;">Profile</a>';
	}
/*	if( $page != "recipeview.php" ){
		echo '<a href="recipeview.php" style="text-decoration:none;">Recipies</a>';
	}*/
	if( $page != "policy.php" ){
		echo '<a href="policy.php" style="text-decoration:none;">Policy &amp; Cookies</a>';
	}
	if( $page != "terms.php" ){
		echo '<a href="terms.php" style="text-decoration:none;">Terms &amp; Conditions</a>';
	}
	if( $page != "shipping.php" ){
		echo '<a href="shipping.php" style="text-decoration:none;">Shipping &amp; Returns</a>';
	}
	if( $page != "contact.php" ){
		echo '<a href="contact.php" style="text-decoration:none;">Contact Us</a>';
	}
	
	?>
  </div>