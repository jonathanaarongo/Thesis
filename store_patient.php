<?php
session_start();
date_default_timezone_set('Asia/Manila');
include("includes/db.php");

if(isset($_POST['push'])){
    $ob = $_SESSION['user'];
    $address = $_POST['address'];
    $bday = $_POST['birthday'];
    $contactNo = $_POST['contactNo'];
    $dateAdded = $_POST['dateAdded'];
    $email = $_POST['email'];
    $f_name = $_POST['f_name'];
    $familyHistory = $_POST['familyHistory'];
    $fdaymens = $_POST['fdaymens'];
    $l_name = $_POST['l_name'];
    $medicalHistory = $_POST['medicalHistory'];
    $noOfBaby = $_POST['noOfBaby'];
    $occupation = $_POST['occupation'];
    $patType = $_POST['patType'];
    $passW = hash("sha256",$_POST['passW']);
    $conpass = hash("sha256",$_POST['conpass']);
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
    if (isset($_POST['symptomsCard'])){
        $symptomsCard= true;
    }
    else{
        $symptomsCard = false;
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
        'bdate' => $bday,
        'contactNo' => $contactNo,
        'dateAdded' => $dateAdded,
        'email' => $email,
        'f_name' => $f_name,
        'familyHistory' => $familyHistory,
        'fdaymens' => $fdaymens,
        'l_name' => $l_name,
        'medicalHistory' => $medicalHistory,
        'noOfBaby' => $noOfBaby,
        'occupation' => $occupation,
        'patType' => $patType,
        'passW' => $passW,
        'conpass' => $conpass,
        'status' => $status,
        'conCounterCard' => $conCounterCard,
        'kickCounterCard' => $kickCounterCard,
        'weightCard' => $weightCard,
        'babyMeasureCard' => $babyMeasureCard,
        'symptomsCard' =>$symptomsCard,
        'bloodPressureCard' => $bloodPressureCard,
        'bloodSugarCard' => $bloodSugarCard

    ];

    $auth = $firebase->getAuth();
    $user = $auth->createUserWithEmailAndPassword($email,$passW);
    
    $ref = "patientdata/";
    $pushData = $database->getReference($ref)->push($data);

    $date1 = date("Y-m-d", strtotime($fdaymens. " +27 weeks"));
    $date2 = date("Y-m-d", strtotime($fdaymens. " +36 weeks"));
    $date = date("Y-m-d");
    $immunName = "Tdap Vaccine";
    $status = "Not done";
    $recommend = "$date1 to $date2 (Set on 27-36 weeks of pregnancy)";

    $data = [
        'email' => $email,
        'immunName' => $immunName,
        'status' => $status,
        'recommend' => $recommend,
        'date' => $date
    ];

    $ref = "immunization/";
    $pushData = $database->getReference($ref)->push($data);

    $immunName = "Flu shot";
    $status = "Not done";
    $recommend = "November to March";
    $date = date("Y-m-d");

    $data = [
        'email' => $email,
        'immunName' => $immunName,
        'status' => $status,
        'recommend' => $recommend,
        'date' => $date
    ];

    $ref = "immunization/";
    $pushData = $database->getReference($ref)->push($data);

    header("Location:viewPatientList.php");



}
else{
    $ob = $_SESSION['ob'];
    $address =$_SESSION['user'];
    $bday = $_POST['birthday'];
    $contactNo = $_POST['contactNo'];
    $dateAdded = $_POST['dateAdded'];
    $email = $_POST['email'];
    $f_name = $_POST['f_name'];
    $familyHistory = $_POST['familyHistory'];
    $fdaymens = $_POST['fdaymens'];
    $l_name = $_POST['l_name'];
    $medicalHistory = $_POST['medicalHistory'];
    $noOfBaby = $_POST['noOfBaby'];
    $occupation = $_POST['occupation'];
    $patType = $_POST['patType'];
    $passW = hash("sha256",$_POST['passW']);
    $conpass = hash("sha256",$_POST['conpass']);
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
    if (isset($_POST['symptomsCard'])){
        $symptomsCard= true;
    }
    else{
        $symptomsCard = false;
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
        'bdate' => $bday,
        'contactNo' => $contactNo,
        'dateAdded' => $dateAdded,
        'email' => $email,
        'f_name' => $f_name,
        'familyHistory' => $familyHistory,
        'fdaymens' => $fdaymens,
        'l_name' => $l_name,
        'medicalHistory' => $medicalHistory,
        'noOfBaby' => $noOfBaby,
        'occupation' => $occupation,
        'patType' => $patType,
        'passW' => $passW,
        'conpass' => $conpass,
        'status' => $status,
        'conCounterCard' => $conCounterCard,
        'kickCounterCard' => $kickCounterCard,
        'weightCard' => $weightCard,
        'babyMeasureCard' => $babyMeasureCard,
        'symptomsCard' => $symptomsCard,
        'bloodPressureCard' => $bloodPressureCard,
        'bloodSugarCard' => $bloodSugarCard
    ];
    $ref = "patientdata/";
    $pushData = $database->getReference($ref)->set($data);

    $date1 = date("Y-m-d", strtotime($fdaymens. " +27 weeks"));
    $date2 = date("Y-m-d", strtotime($fdaymens. " +36 weeks"));
    $date = date("Y-m-d");
    $immunName = "Tdap Vaccine";
    $status = "Not done";
    $recommend = "$date1 to $date2";

    $data = [
        'email' => $email,
        'immunName' => $immunName,
        'status' => $status,
        'recommend' => $recommend
    ];

    $ref = "immunization/";
    $pushData = $database->getReference($ref)->set($data);

    $immunName = "Flu shot";
    $status = "Not done";
    $recommend = "November to March";
    $date = date("Y-m-d");

    $data = [
        'email' => $email,
        'immunName' => $immunName,
        'status' => $status,
        'recommend' => $recommend,
        'date' => $date
    ];

    $ref = "immunization/";
    $pushData = $database->getReference($ref)->set($data);
}


?>