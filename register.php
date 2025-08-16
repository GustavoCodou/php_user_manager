<?php

$error= "";

if($_SERVER["REQUEST_METHOS"]== "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if($password !== $confirm_password){
        $error = "Password do not mactch";
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        echo "HELLO";

        if(mysqli_num_rows($result) ===1){
            $error = "Username already exists, Please choose another";
        }else{

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "Insert INTO users (username, password, email) VALUES ('$username', '$passwordHash', '$email' )";

            if(mysqli_query($conn, $sql)){
                    echo "DATA INSERTED";
            }else{
                    $error = "SOMETHING HAPPENED not data inserted, error:" . mysqli_error($conn);
            };
       
        }


        

      

        
       exit;

    }
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

<h2>Register</h2>

<?php if($error): ?>

<p style="color:red">
    <?php echo $error; ?>

</p>

<?php endif; ?>


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

<?php
mysqli_close($conn);
?>