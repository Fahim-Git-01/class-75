<?php
require_once 'models/user.class.php';

$userModel = new User($db);
$roles     = $userModel->getAllRoles();


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ?page=users");
    exit;
}

$user_id = (int)$_GET['id'];
$user    = $userModel->getUserById($user_id);

if (!$user) {
    header("Location: ?page=users");
    exit;
}


if (isset($_POST['btn_update'])) {
    $full_name    = trim($_POST['full_name']);
    $email        = trim($_POST['email']);
    $phone        = trim($_POST['phone']);
    $user_type    = $_POST['user_type'];
    $role_id      = $_POST['role_id'];
    $status       = $_POST['status'];
    $new_password = $_POST['new_password'];
    $conf_pass    = $_POST['conf_pass'];

    if (empty($full_name) || empty($email)) {
        $msg     = 'Name and Email Must be added';
        $msgType = 'warning';
    } elseif (!empty($new_password) && $new_password !== $conf_pass) {
        $msg     = ' New Password dose not match';
        $msgType = 'warning';
    } elseif (!empty($new_password) && strlen($new_password) < 6) {
        $msg     = 'Password must be 6';
        $msgType = 'warning';
    } else {
        $result  = $userModel->updateUser($user_id, $full_name, $email, $phone, $user_type, $role_id, $status, $new_password);
        $msg     = $result['msg'];
        $msgType = $result['success'] ? 'success' : 'danger';
        // Updated data reload
        $user = $userModel->getUserById($user_id);
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="?page=users">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <a href="?page=users" class="btn btn-sm btn-secondary mb-3">
                <i class="fa fa-arrow-left"></i> Back to Users
            </a>

            <?php if (isset($msg)): ?>
                <div class="alert alert-<?= $msgType ?> alert-dismissible fade show">
                    <?= htmlspecialchars($msg) ?>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h4 class="mb-0">Edit: <?= htmlspecialchars($user['full_name']) ?></h4>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="full_name"
                                           value="<?= htmlspecialchars($user['full_name']) ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                           value="<?= htmlspecialchars($user['email']) ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                           value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>User Type</label>
                                        <select class="form-control" name="user_type">
                                            <?php foreach (['admin', 'employer', 'job_seeker'] as $t): ?>
                                                <option value="<?= $t ?>" <?= $user['user_type'] == $t ? 'selected' : '' ?>>
                                                    <?= ucfirst(str_replace('_', ' ', $t)) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Role</label>
                                        <select class="form-control" name="role_id">
                                            <option value=""></option>
                                            <?php foreach ($roles as $r): ?>
                                                <option value="<?= $r['role_id'] ?>"
                                                    <?= $user['role_id'] == $r['role_id'] ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($r['role_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <?php foreach (['active', 'inactive', 'blocked'] as $s): ?>
                                            <option value="<?= $s ?>" <?= $user['status'] == $s ? 'selected' : '' ?>>
                                                <?= ucfirst($s) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <hr>
                                <p class="text-muted mb-2">
                                    <i class="fa fa-info-circle"></i>
                                   
                                </p>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="new_password"
                                            >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Confirm New Password</label>
                                        <input type="password" class="form-control" name="conf_pass"
                                              >
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btn_update" class="btn btn-warning">
                                    <i class="fa fa-save"></i> Update User
                                </button>
                                <a href="?page=users" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
