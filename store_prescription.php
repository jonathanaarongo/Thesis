<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if(isset($_POST['push'])){
    $pres = $_POST['prescription'];
    $ref = $_POST['ref'];

    $data = [
        'prescription' => $pres
    ];
    $pushData = $database->getReference($ref)->update($data);
    header("Location:patientConsult.php?key=".$_SESSION['key']);
}


?>