<?php
session_start();
include("includes/db.php");

if(isset($_POST['push'])){
    $ob = $_SESSION['ob'];
    $email = $_POST['email'];
    $nextAppt = $_POST['nextAppt'];
    
    $data = [
        $ob = 'ob',
        $email = 'email',
        'nextAppt' => $nextAppt
    ];

    $ref = "appointments/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:viewAppointments.php");
}
else{
    $ob = $_SESSION['ob'];
    $email = $_POST['email'];
    $nextAppt = $_POST['nextAppt'];
    
    $data = [
        $ob = 'ob',
        $email = 'email',
        'nextAppt' => $nextAppt
    ];

    $ref = "appointments/";
    $pushData = $database->getReference($ref)->set($data);
}


?>