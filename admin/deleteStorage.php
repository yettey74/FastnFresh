<?php
include 'sec.layer.php';

	$id = $_GET['id'];

//  delete all steps first

/*$result = $conn->prepare("DELETE FROM storage_steps WHERE storage_id = :memid");
$result->bindParam(':memid', $id);
$result->execute();*/

$result = $conn->prepare("DELETE FROM storage WHERE storage_id = :memid");
$result->bindParam(':memid', $id);
$result->execute();
?>