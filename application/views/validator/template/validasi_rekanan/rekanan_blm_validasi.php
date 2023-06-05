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
                                Data Status Rekanan Tervalidasi
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-table mr-2"></i>
                                            Tabel Data Daftar Status Rekanan Tervalidasi
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card card-outline collapsed-card card-navy">
                                            <div class="card-header">
                                                <h5 class="card-title">Filter Tabel Data</h5>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">
                                                            Jenis Usaha
                                                        </label>
                                                        <div class="col-sm-3">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                                                </div>
                                                                <select class="form-control">
                                                                    <option>Jasa Lainnya</option>
                                                                    <option>Jasa Pemborongan</option>
                                                                    <option>Jasa Konsultasi</option>
                                                                    <option>Jasa Konstruksi</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">
                                                            Status Upload
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                                                </div>
                                                                <select class="form-control">
                                                                    <option>Sudah Upload Dokumen</option>
                                                                    <option>Belum Upload Dokumen</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">
                                                            Status Validasi
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                                                </div>
                                                                <select class="form-control">
                                                                    <option>Sudah Tervalidasi</option>
                                                                    <option>Belum Tervalidasi</option>
                                                                    <option>Tidak Valid</option>
                                                                    <option>Belum Lengkap</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h5 class="card-title">Tabel Data Status Rekanan Tervalidasi</h5>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:250px">Nama Perusahan / Individu</th>
                                                            <th style="width:250px">Jenis Usaha</th>
                                                            <th style="width:80px">Kualifikasi</th>
                                                            <th style="width:130px">Status Dokumen Upload</th>
                                                            <th style="width:120px">Status Dokumen Cek</th>
                                                            <th  style="width:140px" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Kreatif Intelegensi Teknologi</td>
                                                            <td>Jasa Lainnya, Jasa Konsultasi</td>
                                                            <td>Menengah</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-success">
                                                                        <strong>Sudah Upload Dokumen</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-warning">
                                                                        <strong>Belum Tervalidasi</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="http://localhost/e-tender_jmto/validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-primary btn-sm" disabled>
                                                                    <i class="fas fa-paper-plane mr-2"></i>
                                                                    Invited
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Karya Cita</td>
                                                            <td>Jasa Lainnya, Jasa Pemborongan</td>
                                                            <td>Kecil</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-warning">
                                                                        <strong>Belum Upload Dokumen</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-secondary">
                                                                        <strong>Belum Lengkap</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="http://localhost/e-tender_jmto/validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-primary btn-sm" disabled>
                                                                    <i class="fas fa-paper-plane mr-2"></i>
                                                                    Invited
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Surya Kencana</td>
                                                            <td>Jasa Lainnya</td>
                                                            <td>Besar</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-success">
                                                                        <strong>Sudah Upload Dokumen</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-danger">
                                                                        <strong>Tidak Valid</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="http://localhost/e-tender_jmto/validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-primary btn-sm" disabled>
                                                                    <i class="fas fa-paper-plane mr-2"></i>
                                                                    Invited
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gudang Garam</td>
                                                            <td>Jasa Konsultasi</td>
                                                            <td>Besar</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-success">
                                                                        <strong>Sudah Upload Dokumen</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-success">
                                                                        <strong>Sudah Tervalidasi</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="http://localhost/e-tender_jmto/validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-paper-plane mr-2"></i>
                                                                    Invited
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
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
 <!-- <section class="content">
     <div class="container-fluid">
     
     </div>
 </section>    -->