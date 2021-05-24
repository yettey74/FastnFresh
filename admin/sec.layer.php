<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

if ( $_SESSION['loggedin'] == false || $_SESSION['access'] < 1 ){
	header("location: index.php");
}

include 'db.php';
include 'apple/seed.php';

date_default_timezone_set("Australia/Sydney");//set you countary name from below
setlocale(LC_MONETARY, 'en_AU.UTF-8');
?>