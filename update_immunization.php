<?php
session_start();
include("includes/db.php");

if(isset($_GET['key'])){
    $status = "Done";
    $date = date("Y-m-d");

    $data = [
        'status' => $status,
        'date' => $date
    ];

    $pushData = $database->getReference("/immunization".$_GET['key'])->update($data);
    header("Location:patientMedication.php");
}



?>