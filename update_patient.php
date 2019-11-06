<?php
session_start();
include("includes/db.php");

if(isset($_POST['update'])){
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $dateAdded = $_POST['dateAdded'];
    $email = $_POST['email'];
    $f_name = $_POST['f_name'];
    $familyHistory = $_POST['familyHistory'];
    $fdaymens = $_POST['fdaymens'];
    $l_name = $_POST['l_name'];
    $lastVisited= $_POST['lastVisited'];
    $medicalHistory = $_POST['medicalHistory'];
    $occupation = $_POST['occupation'];
    $patType = $_POST['patType'];
    $status = $_POST['status'];
    $ref = $_POST['ref'];

    $data = [
        'address' => $address,
        'contactNo' => $contactNo,
        'dateAdded' => $dateAdded,
        'email' => $email,
        'f_name' => $f_name,
        'familyHistory' => $familyHistory,
        'fdaymens' => $fdaymens,
        'l_name' => $l_name,
        'lastVisited' => $lastVisited,
        'medicalHistory' => $medicalHistory,
        'occupation' => $occupation,
        'patType' => $patType,
        'status' => $status
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:patientDetails.php".$_SESSION['key']);
}


?>