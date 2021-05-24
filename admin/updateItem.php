<?php
include 'sec.layer.php';

$id = ($_POST['id'])? $_POST['id'] : '';
$a = ($_POST['ptid'])? $_POST['ptid'] : '';
$b = ($_POST['quantity'])? $_POST['quantity'] : '';
$c = ($_POST['uom_id'])? $_POST['uom_id'] : '';
$d = ($_POST['notes'])? $_POST['notes'] : '';

// query
$sql = $conn->prepare( "UPDATE `trays` SET
						`ptid`= ?, 
						`quantity`= ?, 
						`uom_id`= ?, 
						`notes`= ?
					    WHERE `tray_id` = ?" );
$sql->execute( array( $a, $b, $c, $d, $id ) );

header('location: trayview.php?id=' . $a );

?>