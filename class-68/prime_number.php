<?php   

$msg = "";

if (isset($_GET['submit'])){
    
$num = $_GET['num'];

    if ($num <= 1){
        $msg = "$num is not Prime";
    }else{
        $isPrime = true;
        for($i = 2; $i <= sqrt($num); $i++){
            if ($num % $i == 0){
                $isPrime = false;
                break;
            }
        }
        $msg = $isPrime ? "$num is prime" : "$num is not prime";
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
    <form>
        Enter Number : 
        <input type="number" name="num">
        <button type="submit" name="submit">Check</button>

    </form>

      <h1><?php echo $msg ?></h1>
    
</body>
 
</html>