<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mental Health | <?= $title ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">


    <link rel="stylesheet" href="<?= base_url('assets/dist') ?>/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/style.css') ?>">
    <!-- <link href="http://psikologi.test/css/app.css" rel="stylesheet" /> -->

</head>

<body class="hold-transition sidebar-mini">
    <nav class=" navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <!--logo start-->
                <a href="<?= base_url('admin') ?>" class="nav-link logo">&nbsp;</span></a>
                <!--logo end-->
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url('admin') ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"><?= $this->message_count ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

        </ul>
    </nav>
    <div class="wrapper">




        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?php
                            $name = $this->user->user_name;
                            $name = wordwrap($name, 20, "<br />\n");
                            echo $name;
                            ?>
                        </a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($title == 'Dashboard') : ?>active<?php endif ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/users') ?>" class="nav-link <?php if ($title == 'Users') : ?>active<?php endif ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>


                        <li class="nav-item <?php if ($title == 'Mental Health') : ?>menu-open<?php endif ?>">
                            <a href="#" class="nav-link <?php if ($title == 'Mental Health') : ?>active<?php endif ?>">
                                <i class="nav-icon fas fa-heart"></i>
                                <p>
                                    Mental Health
                                    <i class="right fas fa-angle-left left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/mental_health/add') ?>" class="nav-link <?= $this->uri->segment(3) == 'add' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Question</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/mental_health/list') ?>" class="nav-link <?= $this->uri->segment(3) == 'list' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Question</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/mental_health/record') ?>" class="nav-link <?= $this->uri->segment(3) == 'record' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Test Record</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- message -->
                        <li class="nav-item <?php if ($title == 'Message') : ?>menu-open<?php endif ?>">
                            <a href="#" class="nav-link <?php if ($title == 'Message') : ?>active<?php endif ?>">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Message
                                    <i class="right fas fa-angle-left left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/message/add') ?>" class="nav-link <?= $this->uri->segment(3) == 'add' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Message</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/message/list') ?>" class="nav-link <?= $this->uri->segment(3) == 'list' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Message</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/message/reply') ?>" class="nav-link <?= $this->uri->segment(3) == 'reply' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Reply Message</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if ($title == 'Settings') : ?>menu-open<?php endif ?>">
                            <a href="#" class="nav-link <?php if ($title == 'Settings') : ?>active<?php endif ?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/settings/profile') ?>" class="nav-link <?= $this->uri->segment(3) == 'profile' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/settings/password') ?>" class="nav-link <?= $this->uri->segment(3) == 'password' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Password</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>