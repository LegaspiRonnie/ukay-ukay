<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isUserAuth(): bool {
    if (empty($_SESSION['user_id'])) {
        $_SESSION['message_type'] = 'error';
        $_SESSION['message'] = 'You have no permission on this page';
        header('Location: ../views/auth/login.php');
        exit;
    }

    return true;
}