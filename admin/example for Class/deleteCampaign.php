<?php
	include('db.php');
	$id = $_GET['id'];
	$result = $db->prepare("DELETE FROM special WHERE sid = :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>