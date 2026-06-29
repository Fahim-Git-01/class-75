<?php
require_once 'models/user.class.php';
require_once 'models/role.class.php';
$userModel = new User($db);

if (isset($_POST['delete_id'])) {
    $r = $userModel->delete((int)$_POST['delete_id']);
    $msg = $r['msg']; $msgType = $r['ok'] ? 'success' : 'danger';
}
$users = $userModel->getAll();
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-account-multiple"></i></span> Manage Users</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb"><li class="breadcrumb-item active">Users</li></ul></nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">All Users <span class="badge badge-primary"><?= count($users) ?></span></h4>
            <a href="?page=create-user" class="btn btn-primary btn-sm"><i class="mdi mdi-plus"></i> Add User</a>
          </div>
          <?php include 'views/layouts/_alert.php'; ?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark">
                <tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Type</th><th>Role</th><th>Status</th><th>Joined</th><th>Actions</th></tr>
              </thead>
              <tbody>
                <?php if (empty($users)): ?>
                  <tr><td colspan="9" class="text-center py-4 text-muted">কোনো user নেই। <a href="?page=create-user">Add করুন</a></td></tr>
                <?php else: foreach ($users as $i => $u): ?>
                  <tr>
                    <td><?= $i+1 ?></td>
                    <td><b><?= htmlspecialchars($u['full_name']) ?></b></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= htmlspecialchars($u['phone'] ?? '—') ?></td>
                    <td>
                      <?php $tc=['admin'=>'danger','employer'=>'warning','job_seeker'=>'info'][$u['user_type']] ?? 'secondary' ?>
                      <span class="badge badge-<?= $tc ?>"><?= ucfirst(str_replace('_',' ',$u['user_type'])) ?></span>
                    </td>
                    <td><?= htmlspecialchars($u['role_name'] ?? '—') ?></td>
                    <td>
                      <?php $sc=['active'=>'success','blocked'=>'danger','inactive'=>'secondary'][$u['status']] ?? 'secondary' ?>
                      <span class="badge badge-<?= $sc ?>"><?= ucfirst($u['status']) ?></span>
                    </td>
                    <td><small><?= date('d M Y', strtotime($u['created_at'])) ?></small></td>
                    <td>
                      <a href="?page=edit-user&id=<?= $u['user_id'] ?>" class="btn btn-sm btn-success" title="Edit"><i class="mdi mdi-pencil"></i></a>
                      <form method="POST" style="display:inline" onsubmit="return confirm('<?= htmlspecialchars($u['full_name']) ?> কে delete করবেন?')">
                        <input type="hidden" name="delete_id" value="<?= $u['user_id'] ?>">
                        <button class="btn btn-sm btn-danger" title="Delete"><i class="mdi mdi-delete"></i></button>
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
