<?php
    class Person{
        private $name;
        protected $age;

        public function __get($_pname){
            return $this->$_pname;
        }
        public function __set($_pname, $_pvalue){
            // echo "<P>setter</P>";
            $this->$_pname = $_pvalue;
        }
    }

    $person = new Person();
    $person ->name ="Masum Bhai";
    $person->age = 35; 
    echo $person->name;
    echo "<br>";
    echo $person->age;
  
    
?>