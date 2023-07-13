<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#7952b3">

    <title>E-Tender || JMTO</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>//assets/brand/jm1.png" />
    <link href="<?php echo base_url(); ?>/assets/css/bs5-style.css" rel="stylesheet">


    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-white">
    <nav class="navbar fixed-top navbar-light bd-blue-700 ">
        <div class="container-fluid d-flex flex-wrap bg-light shadow-lg">
            <a class="navbar-brand">
                <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
            </a>
            <ul class="nav">
                <h6 class="text-dark">
                    <strong><?= $this->jam_tgl->tgl_indo(date('Y-m-d')) ?> || <label for="" id="jam"></label></strong>
                </h6>
            </ul>
        </div>
        <div class="container-fluid shadow-lg">
            <a class="navbar-brand">
                <!-- <img src="<?php echo base_url(); ?>/assets/brand/bootstrap-logo.svg" alt="" width="29" height="24" class="d-inline-block align-text-top"> -->
                <small class="text-white">
                    <i class="fa-solid fa-tv px-1"></i>
                    E-TenderJMTO
                </small>
            </a>&nbsp;
            <a class="navbar-brand">
                <small class="text-white">
                    ||
                </small>
            </a>&nbsp;
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="<?= base_url() ?>validator/dashboard" class="nav-link px-2 text-white">
                        <i class="fa-solid fa-gauge-high mb-1"></i>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-folder-open"></i>
                        <small>File Master</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>validator/data_kbli">
                                <i class="fa-solid fa-database px-1"></i>
                                <small>Data KBLI</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>validator/data_sbu">
                                <i class="fa-solid fa-database px-1"></i>
                                <small>Data SBU</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-tag"></i>
                        <small>Info Data Rekanan</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>validator/rekanan_baru">
                                <i class="fa-solid fa-users-rectangle px-1"></i>
                                <small>Daftar Rekanan Terbaru</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>validator/rekanan_tervalidasi">
                                <i class="fa-solid fa-user-shield px-1"></i>
                                <small>Data Status Rekanan Tervalidasi</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>validator/rekanan_terundang">
                                <i class="fa-solid fa-address-card px-1"></i>
                                <small>Data Rekanan Terundang</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="fa-solid fa-user-secret px-1"></i>
                                <small>Daftar Hitam Rekanan</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-business-time"></i>
                        <small>Transaksi Tender</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    </ul>
                </li>
            </ul>
            <div class="text-end">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>/assets/brand/avatar5.png" alt="mdo" width="32" height="32" class="rounded-circle shadow-lg">&nbsp;
                            <small class="text-white">Validator & Panitia</small>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#"><small><?= $this->session->userdata('nama_pegawai'); ?></small></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><small><i class="fa-solid fa-user-gear px-1"></i>User Setting</small></a></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout')?>"><small><i class="fa-solid fa-right-from-bracket px-1"></i>Log-Out System</small></a></li>
                        </ul>
                    </div>&nbsp;
                    <div class="flex-shrink-0">
                        <a href="" class="nav-link px-2 text-white">
                            <i class="fa-regular fa-file-pdf"></i>
                            <small>Guide || FAQ</small>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav><br><br><br>
    <hr>