<?php
// configuration
include('../db.php');

// new data
$id = ($_POST['sid'])? $_POST['sid'] : '';
$a = ($_POST['specialTitle'])? $_POST['specialTitle'] : '';
$b = ($_POST['specialBlurb'])? $_POST['specialBlurb'] : '';
$c = ($_POST['specialImage'])? $_POST['specialImage'] : '';
$d = ($_POST['ptid'])? $_POST['ptid'] : '';
// query
$sql = $conn->prepare("UPDATE special SET
						`specialTitle`= ?, 
						`specialBlurb`= ?, 
						`specialImage`= ?, 
						`ptid`= ?
					  WHERE sid=?");
//$q = $conn->prepare($sql);
$sql->execute(array($a,$b,$c,$d, $id));
header("location: marketing.php");

?>