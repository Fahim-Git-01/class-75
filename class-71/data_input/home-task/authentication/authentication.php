<?php
$pass = "123";
$hass_pass = password_hash($pass, PASSWORD_DEFAULT);
// echo $hass_pass;
echo "<br>";
// echo password_hash($pass,PASSWORD_DEFAULT);

if (password_verify($pass,$hass_pass)){
    echo "password is valid";
}else{
    echo "Password is Not Valid";
}











?>5