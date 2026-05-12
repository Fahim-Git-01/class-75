<?php

$str = "hel-lo wo-rld 20-27";
 
$arr = explode("-", $str);
 
echo "<pre>";
print_r($arr);
echo "</pre>";


$new_arr = implode(" : ", $arr);
echo "<pre>";
print_r($new_arr);
echo "</pre>";

$arr2 = range("a", "m", 4);

echo "<pre>";
print_r($arr2);
echo "</pre>";

$arr3 = range(5, 90, 10);

echo "<pre>";
print_r($arr3);
echo "</pre>";


$arr_assoc = array("a" => "apple", "b" => "banana", "c" => "cherry");
echo "<pre>";
echo array_key_exists("a", $arr_assoc) ? "Found" : "Not Found"; 
echo ("<br />");
echo array_key_exists("s", $arr_assoc) ? "Found" : "Not Found"; 
echo "</pre>";


$keys = array_keys($arr_assoc);
echo "<pre>";
print_r($keys);
echo "</pre>";


$values = array_values($arr_assoc);
echo "<pre>";
print_r($values);
echo "</pre>";

?>