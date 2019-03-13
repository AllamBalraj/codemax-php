<?php
	
	error_reporting(E_ERROR | E_PARSE);
	include_once("db_credentials.php");

	$conn = new mysqli($localhost, $username, $password, $dbname); 
	mysqli_set_charset($conn ,'utf8');

	if($conn->connect_error) {
	    die(json_encode([status => 'failed', message => 'Database connection not successfull']));
	} 
?>
