<?php
interface  iTest1 {
    public function viewInfo();
}

interface iTest2 {
    public function showText();
}

class ChildClass implements iTest1, iTest2 {
    public $name = "Mina";
   public $result = "Pass";
    public $email = "abc@gmail.com";

    public function viewInfo(){
        echo "Name : $this->name <br>";
        echo "Result : $this->result <br>";
        echo "Email : $this->email <br>";
    }
    public function showText(){
        echo "A Static Message";
    }
}


$child = new ChildClass();
$child->viewInfo();





?>