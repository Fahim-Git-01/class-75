<?php
require_once 'models/role.class.php';
$roleModel = new Role($db);

if (isset($_POST['delete_id'])) {
    $r=$roleModel->delete((int)$_POST['delete_id']); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger';
}
$roles = $roleModel->getAll();
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-shield-account"></i></span> Roles</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb"><li class="breadcrumb-item active">Roles</li></ul></nav>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add New Role</h4>
          <?php include 'views/layouts/_alert.php'; ?>
          <form method="POST" action="?page=create-role">
            <div class="form-group">
              <label>Role Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="role_name" placeholder="e.g. Manager">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" name="role_desc" rows="2" placeholder="Optional description"></textarea>
            </div>
            <button type="submit" name="btn_add" class="btn btn-primary btn-block"><i class="mdi mdi-plus"></i> Add Role</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Roles <span class="badge badge-primary"><?= count($roles) ?></span></h4>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark"><tr><th>#</th><th>Role Name</th><th>Description</th><th>Users</th><th>Actions</th></tr></thead>
              <tbody>
                <?php if (empty($roles)): ?>
                  <tr><td colspan="5" class="text-center text-muted py-3">কোনো role নেই।</td></tr>
                <?php else: foreach ($roles as $i => $r): ?>
                  <tr>
                    <td><?=$i+1?></td>
                    <td><b><?=htmlspecialchars($r['role_name'])?></b></td>
                    <td><small><?=htmlspecialchars($r['description']??'—')?></small></td>
                    <td><span class="badge badge-info"><?=$r['user_count']?></span></td>
                    <td>
                      <a href="?page=edit-role&id=<?=$r['role_id']?>" class="btn btn-sm btn-success"><i class="mdi mdi-pencil"></i></a>
                      <form method="POST" style="display:inline" onsubmit="return confirm('Delete করবেন?')">
                        <input type="hidden" name="delete_id" value="<?=$r['role_id']?>">
                        <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
