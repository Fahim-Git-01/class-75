<?php

$countries = [
    "Bangladesh" => "Dhaka",
    "India" => "Delhi",
    "USA" => "Washington DC",
    "Japan" => "Tokyo",
    "Canada" => "Ottawa"
];

asort($countries);

foreach($countries as $country => $capital){
    echo "$country : $capital <br>";
}

?>