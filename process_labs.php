<?php
session_start();
date_default_timezone_set('Asia/Manila');
include("includes/db.php");

if (isset($_POST['button'])) {
    if (isset($_POST['cbc'])) {
        $_SESSION['cbc'] = true;
    } else {
        $_SESSION['cbc'] = false;
    }
    if (isset($_POST['urinalysis'])) {
        $_SESSION['urinalysis'] = true;
    } else {
        $_SESSION['urinalysis'] = false;
    }
    if (isset($_POST['rubella'])) {
        $_SESSION['rubella'] = true;
    } else {
        $_SESSION['rubella'] = false;
    }
    if (isset($_POST['hepatitisB'])) {
        $_SESSION['hepatitisB'] = true;
    } else {
        $_SESSION['hepatitisB'] = false;
    }
    if (isset($_POST['hepatitisC'])) {
        $_SESSION['hepatitisC'] = true;
    } else {
        $_SESSION['hepatitisC'] = false;
    }
    if (isset($_POST['std'])) {
        $_SESSION['std'] = true;
    } else {
        $_SESSION['std'] = false;
    }
    if (isset($_POST['hiv'])) {
        $_SESSION['hiv'] = true;
    } else {
        $_SESSION['hiv'] = false;
    }
    if (isset($_POST['tb'])) {
        $_SESSION['tb'] = true;
    } else {
        $_SESSION['tb'] = false;
    }

    header("Location:labResultsAdd.php?key=".$_SESSION['key']);
}
