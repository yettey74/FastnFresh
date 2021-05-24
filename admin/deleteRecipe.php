<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("DELETE FROM recipes WHERE recipe_id = :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>