<?php
session_start();
include("includes/db.php");

if(isset($_POST['button'])){
    $image = $_POST['image'];
    $mainimage = $_FILES['mainimage']['name'];
    $labType = $_POST['labType'];
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $comment = $_POST['comment'];
    
    $data = [
        'filelink' => $image,
        'fileName' => $mainimage,
        'labType' => $labType,
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'comment' => $comment
    ];
    $ref = "labresults/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:labResults.php?key=" . $_SESSION['key']);
}
else{
    $image = $_POST['image'];
    $mainimage = $_FILES['mainimage']['name'];
    $labType = $_POST['labType'];
    $ob = $_SESSION['user'];
    $email = $_SESSION['email'];
    $date = date("Y-m-d");
    $comment = $_POST['comment'];
    
    $data = [
        'filelink' => $image,
        'fileName' => $mainimage,
        'labType' => $labType,
        'ob' => $ob,
        'email' => $email,
        'date' => $date,
        'comment' => $comment
    ];
    $ref = "labresults/";
    $pushData = $database->getReference($ref)->set($data);
}
