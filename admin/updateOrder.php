<?php
include 'sec.layer.php';

//////////////////////
// Variety Details
//////////////////////
$a = isset( $_POST['customer_id'] )? $_POST['customer_id'] : '';
$b = isset( $_POST['grand_total'] )? $_POST['grand_total'] : '';
$c = isset( $_POST['oid'] )? $_POST['oid'] : '';

$varietyUpdate = $conn->prepare("UPDATE order SET
								`customer_id`= ?, 
								`grand_total`= ?
							  	WHERE `id` = ?");

$varietyUpdate->execute(array( $a, $b, $c ) );

header("location: srm.php");
?>