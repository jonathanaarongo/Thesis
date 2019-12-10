<?php
session_start();
include("includes/db.php");

if (isset($_GET['key'])) {
        $status = "done";
        $date = date("Y-m-d");

        $data = [
            'status' => $status,
            'date' => $date
        ];

    $pushData = $database->getReference("immunization/" . $_GET['key'])->update($data);
    header("Location:patientMedication.php?key=" . $_SESSION['key']);
}

else if (isset($_POST['update'])) {
    $status = $_POST['status'];
    $immunName = $_POST['immunName'];
    $recommend = $_POST['recommend'];
    $ref = $_POST['ref'];


    $data = [
        'immunName' => $immunName,
        'recommend' => $recommend,
        'status' => $status,
    ];

$pushData = $database->getReference($ref)->update($data);
header("Location:patientMedication.php?key=" . $_SESSION['key']);
}
