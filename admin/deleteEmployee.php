<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("DELETE FROM employee WHERE emp_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>