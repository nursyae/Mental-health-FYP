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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Compose New Message</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Subject:" name="subject" value="<?= set_value('subject') ?>">
                                    <span class="text-danger font-weight-bold"><?= form_error('subject') ?></span>
                                </div>
                                <div class="form-group">
                                    <textarea id="compose-textarea" class="form-control" name="content" style="height: 300px"><?= set_value('content') ?></textarea>
                                    <span class="text-danger font-weight-bold"><?= form_error('content') ?></span>
                                </div>
                                <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="fas fa-paperclip"></i> Attachment
                                        <input type="file" name="attachment">
                                    </div>
                                    <p class="help-block">Max. 2MB</p>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>