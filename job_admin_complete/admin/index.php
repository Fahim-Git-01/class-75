<?php
session_start();
include_once('config/base.php');
include_once('config/db.php');
?>
<?php include_once('views/layouts/head.php') ?>
<?php include_once('views/layouts/nav_bar.php') ?>

<div class="container-fluid page-body-wrapper">
  <?php include_once('views/layouts/aside.php') ?>
  <div class="main-panel">
    <?php include_once('route.php') ?>
    <?php include_once('views/layouts/footer.php') ?>
  </div>
</div>

<?php include_once('views/layouts/foot.php') ?>
