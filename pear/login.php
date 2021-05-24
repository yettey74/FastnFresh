<?php
//Start session
session_start();
include( 'connect.php' );

if ( isset($_POST['login'])){
	echo '<script>alert("you clicked login")</script>';
	//Set the POST values
	$login = isset($_POST['username'])? $_POST['username'] : '';
	$password = isset($_POST['password'])? $_POST['password'] : '';	
	
	//Create query
	$userQ = "SELECT * FROM `user` WHERE `username` = '$login' AND `password` = '$password'";
	$userR = $db->query($userQ);
	
	//Check whether the query was successful or not
	if( $userR == TRUE ) {
		$member = $userR->fetch();
		//Login Successful
		//session_regenerate_id();
		$_SESSION['SESS_MEMBER_ID'] = $member['id'];
		$_SESSION['SESS_FIRST_NAME'] = $member['name'];
		$_SESSION['SESS_LAST_NAME'] = $member['position'];
		//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
		//session_write_close();
		header("location: main/index.php");
		//exit();
	} else {
		//Login failed
		header("location: fail.php");
		//exit();
	}
} else {
	// hack attempt
	header("location: hack.php");
}
?>