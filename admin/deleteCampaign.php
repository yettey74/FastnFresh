<?php
include 'sec.layer.php';

	$id = $_GET['id'];

	$result = $conn->prepare("DELETE FROM special WHERE sid = :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>