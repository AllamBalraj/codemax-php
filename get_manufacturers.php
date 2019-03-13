<?php

	include_once("db_connection.php");

	$records = "SELECT * FROM `manufacturers` ORDER BY id DESC";

		$result = $conn->query($records);

		if ($result->num_rows > 0) {
			$rows = array();
	        while ($row = $result->fetch_assoc()) {
	            $rows[] = array_map("utf8_encode", $row);
	        }

		    echo json_encode(["status" => 'success',"data" => $rows]);
		} else {
		    echo json_encode([status => 'failed', message => 'Get manufacturers query not executed successfully']);
		}

	include_once("close_dbconn.php");

?>