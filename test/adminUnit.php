<?php  
// Include the database config file  
include('../db.php');
 
if ( isset($_POST['Submit'])){
	if( $_POST["Submit"] == "Submit"){
		if( isset($_POST['unit'])){
			$arr = [];
			$unit = $_POST['unit'];
			for ($i=0; $i<sizeof ( $unit ); $i++) {  
				$arr +=  $unit;
			}
			//serialise array to string
			$units = ""; 
			$units = implode (",", $arr);
			//$query = "INSERT INTO producttype (units) VALUES ('" . $unit[$i] . "')"; 
			// UPDATE `producttype` SET `units`= 'Single,Box' WHERE `ptid`=1
			$query = "UPDATE `producttype` SET `units` = '$units' WHERE `ptid` = '1'";
			echo $query;
			$result = $conn->query($query);
			if( $result == TRUE ){
				echo "Record is inserted";
				echo $query;
			} else {
				echo "Record Failed to insert";	
				echo $result;	
			}
		} else {
			echo 'Unit not set';
		}
	} else {
			echo 'Submit not equal';
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>unit update</title>
</head>

<body>
	<form action="#" method="post">
		<input type="checkbox" name="unit[ ]" value="Single">Single <br>
		<input type="checkbox" name="unit[ ]" value="Kilo">Kilo <br>
		<input type="checkbox" name="unit[ ]" value="Box">Box <br>
		<input type="checkbox" name="unit[ ]" value="Punnet">Punnet <br>
		<input type="checkbox" name="unit[ ]" value="Bunch">Bunch <br>  
		<input type="submit" name="Submit" value="Submit">  
	</form> 
</body>
</html>