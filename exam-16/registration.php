<?php

$username = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];

    if (strlen($username) < 4 || strlen($username) > 8) {
        $msg = "Username must be between 4 to 8 characters.";
    }
  
    elseif (strpos($username, "@") === false) {
        $msg = "Username must contain '@' symbol.";
    }
    else {
        $smsg = "Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Registration Validation</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="POST" action="">
    <p>Username :</p>
    <input type="text" name="username" required value="Fahim@">
    <br><br>

    <input type="submit" value="Register">
</form>
<br>
<p style="color: red;"> <?php echo $msg ; ?> </p>
<p style="color: green;"> <?php echo $smsg ?? "" ; ?> </p>


</body>
</html>