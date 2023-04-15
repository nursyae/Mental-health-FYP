<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mental Health | <?= $title ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins') ?>/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/dist') ?>/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/style.css') ?>">
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
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
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

            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Mental Health</span>
            </a>

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
                            <a href="<?= base_url('web') ?>" class="nav-link <?php if ($title == 'Dashboard') : ?>Active<?php endif ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('web/mental_health_test') ?>" class="nav-link <?php if ($title == 'Mental Health Test') : ?>Active<?php endif ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Mental Health Test
                                </p>
                            </a>
                        </li>
                        <!-- message tree -->
                        <li class="nav-item has-treeview <?php if ($title == 'Message') : ?>menu-open<?php endif ?>">
                            <a href="#" class="nav-link <?php if ($title == 'Message') : ?>Active<?php endif ?>">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Message
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('web/message/compose') ?>" class="nav-link <?php if ($title == 'Compose') : ?>Active<?php endif ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('web/message/inbox') ?>" class="nav-link <?php if ($title == 'Inbox') : ?>Active<?php endif ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('web/message/sent') ?>" class="nav-link <?php if ($title == 'Sent') : ?>Active<?php endif ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sent</p>
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
                                    <a href="<?= base_url('web/settings/profile') ?>" class="nav-link <?= $this->uri->segment(3) == 'profile' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('web/settings/password') ?>" class="nav-link <?= $this->uri->segment(3) == 'password' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Password</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('web/logout') ?>" class="nav-link">
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