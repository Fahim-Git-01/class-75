<?php
require_once 'models/category.class.php';
$catModel = new Category($db);

if (isset($_POST['btn_add'])) {
    $name = trim($_POST['cat_name']);
    if (empty($name)) { $msg='Category name'; $msgType='warning'; }
    else { $r=$catModel->create($name); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger'; }
}
header("Location: ?page=categories");
exit;


?>