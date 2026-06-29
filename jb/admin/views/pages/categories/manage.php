<?php
require_once 'models/category.class.php';
$catModel = new Category($db);

if (isset($_POST['delete_id'])) {
    $r=$catModel->delete((int)$_POST['delete_id']); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger';
}
$cats = $catModel->getAll();
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-shape"></i></span> Categories</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb"><li class="breadcrumb-item active">Categories</li></ul></nav>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Quick Add</h4>
          <?php include 'views/layouts/_alert.php'; ?>
          <form method="POST" action="?page=create-category">
            <div class="form-group">
              <label>Category Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="cat_name" placeholder="e.g. IT & Technology">
            </div>
            <button type="submit" name="btn_add" class="btn btn-primary btn-block"><i class="mdi mdi-plus"></i> Add Category</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Categories <span class="badge badge-primary"><?= count($cats) ?></span></h4>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark"><tr><th>#</th><th>Category Name</th><th>Jobs</th><th>Actions</th></tr></thead>
              <tbody>
                <?php if (empty($cats)): ?>
                  <tr><td colspan="4" class="text-center text-muted py-3"></td></tr>
                <?php else: foreach ($cats as $i => $c): ?>
                  <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= htmlspecialchars($c['category_name']) ?></td>
                    <td><span class="badge badge-info"><?= $c['job_count'] ?></span></td>
                    <td>
                      <a href="?page=edit-category&id=<?= $c['category_id'] ?>" class="btn btn-sm btn-success"><i class="mdi mdi-pencil"></i></a>
                      <form method="POST" style="display:inline" onsubmit="return confirm">
                        <input type="hidden" name="delete_id" value="<?= $c['category_id'] ?>">
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
