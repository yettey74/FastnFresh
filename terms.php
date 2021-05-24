<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

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
  <title>Terms</title>
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
	 <?php include( 'slide.php' ); ?> 	  	 
	<div class="shop">
	<div class="container">
		<div class="row">
			<h1>Terms &amp; Conditions</h1>
			<p></p>
		</div>	
	</div> <!-- END OF SHOP CLASS -->
<?php include('menu.php'); ?>
</body>
</html>