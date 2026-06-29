<?php
require_once 'models/role.class.php';
$roleModel = new Role($db);
if (isset($_POST['btn_add'])) {
    $name=trim($_POST['role_name']); $desc=trim($_POST['role_desc']??'');
    if (empty($name)) { $msg='Role name দিতে হবে!'; $msgType='warning'; }
    else { $r=$roleModel->create($name,$desc); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger'; }
}
header("Location: ?page=roles");
exit;
