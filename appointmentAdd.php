<?php
session_start();
date_default_timezone_set('Asia/Manila');
include("includes/db.php");

if(isset($_POST['push'])){
    $email = $_POST['email'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $comment = 0;
    $ob = $_SESSION['user'];
    $sendBy = 'ob';
    $status = 'Pending';

    
    $data = [
       'email' => $email,
       'date' => $date,
       'reason' => $reason,
       'comment_status' => $comment,
       'ob' => $ob,
       'status' => $status,
       'sendBy' => $sendBy
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->push($data);

    header("Location:viewAppointments.php");
}
else{
    $email = $_POST['email'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $comment = 0;
    $ob = $_SESSION['user'];
    $sendBy = 'ob';
    $status = 'Pending';

    
    $data = [
       'email' => $email,
       'date' => $date,
       'reason' => $reason,
       'comment_status' => $comment,
       'ob' => $ob,
       'status' => $status,
       'sendBy' => $sendBy
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->set($data);
}


?>