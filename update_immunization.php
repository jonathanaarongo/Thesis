<?php
session_start();
include("includes/db.php");

if (isset($_GET['key'])) {
        $status = "Done";
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
    $date = date("Y-m-d");
    $immunName = $_POST['immunName'];
    $recommend = $_POST['recommend'];
    $ref = $_POST['ref'];


    $data = [
        'immunName' => $immunName,
        'date' => $date,
        'recommend' => $recommend,
        'status' => $status,
    ];

$pushData = $database->getReference($ref)->update($data);
header("Location:patientMedication.php?key=" . $_SESSION['key']);
}
