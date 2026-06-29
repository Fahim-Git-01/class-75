<?php
require_once 'models/dashboard.class.php';
$dash        = new Dashboard($db);
$stats       = $dash->getStats();
$recentUsers = $dash->getRecentUsers(5);
$recentJobs  = $dash->getRecentJobs(5);
$userTypes   = $dash->getUserTypeStats();
$monthly     = $dash->getMonthlyUsers();

// Chart data
$typeLabels  = array_column($userTypes, 'user_type');
$typeCounts  = array_column($userTypes, 'count');
$monthLabels = array_column($monthly, 'month');
$monthCounts = array_column($monthly, 'count');
?>

<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Overview</li>
      </ul>
    </nav>
  </div>

  <!-- ======= STAT CARDS ======= -->
  <div class="row">
    <div class="col-md-3 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="">
          <h4 class="font-weight-normal mb-3">Total Users <i class="mdi mdi-account-multiple mdi-24px float-end"></i></h4>
          <h2 class="mb-2"><?= number_format($stats['total_users']) ?></h2>
          <a href="?page=users" class="text-white"><small>View all →</small></a>
        </div>
      </div>
    </div>
    <div class="col-md-3 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="">
          <h4 class="font-weight-normal mb-3">Total Jobs <i class="mdi mdi-briefcase mdi-24px float-end"></i></h4>
          <h2 class="mb-2"><?= number_format($stats['total_jobs']) ?></h2>
          <small>Active: <?= $stats['active_jobs'] ?></small>
        </div>
      </div>
    </div>
    <div class="col-md-3 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="">
          <h4 class="font-weight-normal mb-3">Companies <i class="mdi mdi-domain mdi-24px float-end"></i></h4>
          <h2 class="mb-2"><?= number_format($stats['total_companies']) ?></h2>
          <a href="?page=companies" class="text-white"><small>View all →</small></a>
        </div>
      </div>
    </div>
    <div class="col-md-3 stretch-card grid-margin">
      <div class="card bg-gradient-warning card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="">
          <h4 class="font-weight-normal mb-3">Applications <i class="mdi mdi-file-document mdi-24px float-end"></i></h4>
          <h2 class="mb-2"><?= number_format($stats['total_apps']) ?></h2>
          <small>Pending: <?= $stats['pending_apps'] ?></small>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= CHARTS ======= -->
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Monthly New Users (Last 6 Months)</h4>
          <canvas id="monthlyChart" height="120"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">User Type Distribution</h4>
          <div class="d-flex justify-content-center">
            <canvas id="userTypeChart" height="160"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= RECENT TABLES ======= -->
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="card-title mb-0">Recent Users</h4>
            <a href="?page=users" class="btn btn-sm btn-outline-primary">View All</a>
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-hover">
              <thead><tr><th>Name</th><th>Type</th><th>Status</th><th>Date</th></tr></thead>
              <tbody>
                <?php if (empty($recentUsers)): ?>
                  <tr><td colspan="4" class="text-center text-muted">No users yet</td></tr>
                <?php else: foreach ($recentUsers as $u): ?>
                  <tr>
                    <td><?= htmlspecialchars($u['full_name']) ?><br>
                        <small class="text-muted"><?= htmlspecialchars($u['email']) ?></small></td>
                    <td><span class="badge badge-info"><?= $u['user_type'] ?></span></td>
                    <td>
                      <?php $sc = $u['status']=='active' ? 'success' : ($u['status']=='blocked' ? 'danger' : 'secondary') ?>
                      <span class="badge badge-<?= $sc ?>"><?= $u['status'] ?></span>
                    </td>
                    <td><small><?= date('d M', strtotime($u['created_at'])) ?></small></td>
                  </tr>
                <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <h4 class="card-title mb-0">Recent Jobs</h4>
            <a href="?page=jobs" class="btn btn-sm btn-outline-primary">View All</a>
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-hover">
              <thead><tr><th>Title</th><th>Company</th><th>Type</th><th>Status</th></tr></thead>
              <tbody>
                <?php if (empty($recentJobs)): ?>
                  <tr><td colspan="4" class="text-center text-muted">No jobs yet</td></tr>
                <?php else: foreach ($recentJobs as $j): ?>
                  <tr>
                    <td><?= htmlspecialchars($j['job_title']) ?></td>
                    <td><small><?= htmlspecialchars($j['company_name'] ?? 'N/A') ?></small></td>
                    <td><span class="badge badge-secondary"><?= $j['job_type'] ?></span></td>
                    <td>
                      <?php $jc = $j['status']=='active' ? 'success' : 'danger' ?>
                      <span class="badge badge-<?= $jc ?>"><?= $j['status'] ?></span>
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

<script>
// Monthly Users Chart
new Chart(document.getElementById('monthlyChart'), {
  type: 'bar',
  data: {
    labels: <?= json_encode($monthLabels ?: ['Jan','Feb','Mar','Apr','May','Jun']) ?>,
    datasets: [{
      label: 'New Users',
      data: <?= json_encode($monthCounts ?: [0,0,0,0,0,0]) ?>,
      backgroundColor: 'rgba(124,77,255,0.7)',
      borderRadius: 5
    }]
  },
  options: { responsive:true, plugins:{ legend:{ display:false } }, scales:{ y:{ beginAtZero:true } } }
});

// User Type Doughnut
new Chart(document.getElementById('userTypeChart'), {
  type: 'doughnut',
  data: {
    labels: <?= json_encode(array_map(fn($t)=>ucfirst(str_replace('_',' ',$t)), $typeLabels ?: ['No Data'])) ?>,
    datasets: [{
      data: <?= json_encode($typeCounts ?: [1]) ?>,
      backgroundColor: ['#7c4dff','#ff6d00','#00bcd4','#4caf50']
    }]
  },
  options: { responsive:true, cutout:'65%' }
});
</script>
