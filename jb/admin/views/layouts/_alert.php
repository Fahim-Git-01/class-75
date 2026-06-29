<?php if (isset($msg)): ?>
<div class="alert alert-<?= $msgType ?? 'info' ?> alert-dismissible fade show alert-auto" role="alert">
  <?= htmlspecialchars($msg) ?>
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
<?php endif; ?>
