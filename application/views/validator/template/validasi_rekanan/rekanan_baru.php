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
                                <i class="fas fa-user-plus mr-2"></i>
                                Daftar Rekanan Terbaru
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-table mr-2"></i>
                                            Tabel Data Daftar Rekanan Terbaru
                                        </h5>
                                    </div>
                                    <?php if ($this->session->flashdata('berhasil')) { ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                                            <?= $this->session->flashdata('berhasil'); ?>
                                        </div>
                                    <?php } ?>
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
                                                            Bentuk Usaha
                                                        </label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                                                </div>
                                                                <select class="form-control">
                                                                    <option>Perseroan Terbatas (PT)</option>
                                                                    <option>Commanditaire Vennootschap (CV)</option>
                                                                    <option>Firma</option>
                                                                    <option>Perorangan / Individu</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h5 class="card-title">Tabel Data Rekanan Terbaru</h5>
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
                                                            <th style="width:150px">Jenis Usaha</th>
                                                            <th style="width:200px">Bentuk Usaha</th>
                                                            <th style="width:90px">Kualifikasi</th>
                                                            <th style="width:100px">Tanggal Daftar</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($data_vendor as $key => $value) { ?>
                                                            <tr>
                                                                <td><?= $value['nama_usaha'] ?></td>
                                                                <td>Jasa Lainnya, Jasa Pemborongan</td>
                                                                <td><?= $value['bentuk_usaha'] ?></td>
                                                                <td><?= $value['kualifikasi_usaha'] ?></td>
                                                                <td><?= date('d-m-Y', strtotime($value['tgl_daftar'])) ?></td>
                                                                <td>
                                                                    <a href="<?= base_url() ?>validator/rekanan_baru/detil_rekanan_baru/<?= $value['id_url_vendor'] ?>" class="btn btn-info btn-sm">
                                                                        <i class="fas fa-glasses mr-2"></i>
                                                                        Detil
                                                                    </a>
                                                                    <a href="<?= base_url() ?>validator/rekanan_baru/terima/<?= $value['id_url_vendor'] ?>" class="btn btn-success btn-sm">
                                                                        <i class="fas fa-check-square mr-2"></i>
                                                                        Terima
                                                                    </a>
                                                                    <?php
                                                                    if ($value['sts_aktif'] == NULL) { ?>
                                                                        <a href="<?= base_url() ?>validator/rekanan_baru/tolak/<?= $value['id_url_vendor'] ?>" class="btn btn-danger btn-sm">
                                                                            <i class="fas fa-ban mr-2"></i>
                                                                            Tolak
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <div class="badge badge-danger">
                                                                            <!-- <i class="fas fa-times mr-2"></i> -->
                                                                            Penyedia Di Tolak
                                                                        </div>
                                                                    <?php    }  ?>

                                                                </td>
                                                            </tr>
                                                        <?php   }  ?>
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