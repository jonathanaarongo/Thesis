<?php
session_start();
include("includes/db.php");

if(isset($_POST['update'])){
    $answer = $_POST['answer'];
    $ref = $_POST['ref'];
    
    $data = [
        'answer' => $answer
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:patientInquiries.php");
}


?>