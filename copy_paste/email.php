<?php
if(isset($_POST["submit"])){
    $username = $_POST["Username"];
    $email =  $_POST["email"];
    $reg_email = "/^[a-zA-Z0-9._]{3,60}[@]{1}[a-zA-Z0-9]{2,20}[.]{1}[a-zA-Z]{2,6}$/";

    if(empty($username)){
        $username_error = "Username is required";
    }elseif(strlen($username) < 4|| strlen($username) >8){
        $username_error = "Username must be 4 to 8 charaters";
    }elseif(strpos($username, "@")== false){
        $username_error = "Username must require @ sign";
    }else{
        $username_error = "";
    }

    if(preg_match($reg_email , $email)===0){
        $email_error =  "Email is not valid";
    }else{
        $email_error= "";
    }

    if($email_error == "" && $username_error== ""){
        $msg =  "Form Submitted Successfully";
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
        .error-text{
            color: red;
        }
    </style>
</head>
<body>
    


<form  method="POST">
   <label for="">Username</label> <br>
   <input type="text" name="Username" value ="<?php echo $username ?? "";?>" > <br>
   <div class="error-text"><?php echo $username_error ?? ""; ?></div> <br>

   <label for="">Email</label> <br>
   <input type="text" name="email" value="<?php echo $email ?? "safihasan@gmail.com"?>" > <br> <br>
   <div class="error-text"><?php echo $email_error ?? ""; ?></div> <br>


   <input type="submit" name="submit" id="submit">

   <h3 style="color:green;"><?php echo $msg ?? "";?></h3>
</form>
</body>
</html>