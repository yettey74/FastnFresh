<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

// Include the database config file  
include ( 'db.php' );


if ( isset( $_SESSION["loggedin"] ) ){
	echo "<script>window.location='index.php'</script>";
}

$email = isset( $_POST[ 'email' ] )? strip_tags( trim( $_POST[ 'email' ] )): '' ;
$password = isset( $_POST[ 'password' ] )? strip_tags( trim( $_POST[ 'password' ] )): '' ;

if ( $password !== '' && $email !== '' ){
	$sql = "INSERT INTO customers ( `email`, `password`, `created` ) VALUES ( '$email', '$password', 'NOW()')";

	if( $conn->query($sql) == TRUE ){
		// register vars
		// get id
			$_SESSION['uid'] = $conn->lastInsertId($sql);
			$_SESSION["first_name"] = '';
			$_SESSION["last_name"] = '';
			$_SESSION["email"] = $email;
			$_SESSION["loggedin"] = TRUE;
			$_SESSION["access"] = 0;
			$_SESSION["address"] = '';
			$_SESSION["phone"] = '';

			echo "<script>alert('Account successfully added!'); window.location='index.php'</script>";
	} else {
		//add failed attempt to counter
		echo "<script>alert('Account creation failed!'); window.location='registration.php'</script>";
	}
} else {
	echo "<script>alert('Account creation failed!'); window.location='registration.php'</script>";
}
?>