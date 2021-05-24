<?php
include 'sec.layer.php';

$id = ($_POST['emp_id'])? $_POST['emp_id'] : '';
$a = ($_POST['employee_firstName'])? $_POST['employee_firstName'] : '';
$b = ($_POST['employee_lastName'])? $_POST['employee_lastName'] : '';
$c = ($_POST['employee_phone'])? $_POST['employee_phone'] : '';
$d = ($_POST['payrate'])? $_POST['payrate'] : '';
$e = ($_POST['employee_tfn'])? $_POST['employee_tfn'] : '';
$f = ($_POST['employee_commencement'])? $_POST['employee_commencement'] : '';
$g = ($_POST['status'])? $_POST['status'] : '';
$h = ($_POST['employee_notes'])? $_POST['employee_notes'] : '';
// query
$sql = $conn->prepare("UPDATE employee SET
						`employee_firstName`= ?, 
						`employee_lastName`= ?, 
						`employee_phone`= ?, 
						`payrate`= ?, 
						`employee_tfn`= ?, 
						`employee_commencement`= ?,  
						`status`= ?,  
						`employee_notes`= ?
					  WHERE `emp_id`=?");
$sql->execute(array( $a, $b, $c, $d, $e, $f, $g, $h, $id));
header("location: employee.php");

?>