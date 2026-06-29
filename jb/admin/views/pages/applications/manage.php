<?php
$apps = $db->query(
    "SELECT a.*, j.job_title, u.full_name, u.email
     FROM applications a
     LEFT JOIN jobs j ON a.job_id=j.job_id
     LEFT JOIN job_seekers js ON a.seeker_id=js.seeker_id
     LEFT JOIN users u ON js.user_id=u.user_id
     ORDER BY a.application_id DESC"
)->fetch_all(MYSQLI_ASSOC);
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-file-document"></i></span> Applications</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb"><li class="breadcrumb-item active">Applications</li></ul></nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Applications <span class="badge badge-primary"><?= count($apps) ?></span></h4>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark"><tr><th>#</th><th>Applicant</th><th>Job Title</th><th>Applied On</th><th>Status</th></tr></thead>
              <tbody>
                <?php if (empty($apps)): ?>
                  <tr><td colspan="5" class="text-center py-4 text-muted"></td></tr>
                <?php else: foreach ($apps as $i => $a):
                  $sc=['pending'=>'warning','shortlisted'=>'info','rejected'=>'danger','hired'=>'success'][$a['status']]??'secondary';
                ?>
                  <tr>
                    <td><?=$i+1?></td>
                    <td><?=htmlspecialchars($a['full_name']??'—')?><br><small class="text-muted"><?=htmlspecialchars($a['email']??'')?></small></td>
                    <td><?=htmlspecialchars($a['job_title']??'—')?></td>
                    <td><small><?=date('d M Y',strtotime($a['apply_date']))?></small></td>
                    <td><span class="badge badge-<?=$sc?>"><?=ucfirst($a['status'])?></span></td>
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
