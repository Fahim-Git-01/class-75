<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == 'dashboard'){
        include_once('views/pages/dashboard.php');
    } 
    elseif($page == 'form' || $page == 'form.php'){
        include_once('views/pages/form.php');
    } else {
        include_once('views/pages/dashboard.php');
    }
    
} else {
        include_once('views/pages/dashboard.php');
}
?> 