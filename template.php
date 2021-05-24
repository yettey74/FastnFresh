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
	<script type="text/javascript" language="javascript" src="js/slide.js" ></script>
<!--	
	<style>
		.carousel-inner > .item > img, .carousel-inner > .item > a > img { width: 20%;
											margin: auto;
										  }
	</style>-->
</head>
<body>
  <div id="content">
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
		  <img src="images/shop/store_logo_head400x120_trans.png" alt="logo" title="logo" />
      </a>
		  <form name="clock">
		  	<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
		  </form>
	  </span>
	  <hr>
	  test
	  
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