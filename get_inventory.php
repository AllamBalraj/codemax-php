<?php

	include_once("db_connection.php");

		$records = "SELECT manufacturers.id as `id`, manufacturers.name AS `manufacturer_name`, models.name AS `models_name` , COUNT(models.name) as `count`
					FROM `models` JOIN `manufacturers` 
					ON models.manufacture_id = manufacturers.id
					GROUP BY models.name";

		$result = $conn->query($records);

		if ($result->num_rows > 0) {
			$rows = array();
	        while ($row = $result->fetch_assoc()) {
	            $rows[] = array_map("utf8_encode", $row);
	        }

		    echo json_encode(["status" => 'success',"data" => $rows]);
		} else {
		    echo json_encode([status => 'failed', message => 'Get inventory query not executed successfully']);
		}

	include_once("close_dbconn.php");

?>