<?php require_once 'models/user.class.php';

$userModel = new User($db);


if (isset($_POST['delete_id'])) {
    $result = $userModel->deleteUser((int) $_POST['delete_id']);
    $msg = $result['msg'];
    $msgType = $result['success'] ? 'success' : 'danger';
}

$users = $userModel->getAllUsers();

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <?php if (isset($msg)): ?>
                <div class="alert alert-<?= $msgType ?> alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($msg) ?>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">All Users (<?= count($users) ?>)</h4>
                            <a href="?page=create-user" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Create User
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Type</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($users)): ?>
                                            <tr>
                                                <td colspan="9" class="text-center text-muted py-4">
                                                    <a href="?page=create-user"></a>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($users as $i => $u): ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?= ($u['full_name']) ?></td>
                                                    <td><?= ($u['email']) ?></td>
                                                    <td><?= ($u['phone'] ?? '-') ?></td>
                                                  
                                                    <td><?= ($u['role_name'] ?? 'N/A') ?></td>
                                                    <td>
                                                        <?php $sc = $u['status'] == 'active' ? 'success' : ($u['status'] == 'blocked' ? 'danger' : 'secondary'); ?>
                                                        <span class="badge badge-<?= $sc ?>">
                                                            <?= ucfirst($u['status']) ?>
                                                        </span>
                                                    </td>
                                                    <td><?= date('d M Y', strtotime($u['created_at'])) ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="?page=edit-user&id=<?= $u['user_id'] ?>"
                                                                class="btn btn-sm btn-success" title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form method="POST" style="display:inline;" onsubmit="return confirm('<?= htmlspecialchars($u['full_name']) ?>>
                                                                <input type='hidden' name='delete_id'
                                                                value="<?= $u['user_id'] ?>">
                                                                
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>