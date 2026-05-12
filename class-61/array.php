<?php
    // $arr1 = [1,2,3];
    // $arr2 =  array (4,5,6,7,8,9);

    // echo "<pre>";
    // print_r ($arr1);
    // print_r ($arr2);
    // echo "</pre>";


    //  echo count ($arr1);
    //  echo "<br>";
    //  echo count ($arr2);




//       $arr1 = ["a",123,true,[1,2,3]];
//      $arr2 =  array (4,5,6,7,8,9);

//     echo "<pre>";
//     print_r ($arr1);
//     print_r ($arr2);
//     echo "</pre>";


//      echo count ($arr1);
//      echo "<br>";
//      echo count ($arr2);

     
//      echo "<br>";
//      echo $arr1 [3][2];

//      echo "<br>";

//      $arr_num = ["a","b",false,456];
//      echo "<pre>";
//      print_r($arr_num);
//      var_dump ($arr_num);

//     echo "</pre>";

//     $arr_arroc = [
//         "name" => "John Doe",
//         "age" => 30,
//         "email" => "tdfh2@example.com",
//     ];

//  echo "<pre>";
//  print_r($arr_arroc);
// var_dump ($arr_arroc);

// echo "</pre>";


// $arr_multi = [
    
//         "name" => "John Doe",
//         "age" => 30,
//         "email" => "tdfh2@example.com",
//         "address" =>[
//             "street" =>"12 main",
//             "city"  => "new dhaka",
//             "state " => "mt",
//         ],

// ];

// echo "<pre>";
//  print_r($arr_multi);
// var_dump ($arr_multi);
// echo "</pre>";

// echo "<br>";   echo "<br>";   echo "<br>";

// echo $arr_multi ["name"] = "faysal";

// echo "<pre>";
// var_dump ($arr_multi);
// echo  "</pre>";


// echo "<br>";   echo "<br>";   echo "<br>";


// $newarr = ["fahim", "masum", "rabbi"]; 

// echo "<pre>";
// print_r ($newarr);
// echo  "</pre>";


// echo "<br>";   echo "<br>";   echo "<br>";



// // array push and pop > shift unshift 

// array_pop($newarr);

// echo "<pre>";
// print_r ($newarr);
// echo  "</pre>";



// array_push($newarr,"akash");

// echo "<pre>";
// print_r ($newarr);
// echo  "</pre>";

// echo "<br>";

// array_shift($newarr);
// echo "<pre>";
// print_r ($newarr);
// echo  "</pre>";

// echo "<br>";
// array_unshift($newarr, "sumon");
// echo "<pre>";
// print_r ($newarr);
// echo  "</pre>";
// echo "<br>";



// $active = ["a","b","c"];
// $str = "str";

// echo is_array($active) ? "Array" : "Not Array";
// echo "<br>";
// echo is_array($str)? "Array" : "Not Array";
// echo "<br>";


// echo in_array("a",$active) ? "found" : "not found";



// // array sorting 


// $sor = [ "jity","fahim","faysal","masum","abul"];
// $sot_num = [20,10.5,6,90];

// echo "<pre>";
// print_r ($sor);
// print_r ($sot_num);
// echo"</pre>";

// sort($sor);
// sort($sot_num);
// echo "<pre>";
// print_r ($sor);
// print_r ($sot_num);
// echo"</pre>";


// echo "<br>";

//  value_ sorting


// $arr_arroc = [
//     "av" => "Bbbn",
//     "banglaseh"=> "Dhaka",
//     "bbapan" => "Aaokyo",
//     "nepal"=> "Katmandu",
// ];

// echo "<pre>";
// print_r($arr_arroc);
// echo"</pre>";

// asort($arr_arroc);
// echo "<pre>";
// print_r($arr_arroc);
// echo"</pre>";

// arsort($arr_arroc);
// echo "<pre>";
// print_r($arr_arroc);
// echo"</pre>";

// key sorting

// $arr_arroc = [
//     "av" => "Bbbn",
//     "banglaseh"=> "Dhaka",
//     "bbapan" => "Aaokyo",
//     "nepal"=> "Katmandu",
// ];

// ksort($arr_arroc);
// echo "<pre>";
// print_r($arr_arroc);
// echo"</pre>";

// krsort($arr_arroc);
// echo "<pre>";
// print_r($arr_arroc);
// echo"</pre>";



// natsort jevabe korte hoi


$images = ["img12.png", "img10.png", "img2.png", "img1.png"];

echo "<pre>";
print_r($images);
echo"</pre>";

natsort($images);
echo "<pre>";
print_r($images);
echo"</pre>";


natcasesort($images);
echo "<pre>";
print_r($images);
echo"</pre>";



// usort or user define sort 

$fruits = ["lemon", "lora", "bana", "applee"];

echo "<pre>";
print_r($fruits);
echo"</pre>";

uasort($fruits, function($a,$b){
    return strlen($a) - strlen($b);
});

echo "<pre>";
print_r($fruits);
echo"</pre>";



























































?>