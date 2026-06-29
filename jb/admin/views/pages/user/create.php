<?php
require_once 'models/user.class.php';
require_once 'models/role.class.php';
$userModel = new User($db);
$roleModel = new Role($db);
$roles = $roleModel->getAllSimple();
$d = ['full_name'=>'','email'=>'','phone'=>''];

if (isset($_POST['btn_submit'])) {
    $d = ['full_name'=>trim($_POST['full_name']), 'email'=>trim($_POST['email']),
          'phone'=>trim($_POST['phone']), 'user_type'=>$_POST['user_type'],
          'role_id'=>$_POST['role_id'], 'status'=>$_POST['status'],
          'password'=>$_POST['pass']];
    if (empty($d['full_name']) || empty($d['email']) || empty($d['password'])) {
        $msg='Name, Email Password '; $msgType='warning';
    } elseif ($_POST['pass'] !== $_POST['conf_pass']) {
        $msg='Password dose not match'; $msgType='warning';
    } elseif (strlen($d['password']) < 6) {
        $msg='Password Min 6 character!'; $msgType='warning';
    } else {
        $r=$userModel->create($d); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger';
        if ($r['ok']) $d=['full_name'=>'','email'=>'','phone'=>''];
    }
}
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-account-plus"></i></span> Create User</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="?page=users">Users</a></li>
      <li class="breadcrumb-item active">Create</li>
    </ul></nav>
  </div>
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">New User</h4>
          <?php include 'views/layouts/_alert.php'; ?>
          <form method="POST">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Full Name <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="full_name" value="<?= htmlspecialchars($d['full_name']) ?>" placeholder="Full name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($d['email']) ?>" placeholder="Email address">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Phone</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($d['phone']) ?>" placeholder="Phone (optional)">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">User Type</label>
              <div class="col-sm-9">
                <select class="form-control" name="user_type">
                  <option value="admin">Admin</option>
                  <option value="employer">Employer</option>
                  <option value="job_seeker" selected>Job Seeker</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Role</label>
              <div class="col-sm-9">
                <select class="form-control" name="role_id">
                  <option value="">— No Role —</option>
                  <?php foreach ($roles as $r): ?>
                    <option value="<?= $r['role_id'] ?>"><?= htmlspecialchars($r['role_name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Status</label>
              <div class="col-sm-9">
                <select class="form-control" name="status">
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                  <option value="blocked">Blocked</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="pass" placeholder="Min 6 characters">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Confirm Password <span class="text-danger">*</span></label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="conf_pass" placeholder="Repeat password">
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <a href="?page=users" class="btn btn-secondary me-2">Cancel</a>
              <button type="submit" name="btn_submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
