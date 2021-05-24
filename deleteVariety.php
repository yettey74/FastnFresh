<?php
	include('db.php');

	$id = $_GET['id'];

	$result = $db->prepare("DELETE FROM producttype WHERE ptid = :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>