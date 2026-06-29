<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");
    echo "Testing";
?>

<?php
include_once ("../connection/connect.php");

$user = json_decode(file_get_contents('php://input'));

$name = $user->name;
$email = $user->email;
$phone = $user->phone;
$message = $user->message;


$db->query("INSERT INTO contact(id,name,email,phone,message) values (null, '$name' ,'$email' , '$phone', '$message')");

if($db->affected_rows) echo "Inserted";


?>