<?php
include('database_connection.php');

$output = array();
$sql = "SELECT * FROM pgendata
JOIN questions
ON pgendata.patID = questions.patientID
WHERE questions.answer IS NOT NULL;";
$query = $conn->query($sql);
while ($row = $query->fetch_array()) {
    $output[] = $row;
}

echo json_encode($output);
