<?php
$msg = "";
if(isset($_POST["submit"])){
    $num = $_POST["num"];

   if($num>0){
      $fact = 1;
    for($i= $num; $i>0; $i--){
        $fact *=$i;
    }
    $msg = "The factoril of  " . $num . " is " . $fact;
   }else{
      $msg = "please provide valid number";
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
    <form action="" method= "POST">
        <input type="number" name="num" id="">
        <input type="submit" name="submit" id="" value="submit">
    </form>

    <?php echo $msg;?>
</body>
</html>