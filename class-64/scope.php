<?php
class User{
    public $name;
    public $age;
    protected $address = "Dhaka";
    private $password = "1234";
    static $country = "Bangladesh";
    public function __construct($_name, $_age){
        $this->name = $_name;
        $this->age = $_age;

    }
    public function test(){
        echo "Test from parent class";
    }
}
class Trainee extends User{
    public $course;
    public $year;
    public function __construct($_course, $_year, $_name, $_age){
        parent::__construct($_name, $_age);
        $this->course = $_course;
        $this->year = $_year;
    }
    public function info(){
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Course: " . $this->course . "<br>";
        echo "Year: " . $this->year . "<br>";
        echo "Address: " . $this->address . "<br>";
        // echo "Country : " . $this->country . "<br>";
        // echo "passwwork: " . $this->password . "<br>";  //child ar moddhe result asbe na 
        
    }
}

$trainee = new Trainee("PHP", 2026, "Raju", 25);
$trainee->info();

$user = new User("Raju", 25);
// $user->password;



// $user->password;




?>