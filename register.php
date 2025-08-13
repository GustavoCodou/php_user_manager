<?php

$error= "";

if($_SERVER["REQUEST_METHOS"]== "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="">
            <h2>Create your Account</h2>

            <p style="color:red">

            </p>

            <label for="username">Username:</label>
            <input placeholder="Enter your username" type="text" name="username" required>

            <label for="email">Email:</label>
            <input placeholder="Enter your email" type="email" name="email" required>

            <label for="password">Password:</label>
            <input placeholder="Enter your password" type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input placeholder="Confirm your password" type="password" name="confirm_password" required>

            <input type="submit" value="Register">
        </form>
    
</body>
</html>