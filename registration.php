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
	<title>Registration</title>
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
	
	<script type="text/javascript">
$(document).ready(function(){
	$("form.register").change(function() {
		$.post("check.php", $("form.register").serialize(), function( data ) {
			if( data.email == "inuse" )
				$("p#email_error").slideDown();
			else
				$("p#email_error").hide();
			if( data.password == "missmatch" )
				$("p#password_error").slideDown();
			else
				$("p#password_error").hide();
			
		}, "json");
	});
});
</script>
	
  <style>
	form fieldset { -moz-border-radius: 6px; -webkit-border-radius: 6px; border: 1px solid #dfe6ee; padding: 10px 15px; }
	form fieldset legend { font-size: 22px; }
	form fieldset input { margin-bottom: 4px; padding: 3px; font-size: 17px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; color: #51555b; }
	form fieldset label { font-weight: bold; padding: 0 0 0 15px; }
	form fieldset p.error {
		margin: 0; background: #fdb5b5; -webkit-border-radius-bottomleft: 5px; -moz-border-radius-bottomleft: 5px; -webkit-border-radius-bottomright: 5px; -moz-border-radius-bottomright: 5px;
		border-left: 2px solid #cd4646; border-right: 2px solid #cd4646; border-bottom: 2px solid #cd4646; text-transform: lowercase; font-size: 13px; font-weight: bold;
		display: none; margin: 0 0 5px 0; padding: 4px; width: 200px; }
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
  	<div id="content" style="text-align:left;">
	<?php include( 'slide.php' ); ?> 
	<div class="shop">
		<div class="container">
				<form method="post" action="rego.php">
					<p>
						<fieldset>
							<legend>Registration Form</legend>	
							
							<input type="text" name="email" value="" />
							<label>email</label>
							<p id="email_error" class="error">Email is not valid</p>
							<br>
							
							<input type="password" name="password" value="" />
							<label>password</label>
							<br>
							
							<input type="password" name="password_again" value="" />
							<label>password Again</label>
							<p id="password_error" class="error">Passwords do not match</p>
							<br>
							
							<input type="submit" name="submit" value="register" />
						</fieldset>
					</p>
				</form>
			</div>
		</div>
	</div><!-- END OF CONTENT CLASS -->
<?php include( 'menu.php');?>
</body>
</html>