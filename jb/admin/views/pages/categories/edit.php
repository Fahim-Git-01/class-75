<?php
require_once 'models/category.class.php';
$catModel = new Category($db);

if (!isset($_GET['id'])||!is_numeric($_GET['id'])) { header("Location: ?page=categories"); exit; }
$cid = (int)$_GET['id'];
$cat = $catModel->getById($cid);
if (!$cat) { header("Location: ?page=categories"); exit; }

if (isset($_POST['btn_update'])) {
    $name=trim($_POST['cat_name']);
    if (empty($name)) { $msg='Category name'; $msgType='warning'; }
    else { $r=$catModel->update($cid,$name); $msg=$r['msg']; $msgType=$r['ok']?'success':'danger'; $cat=$catModel->getById($cid); }
}
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-warning text-white me-2"><i class="mdi mdi-shape"></i></span> Edit Category</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="?page=categories">Categories</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul></nav>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Category</h4>
          <?php include 'views/layouts/_alert.php'; ?>
          <form method="POST">
            <div class="form-group">
              <label>Category Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="cat_name" value="<?= htmlspecialchars($cat['category_name']) ?>">
            </div>
            <a href="?page=categories" class="btn btn-secondary">Cancel</a>
            <button type="submit" name="btn_update" class="btn btn-warning ml-2"><i class="mdi mdi-content-save"></i> Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
