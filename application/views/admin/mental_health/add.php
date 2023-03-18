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
                                Form Question Mental Health
                                <i class="fas fa-heath"></i>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" id="question" name="question" placeholder="Question" value="<?= set_value('question') ?>">
                                    <span class="text-danger font-weight-bold"><?= form_error('question') ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="">-- Select Category --</option>
                                        <option value="1" <?= set_select('category', '1') ?>>Depression</option>
                                        <option value="2" <?= set_select('category', '2') ?>>Anxiety</option>
                                        <option value="3" <?= set_select('category', '3') ?>>Stress</option>
                                    </select>
                                    <span class="text-danger font-weight-bold"><?= form_error('category') ?></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>