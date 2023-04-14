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
                                Test Record
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table_default1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student ID</th>
                                            <th>NAME</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Result</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($scores as $score) : ?>
                                            <?php if ($score->user_role == 'user') : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $score->user_matrix_number ?></td>
                                                    <td><?= $score->user_name ?></td>
                                                    <td><?= $score->user_email ?></td>
                                                    <td><?= $score->user_phone_number ?></td>
                                                    <td>
                                                        Depression = <?= $score->score_depression ?>
                                                        <br>
                                                        Anxiety = <?= $score->score_anxiety ?>
                                                        <br>
                                                        Stress = <?= $score->score_stress ?>
                                                    </td>
                                                    <td data-date="<?= strtotime($score->score_created_at) ?>"><?= date("d F Y", strtotime($score->score_created_at)) ?></td>
                                                </tr>
                                            <?php endif; ?>
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