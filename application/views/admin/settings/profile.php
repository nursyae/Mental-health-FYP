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
                                Profile Update <i class="fas fa-user"></i>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Full name" name="student_fullname" value="<?= $user->user_name ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-danger font-weight-bold"><?= form_error('student_fullname') ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email Student" name="student_email" value="<?= $user->user_email ?>">
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
                                            <input type="text" class="form-control" placeholder="Phone Number" name="student_phone" value="<?= $user->user_phone_number ?>">
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
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Update <i class="fas fa-user-edit"></i></button>
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