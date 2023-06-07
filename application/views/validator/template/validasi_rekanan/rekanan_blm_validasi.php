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
                                                            <th style="width:140px" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($vendor as $key => $value) { ?>
                                                            <?php $id_vendor =  $value['id_vendor'] ?>
                                                            <tr>
                                                                <td><?= $value['nama_usaha'] ?></td>
                                                                <td>
                                                                    <?php $kualifikasi =  str_split($value['id_jenis_usaha']) ?>
                                                                    <?php foreach ($kualifikasi as $key => $value2) { ?>
                                                                        <?php $kualifikasi = $this->db->query("SELECT * FROM tbl_jenis_usaha WHERE id_jenis_usaha = $value2")->row_array(); ?>
                                                                        <?php echo $kualifikasi['nama_jenis_usaha'] ?> <br>
                                                                    <?php    } ?>
                                                                </td>
                                                                <td><?= $value['kualifikasi_usaha'] ?></td>
                                                                <?php
                                                                $nib = $this->db->query("SELECT COUNT(*) as NIB FROM tbl_vendor_nib WHERE id_vendor = $id_vendor")->row_array();
                                                                $siup = $this->db->query("SELECT COUNT(*) as SIUP FROM tbl_vendor_siup WHERE id_vendor = $id_vendor")->row_array();
                                                                $sbu = $this->db->query("SELECT COUNT(*) as SBU FROM tbl_vendor_sbu WHERE id_vendor = $id_vendor")->row_array();
                                                                $siujk = $this->db->query("SELECT COUNT(*) as SIUJK FROM tbl_vendor_siujk WHERE id_vendor = $id_vendor")->row_array();
                                                                ?>
                                                                <?php $total = $nib['NIB'] + $siup['SIUP'] + $sbu['SBU'] + $siujk['SIUJK']   ?>
                                                                <td>
                                                                    <h6>
                                                                        <?php if ($total > 0) { ?>
                                                                            <span class="badge badge-success">
                                                                                <strong>Sudah Upload Dokumen</strong>
                                                                            </span>
                                                                        <?php   } else { ?>
                                                                            <span class="badge badge-warning">
                                                                                <strong>Belum Upload Dokumen</strong>
                                                                            </span>
                                                                        <?php  }  ?>

                                                                    </h6>
                                                                </td>
                                                                <td>
                                                                    <h6>
                                                                        <?php if ($total == 0) { ?>
                                                                            <span class="badge badge-secondary">
                                                                                <strong>Belum Upload</strong>
                                                                            </span>
                                                                        <?php } else {  ?>
                                                                            <?php if ($total == 4) { ?>
                                                                                <?php if ($value['sts_dokumen_cek'] == 1) { ?>
                                                                                    <span class="badge badge-success">
                                                                                        <strong>Sudah Valid</strong>
                                                                                    </span>
                                                                                <?php    } else { ?>
                                                                                    <span class="badge badge-danger">
                                                                                        <strong>Tidak Valid</strong>
                                                                                    </span>
                                                                                <?php   }  ?>

                                                                            <?php } else if ($total == 3) { ?>
                                                                                <?php if ($value['sts_dokumen_cek'] == 1) { ?>
                                                                                    <span class="badge badge-info">
                                                                                        <strong>Belum Lengkap</strong>
                                                                                    </span>
                                                                                <?php   } else { ?>
                                                                                    <span class="badge badge-warning">
                                                                                        <strong>Belum Di Validasi</strong>
                                                                                    </span>
                                                                                <?php   }  ?>
                                                                            <?php  } else if ($total == 2) {  ?>
                                                                                <?php if ($value['sts_dokumen_cek'] == 1) { ?>
                                                                                    <span class="badge badge-info">
                                                                                        <strong>Belum Lengkap</strong>
                                                                                    </span>
                                                                                <?php   } else { ?>
                                                                                    <span class="badge badge-warning">
                                                                                        <strong>Belum Di Validasi</strong>
                                                                                    </span>
                                                                                <?php   }  ?>
                                                                            <?php } else if ($total == 1) { ?>
                                                                                <?php if ($value['sts_dokumen_cek'] == 1) { ?>
                                                                                    <span class="badge badge-info">
                                                                                        <strong>Belum Lengkap</strong>
                                                                                    </span>
                                                                                <?php   } else { ?>
                                                                                    <span class="badge badge-warning">
                                                                                        <strong>Belum Di Validasi</strong>
                                                                                    </span>
                                                                                <?php   }  ?>

                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </h6>
                                                                </td>
                                                                <td>
                                                                    <?php if ($total == 4 && $value['sts_dokumen_cek'] == 1) { ?>
                                                                        <a href="<?= base_url() ?>validator/cek_dokumen">
                                                                            <button type="button" class="btn btn-warning btn-sm">
                                                                                <i class="fas fa-share-square mr-2"></i>
                                                                                Check
                                                                            </button>
                                                                        </a>
                                                                        <button type="button" class="btn btn-primary btn-sm">
                                                                            <i class="fas fa-paper-plane mr-2"></i>
                                                                            Invited
                                                                        </button>
                                                                        </span>
                                                                    <?php } else { ?>
                                                                        <a href="<?= base_url() ?>validator/cek_dokumen">
                                                                            <button type="button" class="btn btn-warning btn-sm">
                                                                                <i class="fas fa-share-square mr-2"></i>
                                                                                Check
                                                                            </button>
                                                                        </a>
                                                                        <button type="button" class="btn btn-primary btn-sm" disabled>
                                                                            <i class="fas fa-paper-plane mr-2"></i>
                                                                            Invited
                                                                        </button>
                                                                    <?php  } ?>


                                                                </td>
                                                            </tr>
                                                        <?php    } ?>


                                                        <!-- <tr>
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
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
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
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
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
                                                                <a href="<?= base_url() ?>validator/cek_dokumen">
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
                                                        </tr> -->
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