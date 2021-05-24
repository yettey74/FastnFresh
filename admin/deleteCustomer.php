<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("DELETE FROM fnfCustomer WHERE customer_ID= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>