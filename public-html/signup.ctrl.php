<?php
    session_start();
    //echo $_POST["formSignUpEmail"].'<br>';
    //echo $_POST["formSignUpPassword"].'<br>';
    //echo $_POST["formSignUpPasswordConf"];
    
    $user_email=$_POST["formSignUpEmail"];
    $user_email_pattern="~^[\w]{1,}[\w.+-]{0,}@[a-zA-Z0–9]{1,}[\w-]{1,}([.][a-zA-Z]{2,}|[.][a-zA-Z0–9]{1,}[\w-]{1,}[.][a-zA-Z]{2,})$~";
    
    $user_password=$_POST["formSignUpPassword"];
    $user_password_pattern="~(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}~";

    $email_validation=preg_match($user_email_pattern,$user_email);
    $password_validation=preg_match($user_password_pattern,$user_password);

    if ($email_validation && $password_validation && $user_password == $_POST["formSignUpPasswordConf"]) {
        $_SESSION["msgid"]="811";
        header('location: index.php');
    }  else if (!$email_validation) {
        $_SESSION["msgid"]="801";
        header('location: index.php');
    } else if (!$password_validation) {
        $_SESSION["msgid"]="802";
        header('location: index.php');
    } else if ($user_password != $_POST["formSignUpPasswordConf"]){
        $_SESSION["msgid"]="803";
        header('location: index.php');
    }
    
?>