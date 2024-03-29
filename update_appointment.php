<?php
session_start();
date_default_timezone_set('Asia/Manila');
include("includes/db.php");

if(isset($_GET['key'])){
    $approve = "Approved";
    $sendBy = "ob";

    $data = [
        'status' => $approve,
        'comment_status' => 0,
        'sendBy' => $sendBy,
        'notif_status' => 0
    ];

    $pushData = $database->getReference("Calendar/".$_GET['key'])->update($data);
    header("Location:viewAppointments.php");
}

else if (isset($_POST['update'])){
    $status = "Pending";
    $date = $_POST['date'];
    $reasonOB = $_POST['reasonOB'];
    $ref = $_POST['ref'];
    $sendBy = "ob";

    $data = [
        'date' => $date,
        'status' => $status,
        'reasonOB' => $reasonOB,
        'comment_status' => 0,
        'sendBy' => $sendBy,
        'notif_status' => 0
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:viewAppointments.php");
}

else if (isset($_POST['delete'])){
    $status = "Cancelled";
    $date = date('Y-m-d');
    $ref = $_POST['ref'];
    $sendBy = "ob";

    $data = [
        'date' => $date,
        'status' => $status,
        'comment_status' => 0,
        'sendBy' => $sendBy,
        'notif_status' => 0
    ];

    $pushData = $database->getReference($ref)->update($data);
    header("Location:viewAppointments.php");
}

?>