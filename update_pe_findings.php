<?php
session_start();
include("includes/db.php");

if(isset($_POST['update'])){
    $date = date("Y-m-d");
    $time = date("h:ia");
    $reason = $_POST['reason'];
    $chiefComplaint = $_POST['chiefComplaint'];
    $peFindings = $_POST['peFindings'];
    $diagnosis = $_POST['diagnosis'];
    $nextAppt = $_POST['nextAppt'];
    $ref = $_POST['ref'];
    
    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'reason' => $reason,
        'chiefComplaint' => $chiefComplaint,
        'peFindings' => $peFindings,
        'diagnosis' => $diagnosis,
        'nextAppt' => $nextAppt
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:showpatientfindings.php?email=".$_SESSION['email']);
}


?>