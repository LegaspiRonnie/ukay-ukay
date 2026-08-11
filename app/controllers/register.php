<?php

require_once  '../config/config.php';
require_once  '../../classes/auth/Register.php';
require_once '../../classes/Session.php'; 

$register = new Register($db);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if($password !== $confirm_password) {
        $_SESSION['message_type'] = "error";
        $_SESSION['message'] = "Password Do not match!";
        header('Location: ../views/auth/register.php') ;
        exit;
    }

    $userId = $register->registerUser($username, $email, $password);

    if ($userId !== false) {
        $register->log_user_in($userId);

        $_SESSION['user_id'] = $userId;
        $_SESSION['message_type'] = "success";
        $_SESSION['message'] = "Registered Successfylly!";
        header('Location: ../views/index.php');
        exit;
    }

    $_SESSION['message_type'] = "error";
    $_SESSION['message'] = "Can't Register Account";
    require_once 'login.php';
    exit;
}


// if (isset($_POST['email']) && isset($_POST['password'])) {
//     $userId = $login->loginUser($_POST['email'], $_POST['password']);

//     if ($userId !== false) {
//         $login->log_user_in($userId);

//         $_SESSION['user_id'] = $userId;
//         $_SESSION['message_type'] = "success";
//         $_SESSION['message'] = "Logged in Successfylly!";
//         header('Location: ../views/index.php');
//         exit;
//     }

//     $_SESSION['message_type'] = "error";
//     $_SESSION['message'] = "Invalid Credentials";
//     require_once 'login.php';
//     exit;
// }



// if (isset($_POST['email']) && isset($_POST['password'])) {
//     $userId = $login->loginUser($_POST['email'], $_POST['password']);

//     if ($userId !== false) {
//         $login->log_user_in($userId);
//         header('Location: index.php');
//         exit;
//     }

//     $_SESSION['error'] = "Invalid Credentials";
//     require_once 'login.php';
//     exit;
// }

// $user_id = $login->logged_in_user();

// if (!$user_id) {
//     require_once 'login.php';
//     exit;
// }

// if (isset($_POST['logout'])) {
//     $login->log_user_out();
//     header('Location: index.php');
//     exit;
// }

// if($login->get_user_role($user_id) === 1 ) {
//     echo "you are a administrator";
    
// } else {
//     echo "you are a custoemr";
// }

// echo "you got to the secret place ";
// ?>

// <form method="POST" action="index.php">
//     <input type="hidden" name="logout" value="true"/>
//     <button type="submit">Logout</button>

// </form>
// <?php

// $userId = $auth->loginUser("r@gmsail.com", "Ronsnie@23");
// if (!$userId) {
//     echo "Wrong Email or password";

// }  else {
//     echo "Welcome user ID " . $userId;
// }
// $userId = $auth->registerUser("Ronnsie", "r@gmsail.com", "Ronnie@23");

// if($userId === false) {
//     echo "unable to create user";
// } else {
//     echo "Created user with ID " . intval($userId);
// }

// Example usage:
// $auth->addUser('username', 'email@example.com', 'password123');
