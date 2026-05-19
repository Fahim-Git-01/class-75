<?php
if(isset($_POST['submit'])){
    // echo $_POST['email']."<br>".$_POST['pass']."<br>".$_POST['con_pass'];

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];
    $emailRegEx = '/^[a-zA-Z0-9._]{2,50}[@]{1}[a-zA-Z0-9-]{2,50}[.]{1}[a-zA-Z]{2,5}$/';

    if($email == ""){
        $emailErr = "Email is required";
    }elseif(preg_match($emailRegEx, $email) == false){
        $emailErr = "Email is not valid";
    }else{
        $emailErr = "";
    }

    if($pass == ""){
        $passErr = "Password is required";
    }elseif(strlen($pass) < 8){
        $passErr = "Password must be at least 8 characters";
    }else{
        $passErr = "";
    }

    if($con_pass == ""){
        $con_passErr = "Confirm Password is required";
    }elseif($con_pass != $pass){
        $con_passErr = "Password and Confirm Password does not match";
    }else{
        $con_passErr = "";
    }

    if($emailErr == "" && $passErr == "" && $con_passErr == ""){
        $msg = "Registration successful";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <h3>Registration</h3>
    <form method="POST">
        <label for="">Email</label><br>
        <input type="text" name="email" value="<?= $email ?? "" ?>">
        <div class="error"><?= $emailErr ?? "" ?></div>
        <label for="">Password</label><br>
        <input type="password" name="pass" value="<?= $pass ?? "" ?>">
        <div class="error"><?= $passErr ?? "" ?></div>
        <label for="">Confirm Password</label><br>
        <input type="password" name="con_pass" value="<?= $con_pass ?? "" ?>">
        <div class="error"><?= $con_passErr ?? "" ?></div><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <h5 style="color:green"><?= $msg ?? "" ?></h5>
</body>
</html>