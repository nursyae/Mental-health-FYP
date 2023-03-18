<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <span href="" class="h1"><b>UNIKL MIIT COUNSELLING</b></span>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new account</p>

        <form action="" method="post">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="student_fullname" value="<?= set_value('student_fullname') ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger font-weight-bold"><?= form_error('student_fullname') ?></span>
            </div>
            <div class="col-lg-6 col-12">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Student ID" name="student_id" value="<?= set_value('student_id') ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger font-weight-bold"><?= form_error('student_id') ?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Programme" name="student_programme" value="<?= set_value('student_programme') ?>">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-list"></span>
                </div>
              </div>
            </div>
            <span class="text-danger font-weight-bold"><?= form_error('student_programme') ?></span>
          </div>
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email Student" name="student_email" value="<?= set_value('student_email') ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger font-weight-bold"><?= form_error('student_email') ?></span>
            </div>

            <div class="col-lg-6 col-12">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Phone Number" name="student_phone" value="<?= set_value('student_phone') ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone-alt"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger font-weight-bold"><?= form_error('student_phone') ?></span>

            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger font-weight-bold"><?= form_error('password') ?></span>
            </div>
            <div class="col-lg-6 col-12">
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password" name="confirm_password" value="<?= set_value('confirm_password') ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger font-weight-bold"><?= form_error('confirm_password') ?></span>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="<?= base_url('login') ?>" class="text-center">I already have a account</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>