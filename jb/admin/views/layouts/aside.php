<?php $cur = $_GET['page'] ?? 'dashboard'; ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="assets/images/faces/face1.jpg" alt="profile" />
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Admin Panel</span>
          <span class="text-secondary text-small">Super Admin</span>
        </div>
      </a>
    </li>

    <?php
    $menu = [
        ['page'=>'dashboard',   'icon'=>'mdi mdi-home',              'label'=>'Dashboard'],
        ['page'=>'users',       'icon'=>'mdi mdi-account-multiple',  'label'=>'Users'],
        ['page'=>'roles',       'icon'=>'mdi mdi-shield-account',    'label'=>'Roles'],
        ['page'=>'categories',  'icon'=>'mdi mdi-shape',             'label'=>'Categories'],
        ['page'=>'jobs',        'icon'=>'mdi mdi-briefcase',         'label'=>'Job List'],
        ['page'=>'companies',   'icon'=>'mdi mdi-domain',            'label'=>'Companies'],
        ['page'=>'applications','icon'=>'mdi mdi-file-document',     'label'=>'Applications'],
    ];
    foreach ($menu as $m):
        $active = ($cur == $m['page'] || strpos($cur, str_replace('s','',$m['page'])) === 0) ? 'active' : '';
    ?>
    <li class="nav-item <?= $active ?>">
      <a class="nav-link" href="?page=<?= $m['page'] ?>">
        <span class="menu-title"><?= $m['label'] ?></span>
        <i class="<?= $m['icon'] ?> menu-icon"></i>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>
