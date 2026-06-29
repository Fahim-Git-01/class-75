<?php
class User 
{
    public $id;
    public $name;
    public $email;
    public $role_id;
    private $password;

    public function __construct($_id, $_name, $_email, $_role_id, $_password = null) {
        $this->id = $_id;
        $this->name = $_name;
        $this->email = $_email;
        $this->role_id = $_role_id;
        $this->password = $_password;
    }

    public function create() {
      global $db;
      $sql = "INSERT INTO users (name, email, role_id, password) 
            VALUES ('$this->name', '$this->email', $this->role_id, '$this->password')";
      $db->query($sql);
      if($db->error){
        return $db->error;
      }else{
        return true;
      }
    }
    public function update() {
    }
     static public function readAll() {
        global $db;
        $sql = "SELECT id, name * from user order by DESC";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function readById() {
    }
    public function delete() {
    }

}

?>