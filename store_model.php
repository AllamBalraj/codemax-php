<?php

	$contents = file_get_contents("php://input");
	$payload_data = json_decode($contents, true);
	
	$model_name = $payload_data['model_name'];
	$manufacture_id = $payload_data['manufacturer_id'];

	include_once("db_connection.php");

	$sql = "INSERT INTO models (manufacture_id,name) VALUES ('".$manufacture_id."','".$model_name."')";

	if ($conn->query($sql) === TRUE) {
	    echo json_encode([status => 'success']);
	} else {
	    echo json_encode([status => 'failed', message => 'Insert model query not executed successfully']);
	}

	include_once("close_dbconn.php");
?>