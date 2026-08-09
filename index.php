<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/classes/auth/Auth.php';
session_start(); 

$auth = new Auth($db);

if (isset($_POST['email']) && isset($_POST['password'])) {
    $userId = $auth->loginUser($_POST['email'], $_POST['password']);

    if ($userId !== false) {
        $auth->log_user_in($userId);
        header('Location: index.php');
        exit;
    }

    $_SESSION['error'] = "Invalid Credentials";
    require_once 'login.php';
    exit;
}

$user_id = $auth->logged_in_user();

if (!$user_id) {
    require_once 'login.php';
    exit;
}

if (isset($_POST['logout'])) {
    $auth->log_user_out();
    header('Location: index.php');
    exit;
}

if($auth->get_user_role($user_id) === 1 ) {
    echo "you are a administrator";
    
} else {
    echo "you are a custoemr";
}

echo "you got to the secret place ";
?>

<form method="POST" action="index.php">
    <input type="hidden" name="logout" value="true"/>
    <button type="submit">Logout</button>

</form>
<?php

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
