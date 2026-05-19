<?php

$arr = [
    
    "safi" => 90,
    "sakirul"=>70,
    "Raju"=> 600,
    "Mithu"=> 50,
    "piku" => 49,   
];

function getscore($score){
        if($score >=80) return "A";
        if($score >=70) return "B";
        if($score >=60) return "C";
        if($score >=50) return "D";
        return "F";
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
    

 <table border ="2" width= 400>
    <thead>
        <tr>
            <th>Sl No</th>
            <th>name</th>
            <th>Score</th>
            <th>Greade</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $sl= 1;
        foreach($arr as $name => $score): 
            $grade= getscore($score);
        
        ?>

        <tr>
            <td><?= $sl++?></td>
            <td><?= $name?></td>
            <td><?= $score?></td>
            <td><?= $grade?></td>
        </tr>
        <?php endforeach;?>

    </tbody>

 </table>

 <h3>Highest score : <?php $max_score = max($arr);  echo $max_score;?></h3>
  <h3>Student name is : <?php echo array_search($max_score, $arr) ;?></h3>
</body>
</html>