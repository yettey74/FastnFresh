<?php
include 'sec.layer.php';

$a = isset($_POST['employee_image'])? $_POST['employee_image'] : '';
$b = isset($_POST['employee_firstName'])? $_POST['employee_firstName'] : '';
$c = isset($_POST['employee_lastName'])? $_POST['employee_lastName'] : '';
$d = isset($_POST['employee_phone'])? $_POST['employee_phone'] : '';
$e = isset($_POST['payrate'])? $_POST['payrate'] : '';
$f = isset($_POST['employee_tfn'])? $_POST['employee_tfn'] : '';
$g = isset($_POST['employee_commencement'])? $_POST['employee_commencement'] : '';
$h= isset($_POST['employee_notes'])? $_POST['employee_notes'] : '';
$i = date_timestamp_get( date_create() );

$q = $conn->prepare("INSERT INTO `employee` ( `employee_image`, `employee_firstName`, `employee_lastName`, `employee_phone`, `payrate`, `employee_tfn`, `employee_commencement`, `employee_notes`, `created_on` ) VALUES ( :a, :b, :c, :d, :e, :f, :g, :h, :h )");
$q->execute( array( ':a'=>$a, ':b'=>$b, ':c'=>$c, ':d'=>$d,':e'=>$e, ':f'=>$f, ':g'=>$g, ':h'=>$h, ':i'=>$i ) );
header("location: employee.php");
?>