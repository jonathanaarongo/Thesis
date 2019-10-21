<?php
	include('database_connection.php');
	
	$output = array();
	$sql = "SELECT * FROM pgendata
    WHERE SUBSTR(status,1,9) = 'High Risk';";
	$query=$conn->query($sql);
	while($row=$query->fetch_array()){
		$output[] = $row;
	}

	echo json_encode($output);
?>