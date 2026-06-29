<?php
class Category {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        $sql = "SELECT c.*, COUNT(j.job_id) as job_count
                FROM categories c
                LEFT JOIN jobs j ON c.category_id = j.category_id
                GROUP BY c.category_id ORDER BY c.category_id DESC";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $s = $this->db->prepare("SELECT * FROM categories WHERE category_id=?");
        $s->bind_param("i", $id); $s->execute();
        return $s->get_result()->fetch_assoc();
    }

    public function create($name) {
        $c = $this->db->prepare("SELECT category_id FROM categories WHERE category_name=?");
        $c->bind_param("s", $name); $c->execute(); $c->store_result();
        if ($c->num_rows > 0) return ['ok'=>false,'msg'=>'এই Category ইতোমধ্যে আছে!'];

        $s = $this->db->prepare("INSERT INTO categories (category_name) VALUES (?)");
        $s->bind_param("s", $name);
        return $s->execute()
            ? ['ok'=>true,'msg'=>'Category তৈরি হয়েছে!']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function update($id, $name) {
        $s = $this->db->prepare("UPDATE categories SET category_name=? WHERE category_id=?");
        $s->bind_param("si", $name, $id);
        return $s->execute()
            ? ['ok'=>true,'msg'=>'Category আপডেট হয়েছে!']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function delete($id) {
        $s = $this->db->prepare("DELETE FROM categories WHERE category_id=?");
        $s->bind_param("i", $id);
        return $s->execute()
            ? ['ok'=>true,'msg'=>'Category মুছে ফেলা হয়েছে!']
            : ['ok'=>false,'msg'=>'Error: '.$s->error];
    }

    public function countAll() {
        return $this->db->query("SELECT COUNT(*) as c FROM categories")->fetch_assoc()['c'];
    }
}
?>
