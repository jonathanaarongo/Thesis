<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if(isset($_POST['push'])){
    $pres = $_POST['prescription'];
    $ref = $_POST['ref'];

    $data = [
        'prescription' => $pres
    ];
    $pushData = $database->getReference($ref)->update($data);

    $days = $_POST['days'] + 2;
    $date = date("m-d-Y", strtotime("+".$days. " days"));
    $ob = $_SESSION['user'];
    $reason = "Medication";
    $status = "Approved";
    $usermail = $_SESSION['email'];
    $comment_status = 0;
    $sendBy = "ob";

    $data = [
        'comment_status' => $comment_status,
        'date' => $date,
        'ob' => $ob,
        'reason' => $reason,
        'sendBy' => $sendBy,
        'status' => $status,
        'usermail' => $usermail
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:patientConsult.php?key=".$_SESSION['key']);
}
else{
    $days = $_POST['days'] + 2;
    $date = date("m-d-Y", strtotime("+".$days. " days"));
    $ob = $_SESSION['user'];
    $reason = "Medication";
    $status = "Approved";
    $usermail = $_SESSION['email'];
    $comment_status = 0;
    $sendBy = "ob";

    $data = [
        'comment_status' => $comment_status,
        'date' => $date,
        'ob' => $ob,
        'reason' => $reason,
        'sendBy' => $sendBy,
        'status' => $status,
        'usermail' => $usermail
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->set($data);
    header("Location:patientConsult.php?key=".$_SESSION['key']);
}


?>