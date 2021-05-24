<?php
	include('db.php');
	$id = $_GET['id'];
	$result = $db->prepare("DELETE FROM customer WHERE customer_ID= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>