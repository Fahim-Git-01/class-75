<?php
require_once 'models/user.class.php';
require_once 'models/role.class.php';
$userModel = new User($db);
$roleModel = new Role($db);
$roles = $roleModel->getAllSimple();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { header("Location: ?page=users"); exit; }
$uid  = (int)$_GET['id'];
$user = $userModel->getById($uid);
if (!$user) { header("Location: ?page=users"); exit; }

if (isset($_POST['btn_update'])) {
    $data = ['full_name'=>trim($_POST['full_name']), 'email'=>trim($_POST['email']),
             'phone'=>trim($_POST['phone']), 'user_type'=>$_POST['user_type'],
             'role_id'=>$_POST['role_id'], 'status'=>$_POST['status'],
             'password'=>$_POST['new_pass']];
    if (empty($data['full_name'])||empty($data['email'])) {
        $msg='Name ও Email দিতে হবে!'; $msgType='warning';
    } elseif (!empty($data['password']) && $data['password']!==$_POST['conf_pass']) {
        $msg='নতুন Password মিলছে না!'; $msgType='warning';
    } elseif (!empty($data['password']) && strlen($data['password'])<6) {
        $msg='Password কমপক্ষে ৬ character!'; $msgType='warning';
    } else {
        $r=$userModel->update($uid,$data); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger';
        $user = $userModel->getById($uid);
    }
}
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-warning text-white me-2"><i class="mdi mdi-account-edit"></i></span> Edit User</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="?page=users">Users</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul></nav>
  </div>
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit: <?= htmlspecialchars($user['full_name']) ?></h4>
          <?php include 'views/layouts/_alert.php'; ?>
          <form method="POST">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Full Name <span class="text-danger">*</span></label>
              <div class="col-sm-9"><input type="text" class="form-control" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
              <div class="col-sm-9"><input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Phone</label>
              <div class="col-sm-9"><input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">User Type</label>
              <div class="col-sm-9">
                <select class="form-control" name="user_type">
                  <?php foreach(['admin','employer','job_seeker'] as $t): ?>
                    <option value="<?=$t?>" <?=$user['user_type']==$t?'selected':''?>><?=ucfirst(str_replace('_',' ',$t))?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Role</label>
              <div class="col-sm-9">
                <select class="form-control" name="role_id">
                  <option value="">— No Role —</option>
                  <?php foreach ($roles as $r): ?>
                    <option value="<?=$r['role_id']?>" <?=$user['role_id']==$r['role_id']?'selected':''?>><?=htmlspecialchars($r['role_name'])?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Status</label>
              <div class="col-sm-9">
                <select class="form-control" name="status">
                  <?php foreach(['active','inactive','blocked'] as $s): ?>
                    <option value="<?=$s?>" <?=$user['status']==$s?'selected':''?>><?=ucfirst($s)?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <hr><p class="text-muted small"><i class="mdi mdi-information-outline"></i> Password change করতে চাইলে নিচে দিন, নাহলে খালি রাখুন।</p>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">New Password</label>
              <div class="col-sm-9"><input type="password" class="form-control" name="new_pass" placeholder="খালি = change নেই"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Confirm Password</label>
              <div class="col-sm-9"><input type="password" class="form-control" name="conf_pass" placeholder="Repeat new password"></div>
            </div>
            <div class="d-flex justify-content-end">
              <a href="?page=users" class="btn btn-secondary me-2">Cancel</a>
              <button type="submit" name="btn_update" class="btn btn-warning"><i class="mdi mdi-content-save"></i> Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
