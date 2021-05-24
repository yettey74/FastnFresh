<?php
include 'sec.layer.php';

$id = ($_POST['size_id'])? $_POST['size_id'] : '';

$size_title = ($_POST['size_title'])? $_POST['size_title'] : '';

$sql = $conn->prepare("UPDATE sizes SET
						`size_title`= ?
					  WHERE size_id=?");
$sql->execute( array( $size_title, $id ) );

header("location: editCategory.php");

?>