<?php
//Start session
session_start();	
include( 'db.php' );
 
if (isset($_POST['login'])) {
	//Set the POST values
 	$email = isset($_POST['email'])? $_POST['email']: '';
 	$password = isset($_POST['password'])? $_POST['password']: '';
	
	//Create query 
    $userQ = $conn->prepare("SELECT * FROM `fnfcustomer` WHERE `email` = '$email' && `password` = '$password'");     
    $userQ->execute();
	$user_count = $userQ->rowcount();
	//Check whether the query was successful or not
	if( $user_count > 0 ){ 
		$userInfo = $userQ->fetch();
		$_SESSION['uid'] = $userInfo['customer_id'];
		$_SESSION['first_name'] = $userInfo['first_name'];
		$_SESSION['last_name'] = $userInfo['last_name'];
		$_SESSION['email'] = $userInfo['email'];
		$_SESSION['phone'] = $userInfo['phone'];
		$_SESSION['address'] = $userInfo['address'];
		$_SESSION['loggedin'] = TRUE;
		$_SESSION ['cart'] = '';
		$_SESSION ['access'] = $userInfo['access'];
		if( $_SESSION ['access'] > '0' ){
			header("Location: admin/door.php");
		} else {
			header("Location: index.php");
		}
    } else {
        header("Location: index.php?p");  
    }
}

?>