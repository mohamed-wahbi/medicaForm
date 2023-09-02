<?php
    session_start();
    unset($_SESSION['USER_ID']); 
    unset($_SESSION['USER_EMAIL']);
    unset($_SESSION['USER_PASS']);
    header('location:login.php');
    die();
?>