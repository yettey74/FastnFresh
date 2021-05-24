<?php
include 'sec.layer.php';

$a = ($_POST['ptid'])? $_POST['ptid'] : '';
$b = ($_POST['storage_title'])? $_POST['storage_title'] : '';
$c = ($_POST['storage_blurb'])? $_POST['storage_blurb'] : '';
$d = ($_POST['status'])? $_POST['status'] : '';

$q = $conn->prepare("INSERT INTO `storage` ( `ptid`, `storage_title`, `storage_blurb`, `status` ) VALUES ( :a, :b, :c, :d )");

$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':d'=>$d ) );
header("location: storage.php");
?>