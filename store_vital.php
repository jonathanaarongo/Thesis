<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if (isset($_POST['push'])) {
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $time = date("h:ia");
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];
    $weight = $_POST['weight'];
    //$fetalHeartTone = $_POST['fetalHeartTone'];
    $waistSize = $_POST['waistSize'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'systolic' => $systolic,
        'diastolic' => $diastolic,
        'weight' => $weight,
        'waistSize' => $waistSize,
        'fname' => $fname,
        'lname' => $lname
    ];
    $ref = "vitals/";
    $pushData = $database->getReference($ref)->push($data)->getKey();

    $noOfBaby = $_POST['noOfBaby'];
    $i = 0;
    while ($i < $noOfBaby) {
        $i = $i + 1;

        $fetalHeartTone = $_POST['fetalHeartTone' . $i];

        $data = [
            'fetalHeartTone' . $i => $fetalHeartTone
        ];
        $ref = "vitals/" . $pushData;
        $pushData2 = $database->getReference($ref)->update($data);
    }


    header("Location:patientVitals.php?key=" . $_SESSION['key']);
} else {
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $time = date("h:ia");
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];
    $weight = $_POST['weight'];
    //$fetalHeartTone = $_POST['fetalHeartTone'];
    $waistSize = $_POST['waistSize'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];


    $data = [
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'time' => $time,
        'systolic' => $systolic,
        'diastolic' => $diastolic,
        'weight' => $weight,
        'waistSize' => $waistSize,
        'fname' => $fname,
        'lname' => $lname
    ];
    $ref = "vitals/";
    $pushData = $database->getReference($ref)->set($data);

    $noOfBaby = $_POST['noOfBaby'];
    $i = 0;

    while ($i < $noOfBaby) {
        $i++;
        $fetalHeartTone . $i = $_POST['fetalHeartTone' . $i];

        $data = [
            'fetalHeartTone' . $i => $fetalHeartTone . $i
        ];
        $ref = "vitals/" . $pushData;
        $pushData2 = $database->getReference($ref)->push($data);
    }
}
