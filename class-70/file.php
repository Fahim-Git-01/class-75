<?php


// $file = fopen('text.txt',"r+");
// echo fgets($file);
// fwrite($file, " wellcome ");
// fclose($file);


$file = fopen('text.txt',"a+");
fwrite($file, " hello world \n");
fclose($file);





?>