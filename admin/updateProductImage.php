<?php
include 'sec.layer.php';
$id = isset($_POST['id'])? $_POST['id'] : '';


$ptImage = isset($_POST['ptImage'])? $_POST['ptImage'] : '';

$q = $conn->query("UPDATE `producttype` SET `ptImage` = '$ptImage' WHERE `ptid` = '$id'");
$q->execute();

header( 'location: production.php');

?>