<?php
session_start();
include("includes/db.php");

if(isset($_POST['update'])){
    $email = $_POST['email'];
    $ref = $_POST['ref'];
    
    $data = [
        'ob' => $email
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:viewPatientList.php");
}


?>