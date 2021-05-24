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

if (isset($_POST['update-profile'])) {
	//Set the POST values
 	$id = isset($_POST['id'])? $_POST['id']: '';
 	$first_name = isset($_POST['first_name'])? $_POST['first_name']: '';
 	$last_name = isset($_POST['last_name'])? $_POST['last_name']: '';
 	$email = isset($_POST['email'])? $_POST['email']: '';
 	$phone = isset($_POST['phone'])? $_POST['phone']: '';
 	$address = isset($_POST['address'])? $_POST['address']: '';	
	//Create query 
    $userQ = "UPDATE `customers` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `id` = '$id'";     
    $userR = $conn->query( $userQ );
	
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['email'] = $email;
	$_SESSION['phone'] = $phone;
	$_SESSION['address'] = $address;
}
?>

<!DOCTYPE html>
<html><head>
  <title>Profile</title>
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

</head>
<body>
  <div id="content">
	  
    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars "></i>
		  <img src="images/shop/store_logo_head400x120_trans.png" alt="logo" title="logo" />
      </a>
		  
	  </span>
	  <hr>
	  <ul class="breadcrumb">
	<span>
		<form name="clock">
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
		</form>
	</span>
	<li><a href="index.php">Shopfront</a></li>
	<li>Profile</li>
	<br>
		  <br>
	  <form method="post" action="#">
		<p><h2>Profile</h2>
		<table border="0" cellspacing="3" cellpadding="3" width="80%">
			<tr>
				<td><label>First Name</label></td>
				<td><input type="text" name="first_name" autofocus="autofocus" value="<?php echo (isset($_SESSION['first_name'])? $_SESSION['first_name'] : '' ); ?>"></td>
			</tr>
			<tr>
				<td><label>Last Name</label></td>
				<td><input type="text" name="last_name" autofocus="autofocus" value="<?php echo (isset($_SESSION['last_name'])? $_SESSION['last_name'] : '' ); ?>"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="text" name="email" autofocus="autofocus" value="<?php echo (isset($_SESSION['email'])? $_SESSION['email'] : '' ); ?>"></td>
			</tr>
			<tr>
				<td><label>Phone</label></td>
				<td><input type="text" name="phone" autofocus="autofocus" value="<?php echo (isset($_SESSION['phone'])? $_SESSION['phone'] : '' ); ?>"></td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td><input type="text" name="address" autofocus="autofocus" value="<?php echo (isset($_SESSION['address'])? $_SESSION['address'] : '' ); ?>"></td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input type="hidden" name="id" <?php echo (isset($_SESSION['uid'])? $_SESSION['uid'] : '' ); ?> />
					<button class="submit_btn" type="submit" name="update-profile">Update</button>
					<!--<button class="cancel_btn" type="reset" name="cancel">Cancel</button>-->
				</td>
			</tr>
		</table>
		</p>
	</form>
	  
</div> <!-- END OF SHOP CLASS -->	
<?php include( 'menu.php' ); ?>
	
</body>
</html>