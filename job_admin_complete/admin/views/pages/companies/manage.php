<?php
$companies = $db->query(
    "SELECT c.*, u.full_name, u.email FROM companies c
     LEFT JOIN users u ON c.user_id=u.user_id
     ORDER BY c.company_id DESC"
)->fetch_all(MYSQLI_ASSOC);
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white me-2"><i class="mdi mdi-domain"></i></span> Companies</h3>
    <nav aria-label="breadcrumb"><ul class="breadcrumb"><li class="breadcrumb-item active">Companies</li></ul></nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Companies <span class="badge badge-primary"><?= count($companies) ?></span></h4>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="thead-dark"><tr><th>#</th><th>Company Name</th><th>Industry</th><th>Owner</th><th>Email</th><th>Website</th></tr></thead>
              <tbody>
                <?php if (empty($companies)): ?>
                  <tr><td colspan="6" class="text-center py-4 text-muted">কোনো company নেই।</td></tr>
                <?php else: foreach ($companies as $i => $c): ?>
                  <tr>
                    <td><?=$i+1?></td>
                    <td><b><?=htmlspecialchars($c['company_name'])?></b></td>
                    <td><?=htmlspecialchars($c['industry']??'—')?></td>
                    <td><?=htmlspecialchars($c['full_name']??'—')?></td>
                    <td><?=htmlspecialchars($c['email']??'—')?></td>
                    <td><?=$c['website']?"<a href='{$c['website']}' target='_blank'>Visit</a>":'—'?></td>
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
