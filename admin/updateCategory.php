<?php
include 'sec.layer.php';

$id = ($_POST['cid'])? $_POST['cid'] : '';
$ci = ($_POST['ci'])? $_POST['ci'] : '';

$categoryName = ($_POST['categoryName'])? $_POST['categoryName'] : '';
$categoryImage = ($_POST['categoryImage'])? $_POST['categoryImage'] : '';
$status = ($_POST['status'])? $_POST['status'] : '';
$picture = !empty($categoryImage)? $categoryImage : $ci;

$sql = $conn->prepare("UPDATE category SET
						`categoryName`= ?, 
						`categoryImage`= ?,
						`status`= ?
					  WHERE cid=?");
$sql->execute(array($categoryName, $picture, $status, $id));

header("location: editCategory.php");

?>