<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content text-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0">
                            <strong>
                                <i class="fas fa-user-shield mr-2"></i>
                                Data Status Rekanan Terundang
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-table mr-2"></i>
                                            Tabel Data Daftar Rekanan Terundang
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
                                                                    <option>Jasa Pengadaan Barang</option>
                                                                    <option>Jasa Konsultasi</option>
                                                                    <option>Jasa Konstruksi</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">
                                                            Status Revisi
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                                                </div>
                                                                <select class="form-control">
                                                                    <option>Dokumen Tervalidasi</option>
                                                                    <option>Revisi Dokumen</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h5 class="card-title">Tabel Data Rekanan Terundang</h5>
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
                                                            <th style="width:130px">Status Rekanan</th>
                                                            <th style="width:120px">Status Revisi Dokumen</th>
                                                            <th style="width:150px" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Kreatif Intelegensi Teknologi</td>
                                                            <td>Jasa Lainnya, Jasa Konsultasi</td>
                                                            <td>Menengah</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Rekanan Terundang</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Sudah Tervalidasi</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-dark btn-sm">
                                                                    <i class="fas fa-ban mr-2"></i>
                                                                    Black List
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Karya Cita</td>
                                                            <td>Jasa Lainnya, Jasa Pemborongan</td>
                                                            <td>Kecil</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Rekanan Terundang</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Sudah Tervalidasi</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-dark btn-sm">
                                                                    <i class="fas fa-ban mr-2"></i>
                                                                    Black List
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Surya Kencana</td>
                                                            <td>Jasa Lainnya</td>
                                                            <td>Besar</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Rekanan Terundang</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Sudah Tervalidasi</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-dark btn-sm">
                                                                    <i class="fas fa-ban mr-2"></i>
                                                                    Black List
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gudang Garam</td>
                                                            <td>Jasa Konsultasi</td>
                                                            <td>Besar</td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-primary">
                                                                        <strong>Rekanan Terundang</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <h6>
                                                                    <span class="badge badge-warning">
                                                                        <strong>Revisi Dokumen</strong>
                                                                    </span>
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
                                                                    <button type="button" class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-share-square mr-2"></i>
                                                                        Check
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-dark btn-sm">
                                                                    <i class="fas fa-ban mr-2"></i>
                                                                    Black List
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