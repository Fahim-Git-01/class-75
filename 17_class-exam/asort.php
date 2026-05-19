<?php
$arr = [
    "Banglasesh" => "Dhaka",
    "Pakistan" => "Islamabad",
    "Afghanistan" => "Kabul",
    "China" => "Beijing",
    "Finland" => "Paris",
];

echo "<pre>";
print_r($arr);
echo "</pre>" . "<br>";

asort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>" . "<br>";



?>