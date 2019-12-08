<?php
include("includes/db.php");

    
if(isset($_POST['signin'])){
    
    $email = $_POST['emailSignIn'];
    $pass = $_POST['passSignIn'];

    $auth = $firebase->getAuth();
    $user = $auth->getUserByEmail($email);
    if($user){
        session_start();
        $_SESSION['user'] = $email;
        header("Location:dashboard.php");
    }
}
else if(isset($_POST['signup'])){
    
    $email = $_POST['emailSignup'];
    $passW = $_POST['passSignup'];

    $auth = $firebase->getAuth();
    $user = $auth->createUserWithEmailAndPassword($email,$pass);
    header("Location:viewPatientList.php");
}

?>