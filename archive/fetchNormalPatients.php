<?php
	include('database_connection.php');
	
	$output = array();
    $sql = "SELECT * FROM pgendata
    WHERE status = 'Normal';";
	$query=$conn->query($sql);
	while($row=$query->fetch_array()){
		$output[] = $row;
	}

	echo json_encode($output);