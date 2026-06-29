<?php require_once ('models/user.class.php');


$userModel = new User($db);
$roles     = $userModel->getAllRoles();


if (isset($_POST['btn_submit'])) {
    $full_name = trim($_POST['full_name']);
    $email     = trim($_POST['email']);
    $phone     = trim($_POST['phone']);
    $user_type = $_POST['user_type'];
    $role_id   = $_POST['role_id'];
    $status    = $_POST['status'];
    $pass      = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];

    // Basic validation
    if (empty($full_name) || empty($email) || empty($pass)) {
        $msg     = 'Name, Email and  Password must be added';
        $msgType = 'warning';
    } elseif ($pass !== $conf_pass) {
        $msg     = 'Password dose not macth';
        $msgType = 'warning';
    } elseif (strlen($pass) < 6) {
        $msg     = 'Password must be 6 character';
        $msgType = 'warning';
    } else {
        $result  = $userModel->createUser($full_name, $email, $phone, $pass, $user_type, $role_id, $status);
        $msg     = $result['msg'];
        $msgType = $result['success'] ? 'success' : 'danger';
        if ($result['success']) {
           
            $full_name = $email = $phone = '';
        }
    }
}


?>







<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="?page=users">Users</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <a href="?page=users" class="btn btn-sm btn-secondary mb-2">
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="mb-0">New User Information</h4>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="full_name"
                                           placeholder="Full name"
                                           value="<?= htmlspecialchars($full_name ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="Email "
                                           value="<?= htmlspecialchars($email ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                           placeholder="Phone number (optional)"
                                           value="<?= htmlspecialchars($phone ?? '') ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>User Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="user_type">
                                            <option value="admin">Admin</option>
                                            <option value="employer">Employer</option>
                                            <option value="job_seeker">Job Seeker</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Role</label>
                                        <select class="form-control" name="role_id">
                                            <option value=""></option>
                                            <?php foreach ($roles as $r): ?>
                                                <option value="<?= $r['role_id'] ?>">
                                                    <?= htmlspecialchars($r['role_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="blocked">Blocked</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="pass"
                                              >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="conf_pass"
                                               >
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btn_submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Save User
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
