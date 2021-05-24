<?php
// configuration
include('db.php');

// new data
$cid = isset($_POST['ptid'])? $_POST['cid'] : '';
$pid = isset($_POST['ptid'])? $_POST['pid'] : '';
$id = isset($_POST['ptid'])? $_POST['ptid'] : '';
// Get the CID and PID

//////////////////////
// CATEGORY
//////////////////////
/*$a = ($_POST['categoryName'])? $_POST['categoryName'] : '';
$b = ($_POST['categoryImage'])? $_POST['categoryImage'] : '';
$c = ($_POST['cStatus'])? $_POST['cStatus'] : '';
$d = ($_POST['cArchive'])? $_POST['cArchive'] : '';*/

// category query
/*$categoryUpdate = $conn->prepare("UPDATE category SET
									`categoryName`= ?, 
									`categoryImage`= ?, 
									`status`= ?, 
									`archive`= ?
								  WHERE `cid` = ?");*/
//$q = $conn->prepare($sql);

//$categoryUpdate->execute( array( $a, $b, $c, $d, $cid ) );

//////////////////////
// PRODUCT
//////////////////////
//$e = ($_POST['productName'])? $_POST['productName'] : '';
//$f = ($_POST['productBlurb'])? $_POST['productBlurb'] : '';

//$g = 1;
//$h = 0;

// $g = ($_POST['pStatus'])? $_POST['pStatus'] : '';
// $h = ($_POST['pArchive'])? $_POST['pArchive'] : '';

// category query
/*$productUpdate = $conn->prepare("UPDATE product SET
									`productName`= ?, 
									`productBlurb`= ?, 
									`status`= ?, 
									`archive`= ?
								  WHERE `pid` = ?");*/
//$q = $conn->prepare($sql);
//$productUpdate->execute( array( $e, $f, $g, $h, $pid ) );




//////////////////////
// Variety Details
//////////////////////
$cid = isset($_POST['cid'])? $_POST['cid'] : '';
$pid = isset($_POST['pid'])? $_POST['pid'] : '';
$ptid = isset($_POST['ptid'])? $_POST['ptid'] : '';
$ptName = isset($_POST['ptName'])? $_POST['ptName'] : '';
$ptImage = isset($_POST['ptImage'])? $_POST['ptImage'] : '';
$kilo = isset($_POST['kilo'])? $_POST['kilo'] : '';
$box = isset($_POST['box'])? $_POST['box'] : '';
$punnet = isset($_POST['punnet'])? $_POST['punnet'] : '';
$bunch = isset($_POST['bunch'])? $_POST['bunch'] : '';
$single = isset($_POST['single'])? $_POST['single'] : '';
$ptBlurb = isset($_POST['ptBlurb'])? $_POST['ptBlurb'] : '';
//$q = ($_POST['varietyRecipe'])? $_POST['varietyRecipe'] : '';

$varietyUpdate = $conn->prepare("UPDATE productType SET
								`ptName`= ?, 
								`ptImage`= ?, 
								`kilo`= ?, 
								`box`= ?, 
								`punnet`= ?, 
								`bunch`= ?,  
								`single`= ?, 
								`ptBlurb`= ?, 
								`pid` = ?,
								`cid` = ?
							  	WHERE `ptid` = ?");

$varietyUpdate->execute(array( $ptName, $ptImage, $kilo, $box, $punnet, $bunch, $single, $ptBlurb, $pid, $cid, $ptid ) );


header("location: productView.php");

?>