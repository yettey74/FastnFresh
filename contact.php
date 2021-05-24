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
  <link rel="stylesheet" href="css/contact_form.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- jQuery library -->
  <script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/time.js" ></script>
  <script type="text/javascript" language="javascript" src="js/slide.js" ></script>
  <script type="text/javascript" language="javascript" src="js/contact_form.js"></script>
  <script type="text/javascript" language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div id="content">
		 <?php include( 'slide.php' ); ?> 	  	 
	  <div class="shop">
		<div id="mainform">
			<form id="form">
				<h3>Contact Form</h3>
				<p id="returnmessage"></p>

				<label>Name: <span>*</span></label><br>
				<input type="text" id="name" placeholder="Name"/><br>

				<label>Email: <span>*</span></label><br>
				<input type="text" id="email" placeholder="Email"/><br>

				<label>Contact No: <span>*</span></label><br>
				<input type="text" id="contact" placeholder="10 digit Mobile no."/><br>

				<label>Message:</label><br>
				<textarea id="message" placeholder="Message......."></textarea><br>

				<input type="button" id="submit" value="Send Message"/>
			</form>
		</div>	<!-- END OF mainform id -->
	  </div>
		<?php include('menu.php'); ?>
	</div>	
</body>
</html>