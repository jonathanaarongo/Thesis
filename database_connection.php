<?php
	$conn = new mysqli('localhost', 'Jean', 'password', 'dbths');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>