<?php
session_start();
if(!isset($_SESSION['user_id'])){
   header("Location: Login.php");
}

if(isset($_POST['logout'])){
    session_unset();
    header("location: login.php");
}







?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <nav>
        <a href="dashboard.php">Dashboard</a> |
        <a href="report.php">Report</a>
        <form action="" method="POST">
            <input type="submit" name="logout" id="logout" value="Logout">
        </form>
    </nav>

    <h1>Dashboard Page</h1>
    
</body>
</html>