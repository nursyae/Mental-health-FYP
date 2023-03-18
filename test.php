<!DOCTYPE html>
<!--
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_laravel
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

    <title>UniKL Mental Health Test</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- End fonts -->

    <!-- CSRF Token -->
    <meta name="_token" content="qRa63JoYNys1aN7K0RM9dYCqcRQqxuHuln4rAdbr">

    <link rel="shortcut icon" href="http://psikologi.test/assets/images/logo.png">

    <!-- plugin css -->
    <link href="http://psikologi.test/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
    <link href="http://psikologi.test/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
    <link href="http://psikologi.test/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />


    <!-- end plugin css -->

    <link href="http://psikologi.test/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />

    <!-- common css -->
    <link href="http://psikologi.test/css/app.css" rel="stylesheet" />
    <!-- end common css -->

</head>

<body data-base-url="http://psikologi.test" style="background: linear-gradient(to bottom, #ccccff 39%, #000066 100%);">

    <script src="http://psikologi.test/assets/js/spinner.js"></script>

    <div class="main-wrapper" id="app">
        <div class="horizontal-menu">
            <nav class="navbar top-navbar">
                <div class="container">
                    <div class="navbar-content">
                        <a href="#" class="navbar-brand">
                            <img src="http://psikologi.test/assets/images/logo.png" width="70" height="50" />&nbsp;Mental Health<span style="color:orange;">&nbsp;<b>Test Page</b></span>
                        </a>
                        <form class="search-form">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <!-- <i data-feather="search"></i> -->
                                </div>
                                <!-- <input type="text" class="form-control" id="navbarForm" placeholder="Search here..."> -->
                            </div>
                        </form>



                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                            <i data-feather="menu"></i>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <!--li class="nav-item">
          <a class="nav-link" href="http://psikologi.test">
            <i class="link-icon" data-feather="box"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li-->
                        <li class="nav-item">
                            <a class="nav-link" href="http://psikologi.test/ujian.ujianDass">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="menu-title">Mental Health Test</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="menu-title">Administrator</span>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="category-heading"><a href="http://psikologi.test/ujian.DassAdmin">Result</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <div class="page-wrapper">
            <div class="page-content">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link  active " id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Test your mental health</a>
                    </li>
                    <li class="nav-item" style="display: none;">
    <a class=" nav-link "  id=" profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ujian DASS</a>
                    </li>
                    <!-- <li class="nav-item">style = "display: none;"
    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" id="disabled-tab" data-bs-toggle="tab" href="#disabled" role="tab" aria-controls="disabled" aria-selected="false">Disabled</a>
  </li> -->
                </ul>

                <div class="tab-content border border-top-0 p-3" id="myTabContent">

                    <!--InformationForm-->
                    <div class="tab-pane fade  show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container text-left">
                            <div class="card card-body">
                                <p>The Career and Counseling Unit, managed by the Student Development Division is led by two (2) counselors certified by the Malaysian Counselor Board who play an important role in
                                    helping students by providing professional advice. The counseling services provided are free, held confidentially to students through a professional environment for emotional and
                                    developmental support. Counseling services operate under the guidelines set out in the Code of Ethics and Practice as defined by the Malaysian Counselors Board. The Code provides
                                    professional standards used to deliver and manage services.
                                </p><br />
                                <p><b>Please fill out the information below (all fields are required) <i>/ Mohon isikan maklumat di bawah (semua maklumat wajib diisi)</b></i></p><br />
                                <form id="formPeribadi" action="http://psikologi.test/ujiandassSimpan" method="post">

                                    <!--style="background-image:url(http://psikologi.test/assets/images/bg2.png)"-->
                                    <!--1-->



                                    <div class="row">
                                        <div class="col-4">
                                            <p>Student ID / <i>ID Pelajar</i> <a style="color:red">*</a> :</p>
                                            <input oninput="this.value = this.value.toUpperCase()" class="form-control " style="border-color: black;" type="text" name="id_pelajar" id="id_pelajar" value="">
                                            <span id="testIdpelajar" class="test" style="color:red"></span>
                                        </div>
                                        <div class="col-4">
                                            <p>Gender / <i>Jantina</i> <a style="color:red">*</a> :</p>
                                            <select class="form-select " style="border-color: black;" name="jantina" id="jantina">
                                                <option value=""></option>
                                                <option value="MALE/LELAKI">MALE/LELAKI</option>
                                                <option value="FEMALE/PEREMPUAN">FEMALE/PEREMPUAN</option>
                                            </select>
                                            <span id="testIdjantina" class="test" style="color:red"></span>
                                        </div>
                                        <div class="col-4">
                                            <p>Race / <i>Bangsa</i> <a style="color:red">*</a> :</p>
                                            <input oninput="this.value = this.value.toUpperCase()" class="form-control " style="border-color: black;" type="text" name="bangsa" id="bangsa" value="">
                                            <span id="testIdbangsa" class="test" style="color:red"></span>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-4">
                                            <p>Full Name / <i>Nama Penuh</i> <a style="color:red">*</a> :</p>
                                            <input oninput="this.value = this.value.toUpperCase()" class="form-control " style="border-color: black;" type="text" name="nama" id="nama" value="">
                                            <span id="testIdnama" class="test" style="color:red"></span>
                                        </div>
                                        <div class="col-4">
                                            <p>Age / <i>Umur</i> <a style="color:red">*</a> :</p>
                                            <input oninput="this.value = this.value.toUpperCase()" class="form-control " style="border-color: black;" type="number" name="umur" id="umur" value="">
                                            <span id="testIdumur" class="test" style="color:red"></span>
                                        </div>
                                        <div class="col-4">
                                            <p>Date / <i>Tarikh</i> <a style="color:red">*</a> :</p>
                                            <input class="form-control " style="border-color: black;" type="date" name="tarikh" id="tarikh" value="">
                                            <span id="testIdtarikh" class="test" style="color:red"></span>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-4">
                                            <p>Email / <i>Emel</i> <a style="color:red">*</a> :</p>
                                            <input class="form-control " style="border-color: black;" type="text" name="emel" id="emel" value="">
                                            <span id="testIdemel" class="test" style="color:red"></span>
                                        </div>
                                        <div class="col-4">
                                            <p>Telephone Number / <i>Nombor Telefon</i> <a style="color:red">*</a> :</p>
                                            <input class="form-control " style="border-color: black;" type="number" name="telefon" id="telefon" value="">
                                            <span id="testIdtelefon" class="test" style="color:red"></span>
                                        </div>
                                        <div class="col-4">
                                            <p>Address / <i>Alamat</i> <a style="color:red">*</a> :</p>
                                            <textarea oninput="this.value = this.value.toUpperCase()" class="form-control " style="border-color: black;" name="alamat" id="alamat"></textarea>
                                            <span id="testIdalamat" class="test" style="color:red"></span>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"><button type="button" class="btnNext btn btn-primary me-md-2">Seterusnya</button></div>


                            </div>
                        </div>
                    </div>

                    <!--inventori new-->
                    <div class="tab-pane  fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!--objektif dll-->

                        <div class="card row">
                      
                        </div>
                        <!--end form-->

                    </div>
                    <!--inventori new-->
                    <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
  <div class="tab-pane fade" id="disabled" role="tabpanel" aria-labelledby="disabled-tab">...</div> -->
                </div>

            </div>
            <footer class="footer border-top">
                <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
                    <p class="text-muted mb-1 mb-md-0">Final Year Project © 2022 <a href="https://www.unikl.edu.my" target="_blank">UniKL</a>.</p>
                    <!-- <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p> -->
                </div>
            </footer>
        </div>
    </div>

    <!-- base js -->
    <script src="http://psikologi.test/js/app.js"></script>
    <script src="http://psikologi.test/assets/plugins/feather-icons/feather.min.js"></script>
    <script src="http://psikologi.test/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <script src="http://psikologi.test/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="http://psikologi.test/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="http://psikologi.test/assets/js/template.js"></script>
    <!-- end common js -->

    <script src="http://psikologi.test/assets/js/dashboard.js"></script>
    <script src="http://psikologi.test/assets/js/datepicker.js"></script>
    <script type="text/javascript">
        $('.btnNext').click(function() {
            var id_pelajar = document.getElementById("id_pelajar").value;
            var jantina = document.getElementById("jantina").value;
            var bangsa = document.getElementById("bangsa").value;
            var nama = document.getElementById("nama").value;
            var umur = document.getElementById("umur").value;
            var tarikh = document.getElementById("tarikh").value;
            var emel = document.getElementById("emel").value;
            var telefon = document.getElementById("telefon").value;
            var alamat = document.getElementById("alamat").value;

            document.getElementById("testIdpelajar").innerText = "";
            document.getElementById("testIdjantina").innerText = "";
            document.getElementById("testIdbangsa").innerText = "";
            document.getElementById("testIdbangsa").innerText = "";
            document.getElementById("testIdumur").innerText = "";
            document.getElementById("testIdtarikh").innerText = "";
            document.getElementById("testIdemel").innerText = "";
            document.getElementById("testIdtelefon").innerText = "";
            document.getElementById("testIdalamat").innerText = "";

            if (id_pelajar == "") {
                document.getElementById("testIdpelajar").innerText = "Please insert Student ID / Sila isi ID Pelajar";
                return false;
            }
            if (jantina == "") {
                document.getElementById("testIdjantina").innerText = "Please insert Gender / Sila isi Jantina";
                return false;
            }
            if (bangsa == "") {
                document.getElementById("testIdbangsa").innerText = "Please insert Race / Sila isi Bangsa";
                return false;
            }
            if (nama == "") {
                document.getElementById("testIdnama").innerText = "Please insert Full Name / Sila isi Nama Penuh";
                return false;
            }
            if (umur == "") {
                document.getElementById("testIdumur").innerText = "Please insert Age / Sila isi Umur";
                return false;
            }
            if (tarikh == "") {
                document.getElementById("testIdtarikh").innerText = "Please insert Date / Sila isi Tarikh";
                return false;
            }
            if (emel == "") {
                document.getElementById("testIdemel").innerText = "Please insert Email / Sila isi Emel";
                return false;
            }
            if (telefon == "") {
                document.getElementById("testIdtelefon").innerText = "Please insert Telephone Number / Sila isi Nombor Telefon";
                return false;
            }
            if (alamat == "") {
                document.getElementById("testIdalamat").innerText = "Please insert Address / Sila isi Alamat";
                return false;
            } else {
                event.preventDefault();
                $('#profile-tab').tab('show');
            }

        });
        $('.btnBack').click(function() {
            // $('.nav-tabs > .nav-item > .active').parent().next('li').find('a').trigger('click');
            event.preventDefault();
            $('#home-tab').tab('show');
        });

        $('.reset').click(function() {

            location.reload();
        });
    </script>

</body>

</html>