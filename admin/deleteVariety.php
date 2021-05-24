<?php
include 'sec.layer.php';
	$id = $_GET['id'];

	$result = $conn->prepare("UPDATE `producttype` SET `status` = '0' && `archive` = '1' WHERE `ptid` = :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>