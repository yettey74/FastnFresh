<?php
include 'sec.layer.php';

$a = ($_POST['ptid'])? $_POST['ptid'] : '';
$b = ($_POST['storage_title'])? $_POST['storage_title'] : '';
$c = ($_POST['storage_blurb'])? $_POST['storage_blurb'] : '';
$d = ($_POST['storage_id'])? $_POST['storage_id'] : '';
$e = ($_POST['status'])? $_POST['status'] : '';
// query
$sql = $conn->prepare("UPDATE storage SET
						`ptid`= ?,
						`storage_title`= ?, 
						`storage_blurb`= ?, 
						`status`= ?
					  WHERE storage_id=?");
//$q = $conn->prepare($sql);
$sql->execute( array( $a, $b, $c, $e, $d) );
header("location: storage.php");

?>