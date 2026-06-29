<?php
class Role {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        return $this->db->query(
            "SELECT r.*, COUNT(u.user_id) as user_count
             FROM roles r LEFT JOIN users u ON r.role_id=u.role_id
             GROUP BY r.role_id ORDER BY r.role_id DESC"
        )->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $s = $this->db->prepare("SELECT * FROM roles WHERE role_id=?");
        $s->bind_param("i", $id); $s->execute();
        return $s->get_result()->fetch_assoc();
    }

    public function getAllSimple() {
        return $this->db->query("SELECT role_id, role_name FROM roles ORDER BY role_name")
                        ->fetch_all(MYSQLI_ASSOC);
    }

    public function create($name, $desc) {
        $c = $this->db->prepare("SELECT role_id FROM roles WHERE role_name=?");
        $c->bind_param("s",$name); $c->execute(); $c->store_result();
        if ($c->num_rows > 0) return ['ok'=>false,'msg'=>'Use New Role '];

        $s = $this->db->prepare("INSERT INTO roles (role_name,description) VALUES (?,?)");
        $s->bind_param("ss",$name,$desc);
        return $s->execute()
            ? ['ok'=>true,'msg'=>'Role Created']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function update($id, $name, $desc) {
        $s = $this->db->prepare("UPDATE roles SET role_name=?,description=? WHERE role_id=?");
        $s->bind_param("ssi",$name,$desc,$id);
        return $s->execute()
            ? ['ok'=>true,'msg'=>'Role Updated']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function delete($id) {
        $s = $this->db->prepare("DELETE FROM roles WHERE role_id=?");
        $s->bind_param("i",$id);
        return $s->execute()
            ? ['ok'=>true,'msg'=>'Role Deleted']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }
}
?>
