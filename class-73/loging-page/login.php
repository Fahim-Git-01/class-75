<?php

session_start();
// $_SESSION["user_id"] = 10;
// unset($_SESSION['user_id']);
if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
}

$pass ="123";
$hass_pass = password_hash($pass, PASSWORD_DEFAULT); 

if(isset($_POST['login'])){
    if(password_verify($_POST['password'], $hass_pass)){
        $_SESSION['user_id'] = 1;
        header("location: dashboard.php");
    }else{
        $error = "Invalid Password";
    }
}






?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <input type="text" name="username"> <br><br>
        <input type="password" name="password" id=""> <br><br>
        <input type="submit" value="Login" name="login">
    </form>

    <p style="color:red;"><?php echo $error ?? "" ?></p>
    
</body>
</html>