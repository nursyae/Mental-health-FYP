<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('message') ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Password Update <i class="fas fa-user"></i>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" placeholder="Current Password" name="current_password" value="<?= set_value('current_password') ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-danger font-weight-bold"><?= form_error('current_password') ?></span>
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
                                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>