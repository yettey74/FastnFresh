<?php
session_start(); 
// Include configuration file for facebook class
// require_once 'config.php';

// Remove access token from session
// unset($_SESSION['facebook_access_token']);

// Remove user data from session
// unset($_SESSION['userData']);

// Remove loggedin status
unset($_SESSION['uid']);
// Remove loggedin status
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['email']);
unset($_SESSION['phone']);
unset($_SESSION['address']);
unset($_SESSION['loggedin']);
unset($_SESSION['cart']);
unset($_SESSION['access']);
unset($_SESSION['username']);

// Redirect to the homepage
header("Location:index.php");
?>