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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                list Message
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table_default1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Studet Information</th>
                                            <th>Subject</th>
                                            <th>Content</th>
                                            <th>Attachment</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Reply</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($messages as $message) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <p><b>Name:</b> <?= $message->user_name ?></p>
                                                    <p><b>Email:</b> <?= $message->user_email ?></p>
                                                    <p><b>Phone:</b> <?= $message->user_phone_number ?></p>
                                                </td>
                                                <td><?= $message->message_subject ?></td>
                                                <td><?= $message->message_content ?></td>
                                                <td>
                                                    <?php if ($message->message_attachment != null) : ?>
                                                        <!-- check file exist -->
                                                        <?php if (file_exists(FCPATH . 'assets/uploads/attachment/' . $message->message_attachment)) : ?>
                                                            <a href="<?= base_url('assets/uploads/attachment/' . $message->message_attachment) ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-download"></i> Download</a>
                                                        <?php else : ?>
                                                            <span class="badge badge-danger">File Not Found</span>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <span class="badge badge-danger">No Attachment</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($message->message_status == '0') : ?>
                                                        <span class="badge badge-warning">NOT REPLIED</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-success">REPLIED</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= date('d F Y h:i a', strtotime($message->message_created_at)) ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('admin/message/add/' . $message->message_id) ?>" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i> Reply</a>
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