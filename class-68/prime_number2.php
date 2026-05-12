

<?php
$msg= "";

if(isset($_GET('submit'))){
    $num = $_GET ['num'];

    if($num <= 1){
        $msg = "$num is not prime";

    } else {
        $isprime= true;
        for($i = 2; $i <= squrt($num)) 
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        Enter Number 
        <input type="number" name="name" >
        <button type="submit">Click</button>
    </form>
    
</body>
</html>