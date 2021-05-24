<?php

$emailArray = array();
$data = array( "email" => "", "password" => "" );

//$usernames = array( "martynj", "admin", "bob", "dave", "fred" );
$emails = $conn->query( "SELECT email from customers" );
$emails->execute();
foreach ( $emails as $email ){	
	$emailArray .= $email;
}



if( isset($_POST["email"]) ) {
	if( in_array( $_POST["email"], $emailArray ) ) {
		$data["email"] = "inuse";
	}
}
if( isset( $_POST["email"] ) ) {
	if( $_POST["email"] != "" && !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"] ) ) {
		$data["email"] = "notvalid";
	}
}
if( isset($_POST["password"]) && isset($_POST["password_again"]) ) {
	if( $_POST["password_again"] != "" && $_POST["password"] != $_POST["password_again"] ) {
		$data["password"] = "missmatch";
	}
}
echo json_encode( $data );
?>