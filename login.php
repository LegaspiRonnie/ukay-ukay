<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <?php
        if (isset($_SESSION['error'])) {
            echo "<b style='color:red'>".htmlspecialchars($_SESSION['error'])."</b>";
            $_SESSION['error'] = null;
        }
    ?>

    <form  action="index.php" method="POST">
        <h2>Login Form</h2>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <br>
        
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <br>
        
        <button type="submit" name="submit">Log In</button>
    </form>

</body>
</html>
