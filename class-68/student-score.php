<?php

$arr = [
    "Raju" => 40,
    "Masum" => 80,
    "jaber" => 30,
    "Mina" => 90,
    "Hridoy" => 50,
    "Mursalin" => 70,
    
]


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10"cellspacing="0" width="200">
        <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($arr as $name =>$score){
           echo " <tr>
                <td>$name</td>
                <td>$score</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
    <h5>Highest Score is : <?php echo max($arr);?></h5>
    <h5>Student Name : <?php echo array_search(max($arr), $arr) ?></h5>
</body>
</html>