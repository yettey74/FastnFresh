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
		include('db.php');
		$ptid = 1;
        $query = $conn->query("SELECT `p`.`productName`, `pt`.* FROM `productType` AS `pt`
							 JOIN `product` AS `p` 
							 ON `p`.`pid` = `pt`.`pid`
							 WHERE `ptid` = " . $ptid); 
        $row = $query->fetch();
		
		$itemType = array(
			'kilo' => $row['kilo'],
			'box' => $row['box'],
			'bunch' => $row['bunch'],
			'punnet' => $row['punnet'],
			'single' => $row['single']	
		);
		
		//compare the array to find lowest price as starting point
		$minimum = 1000.00;
		//echo $min;		
		
		foreach( $itemType as $key => $value )
		{
			echo $value . '<br>';
			if ($value > 0 & $value < $minimum)
			{
				$minimum = $value;
			}
			
		}
		
		
		echo 'By FOREACH ' . $minimum . '<br>';
		
		//echo $currentMin = array_search(min($itemType),$itemType); 	
		/*$minimum = min(array($kilo ,
		$box ,
		$bunch ,
		$punnet ,
		$single ));
		
		echo 'By MINARRAY ' . $minimum . '<br>';
		*/
		
		$itemCart = array(
            'price' => number_format( $minimum, 2, ".", "," ), 
            'qty' => 1 	
		);
				
		foreach( $itemCart as $key=>$value ){
			echo 'CART FOREACH ' . $key . ' = ' . $value . '<br>';;
		}
		?>
	</body>
</html>