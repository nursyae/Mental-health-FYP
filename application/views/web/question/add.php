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
                        <div class="card-body">

                            <h4 style="text-align: center"><strong>STRESS, ANXIETY AND DEPRESSION SCREENING TEST</strong></h4><br />
                            <p>You can use this screening exam to determine your mental health condition, including whether you're anxious, sad, or stressed. This test only acts as an initial test and confirmation of the
                                diagnosis by a medical officer is required. / <i>Dengan ujian saringan ini, anda boleh ketahui status kesihatan mental anda samada anda stress, bimbang, atau kemurungan. Ujian ini hanya
                                    berfungsi sebagai saringan awal dan pengesahan diagnosis oleh pegawai perubatan adalah diperlukan.</i></p>

                            <p>1. This screening test contains <strong>21 questions</strong>.<i>/ Ujian saringan ini mengandungi <strong>21 soalan</strong>.</i></p>
                            <p>2. Answer <strong>ALL the questions</strong>. <i>/ Jawab <strong>semua soalan</strong>.</i></p>
                            <p>3. Each question is followed by four answers, which are <strong>Never, Rarely, Often and Very Often</strong> <i>/ Tiap-tiap soalan diikuti oleh empat jawapan, iaitu <strong>Tidak Pernah, Jarang, Kerap dan
                                        Sangat Kerap</strong>.</i></p>
                            <p>4. Answer the question by choosing <strong>ONE</strong> answer according to your own situation <i>/ Jawab soalan dengan memilih <strong>SATU</strong> jawapan mengikut kesesuaian dan bertepatan dengan situasi diri
                                    anda.</i></p>
                            <p>5. There is no right or wrong answer <i>/ Tiada jawapan betul atau salah.</i></p>
                            <form action="" method="post">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>NO. </th>
                                                <th class="text-center">
                                                    <p>STATEMENT / <i>PENYATAAN</i></p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($questions as $question) : ?>
                                                <tr>
                                                    <td>
                                                        <p><?= $no++ ?>.</p>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $q_name = explode('/', $question->question_name);
                                                        ?>
                                                        <p>
                                                            <?= $q_name[0] ?>/ <i><?= $q_name[1] ?></i>
                                                        </p>
                                                        <!-- explode / -->
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="question[<?= $question->question_id ?>][<?= $question->question_category ?>]" id="q<?= $question->question_id ?>_0" value="0" required>
                                                            <label class="form-check-label" for="q<?= $question->question_id ?>_0">
                                                                <p class="mb-1">Never / <i>Tidak pernah</i></p>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input " type="radio" name="question[<?= $question->question_id ?>][<?= $question->question_category ?>]" id="q<?= $question->question_id ?>_1" value="1" required>
                                                            <label class="form-check-label" for="q<?= $question->question_id ?>_1">
                                                                <p class="mb-1">Sometimes / <i>Jarang</i></p>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input " type="radio" name="question[<?= $question->question_id ?>][<?= $question->question_category ?>]" id="q<?= $question->question_id ?>_2" value="2" required>
                                                            <label class="form-check-label" for="q<?= $question->question_id ?>_2">
                                                                <p class="mb-1">Often / <i>Kerap</i></p>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input " type="radio" name="question[<?= $question->question_id ?>][<?= $question->question_category ?>]" id="q<?= $question->question_id ?>_3" value="3" required>
                                                            <label class="form-check-label" for="q<?= $question->question_id ?>_3">
                                                                <p class="mb-1">Almost Always / <i>Sangat Kerap</i></p>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            
                                                <td colspan="2">
                                                    <div class="float-right"><button class="btn-secondary reset" type="reset">Reset</button>&nbsp;
                                                        <button type="submit" class="btn-primary">Review Result</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>


                                        <!-- <a href="document.getElementById('home').show" -->

                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

</div>