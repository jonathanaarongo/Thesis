<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if(isset($_POST['push'])){
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $time = date("h:ia");
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];
    $weight = $_POST['weight'];
    $fetalHeartTone = $_POST['fetalHeartTone'];
    $waistSize = $_POST['waistSize'];
    
    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'systolic' => $systolic,
        'diastolic' => $diastolic,
        'weight' => $weight,
        'fetalHeartTone' => $fetalHeartTone,
        'waistSize' => $waistSize
    ];
    $ref = "vitals/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:patientConsult.php?key=".$_SESSION['key']);
}
else{
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $time = date("h:ia");
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];
    $weight = $_POST['weight'];
    $fetalHeartTone = $_POST['fetalHeartTone'];
    $waistSize = $_POST['waistSize'];
    
    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'systolic' => $systolic,
        'diastolic' => $diastolic,
        'weight' => $weight,
        'fetalHeartTone' => $fetalHeartTone,
        'waistSize' => $waistSize
    ];
    $ref = "vitals/";
    $pushData = $database->getReference($ref)->set($data);
}


?>