<?php

require_once  '../config/config.php';
require_once  '../../classes/auth/Logout.php';
session_start(); 

$logout = new Logout($db);

if (isset($_POST['logout'])) {
    $logout->log_user_out();
    $_SESSION['message_type'] = "success";
    $_SESSION['message'] = "Logout Successfylly!";
    header('Location: ../views/auth/login.php');
    exit;
}

?>