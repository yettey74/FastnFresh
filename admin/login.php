<?php
//Start session
session_start();	
include 'db.php';
 
if (isset($_POST['login'])) {
	//Set the POST values
 	$username = isset($_POST['username'])? $_POST['username']: '';
 	$password = isset($_POST['password'])? $_POST['password']: '';
	
	//Create query 
    $userQ = $conn->prepare("SELECT * FROM `employee` WHERE `username` = '$username' && `password` = '$password'");     
    $userQ->execute();
	$user_count = $userQ->rowcount();
	//Check whether the query was successful or not
	if( $user_count > 0 ){ 
		$userInfo = $userQ->fetch();
		$_SESSION['emp_id'] = $userInfo['emp_id'];
		$_SESSION['uid'] = $userInfo['customer_id'];
		$_SESSION['first_name'] = $userInfo['employee_firstName'];
		$_SESSION['last_name'] = $userInfo['employee_lastName'];
		$_SESSION['email'] = $userInfo['employee_email'];
		$_SESSION['phone'] = $userInfo['employee_phone'];
		$_SESSION['address'] = '';
		$_SESSION['loggedin'] = TRUE;
		$_SESSION ['cart'] = '';
		$_SESSION ['access'] = $userInfo['access'];
		if( $_SESSION ['access'] > '0' ){
		/*	foreach( $_SESSION as $sess ){
				echo $sess . '<br>';
			}*/
			header("Location: door.php");
		} else {
			header("Location: index.php");
		}
    } else {
        header("Location: ../index.php?p");  
    }
}

?>