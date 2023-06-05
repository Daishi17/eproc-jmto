<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5> <img src="<?php echo base_url(); ?>assets/frontend/dist/img/jm1.png" class="brand-image img-circle elevation-3">
                    <span class="text-primary">
                        <strong>Jasamarga Tollroad Operator</strong>
                    </span>
                </h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <h6>
                            <a>
                                <span class="text-secondary">
                                    <i class="fas fa-business-time"></i>
                                    <strong>22-Mei-2023 || 22.30.04</strong>
                                </span>
                            </a>
                        </h6>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content text-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0">
                            <strong>
                                <i class="fas fa-user-shield mr-2"></i>
                                Cek Validasi Dokumen Rekanan
                            </strong>
                        </h5>
                        <div class="card-tools">
                            <a href="<?= base_url() ?>validator/rekanan_blm_validasi">
                                <button type="button" class="btn btn-info btn-sm">
                                    <i class="fas fa-caret-square-left mr-2"></i>
                                    Kembali Ke Tabel Daftar Status Rekanan Tervalidasi
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-danger">
                                    <div class="card-header">
                                        <h6 class="card-title m-0">
                                            <strong>
                                                <i class="fas fa-info mr-2"></i>
                                                Informasi Validasi Dokumen Rekanan
                                            </strong>
                                        </h6>
                                        <!-- <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div> -->
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm mb-3">
                                            <tr>
                                                <td class="col-sm-4">
                                                    <i class="fas fa-city mr-2"></i>
                                                    Kreatif Intelegensi Teknologi
                                                </td>
                                                <td class="col-sm-4">
                                                    <i class="fas fa-briefcase mr-2"></i>
                                                    Jasa Lainnya || Jasa Pemborongan || Jasa Konsultasi
                                                </td>
                                                <td class="col-sm-2">
                                                    <i class="fas fa-tags mr-2"></i>
                                                    Menegah
                                                </td>
                                                <td class="col-sm-2">
                                                    <h6>
                                                        <span class="badge badge-warning">
                                                            <i class="fas fa-file-pdf mr-2"></i>
                                                            <strong>Dokumen Belum Tervalidasi</strong>
                                                        </span>
                                                    </h6>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Validasi Dokumen Rekanan
                                                        </h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="card card-primary card-outline card-outline-tabs">
                                                                <div class="card-header p-0 border-bottom-0">
                                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" id="custom-tabs-four-nib-tab" data-toggle="pill" href="#custom-tabs-four-nib" role="tab" aria-controls="custom-tabs-four-nib" aria-selected="true">
                                                                                <i class="fas fa-file-word mr-2"></i>
                                                                                <strong>
                                                                                    NIB
                                                                                </strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-siup-tab" data-toggle="pill" href="#custom-tabs-four-siup" role="tab" aria-controls="custom-tabs-four-siup" aria-selected="false">
                                                                                <i class="fas fa-file-powerpoint mr-2"></i>
                                                                                <strong>
                                                                                    SIUP

                                                                                </strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-sbu-tab" data-toggle="pill" href="#custom-tabs-four-sbu" role="tab" aria-controls="custom-tabs-four-sbu" aria-selected="false">
                                                                                <i class="fas fa-file-excel mr-2"></i>
                                                                                <strong>
                                                                                    SBU

                                                                                </strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-siujk-tab" data-toggle="pill" href="#custom-tabs-four-siujk" role="tab" aria-controls="custom-tabs-four-siujk" aria-selected="false">
                                                                                <i class="fas fa-file-image mr-2"></i>
                                                                                <strong>SIUJK</strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-akta-tab" data-toggle="pill" href="#custom-tabs-four-akta" role="tab" aria-controls="custom-tabs-four-akta" aria-selected="false">
                                                                                <i class="fas fa-file-alt mr-2"></i>
                                                                                <strong>Akta</strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-pendiri-tab" data-toggle="pill" href="#custom-tabs-four-pendiri" role="tab" aria-controls="custom-tabs-four-pendiri" aria-selected="false">
                                                                                <i class="fas fa-sitemap mr-2"></i>
                                                                                <strong>Manajerial</strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-pengalaman-tab" data-toggle="pill" href="#custom-tabs-four-pengalaman" role="tab" aria-controls="custom-tabs-four-pengalaman" aria-selected="false">
                                                                                <i class="fas fa-address-book mr-2"></i>
                                                                                <strong>Pengalaman</strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-pkp-tab" data-toggle="pill" href="#custom-tabs-four-pkp" role="tab" aria-controls="custom-tabs-four-pkp" aria-selected="false">
                                                                                <i class="fas fa-fax mr-2"></i>
                                                                                <strong>PKP</strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-spt-tab" data-toggle="pill" href="#custom-tabs-four-spt" role="tab" aria-controls="custom-tabs-four-spt" aria-selected="false">
                                                                                <i class="fas fa-copy mr-2"></i>
                                                                                <strong>SPT</strong>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-neraca-tab" data-toggle="pill" href="#custom-tabs-four-neraca" role="tab" aria-controls="custom-tabs-four-neraca" aria-selected="false">
                                                                                <i class="fas fa-chart-line mr-2"></i>
                                                                                <strong>Neraca Keuangan</strong>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                                                        <div class="tab-pane fade show active" id="custom-tabs-four-nib" role="tabpanel" aria-labelledby="custom-tabs-four-nib-tab">
                                                                            <div class="card card-outline card-danger">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian Dokumen Validasi - Nomor Induk Berusaha (NIB)
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 150px">Nomor Surat</th>
                                                                                                <th class="text-center" style="width: 110px">Berlaku Sampai</th>
                                                                                                <th style="width: 130px">Kualifikasi</th>
                                                                                                <th style="width: 350px">File Dokumen</th>
                                                                                                <th class="text-center" style="width: 120px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 230px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>223334444</td>
                                                                                                <td class="text-center">Seumur Hidup</td>
                                                                                                <td>Menengah</td>
                                                                                                <td>
                                                                                                    <span type="button" class="badge badge-danger">
                                                                                                        <strong>
                                                                                                            <a href="#" class="nav-link">
                                                                                                                <span class="text-white">
                                                                                                                    <i class="far fa-file-pdf mr-2"></i>
                                                                                                                    Dokumen NIB.pdf
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <h6>
                                                                                                        <span class="badge badge-warning">
                                                                                                            <strong>Belum Tervalidasi</strong>
                                                                                                        </span>
                                                                                                    </h6>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card card-outline card-danger">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian KBLI Tervalidasi - Nomor Induk Berusaha (NIB)
                                                                                    </h6>
                                                                                    <div class="card-tools">
                                                                                        <div class="input-group input-group-sm" style="width: 250px;">
                                                                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                                                            <div class="input-group-append">
                                                                                                <button type="submit" class="btn btn-default">
                                                                                                    <i class="fas fa-search"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 100px">Kode KBLI</th>
                                                                                                <th class="text-center" style="width: 400px">Keterangan</th>
                                                                                                <th style="width: 150px">Kualifikasi</th>
                                                                                                <th class="text-center" style="width: 150px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 220px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>62019</td>
                                                                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>46512</td>
                                                                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>47413</td>
                                                                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="card-footer clearfix">
                                                                                    <ul class="pagination pagination-sm m-0 float-right">
                                                                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-siup" role="tabpanel" aria-labelledby="custom-tabs-four-siup-tab">

                                                                            <div class="card card-outline card-warning">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian Dokumen Validasi - Surat Izin Usaha Perdagangan (SIUP)
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 150px">Nomor Surat</th>
                                                                                                <th class="text-center" style="width: 110px">Berlaku Sampai</th>
                                                                                                <th style="width: 130px">Kualifikasi</th>
                                                                                                <th style="width: 350px">File Dokumen</th>
                                                                                                <th class="text-center" style="width: 120px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 230px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>223334444</td>
                                                                                                <td class="text-center">Seumur Hidup</td>
                                                                                                <td>Menengah</td>
                                                                                                <td>
                                                                                                    <span type="button" class="badge badge-warning">
                                                                                                        <strong>
                                                                                                            <a href="#" class="nav-link">
                                                                                                                <span class="text-white">
                                                                                                                    <i class="far fa-file-pdf mr-2"></i>
                                                                                                                    Dokumen SIUP.pdf
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <h6>
                                                                                                        <span class="badge badge-warning">
                                                                                                            <strong>Belum Tervalidasi</strong>
                                                                                                        </span>
                                                                                                    </h6>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card card-outline card-warning">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian KBLI Tervalidasi - Surat Izin Usaha Perdagangan (SIUP)
                                                                                    </h6>
                                                                                    <div class="card-tools">
                                                                                        <div class="input-group input-group-sm" style="width: 250px;">
                                                                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                                                            <div class="input-group-append">
                                                                                                <button type="submit" class="btn btn-default">
                                                                                                    <i class="fas fa-search"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 100px">Kode KBLI</th>
                                                                                                <th class="text-center" style="width: 400px">Keterangan</th>
                                                                                                <th style="width: 150px">Kualifikasi</th>
                                                                                                <th class="text-center" style="width: 150px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 220px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>62019</td>
                                                                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>46512</td>
                                                                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>47413</td>
                                                                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="card-footer clearfix">
                                                                                    <ul class="pagination pagination-sm m-0 float-right">
                                                                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-sbu" role="tabpanel" aria-labelledby="custom-tabs-four-sbu-tab">

                                                                            <div class="card card-outline card-success">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian Dokumen Validasi - Sertifikat Badan Usaha (SBU)
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 150px">Nomor Surat</th>
                                                                                                <th class="text-center" style="width: 110px">Berlaku Sampai</th>
                                                                                                <th style="width: 130px">Kualifikasi</th>
                                                                                                <th style="width: 350px">File Dokumen</th>
                                                                                                <th class="text-center" style="width: 120px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 230px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>223334444</td>
                                                                                                <td class="text-center">Seumur Hidup</td>
                                                                                                <td>Menengah</td>
                                                                                                <td>
                                                                                                    <span type="button" class="badge badge-success">
                                                                                                        <strong>
                                                                                                            <a href="#" class="nav-link">
                                                                                                                <span class="text-white">
                                                                                                                    <i class="far fa-file-pdf mr-2"></i>
                                                                                                                    Dokumen SBU.pdf
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <h6>
                                                                                                        <span class="badge badge-warning">
                                                                                                            <strong>Belum Tervalidasi</strong>
                                                                                                        </span>
                                                                                                    </h6>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card card-outline card-success">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian SBU Tervalidasi - Sertifikat Badan Usaha (SBU)
                                                                                    </h6>
                                                                                    <div class="card-tools">
                                                                                        <div class="input-group input-group-sm" style="width: 250px;">
                                                                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                                                            <div class="input-group-append">
                                                                                                <button type="submit" class="btn btn-default">
                                                                                                    <i class="fas fa-search"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 100px">Kode SBU</th>
                                                                                                <th class="text-center" style="width: 400px">Keterangan</th>
                                                                                                <th style="width: 150px">Kualifikasi</th>
                                                                                                <th class="text-center" style="width: 150px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 220px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>BG002</td>
                                                                                                <td>Konstruksi Gedung Perkantoran</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>BG009</td>
                                                                                                <td>Konstruksi Gedung Lainnya</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>BS009</td>
                                                                                                <td>Konstruksi Sentra Telekomunikasi</td>
                                                                                                <td>Menengah</td>
                                                                                                <td class="text-center">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <strong>Belum Tervalidasi</strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="card-footer clearfix">
                                                                                    <ul class="pagination pagination-sm m-0 float-right">
                                                                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-siujk" role="tabpanel" aria-labelledby="custom-tabs-four-siujk-tab">

                                                                            <div class="card card-outline card-primary">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian Dokumen Validasi - Surat Izin Usaha Jasa Konstruksi (SIUJK)
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 150px">Nomor Surat</th>
                                                                                                <th class="text-center" style="width: 110px">Berlaku Sampai</th>
                                                                                                <th style="width: 130px">Kualifikasi</th>
                                                                                                <th style="width: 350px">File Dokumen</th>
                                                                                                <th class="text-center" style="width: 120px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 230px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>223334444</td>
                                                                                                <td class="text-center">Seumur Hidup</td>
                                                                                                <td>Menengah</td>
                                                                                                <td>
                                                                                                    <span type="button" class="badge badge-primary">
                                                                                                        <strong>
                                                                                                            <a href="#" class="nav-link">
                                                                                                                <span class="text-white">
                                                                                                                    <i class="far fa-file-pdf mr-2"></i>
                                                                                                                    Dokumen SIUJK.pdf
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <h6>
                                                                                                        <span class="badge badge-warning">
                                                                                                            <strong>Belum Tervalidasi</strong>
                                                                                                        </span>
                                                                                                    </h6>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-akta" role="tabpanel" aria-labelledby="custom-tabs-four-akta-tab">

                                                                            <div class="card card-outline card-info">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian Dokumen Validasi - Akta Pendirian
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 150px">Nomor Akta</th>
                                                                                                <th class="text-center" style="width: 90px">Tanggal</th>
                                                                                                <th style="width: 150px">Notaris</th>
                                                                                                <th style="width: 350px">File Dokumen</th>
                                                                                                <th class="text-center" style="width: 120px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 230px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>223334444</td>
                                                                                                <td class="text-center">21/07/2020</td>
                                                                                                <td>Ny. Amini SH, MH</td>
                                                                                                <td>
                                                                                                    <span type="button" class="badge badge-info">
                                                                                                        <strong>
                                                                                                            <a href="#" class="nav-link">
                                                                                                                <span class="text-white">
                                                                                                                    <i class="far fa-file-pdf mr-2"></i>
                                                                                                                    Dokumen Akta Pendirian.pdf
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <h6>
                                                                                                        <span class="badge badge-warning">
                                                                                                            <strong>Belum Tervalidasi</strong>
                                                                                                        </span>
                                                                                                    </h6>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td>

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card card-outline card-info">
                                                                                <div class="card-header">
                                                                                    <h6 class="card-title">
                                                                                        <i class="fas fa-info-circle mr-2"></i>
                                                                                        Rincian Dokumen Validasi - Akta Perubahan
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body p-0">
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead class="bg-light">
                                                                                            <tr>
                                                                                                <th style="width: 150px">Nomor Akta</th>
                                                                                                <th class="text-center" style="width: 100px">Tgl. Perubahan</th>
                                                                                                <th style="width: 150px">Notaris</th>
                                                                                                <th style="width: 350px">File Dokumen</th>
                                                                                                <th class="text-center" style="width: 120px">Status Validasi</th>
                                                                                                <th class="text-center" style="width: 230px">Action</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <!-- <td>223334444</td>
                                                                                                <td class="text-center">21/07/2020</td>
                                                                                                <td>Ny. Amini SH, MH</td>
                                                                                                <td>
                                                                                                    <span type="button" class="badge badge-info">
                                                                                                        <strong>
                                                                                                            <a href="#" class="nav-link">
                                                                                                                <span class="text-white">
                                                                                                                    <i class="far fa-file-pdf mr-2"></i>
                                                                                                                    Dokumen Akta Pendirian.pdf
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </strong>
                                                                                                    </span>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <h6>
                                                                                                        <span class="badge badge-warning">
                                                                                                            <strong>Belum Tervalidasi</strong>
                                                                                                        </span>
                                                                                                    </h6>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button type="button" class="btn btn-success btn-sm">
                                                                                                        <i class="fas fa-check mr-2"></i>
                                                                                                        Validation
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                                                        <i class="fas fa-ban mr-2"></i>
                                                                                                        Non Validation
                                                                                                    </button>
                                                                                                </td> -->

                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-pendiri" role="tabpanel" aria-labelledby="custom-tabs-four-pendiri-tab">
                                                                            Manajerial
                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-pengalaman" role="tabpanel" aria-labelledby="custom-tabs-four-pengalaman-tab">
                                                                            Pengalaman
                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-pkp" role="tabpanel" aria-labelledby="custom-tabs-four-pkp-tab">
                                                                            PKP
                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-spt" role="tabpanel" aria-labelledby="custom-tabs-four-spt-tab">
                                                                            SPT
                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-neraca" role="tabpanel" aria-labelledby="custom-tabs-four-neraca-tab">
                                                                            Neraca Keuangan
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->