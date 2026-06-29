<?php
require_once 'models/user.class.php';

if(isset($_POST['btn_submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role_id = $_POST['role_id'];
  $pass = $_POST['pass'];
  $conf_pass = $_POST['conf_pass'];
  $user = new User(null, $name, $email, $role_id, $pass);
 $res = $user->create();
  // $msg = $name . " " . $email . " " . $role_id . " " . $pass . " " . $conf_pass;
  if($res == true){
    $msg = "Password doesn't match";
    // $pass = password_hash($pass, PASSWORD_DEFAULT);
  }else{
    $msg = "successfully connect";
  }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?= $msg ?? "" ?>
            <div class="card card-primary">
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role_id">
                      <option value="1">Admin</option>
                      <option value="2">Editor</option>
                      <option value="3">Vendor</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password">
                  </div>                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>