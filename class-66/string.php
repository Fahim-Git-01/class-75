<?php
$str = 'Hello   World!';

echo substr($str , 6, -1);
echo '<br>';
echo strlen($str);

echo '<br>';
var_dump(strpos($str, "A"));
echo '<br>';

var_dump(strripos($str,"h"));
echo '<br>';

echo str_replace("hellow","php",'hi');
echo "<br>";

echo strtolower($str);
echo "<br>";

$html = htmlspecialchars("<h1 style='forn: size 2000px;'></h1>");










?>