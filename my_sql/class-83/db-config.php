<?php
// new mysqli(host, username, password, database);


//local 
// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASS", "");
// define("DB_NAME", "round_70");
// $db = new mysqli ("localhost", "root", "", "round-70");


// hosting 
// define("DB_HOST", "abc.com");
// define("DB_USER", "round_70");
// define("DB_PASS", "5543654");
// define("DB_NAME", "round_70");


// new mysqli ("localhost", "root", "", "round_70");

$db = new mysqli ("localhost", "root", "", "file");

if($db->connect_error){
    die("connection Failed : " . $db->connect_error);
}else{
    echo "<h1 style= color:red;>Successsfully Error</h1>";
}








?>