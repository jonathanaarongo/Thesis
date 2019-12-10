<?php
session_start();
include("includes/db.php");
date_default_timezone_set('Asia/Manila');

if(isset($_POST['push'])){
    $labrequest = $_POST['labrequest'];
    $date = $_POST['date'];
    $ref = $_POST['ref'];

    $data = [
        'labrequest' => $labrequest,
        'nextAppt' => $date
    ];
    $pushData = $database->getReference($ref)->update($data);

    $ob = $_SESSION['user'];
    $reason = "Bring Lab Results: ". $labrequest;
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
        'usermail' => $usermail,
        'notif_status' => 0
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:patientConsult.php?key=".$_SESSION['key']);
}
else{
    $labrequest = $_POST['labrequest'];
    $date = $_POST['date'];
    $ref = $_POST['ref'];

    $data = [
        'labrequest' => $labrequest,
        'nextAppt' => $date
    ];
    $pushData = $database->getReference($ref)->update($data);

    $ob = $_SESSION['user'];
    $reason = "Bring Lab Results: ". $labrequest;
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
        'usermail' => $usermail,
        'notif_status' => 0
    ];

    $ref = "Calendar/";
    $pushData = $database->getReference($ref)->set($data);
}


?>