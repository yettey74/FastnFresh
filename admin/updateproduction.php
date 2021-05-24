<?php
include 'sec.layer.php';
$id = isset( $_GET['id'])? $_GET['id'] : '';
$s = isset( $_GET['s'])? $_GET['s'] : '';
include ( 'db.php ');

$q = $conn->query("UPDATE `producttype` SET `status` = '1' WHERE `ptid` = '$id'");
$q->execute();

header( 'location: production.php');

?>