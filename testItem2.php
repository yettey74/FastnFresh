<?php
include'db.php';
include 'apple/seed.php';
include_once 'Cart.class.php'; 
$cart = new Cart();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Frontpage</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	</head>
	<body>
		<?php
		// Get product details 
		$ptid = 1;
		$itemType = getUomAndPrices( $conn, $ptid );
		$min = 1000;
		$type = '';
		
		echo '_____________________ARGS OUT()_____________________<br>';
		
		foreach( $itemType as $key=>$value ){
			if( $value < $min ){
				//echo 'Key : ' . $key . ' => ' . $value . '<br>';
				$min = $value;
				$type = $key;
			}
		}
		echo $type
?>
</body>
</html>