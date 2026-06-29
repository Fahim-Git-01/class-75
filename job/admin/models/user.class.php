<?php

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getAllUsers()
    {
        $sql = "SELECT u.user_id, u.full_name, u.email, u.phone, u.user_type, u.status, 
                       r.role_name, u.created_at
                FROM users u
                LEFT JOIN roles r ON u.role_id = r.role_id
                ORDER BY u.user_id DESC";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

 
    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }


    public function getAllRoles()
    {
        $result = $this->db->query("SELECT role_id, role_name FROM roles ORDER BY role_name");
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function createUser($full_name, $email, $phone, $password, $user_type, $role_id, $status)
    {
        // Email আগে থেকে আছে কিনা চেক
        $check = $this->db->prepare("SELECT user_id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
            return ['success' => false, 'msg' => 'This email already used'];
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $role_id = ($role_id == '') ? null : (int)$role_id;

        $stmt = $this->db->prepare(
            "INSERT INTO users (full_name, email, phone, password, user_type, role_id, status) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssss", $full_name, $email, $phone, $hashed, $user_type, $role_id, $status);

        if ($stmt->execute()) {
            return ['success' => true, 'msg' => 'User created successfully'];
        }
        return ['success' => false, 'msg' => 'Error: ' . $stmt->error];
    }


    public function updateUser($user_id, $full_name, $email, $phone, $user_type, $role_id, $status, $new_password = '')
    {
    
        $check = $this->db->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
        $check->bind_param("si", $email, $user_id);
        $check->execute();
        $check->store_result();
        if ($check->num_rows > 0) {
            return ['success' => false, 'msg' => 'এই Email টি অন্য user ব্যবহার করছে!'];
        }

        $role_id = ($role_id == '') ? null : (int)$role_id;

    
        if (!empty($new_password)) {
            $hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare(
                "UPDATE users SET full_name=?, email=?, phone=?, user_type=?, role_id=?, status=?, password=? 
                 WHERE user_id=?"
            );
            $stmt->bind_param("sssssssi", $full_name, $email, $phone, $user_type, $role_id, $status, $hashed, $user_id);
        } else {
            $stmt = $this->db->prepare(
                "UPDATE users SET full_name=?, email=?, phone=?, user_type=?, role_id=?, status=? 
                 WHERE user_id=?"
            );
            $stmt->bind_param("ssssssi", $full_name, $email, $phone, $user_type, $role_id, $status, $user_id);
        }

        if ($stmt->execute()) {
            return ['success' => true, 'msg' => 'User Has been Updated'];
        }
        return ['success' => false, 'msg' => 'Error: ' . $stmt->error];
    }


    public function deleteUser($user_id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            return ['success' => true, 'msg' => 'User delete'];
        }
        return ['success' => false, 'msg' => 'Error: ' . $stmt->error];
    }
}
?>
