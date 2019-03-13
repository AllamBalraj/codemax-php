<?php

	$contents = file_get_contents("php://input");
	$payload_data = json_decode($contents, true);
	
	$manufacturer_name = $payload_data['manufacturer_name'];

	include_once("db_connection.php");

	$sql = "INSERT INTO manufacturers (name) VALUES ('".$manufacturer_name."')";

	if ($conn->query($sql) === TRUE) {
	    echo json_encode([status => 'success']);
	} else {
	    echo json_encode([status => 'failed', message => 'Insert manufacturers query not executed successfully']);
	}

	include_once("close_dbconn.php");
?>