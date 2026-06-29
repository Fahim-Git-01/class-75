<?php
require_once ('../config/db.php');
foreach (glob("../models/*.class.php") as $filename) {
    require_once $filename;
}
// foreach (glob("api/*-api.php") as $filename) {
//     require_once $filename;
// }
require_once 'product-api.php';

// echo "<h1>API</h1>";
if (isset($_GET['endpoint'])) {
    $api_route = $_GET['endpoint'];
    if($api_route == 'get-products') {
    
         getProducts($_GET['id']);
        // echo $_GET['id'];
        // echo $_GET['endpoint'];
    }
    // elseif($api_route == 'test'){
    //     echo "test api";
    // }
}
