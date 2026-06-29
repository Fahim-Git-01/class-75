<?php
class User {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        $sql = "SELECT u.*, r.role_name FROM users u
                LEFT JOIN roles r ON u.role_id = r.role_id
                ORDER BY u.user_id DESC";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $s = $this->db->prepare("SELECT * FROM users WHERE user_id=?");
        $s->bind_param("i", $id);
        $s->execute();
        return $s->get_result()->fetch_assoc();
    }

    public function create($data) {
        // duplicate email check
        $c = $this->db->prepare("SELECT user_id FROM users WHERE email=?");
        $c->bind_param("s", $data['email']);
        $c->execute(); $c->store_result();
        if ($c->num_rows > 0) return ['ok'=>false,'msg'=>'Email Allready registered!'];

        $hash    = password_hash($data['password'], PASSWORD_DEFAULT);
        $role_id = ($data['role_id'] == '') ? null : (int)$data['role_id'];
        $s = $this->db->prepare(
            "INSERT INTO users (full_name,email,phone,password,user_type,role_id,status)
             VALUES (?,?,?,?,?,?,?)"
        );
        $s->bind_param("sssssss",
            $data['full_name'], $data['email'], $data['phone'],
            $hash, $data['user_type'], $role_id, $data['status']
        );
        return $s->execute()
            ? ['ok'=>true, 'msg'=>'User Created']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function update($id, $data) {
        $c = $this->db->prepare("SELECT user_id FROM users WHERE email=? AND user_id!=?");
        $c->bind_param("si", $data['email'], $id);
        $c->execute(); $c->store_result();
        if ($c->num_rows > 0) return ['ok'=>false,'msg'=>'Email is used'];

        $role_id = ($data['role_id'] == '') ? null : (int)$data['role_id'];

        if (!empty($data['password'])) {
            $hash = password_hash($data['password'], PASSWORD_DEFAULT);
            $s = $this->db->prepare(
                "UPDATE users SET full_name=?,email=?,phone=?,user_type=?,role_id=?,status=?,password=? WHERE user_id=?"
            );
            $s->bind_param("sssssssi",
                $data['full_name'],$data['email'],$data['phone'],
                $data['user_type'],$role_id,$data['status'],$hash,$id
            );
        } else {
            $s = $this->db->prepare(
                "UPDATE users SET full_name=?,email=?,phone=?,user_type=?,role_id=?,status=? WHERE user_id=?"
            );
            $s->bind_param("ssssssi",
                $data['full_name'],$data['email'],$data['phone'],
                $data['user_type'],$role_id,$data['status'],$id
            );
        }
        return $s->execute()
            ? ['ok'=>true, 'msg'=>'User updated']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function delete($id) {
        $s = $this->db->prepare("DELETE FROM users WHERE user_id=?");
        $s->bind_param("i", $id);
        return $s->execute()
            ? ['ok'=>true, 'msg'=>'User Deleted']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function countAll() {
        return $this->db->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'];
    }
}
?>
