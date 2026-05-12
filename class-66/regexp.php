<?php

// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     echo "post value";
// } elseif($_SERVER['REQUEST_METHOD'] == "GET"){
//     echo"Get Method";
// }

//  if(isset($_POST['submit_name'])){
//     echo $_POST['name'];
//     echo "<br>";
//     echo $_POST['email'];    
    
//  }

// if(isset($_POST['submit_name'])){
//     $username = $_POST['name'];
//     $newName = "/^[a-zA-Z0-9]{4,8}[@]{1}$/";


//     if(preg_match($newName, $username) === 0){
//         $name_error = "Must have Username";
//     }elseif(
//         $name_error = ""
//     )

// }

if(empty($username))



if (isset($_POST['submt_name'])){
     $new_email = $_POST['email'];    
    $reg_email = "/^[a-zA-Z0-9._]{3,60}[@]{1}[a-zA-Z0-9]{2,20}[.]{1}[a-zA-Z0-9]{2,10}$/";


    if(preg_match($reg_email, $new_email) === 0){
        $email_error = "Email is not Valid";
    } else{
        $email_error = "";       
    }
    if ($email_error == ""){
        $msg = "Form submitted successfully";
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
     .error_text{
        color : red;
     }
    </style>
</head>
<body>
    <form action="" method="POST">
       Username <br>
       <input type="text" name="name" value="Fahim"> <br> <br>
       <div class="error-text"><?= $name_error ?? ""?></div><br>

       Email <br>
       <input type="text" name="email" value="abc@gmail.com">
       <div class="error_text"> <?= $email_error ?? "" ?></div><br>
       

       <input type="submit" name="submit_name">
       <h3 style ="color : green;"> <?php echo $msg?? "" ;?></h3>
    </form>
</body>
</html>