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
 $person->name ="Do You Want to Continue";
echo $person->name;
    
   
  
    
?>