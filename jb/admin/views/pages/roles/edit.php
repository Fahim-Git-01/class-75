<?php
require_once 'models/role.class.php';
$roleModel = new Role($db);
if (!isset($_GET['id'])||!is_numeric($_GET['id'])) { header("Location: ?page=roles"); exit; }
$rid  = (int)$_GET['id'];
$role = $roleModel->getById($rid);
if (!$role) { header("Location: ?page=roles"); exit; }

if (isset($_POST['btn_update'])) {
    $name=trim($_POST['role_name']); $desc=trim($_POST['role_desc']??'');
    if (empty($name)) { $msg='Role name'; $msgType='warning'; }
    else { $r=$roleModel->update($rid,$name,$desc); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger'; $role=$roleModel->getById($rid); }
}
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-warning text-white me-2"><i class="mdi mdi-shield-account"></i></span> Edit Role</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="?page=roles">Roles</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul></nav>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Role</h4>
          <?php include 'views/layouts/_alert.php'; ?>
          <form method="POST">
            <div class="form-group">
              <label>Role Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="role_name" value="<?=htmlspecialchars($role['role_name'])?>">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" name="role_desc" rows="3"><?=htmlspecialchars($role['description']??'')?></textarea>
            </div>
            <a href="?page=roles" class="btn btn-secondary">Cancel</a>
            <button type="submit" name="btn_update" class="btn btn-warning ml-2"><i class="mdi mdi-content-save"></i> Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
