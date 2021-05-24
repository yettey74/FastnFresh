<?php
include 'sec.layer.php';
$datetime = new DateTime();

// new data
$id = ($_POST['id'])? $_POST['id'] : '';
$a = ($_POST['recipe_title'])? $_POST['recipe_title'] : '';
$b = ($_POST['recipe_image'])? $_POST['recipe_image'] : '';
$c = ($_POST['recipe_blurb'])? $_POST['recipe_blurb'] : '';
$d = ($_POST['recipe_link'])? $_POST['recipe_link'] : '';
$e = ($_POST['status'])? $_POST['status'] : '';
$f = ($_POST['ptid'])? $_POST['ptid'] : '';
$g = $datetime->format('Y-m-d H:i:s');

// query
$sql = $conn->prepare("UPDATE recipes SET
						`recipe_title`= ?, 
						`recipe_image`= ?, 
						`recipe_blurb`= ?, 
						`recipe_link`= ?, 
						`status`= ?,
						`ptid`= ?,
						`modified_on`= ?
					  WHERE recipe_id=?");
//$q = $conn->prepare($sql);
$sql->execute(array($a, $b, $c, $d, $e, $f, $g, $id));
header("location: recipes.php");

?>