<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Tender || JMTO</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/dist/css/adminlte.min.css">
    <style>
        .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: right;
            padding-right: .75rem;
        }

        .color-palette.disabled {
            text-align: center;
            padding-right: 0;
            display: block;
        }

        .color-palette-set {
            margin-bottom: 15px;
        }

        .color-palette span {
            display: none;
            font-size: 12px;
        }

        .color-palette:hover span {
            display: block;
        }

        .color-palette.disabled span {
            display: block;
            text-align: left;
            padding-left: .75rem;
        }

        .color-palette-box h4 {
            position: absolute;
            left: 1.25rem;
            margin-top: .75rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning">
            <a style="font-size: 15px;" class="navbar-brand">
                <img src="<?php echo base_url(); ?>assets/frontend/dist/img/e-logo.jpeg" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-purple">
                    <strong>Tender JMTO</strong>
                </span>
            </a>
            <div class="collapse navbar-collapse order-3 container" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin-left:-30px">
                        <a class="nav-link">
                            <span class="text-navy"><i class="fas fa-align-justify"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size:14px" href="<?= base_url() ?>validator/dashboard" class="nav-link">
                            <span class="text-navy">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:14px" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            <span class="text-navy">
                                <i class="far fa-folder-open mr-2"></i>
                                Data Master
                            </span>
                        </a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li>
                                <a style="font-size:14px" href="<?= base_url('validator/data_kbli') ?>" class="dropdown-item">
                                    <i class="fas fa-file-word mr-2"></i>
                                    Data KBLI
                                </a>
                            </li>
                            <li>
                                <a style="font-size:14px" href="<?= base_url('validator/data_sbu') ?>" class="dropdown-item">
                                    <i class="fas fa-file-powerpoint mr-2"></i>
                                    Data SBU
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:14px" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            <span class="text-navy">
                                <i class="fas fa-hospital-user mr-2"></i>
                                Informasi Data Rekanan
                            </span>
                        </a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li>
                                <a style="font-size:14px" href="<?= base_url() ?>validator/rekanan_baru" class="dropdown-item">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Daftar Rekanan Terbaru
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a style="font-size:14px" href="<?= base_url() ?>validator/rekanan_blm_validasi" class="dropdown-item">
                                    <i class="fas fa-user-shield mr-2"></i>
                                    Data Status Rekanan Tervalidasi
                                </a>
                            </li>
                            <li>
                                <a style="font-size:14px" href="<?= base_url() ?>validator/rekanan_terundang" class="dropdown-item">
                                    <i class="fas fa-user-check mr-2"></i>
                                    Data Rekanan Terudang
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a style="font-size:14px" href="#" class="dropdown-item">
                                    <i class="fas fa-user-tag mr-2"></i>
                                    Daftar Hitam Rekanan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:14px" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            <span class="text-navy">
                                <i class="fas fa-business-time mr-2"></i>
                                Transaksi Tender
                            </span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link">
                            <span class="text-navy"><i class="fas fa-align-justify"></i></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:14px" class="nav-link" data-toggle="dropdown" href="#">
                            <span class="text-navy">
                                <i class="fas fa-caret-square-down"></i>
                                Guide || FAQ
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a style="font-size:14px" href="#" class="dropdown-item">
                                <i class="far fa-file-pdf mr-2"></i>Dokumen User Guide
                            </a>
                            <div class="dropdown-divider"></div>
                            <a style="font-size:14px" href="#" class="dropdown-item">
                                <i class="nav-icon fas fa-headset mr-2"></i> FAQ
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:14px" class="navbar-brand nav-link" data-toggle="dropdown" href="#">
                            <img src="<?php echo base_url(); ?>assets/frontend/dist/img/avatar5.png" class="brand-image img-circle elevation-3">
                            <span class="text-navy text-sm">
                                User: <strong>Validator / Panitia</strong>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">
                                <span class="text-primary">
                                    <strong>
                                        <i class="fas fa-user-lock mr-2"></i>
                                        <?= $this->session->userdata('nama_pegawai');?>
                                    </strong>
                                </span>
                            </span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-key mr-2"></i>
                                Ganti Password
                            </a>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Log Out System
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->