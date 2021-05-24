<?php
include 'sec.layer.php';

$a = isset($_POST['ptid'])? $_POST['ptid'] : '';
$b = isset($_POST['uom_id'])? $_POST['uom_id'] : '';
$c = isset($_POST['quantity'])? $_POST['quantity'] : '';
$d = isset($_POST['notes'])? $_POST['notes'] : '';
$e = isset($_POST['item'])? $_POST['item'] : '';

$q = $conn->prepare("INSERT INTO `trays` ( `ptid`, `item`, `uom_id`, `quantity`, `notes` ) VALUES ( :a, :e, :b, :c, :d )");

$q->execute( array( ':a'=>$a, ':e'=>$e, ':b'=>$b, ':c'=>$c, ':d'=>$d ) );
header('location: trayview.php?id=' . $a );
?>