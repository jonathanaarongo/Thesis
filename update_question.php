<?php
session_start();
include("includes/db.php");

if(isset($_POST['update'])){
    $answer = $_POST['answer'];
    $date = date("m-d-Y");
    $ref = $_POST['ref'];
    
    $data = [
        'answer' => $answer,
        'dateAnswered' => $date
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:patientInquiries.php");
}


?>