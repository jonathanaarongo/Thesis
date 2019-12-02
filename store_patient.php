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
    $medicalHistory = $_POST['medicalHistory'];
    $occupation = $_POST['occupation'];
    $patType = $_POST['patType'];
    $passW = password_hash($_POST['passW'], PASSWORD_DEFAULT);
    $conpass = password_hash($_POST['conpass'], PASSWORD_DEFAULT);
    $status = $_POST['status'];
    if (isset($_POST['conCounterCard'])){
        $conCounterCard = true;
    }
    else{
        $conCounterCard= false;
    }
    if (isset($_POST['kickCounterCard'])){
        $kickCounterCard = true;
    }
    else{
        $kickCounterCard = false;
    }
    if (isset($_POST['weightCard'])){
        $weightCard = true;
    }
    else{
        $weightCard = false;
    }
    if (isset($_POST['babyMeasureCard'])){
        $babyMeasureCard = true;
    }
    else{
        $babyMeasureCard = false;
    }
    if (isset($_POST['bloodPressureCard'])){
        $bloodPressureCard= true;
    }
    else{
        $bloodPressureCard = false;
    }
    if (isset($_POST['bloodSugarCard'])){
        $bloodSugarCard = true;
    }
    else{
        $bloodSugarCard = false;
    }
    
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
        'passW' => $passW,
        'conpass' => $conpass,
        'status' => $status,
        'conCounterCard' => $conCounterCard,
        'kickCounterCard' => $kickCounterCard,
        'weightCard' => $weightCard,
        'babyMeasureCard' => $babyMeasureCard,
        'bloodPressureCard' => $bloodPressureCard,
        'bloodSugarCard' => $bloodSugarCard

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
    $passW = password_hash($_POST['passW'], PASSWORD_DEFAULT);
    $conpass = password_hash($_POST['conpass'], PASSWORD_DEFAULT);
    $status = $_POST['status'];
    if (isset($_POST['conCounterCard'])){
        $conCounterCard = true;
    }
    else{
        $conCounterCard= false;
    }
    if (isset($_POST['kickCounterCard'])){
        $kickCounterCard = true;
    }
    else{
        $kickCounterCard = false;
    }
    if (isset($_POST['weightCard'])){
        $weightCard = true;
    }
    else{
        $weightCard = false;
    }
    if (isset($_POST['babyMeasureCard'])){
        $babyMeasureCard = true;
    }
    else{
        $babyMeasureCard = false;
    }
    if (isset($_POST['bloodPressureCard'])){
        $bloodPressureCard= true;
    }
    else{
        $bloodPressureCard = false;
    }
    if (isset($_POST['bloodSugarCard'])){
        $bloodSugarCard = true;
    }
    else{
        $bloodSugarCard = false;
    }
    
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
        'passW' => $passW,
        'conpass' => $conpass,
        'status' => $status,
        'conCounterCard' => $conCounterCard,
        'kickCounterCard' => $kickCounterCard,
        'weightCard' => $weightCard,
        'babyMeasureCard' => $babyMeasureCard,
        'bloodPressureCard' => $bloodPressureCard,
        'bloodSugarCard' => $bloodSugarCard
    ];
    $ref = "patientdata/";
    $pushData = $database->getReference($ref)->set($data);
}


?>