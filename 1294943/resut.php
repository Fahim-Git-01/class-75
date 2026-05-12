<?php

$arr = [
    ["id" => 8, "name " => "Mina", "bacth" => "61"],
    ["id" => 9, "name " => "raju", "bacth" => "62"],
    ["id" => 10, "name " => "masum", "bacth" => "63"],
    ["id" => 11, "name " => "jaber", "bacth" => "64"],
];

if (isset($_POST["student_id"])){
    $id = $_POST["student_id"];
    $student = new Student->result($id);
    $msg = $student->result($id);

}



class Student {
    public $id;
    public $name;
    public $batch;

  
    public function __construct($id, $name="", $batch="") {
        $this->id = $id;
        $this->name = $name;
        $this->batch = $batch;
    }

   
    public function result($Id) {
        global $arr;

        foreach($arr as $item){
            if ($item ['id'] == $id){
                $res = "ID" : []
            }
        }
        // if (array_key_exists($searchId, $this->results)) {
        //     $data = $this->results[$Id];

        //     echo "Student ID: " . $Id . "<br>";
        //     echo "Name: " . $data[0] . "<br>";
        //     echo "Batch: " . $data[1] . "<br>";
           
        // } else {
        //     echo "Result not found for ID: " . $Id;
        // }
    }
}


$student1 = new Student(1001, "Rahim", "2023");


$student1->result(2001);

echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="">
    Student Id :
    <input type="search" name="search" id="student_id"> 
    <button type="search">search</button>
   </form>
    
</body>
</html>