<?php
include 'sec.layer.php';
$startDate = isset($_POST['startdate'])? $_POST['startdate'] : '';
$startTime = isset($_POST['starttime'])? $_POST['starttime'] : '';
$endDate = isset($_POST['enddate'])? $_POST['enddate'] : '';
$endTime = isset($_POST['endtime'])? $_POST['endtime'] : '';
$startUnixTime = $startDate . ' ' . $startTime;
$endUnixTime = $endDate . ' ' . $$endTime;
$a = isset($_POST['id'])? $_POST['id'] : '';
$b = $startUnixTime;
$c = $endUnixTime;
$d = date('Y-m-d H:i:s');
$e = isset($_POST['notes'])? $_POST['notes'] : '';

$q = $conn->prepare("INSERT INTO `roster` ( `emp_id`, `start`, `end`, `notes`, `created_on` ) VALUES ( :a, :b, :c, :e, :d )");

$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':e'=>$e, ':d'=>$d ) );
header("location: employeeview.php?id=$a");
?>