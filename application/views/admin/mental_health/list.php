<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List Question Mental Health
                                <i class="fas fa-heath"></i>
                            </h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?= base_url('admin/mental_health/add') ?>'">Add
                                    <i class="fas fa-add"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table_default2" id="">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Question</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($questions as $question) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $question->question_name ?></td>
                                                <td>
                                                    <?php if ($question->question_category == 1) : ?>
                                                        Depression
                                                    <?php elseif ($question->question_category == 2) : ?>
                                                        Anxiety
                                                    <?php elseif ($question->question_category == 3) : ?>
                                                        Stress
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin/mental_health/edit/' . $question->question_id) ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/mental_health/delete/' . $question->question_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>