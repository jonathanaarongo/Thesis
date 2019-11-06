<?php
session_start();
include("includes/db.php");

if(isset($_POST['push'])){
    $ob = $_SESSION['user'];
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
    
    $data = [
        'ob' => $ob,
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
    $ref = "patientdata/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:viewPatientList.php");
}
else{
    $ob = $_SESSION['ob'];
    $address =$_SESSION['user'];
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
    
    $data = [
        'ob' => $ob,
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
    $ref = "patientdata/";
    $pushData = $database->getReference($ref)->set($data);
}


?>