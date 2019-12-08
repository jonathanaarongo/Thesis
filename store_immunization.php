<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if (isset($_POST['push'])) {
    $immunName = $_POST['immunName'];
    $date = $_POST['date'];
    $recommend = $_POST['recommend'];
    $status = $_POST['status'];
    $usermail = $_SESSION['email'];

    $data = [
        'immunName' => $immunName,
        'date' => $date,
        'recommend' => $recommend,
        'status' => $status,
        'email' => $usermail,
    ];
    $ref = "immunization/";
    $pushData = $database->getReference($ref)->push($data);

    if ($date != "") {
        $ob = $_SESSION['user'];
        $reason = "Immunization";
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
    }


    header("Location:patientMedication.php?key=" . $_SESSION['key']);
} 

else {
    $immunName = $_POST['immunName'];
    $date = $_POST['date'];
    $recommend = $_POST['recommend'];
    $status = $_POST['status'];
    $usermail = $_SESSION['email'];

    $data = [
        'immunName' => $immunName,
        'date' => $date,
        'recommend' => $recommend,
        'status' => $status,
        'email' => $usermail,
    ];
    $ref = "immunization/";
    $pushData = $database->getReference($ref)->set($data);

    $ob = $_SESSION['user'];
    $reason = "Immunization";
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
}
