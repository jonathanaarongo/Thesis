<?php
session_start();
date_default_timezone_set('Asia/Manila');
include("includes/db.php");

if(isset($_POST['push'])){
    $ob = $_SESSION['user'];
    $email = $_POST['email'];
    $nextAppt = $_POST['nextAppt'];
    $status = "Pending";
    $reason = $_POST['reason'];
    $sendBy = 'ob';
    
    $data = [
        'ob' => $ob,
        'usermail' => $email,
        'date' => $nextAppt,
        'notif_status' => 0,
        'comment_status' => 0,
        'index' => 0,
        'status' => $status,
        'reason' => $reason,
        'sendBy' => $sendBy

    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:viewAppointments.php");
}
else{
    $ob = $_SESSION['user'];
    $email = $_POST['email'];
    $nextAppt = $_POST['nextAppt'];
    $status = "Pending";
    $reason = $_POST['reason'];
    $sendBy = 'ob';
    
    $data = [
        'ob' => $ob,
        'usermail' => $email,
        'date' => $nextAppt,
        'notif_status' => 0,
        'comment_status' => 0,
        'index' => 0,
        'status' => $status,
        'reason' => $reason,
        'sendBy' => $sendBy
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->set($data);
}


?>