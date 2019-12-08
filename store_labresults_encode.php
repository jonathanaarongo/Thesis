<?php
session_start();
include("includes/db.php");

if (isset($_POST['push'])) {
    $date = date("Y-m-d");
    $time = date("h:ia");
    $email = $_SESSION['email'];
    $cbcBool = $_SESSION['cbc'];
    $urinalysisBool = $_SESSION['urinalysis'];
    $rubellaBool = $_SESSION['rubella'];
    $hepatitisBBool = $_SESSION['hepatitisB'];
    $hepatitisCBool = $_SESSION['hepatitisC'];
    $stdBool = $_SESSION['std'];
    $hivBool = $_SESSION['hiv'];
    $tbBool = $_SESSION['tb'];

    $data = [
        'date' => $date,
        'time' => $time,
        'email' => $email,
        'cbcBool' => $cbcBool,
        'urinalysisBool' => $urinalysisBool,
        'rubellaBool' => $rubellaBool,
        'hepatitisBBool' => $hepatitisBBool,
        'hepatitisCBool' => $hepatitisCBool,
        'stdBool' => $stdBool,
        'hivBool' => $hivBool,
        'tbBool' => $tbBool,

    ];
    $ref = "labresultsencode/";
    $pushData = $database->getReference($ref)->push($data)->getKey();

    $ref = "labresultsencode/" . $pushData;

    if ($_SESSION['cbc'] == true) {
        $rbc = $_POST['rbc'];
        $wbc = $_POST['wbc'];
        $hemoglobin = $_POST['hemoglobin'];
        $hematocrit = $_POST['hematocrit'];
        $platelet = $_POST['platelet'];

        $data = [
            'rbc' => $rbc,
            'wbc' => $wbc,
            'hemoglobin' => $hemoglobin,
            'hematocrit' => $hematocrit,
            'platelet' => $platelet,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['urinalysis'] == true) {
        $urineColor = $_POST['urineColor'];
        $urineClarity = $_POST['urineClarity'];
        $phlvl = $_POST['phlvl'];
        $grav = $_POST['grav'];
        $leukocytes = $_POST['leukocytes'];
        $protein = $_POST['protein'];
        $glucose = $_POST['glucose'];
        $urobilinogen = $_POST['urobilinogen'];
        $hemoPresent = $_POST['hemoPresent'];
        $nitritePresent = $_POST['nitritePresent'];
        $ketonesPresent = $_POST['ketonesPresent'];
        $bilirubinPresent = $_POST['bilirubinPresent'];

        $data = [
            'urineColor' => $urineColor,
            'urineClarity' => $urineClarity,
            'phlvl' => $phlvl,
            'grav' => $grav,
            'leukocytes' => $leukocytes,
            'protein' => $protein,
            'glucose' => $glucose,
            'urobilinogen' => $urobilinogen,
            'hemoPresent' => $hemoPresent,
            'nitritePresent' => $nitritePresent,
            'ketonesPresent' => $ketonesPresent,
            'bilirubinPresent' => $bilirubinPresent,
            
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['rubella'] == true) {
        $rubella = $_POST['rubella'];
        $data = [
            'rubella' => $rubella,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['hepatitisB'] == true) {
        $hepatitisB = $_POST['hepatitisB'];
        $data = [
            'hepatitisB' => $hepatitisB,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['hepatitisC'] == true) {
        $hepatitisC = $_POST['hepatitisC'];
        $data = [
            'hepatitisC' => $hepatitisC,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['std'] == true) {
        $std = $_POST['std'];
        $data = [
            'std' => $std,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['hiv'] == true) {
        $hiv = $_POST['hiv'];
        $data = [
            'hiv' => $hiv,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }
    if ($_SESSION['tb'] == true) {
        $tb = $_POST['tb'];
        $data = [
            'tb' => $tb,
    
        ];
        $pushData = $database->getReference($ref)->update($data);
    }

 header("Location:labResults.php?key=" . $_SESSION['key']);
} else {
    $date = date("Y-m-d");
    $time = date("h:ia");
    $email = $_SESSION['email'];
    $cbcBool = $_SESSION['cbc'];
    $urinalysisBool = $_SESSION['urinalysis'];
    $rubellaBool = $_SESSION['rubella'];
    $hepatitisBBool = $_SESSION['hepatitisB'];
    $hepatitisCBool = $_SESSION['hepatitisC'];
    $stdBool = $_SESSION['std'];
    $hivBool = $_SESSION['hiv'];
    $tbBool = $_SESSION['tb'];

    $data = [
        'date' => $date,
        'time' => $time,
        'email' => $email,
        'cbcBool' => $cbcBool,
        'urinalysisBool' => $urinalysisBool,
        'rubellaBool' => $rubellaBool,
        'hepatitisBBool' => $hepatitisBBool,
        'hepatitisCBool' => $hepatitisCBool,
        'stdBool' => $stdBool,
        'hivBool' => $hivBool,
        'tbBool' => $tbBool,

    ];
    $ref = "labresultsencode/";
    $pushData = $database->getReference($ref)->set($data);

    $ref = "labresultsencode/" . $pushData;

    if ($_SESSION['cbc'] == true) {
        $rbc = $_POST['rbc'];
        $wbc = $_POST['wbc'];
        $hemoglobin = $_POST['hemoglobin'];
        $hematocrit = $_POST['hematocrit'];
        $platelet = $_POST['platelet'];

        $data = [
            'rbc' => $rbc,
            'wbc' => $wbc,
            'hemoglobin' => $hemoglobin,
            'hematocrit' => $hematocrit,
            'platelet' => $platelet,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['urinalysis'] == true) {
        $urineColor = $_POST['urineColor'];
        $urineClarity = $_POST['urineClarity'];
        $phlvl = $_POST['phlvl'];
        $grav = $_POST['grav'];
        $leukocytes = $_POST['leukocytes'];
        $protein = $_POST['protein'];
        $glucose = $_POST['glucose'];
        $urobilinogen = $_POST['urobilinogen'];
        $hemoPresent = $_POST['hemoPresent'];
        $nitritePresent = $_POST['nitritePresent'];
        $ketonesPresent = $_POST['ketonesPresent'];
        $bilirubinPresent = $_POST['bilirubinPresent'];

        $data = [
            'urineColor' => $urineColor,
            'urineClarity' => $urineClarity,
            'phlvl' => $phlvl,
            'grav' => $grav,
            'leukocytes' => $leukocytes,
            'protein' => $protein,
            'glucose' => $glucose,
            'urobilinogen' => $urobilinogen,
            'hemoPresent' => $hemoPresent,
            'nitritePresent' => $nitritePresent,
            'ketonesPresent' => $ketonesPresent,
            'bilirubinPresent' => $bilirubinPresent,
            
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['rubella'] == true) {
        $rubella = $_POST['rubella'];
        $data = [
            'rubella' => $rubella,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['hepatitisB'] == true) {
        $hepatitisB = $_POST['hepatitisB'];
        $data = [
            'hepatitisB' => $hepatitisB,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['hepatitisC'] == true) {
        $hepatitisC = $_POST['hepatitisC'];
        $data = [
            'hepatitisC' => $hepatitisC,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['std'] == true) {
        $std = $_POST['std'];
        $data = [
            'std' => $std,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['hiv'] == true) {
        $hiv = $_POST['hiv'];
        $data = [
            'hiv' => $hiv,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
    if ($_SESSION['tb'] == true) {
        $tb = $_POST['tb'];
        $data = [
            'tb' => $tb,
    
        ];
        $pushData = $database->getReference($ref)->set($data);
    }
}
