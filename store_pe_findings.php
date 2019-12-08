<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if(isset($_POST['push'])){
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $time = date("h:ia");
    $reason = $_POST['reason'];
    $chiefComplaint = $_POST['chiefComplaint'];
    $peFindings = $_POST['peFindings'];
    $diagnosis = $_POST['diagnosis'];
    $choose = $_POST['choose'];
    $prescription = "";
    $referral = "";

    
    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'reason' => $reason,
        'chiefComplaint' => $chiefComplaint,
        'peFindings' => $peFindings,
        'diagnosis' => $diagnosis,
        'choose' => $choose,
        'prescription' => $prescription,
        'referral' => $referral
    ];
    $ref = "pefindings/";
    $pushData = $database->getReference($ref)->push($data)->getKey();
    if($choose == "isReferred"){
        header("Location:patientReferral.php?key=".$pushData);
    }
    else{
        header("Location:patientPrescription.php?key=".$pushData);
    }
}
else{
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $time = date("h:ia");
    $reason = $_POST['reason'];
    $chiefComplaint = $_POST['chiefComplaint'];
    $peFindings = $_POST['peFindings'];
    $diagnosis = $_POST['diagnosis'];
    $choose = $_POST['choose'];
    $prescription = "";
    $referral = "";
    
    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'reason' => $reason,
        'chiefComplaint' => $chiefComplaint,
        'peFindings' => $peFindings,
        'diagnosis' => $diagnosis,
        'choose' => $choose,
        'prescription' => $prescription,
        'referral' => $referral
    ];
    $ref = "pefindings/";
    $pushData = $database->getReference($ref)->set($data);
}


?>