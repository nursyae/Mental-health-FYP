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
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1">

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">A pie Chart of Your Mental Health</h6><br>
                                    <div id="piechart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Score comparison in bar chart form</h6><br>
                                    <div id="apexchart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Mental Health Score</h6><br>
                                    <table class="table">

                                        <table class="table table-bordered">
                                            <thead style="background-color:DeepSkyBlue;text-align:center;">
                                                <tr>
                                                    <th scope="col" style="color:white;width:30%;">Depression</th>
                                                    <th scope="col" style="color:white;width:30%;">Anxiety</th>
                                                    <th scope="col" style="color:white;width:30%;">Stress</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align:center;">
                                                </tr>
                                                <?php

                                                $color_depression = '';
                                                $color_anxiety = '';
                                                $color_stress = '';
                                                $type_depression = '';
                                                $type_anxiety = '';
                                                $type_stress = '';
                                                
                                                $depression = $score['depression'];
                                                $anxiety = $score['anxiety'];
                                                $stress = $score['stress'];

                                                if ($depression >= 0 && $depression <= 5) {
                                                    $color_depression = '#FFEFD5';
                                                    $type_depression = 'Normal';
                                                } elseif ($depression >= 6 && $depression <= 7) {
                                                    $color_depression = '#EDDA74';
                                                    $type_depression = 'Mild';
                                                } elseif ($depression >= 8 && $depression <= 10) {
                                                    $color_depression = '#F67280';
                                                    $type_depression = 'Moderate';
                                                } elseif ($depression >= 11 && $depression <= 14) {
                                                    $color_depression = '#CD5C5C';
                                                    $type_depression = 'Severe';
                                                } elseif ($depression >= 15) {
                                                    $color_depression = 'red';
                                                    $type_depression = 'Extremely Sever';
                                                }

                                                if ($anxiety >= 0 && $anxiety <= 4) {
                                                    $color_anxiety = '#FFEFD5';
                                                    $type_anxiety = 'Normal';
                                                } elseif ($anxiety >= 5 && $anxiety <= 6) {
                                                    $color_anxiety = '#EDDA74';
                                                    $type_anxiety = 'Mild';
                                                } elseif ($anxiety >= 7 && $anxiety <= 8) {
                                                    $color_anxiety = '#F67280';
                                                    $type_anxiety = 'Moderate';
                                                } elseif ($anxiety >= 9 && $anxiety <= 10) {
                                                    $color_anxiety = '#CD5C5C';
                                                    $type_anxiety = 'Severe';
                                                } elseif ($anxiety >= 11) {
                                                    $color_anxiety = 'red';
                                                    $type_anxiety = 'Extremely Sever';
                                                }

                                                if ($stress >= 0 && $stress <= 7) {
                                                    $color_stress = '#FFEFD5';
                                                    $type_stress = 'Normal';
                                                } elseif ($stress >= 8 && $stress <= 9) {
                                                    $color_stress = '#EDDA74';
                                                    $type_stress = 'Mild';
                                                } elseif ($stress >= 10 && $stress <= 13) {
                                                    $color_stress = '#F67280';
                                                    $type_stress = 'Moderate';
                                                } elseif ($stress >= 14 && $stress <= 17) {
                                                    $color_stress = '#CD5C5C';
                                                    $type_stress = 'Severe';
                                                } elseif ($stress >= 18) {
                                                    $color_stress = 'red';
                                                    $type_stress = 'Extremely Sever';
                                                }
                                                ?>
                                                    <td style="background-color:<?= $color_depression ?>;"><strong><?= $depression ?><br><?= $type_depression ?></strong></td>
                                                    <td style="background-color:<?= $color_anxiety ?>;"><strong><?= $anxiety ?><br><?= $type_anxiety ?></strong></td>
                                                    <td style="background-color:<?= $color_stress ?>;"><strong><?= $stress ?><br><?= $type_stress ?></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <p style="color:red;"> Note : Please contact with the counselling department provided by email if your
                                            score is below a certain level or if you need guidance and assistance.
                                        </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Score levels for anxiety, depression and stress</h6>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead style="background-color:DeepSkyBlue;text-align:center;">
                                            <tr>
                                                <th scope="col" style="color:white;width:30%;">Level</th>
                                                <th scope="col" style="color:white;width:20%;">Depression</th>
                                                <th scope="col" style="color:white;width:20%;">Anxiety</th>
                                                <th scope="col" style="color:white;width:20%;">Stress</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                            <tr style="background-color:#FFEFD5;"><strong>
                                                    <td><strong>Normal</strong></td>
                                                    <td><strong>0-5</strong></td>
                                                    <td><strong>0-4</strong></td>
                                                    <td><strong>0-7</strong></td>
                                            </tr>
                                            <tr style="background-color:#EDDA74;">
                                                <td><strong>Mild</strong></td>
                                                <td><strong>6-7</strong></td>
                                                <td><strong>5-6</strong></td>
                                                <td><strong>8-9</strong></td>
                                            </tr>
                                            <tr style="background-color:#F67280;">
                                                <td><strong>Moderate</strong></td>
                                                <td><strong>8-10</strong></td>
                                                <td><strong>7-8</strong></td>
                                                <td><strong>10-13</strong></td>
                                            </tr>
                                            <tr style="background-color:#CD5C5C;">
                                                <td><strong>Severe</strong></td>
                                                <td><strong>11-14</strong></td>
                                                <td><strong>9-10</strong></td>
                                                <td><strong>14-17</strong></td>
                                            </tr>
                                            <tr style="background-color:red;">
                                                <td><strong>Extremely Sever</strong></td>
                                                <td><strong>14</strong></td>
                                                <td><strong>11</strong></td>
                                                <td><strong>18</strong></td>
                                            </tr>
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

</div>