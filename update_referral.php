<?php
session_start();
include("includes/db.php");

if(isset($_POST['update'])){
    $email = $_POST['email'];
    $date = date("Y-m-d", strtotime("+2 days"));
    $ref = $_POST['ref'];
    
    $data = [
        'ob' => $email
    ];

    $pushData = $database->getReference($ref)->push($data);

    $refdate = $_POST['refdate'];

    $data = [
        'nextAppt' => $date,
        'referral' => $email
    ];

    $pushData = $database->getReference($refdate)->update($data);

    $reason = "Referral";
    $status = "Approved";
    $usermail = $_SESSION['email'];
    $comment_status = 0;
    $sendBy = "ob";

    $data = [
        'comment_status' => $comment_status,
        'date' => $date,
        'ob' => $email,
        'reason' => $reason,
        'sendBy' => $sendBy,
        'status' => $status,
        'usermail' => $usermail,
        'notif_status' => 0
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:patientConsult.php?key=".$_SESSION['key']);
}
