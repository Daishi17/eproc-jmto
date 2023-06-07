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
                                <i class="fas fa-binoculars mr-2"></i>
                                Detail Data Rekanan Terbaru
                            </strong>
                        </h5>
                        <div class="card-tools">
                            <a href="<?= base_url() ?>validator/rekanan_baru">
                                <button type="button" class="btn btn-info btn-sm">
                                    <i class="fas fa-caret-square-left mr-2"></i>
                                    Kembali Ke Tabel Daftar Rekanan Terbaru
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-sm">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/frontend/dist/img/logo usaha.png" alt="User profile picture">
                                        </div>
                                        <h5 class="profile-username text-center text-sm">
                                            <strong><?= $detil_vendor['nama_usaha'] ?></strong>
                                        </h5>
                                        <p class="text-muted text-center">
                                            <?php foreach ($kualifikasi as $key => $value) { ?>
                                                <?php $kualifikasi = $this->db->query("SELECT * FROM tbl_jenis_usaha WHERE id_jenis_usaha = $value")->row_array(); ?>
                                                <?php echo $kualifikasi['nama_jenis_usaha'] ?> <br>
                                            <?php    } ?>
                                        </p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Kualifikasi Usaha</b> <a class="float-right"><?= $detil_vendor['kualifikasi_usaha'] ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>NPWP</b> <a class="float-right"><?= $detil_vendor['npwp'] ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email</b> <a class="float-right"><?= $detil_vendor['email'] ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Status Dokumen</b>
                                                <a class="float-right">
                                                    <span class="badge badge-danger">
                                                        <strong>Belum Lengkap</strong>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Status Tender Terundang</b>
                                                <a class="float-right">
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </a>
                                            </li>
                                            </u>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <span>
                                                <i class="fas fa-user-tag"></i>
                                                <strong>Informasi Usaha / Perorangan</strong>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <table class="table table-bordered table-sm">
                                                <tr>
                                                    <th class="col-sm-3 bg-light">
                                                        Bentuk Usaha
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-building mr-2"></i>
                                                        <?= $detil_vendor['bentuk_usaha'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Alamat
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-road mr-2"></i>
                                                        <?= $detil_vendor['alamat'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Provinsi
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-map mr-2"></i>
                                                        <?= $detil_vendor['nama_provinsi'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Kabupaten / Kota
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-map-signs mr-2"></i>
                                                        <?= $detil_vendor['nama_kabupaten'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Kecamatan
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-route mr-2"></i>
                                                        <?= $detil_vendor['nama_kecamatan'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Kelurahan
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-map-marker-alt mr-3"></i>
                                                        <?= $detil_vendor['kelurahan'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Kode Pos
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-map-pin mr-3"></i>
                                                        <?= $detil_vendor['kode_pos'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Kontak
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-phone-alt mr-2"></i>
                                                        <?= $detil_vendor['no_telpon'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Kantor Cabang
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <i class="fas fa-laptop-house mr-2"></i>
                                                        <?php if ($detil_vendor['sts_kantor_cabang'] == 1) { ?>
                                                            Kantor Cabang
                                                        <?php  } else { ?>
                                                            Bukan Kantor Cabang
                                                        <?php    } ?>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Alamat Kantor Cabang
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <?php if ($detil_vendor['sts_kantor_cabang'] == 1) { ?>
                                                            <?= $detil_vendor['alamat_kantor_cabang'] ?>
                                                        <?php  } else { ?>
                                                            -
                                                        <?php    } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2 bg-light">
                                                        Aksi
                                                    </th>
                                                    <td class="col-sm-10">
                                                        <a href="<?= base_url() ?>validator/rekanan_baru/terima/<?= $detil_vendor['id_url_vendor'] ?>" class="btn btn-success btn-sm">
                                                            <i class="fas fa-check-square mr-2"></i>
                                                            Terima
                                                        </a>
                                                        <a href="<?= base_url() ?>validator/rekanan_baru/tolak/<?= $detil_vendor['id_url_vendor'] ?>" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-ban mr-2"></i>
                                                            Tolak
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
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