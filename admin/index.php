<?php

session_start();
include('../db.php');
include('../apple/seed.php');
setlocale(LC_MONETARY, 'en_AU.UTF-8');

//Define your root directory and change it inside function if your constant is different.
define("localhost/fnfWeb", dirname(__FILE__));
?>
<!--<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales </a>-->
<!--<a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>
<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>
-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<?php
	if ( isset($_SESSION['LoggedIn']) && !empty($_SESSION['LoggedIn'])){
		echo '<title>' . $_SESSION['fName'] . '</title>';
	} else {
		echo '<title>Admin</title>';
	}
	?>
  <meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="../favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="js/facebox/facebox.js"></script>
	<script language="javascript" type="text/javascript" src="js/time.js"></script>		
	<script language="javascript" type="text/javascript" src="js/menu.js"></script>		
	<script language="javascript" type="text/javascript" src="js/slide.js"></script>	
	
  
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
	<?php
	$msgType = "";
	$msgContent = "";	
	?>
  <div id="content"><?php
	  include ('slide.php');
	  ?>
	  <?php
		  // Get status message from session 
			$sessData = !empty($_SESSION['sessData'])? $_SESSION['sessData'] : ''; 
			if( !empty( $sessData['status']['msg'] ) ){ 
				$statusMsg = $sessData['status']['msg']; 
				$statusMsgType = $sessData['status']['type']; 
				unset( $_SESSION['sessData']['status'] ); 
			}
		  ?>
		  <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
					<div class="col-md-12">
						<div class="alert alert-success"><?php echo $statusMsg; ?></div>
					</div>
                <?php } elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
					<div class="col-md-12">
						<div class="alert alert-danger"><?php echo $statusMsg; ?></div>
					</div>
                <?php } ?>
		  </div>
	  </span>
	  <?php
	  // LOAD MESSAGE IF ANY
	  if ( $msgType ){
		  echo $msgContent;
	  }
	?>   
	   
<div class="shop">
<ul class="breadcrumb">
	<span>
		<form name="clock">
			<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled />
		</form>
	</span>
	<li><a href="../index.php">Frontdoor</a></li>
	<li>Administration Login</li>
</ul>
	   
<?php	  
echo '<div class="shop">';
	echo '<form action="login.php" method="post">';
		echo '<table>';
		echo '<tr><td>';
		echo '<input type="text" name="username" placeholder="Username"  required>';	
		echo '</td></tr>';
		echo '<tr><td>';
	    echo '<input type="text" name="password" placeholder="Password" required>';	
		echo '</td></tr>';
		echo'<tr><td><input type="submit" value="Login" name="login"></td></tr>';
		echo '</table>';				
	echo '</form>';
echo '</div>'; // END PANEL CLASS
		  
?>
	  
	</div> <!-- END OF SHOP CLASS --> 
    
<?php include( 'menu.php'); ?>
</body>
</html>