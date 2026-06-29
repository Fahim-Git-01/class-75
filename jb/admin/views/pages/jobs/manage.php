<?php
$jobs = $db->query(
    "SELECT j.*, c.company_name, cat.category_name
     FROM jobs j
     LEFT JOIN companies c ON j.company_id=c.company_id
     LEFT JOIN categories cat ON j.category_id=cat.category_id
     ORDER BY j.job_id DESC"
)->fetch_all(MYSQLI_ASSOC);
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-briefcase"></i></span> Job List</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb"><li class="breadcrumb-item active">Jobs</li></ul></nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Jobs <span class="badge badge-primary"><?= count($jobs) ?></span></h4>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark">
                <tr><th>#</th><th>Title</th><th>Company</th><th>Category</th><th>Type</th><th>Deadline</th><th>Status</th></tr>
              </thead>
              <tbody>
                <?php if (empty($jobs)): ?>
                  <tr><td colspan="7" class="text-center py-4 text-muted">কোনো job নেই।</td></tr>
                <?php else: foreach ($jobs as $i => $j): ?>
                  <tr>
                    <td><?=$i+1?></td>
                    <td><b><?=htmlspecialchars($j['job_title'])?></b></td>
                    <td><?=htmlspecialchars($j['company_name']??'N/A')?></td>
                    <td><?=htmlspecialchars($j['category_name']??'N/A')?></td>
                    <td><span class="badge badge-secondary"><?=$j['job_type']?></span></td>
                    <td><?=$j['deadline']?date('d M Y',strtotime($j['deadline'])):'—'?></td>
                    <td><?php $jc=$j['status']=='active'?'success':'danger'?>
                        <span class="badge badge-<?=$jc?>"><?=ucfirst($j['status'])?></span></td>
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
