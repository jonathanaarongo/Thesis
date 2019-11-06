<?php
include('database_connection.php');

$output = array();
$sql = "SELECT * FROM pgendata
    JOIN vitaltable
    ON pgendata.patID = vitaltable.patID;";
$query = $conn->query($sql);
while ($row = $query->fetch_array()) {
    $output[] = $row;
}

echo json_encode($output);
