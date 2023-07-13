<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-dark d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Check Data - Dokumen Rekanan Tervalidasi</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <a class="btn btn-primary btn-sm shadow-lg" href="<?= base_url() ?>validator/rekanan_tervalidasi" role="button">
                            << Kembali Kemenu Sebelumnya </a> </div> </div> <div class="card-body">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bg-danger d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-dark">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>Identitas Perusahaan</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <table class="table table-bordered table-sm">
                                                    <input type="hidden" value="<?= $vendor['id_url_vendor'] ?>" name="id_url_vendor">
                                                    <tr>
                                                        <th class="bg-light"><small>Nama Perusahaan / Perorangan</small></th>
                                                        <td>
                                                            <small>
                                                                <i class="fa-solid fa-city px-1"></i>
                                                                <?= $vendor['nama_usaha'] ?>
                                                            </small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light"><small>Jenis Usaha</small></th>
                                                        <td>
                                                            <small>
                                                                <i class="fa-solid fa-industry px-1"></i>
                                                                <?= $nama_izin_usaha ?>
                                                            </small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light"><small>Kualifikasi Usaha</small></th>
                                                        <td>
                                                            <small>
                                                                <i class="fa-solid fa-square-poll-vertical fa-lg px-1"></i>
                                                                <?= $vendor['kualifikasi_usaha'] ?>
                                                            </small>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card border-warning shadow-sm">
                                    <div class="card-header">
                                        <div class="nav nav-tabs mb-3 bg-warning" id="nav-tab" role="tablist">

                                            <input type="hidden" name="url_get_vendor" value="<?= base_url('validator/rekanan_tervalidasi/get_dokumen_vendor/') ?>">
                                            <input type="hidden" name="url_download_siup" value="<?= base_url('validator/rekanan_tervalidasi/url_download_siup/') ?>">

                                            <button class="nav-link active" id="nav-siup-tab" data-bs-toggle="tab" data-bs-target="#nav-siup" type="button" role="tab" aria-controls="nav-siup" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>SIUP</b></small>
                                            </button>


                                            <input type="hidden" name="url_download_nib" value="<?= base_url('validator/rekanan_tervalidasi/url_download_nib/') ?>">
                                            <button class="nav-link" id="nav-nib-tab" data-bs-toggle="tab" data-bs-target="#nav-nib" type="button" role="tab" aria-controls="nav-nib" aria-selected="false">
                                                <i class="fa-regular fa-file-word"></i>
                                                <small><b>NIB/TDP</b></small>
                                            </button>


                                            <input type="hidden" name="url_download_sbu" value="<?= base_url('validator/rekanan_tervalidasi/url_download_sbu/') ?>">
                                            <button class="nav-link" id="nav-sbu-tab" data-bs-toggle="tab" data-bs-target="#nav-sbu" type="button" role="tab" aria-controls="nav-sbu" aria-selected="false">
                                                <i class="fa-regular fa-file-excel"></i>
                                                <small><b>SBU</b></small>
                                            </button>


                                            <input type="hidden" name="url_download_siujk" value="<?= base_url('validator/rekanan_tervalidasi/url_download_siujk/') ?>">
                                            <button class="nav-link" id="nav-siujk-tab" data-bs-toggle="tab" data-bs-target="#nav-siujk" type="button" role="tab" aria-controls="nav-siujk" aria-selected="false">
                                                <i class="fa-regular fa-file-pdf"></i>
                                                <small><b>SIUJK</b></small>
                                            </button>

                                            <input type="hidden" name="url_download_akta_pendirian" value="<?= base_url('validator/rekanan_tervalidasi/url_download_akta_pendirian/') ?>">
                                            <input type="hidden" name="url_download_akta_perubahan" value="<?= base_url('validator/rekanan_tervalidasi/url_download_akta_perubahan/') ?>">
                                            <button class="nav-link" id="nav-akta-tab" data-bs-toggle="tab" data-bs-target="#nav-akta" type="button" role="tab" aria-controls="nav-akta" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Akta</b></small>
                                            </button>
                                            <button class="nav-link" id="nav-manajerial-tab" data-bs-toggle="tab" data-bs-target="#nav-manajerial" type="button" role="tab" aria-controls="nav-manajerial" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Manajerial</b></small>
                                            </button>
                                            <input type="hidden" name="url_download_spt" value="<?= base_url('validator/rekanan_tervalidasi/url_download_spt/') ?>">
                                            <button class="nav-link" id="nav-pengalaman-tab" data-bs-toggle="tab" data-bs-target="#nav-pengalaman" type="button" role="tab" aria-controls="nav-pengalaman" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Pengalaman</b></small>
                                            </button>
                                            <input type="hidden" name="url_download_neraca" value="<?= base_url('validator/rekanan_tervalidasi/url_download_neraca/') ?>">
                                            <input type="hidden" name="url_download_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/url_download_keuangan/') ?>">
                                            <button class="nav-link" id="nav-pajak-tab" data-bs-toggle="tab" data-bs-target="#nav-pajak" type="button" role="tab" aria-controls="nav-pajak" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Pajak</b></small>
                                            </button>
                                        </div>
                                        <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                            <!-- siupku -->
                                            <div class="tab-pane fade active show" id="nav-siup" role="tabpanel" aria-labelledby="nav-siup-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="url_kbli_siup" value="<?= base_url('validator/rekanan_tervalidasi/get_kbli_siup/') ?>">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bg-info">
                                                                <tr>
                                                                    <th><small>No. Surat<small></th>
                                                                    <th><small>Berlaku Sampai<small></th>
                                                                    <th colspan="2"><small>File Dokumen<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_siup">

                                                            </tbody>
                                                        </table>
                                                        <table class="table table-bordered table-sm" id="tbl_kbli_siup">
                                                            <thead class="bg-info">
                                                                <tr>
                                                                    <th><small>No<small></th>
                                                                    <th><small>Kode KBLI<small></th>
                                                                    <th><small>Jenis KBLI<small></th>
                                                                    <th><small>Kualifikasi KBLI<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- <tr>
                                                        <td><small>62019</small></td>
                                                        <td><small>Aktivitas Pemrograman Komputer Lainnya</small></td>
                                                        <td><small>Menengah - (M1)</small></td>
                                                        <td>
                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                                <i class="fa-solid fa-square-check px-1"></i>
                                                                <small>Validation</small>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                <i class="fa-solid fa-rectangle-xmark px-1"></i>
                                                                <small>Not Validation</small>
                                                            </button>
                                                        </td>
                                                    </tr> -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- nibku -->
                                            <div class="tab-pane fade" id="nav-nib" role="tabpanel" aria-labelledby="nav-nib-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="url_kbli_nib" value="<?= base_url('validator/rekanan_tervalidasi/get_kbli_nib/') ?>">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bg-danger">
                                                                <tr>
                                                                    <th><small>No. Surat<small></th>
                                                                    <th><small>Berlaku Sampai<small></th>
                                                                    <th colspan="2"><small>File Dokumen<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_nib">
                                                                <!-- <tr>
                                                        <td><small>23123123123</small></td>
                                                        <td><small>Seumur Hidup</small></td>
                                                        <td>
                                                            <button type="button" class="btn btn-light btn-sm text-start col-sm-12 shadow-lg">
                                                                <i class="fa-solid fa-file-pdf px-1"></i>
                                                                Nama File .pdf
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                                <i class="fa-solid fa-lock-open px-1"></i>
                                                                Dekripsi File
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                                <i class="fa-solid fa-square-check px-1"></i>
                                                                <small>Validation</small>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                <i class="fa-solid fa-rectangle-xmark px-1"></i>
                                                                <small>Not Validation</small>
                                                            </button>
                                                        </td>
                                                    </tr> -->
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-bordered table-sm" id="tbl_kbli_nib">
                                                            <thead class="bg-danger">
                                                                <tr>
                                                                    <th><small>No<small></th>
                                                                    <th><small>Kode KBLI<small></th>
                                                                    <th><small>Jenis KBLI<small></th>
                                                                    <th><small>Kualifikasi KBLI<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- sbuku -->
                                            <div class="tab-pane fade" id="nav-sbu" role="tabpanel" aria-labelledby="nav-sbu-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="url_kbli_sbu" value="<?= base_url('validator/rekanan_tervalidasi/get_kbli_sbu/') ?>">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bg-info">
                                                                <tr>
                                                                    <th><small>No. Surat<small></th>
                                                                    <th><small>Berlaku Sampai<small></th>
                                                                    <th colspan="2"><small>File Dokumen<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_sbu">
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-bordered table-sm" id="tbl_kbli_sbu">
                                                            <thead class="bg-info">
                                                                <tr>
                                                                    <th><small>No<small></th>
                                                                    <th><small>Kode SBU<small></th>
                                                                    <th><small>Jenis SBU<small></th>
                                                                    <th><small>Kualifikasi SBU<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- siujkku -->
                                            <div class="tab-pane fade" id="nav-siujk" role="tabpanel" aria-labelledby="nav-siujk-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bg-danger">
                                                                <tr>
                                                                    <th><small>No. Surat<small></th>
                                                                    <th><small>Berlaku Sampai<small></th>
                                                                    <th colspan="2"><small>File Dokumen<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_siujk">


                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" name="url_kbli_siujk" value="<?= base_url('validator/rekanan_tervalidasi/get_kbli_siujk/') ?>">
                                                        <table class="table table-bordered table-sm" id="tbl_kbli_siujk">
                                                            <thead class="bg-info">
                                                                <tr>
                                                                    <th><small>No<small></th>
                                                                    <th><small>Kode KBLI<small></th>
                                                                    <th><small>Jenis KBLI<small></th>
                                                                    <th><small>Kualifikasi KBLI<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th><small>Nama Validator<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- aktaku -->
                                            <div class="tab-pane fade" id="nav-akta" role="tabpanel" aria-labelledby="nav-akta-tab">
                                                <div class="col">
                                                    <label for="">Akta Pendiran</label>
                                                    <table class="table table-bordered table-sm">
                                                        <thead class="bg-warning">
                                                            <tr>
                                                                <th><small>No. Surat<small></th>
                                                                <th><small>Berlaku Sampai<small></th>
                                                                <th><small>Jumlah Setor Modal<small></th>
                                                                <th><small>Kualifikasi Usaha<small></th>
                                                                <th colspan="2"><small>File Dokumen<small></th>
                                                                <th><small>Status Validasi<small></th>
                                                                <th><small>Nama Validator<small></th>
                                                                <th class="text-center"><small>More Options<small></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="load_akta_pendirian">
                                                            <!-- <tr>
                                                                <td><small>23123123123</small></td>
                                                                <td><small>Seumur Hidup</small></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-light btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-solid fa-file-pdf px-1"></i>
                                                                        Nama File .pdf
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                                        <i class="fa-solid fa-lock-open px-1"></i>
                                                                        Dekripsi File
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-square-check px-1"></i>
                                                                        <small>Validation</small>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-rectangle-xmark px-1"></i>
                                                                        <small>Not Validation</small>
                                                                    </button>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                    <label for="">Akta Perubahan</label>
                                                    <table class="table table-bordered table-sm">
                                                        <thead class="bg-info">
                                                            <tr>
                                                                <th><small>No. Surat<small></th>
                                                                <th><small>Berlaku Sampai<small></th>
                                                                <th><small>Jumlah Setor Modal<small></th>
                                                                <th><small>Kualifikasi Usaha<small></th>
                                                                <th colspan="2"><small>File Dokumen<small></th>
                                                                <th><small>Status Validasi<small></th>
                                                                <th><small>Nama Validator<small></th>
                                                                <th class="text-center"><small>More Options<small></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="load_akta_perubahan">
                                                            <!-- <tr>
                                                                <td><small>23123123123</small></td>
                                                                <td><small>Seumur Hidup</small></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-light btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-solid fa-file-pdf px-1"></i>
                                                                        Nama File .pdf
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                                        <i class="fa-solid fa-lock-open px-1"></i>
                                                                        Dekripsi File
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-square-check px-1"></i>
                                                                        <small>Validation</small>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-rectangle-xmark px-1"></i>
                                                                        <small>Not Validation</small>
                                                                    </button>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- manajerialku -->
                                            <div class="tab-pane fade" id="nav-manajerial" role="tabpanel" aria-labelledby="nav-manajerial-tab">
                                                <div class="card-body">
                                                    <div class="card border-danger shadow-sm">
                                                        <div class="card-header">
                                                            <div class="nav nav-tabs mb-3 bg-danger" id="nav-tab" role="tablist">
                                                                <input type="hidden" name="url_get_pemilik_manajerial" value="<?= base_url('validator/rekanan_tervalidasi/get_data_pemilik_manajerial/') ?>">
                                                                <input type="hidden" name="url_by_id_pemilik_manajerial" value="<?= base_url('validator/rekanan_tervalidasi/by_id_pemilik_manajerial/') ?>">
                                                                <input type="hidden" name="url_encryption_pemilik" value="<?= base_url('validator/rekanan_tervalidasi/dekrip_enkrip_pemilik/') ?>">
                                                                <button class="nav-link active" id="nav-pemilik-tab" data-bs-toggle="tab" data-bs-target="#nav-pemilik" type="button" role="tab" aria-controls="nav-pemilik" aria-selected="true">
                                                                    <small class="text-dark"><i class="fa-regular fa-file-powerpoint px-1"></i>
                                                                        <b>Pemilik Perusahaan</b>
                                                                    </small>
                                                                </button>
                                                                <input type="hidden" name="url_get_pengurus_manajerial" value="<?= base_url('validator/rekanan_tervalidasi/get_data_pengurus_manajerial/') ?>">
                                                                <input type="hidden" name="url_by_id_pengurus_manajerial" value="<?= base_url('validator/rekanan_tervalidasi/by_id_pengurus_manajerial/') ?>">
                                                                <input type="hidden" name="url_encryption_pengurus" value="<?= base_url('validator/rekanan_tervalidasi/dekrip_enkrip_pengurus/') ?>">
                                                                <button class="nav-link" id="nav-pengurus-tab" data-bs-toggle="tab" data-bs-target="#nav-pengurus" type="button" role="tab" aria-controls="nav-pengurus" aria-selected="false">
                                                                    <small class="text-dark"><i class="fa-regular fa-file-pdf px-1"></i>
                                                                        <b>Pengurus Perusahaan</b>
                                                                    </small>
                                                                </button>
                                                            </div>
                                                            <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                                                <div class="tab-pane fade active show" id="nav-pemilik" role="tabpanel" aria-labelledby="nav-pemilik-tab">
                                                                    <div class="card border-danger shadow-sm">
                                                                        <div class="card-header border-danger d-flex bd-highlight">
                                                                            <div class="flex-grow-1 bd-highlight">
                                                                                <span class="text-dark">
                                                                                    <i class="fa-solid fa-building-user"></i>
                                                                                    <small><strong>Manajerial Pemilik Usaha</strong></small>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="tbl_data_pemilik_manajerial" class="table table-sm table-bordered table-striped">
                                                                                <thead class="bg-secondary">
                                                                                    <tr>
                                                                                        <th style="width:7%;"><small class="text-white">No</small></th>
                                                                                        <th style="width:10%;"><small class="text-white">NIK/Paspor</small></th>
                                                                                        <th style="width:15%;"><small class="text-white">NPWP</small></th>
                                                                                        <th style="width:15%;"><small class="text-white">Nama</small></th>
                                                                                        <th style="width:8%;"><small class="text-white">Warganegara</small></th>
                                                                                        <th style="width:15%;"><small class="text-white">Jenis Kepemilikan</small></th>
                                                                                        <th style="width:7%;"><small class="text-white">
                                                                                                <div class="text-center">Saham %</div>
                                                                                            </small></th>
                                                                                        <th style="width:10%;"><small class="text-white">
                                                                                                <div class="text-center">Status Validasi</div>
                                                                                            </small></th>
                                                                                        <th style="width:10%;"><small class="text-white">
                                                                                                <div class="text-center">Nama Validator</div>
                                                                                            </small></th>
                                                                                        <th style="width:18%;"><small class="text-white">
                                                                                                <div class="text-center">More Options</div>
                                                                                            </small></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="nav-pengurus" role="tabpanel" aria-labelledby="nav-pengurus-tab">
                                                                    <div class="card border-danger shadow-sm">
                                                                        <div class="card-header border-danger d-flex bd-highlight">
                                                                            <div class="p-1 flex-grow-1 bd-highlight">
                                                                                <span class="text-dark">
                                                                                    <i class="fa-solid fa-building-user"></i>
                                                                                    <small><strong>Manajerial Pengurus Usaha</strong></small>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="tbl_data_pengurus_manajerial" class="table table-sm table-bordered table-striped">
                                                                                <thead class="bg-secondary">
                                                                                    <tr class="shadow-lg">
                                                                                        <th style="width:5%;"><small class="text-white">No</small></th>
                                                                                        <th style="width:5%;"><small class="text-white">NIK/Paspor</small></th>
                                                                                        <th style="width:7%;"><small class="text-white">NPWP</small></th>
                                                                                        <th style="width:25%;"><small class="text-white">Nama</small></th>
                                                                                        <th style="width:8%;"><small class="text-white">Warganegara</small></th>
                                                                                        <th style="width:10%;"><small class="text-white">
                                                                                                <div class="text-left">Jabatan</div>
                                                                                            </small></th>
                                                                                        <th style="width:7%;"><small class="text-white">
                                                                                                <div class="text-left">Sejak</div>
                                                                                            </small></th>
                                                                                        <th style="width:7%;"><small class="text-white">
                                                                                                <div class="text-left">Sampai</div>
                                                                                            </small></th>
                                                                                        <th style="width:10%;"><small class="text-white">
                                                                                                <div class="text-center">Status Validasi</div>
                                                                                            </small></th>
                                                                                        <th style="width:10%;"><small class="text-white">
                                                                                                <div class="text-center">Nama Validator</div>
                                                                                            </small></th>
                                                                                        <th style="width:18%;"><small class="text-white">
                                                                                                <div class="text-center">More Options</div>
                                                                                            </small></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- pengalamanku -->
                                            <div class="tab-pane fade" id="nav-pengalaman" role="tabpanel" aria-labelledby="nav-pengalaman-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="url_get_pengalaman" value="<?= base_url('validator/rekanan_tervalidasi/get_data_pengalaman/') ?>">
                                                        <input type="hidden" name="url_by_id_pengalaman" value="<?= base_url('validator/rekanan_tervalidasi/by_id_pengalaman/') ?>">
                                                        <input type="hidden" name="url_encryption_pengalaman" value="<?= base_url('validator/rekanan_tervalidasi/dekrip_enkrip_pengalaman/') ?>">
                                                        <table style="font-size: 13px;" id="tbl_pengalaman" class="table table-sm table-bordered table-striped">
                                                            <thead class="bg-danger">
                                                                <tr>
                                                                    <th class="text-white">No</th>
                                                                    <th style="width:8%;"><small class="text-white">No. Kontrak</small></th>
                                                                    <th style="width:8%;"><small class="text-white">Tgl. Kontrak</small></th>
                                                                    <th style="width:23%;"><small class="text-white">Nama Pekerjaan</small></th>
                                                                    <th style="width:9%;"><small class="text-white">Nilai (Rp.)</small></th>
                                                                    <th style="width:9%;"><small class="text-white">Jenis Tender</small></th>
                                                                    <th style="width:10%;"><small class="text-white">Instansi</small></th>
                                                                    <th style="width:10%;"><small class="text-white">Lokasi</small></th>
                                                                    <th style="width:8%;"><small class="text-white">
                                                                            <div class="text-center">Status Validasi</div>
                                                                        </small></th>
                                                                    <th style="width:8%;"><small class="text-white">
                                                                            <div class="text-center">Nama Validator</div>
                                                                        </small></th>
                                                                    <th style="width:15%;"><small class="text-white">
                                                                            <div class="text-center">More Options</div>
                                                                        </small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- pajakku -->
                                            <div class="tab-pane fade" id="nav-pajak" role="tabpanel" aria-labelledby="nav-pajak-tab">
                                                <div class="card-header">
                                                    <div class="nav nav-tabs mb-3 bg-danger" id="nav-tab" role="tablist">
                                                        <input type="hidden" name="url_download_sppkp" value="<?= base_url('validator/rekanan_tervalidasi/url_download_sppkp/') ?>">
                                                        <button class="nav-link active" id="nav-sppkp-tab" data-bs-toggle="tab" data-bs-target="#nav-sppkp" type="button" role="tab" aria-controls="nav-sppkp" aria-selected="true">
                                                            <span class="text-dark">
                                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                                <small><b>SPPKP</b></small>
                                                            </span>
                                                        </button>

                                                        <input type="hidden" name="url_download_npwp" value="<?= base_url('validator/rekanan_tervalidasi/url_download_npwp/') ?>">
                                                        <button class="nav-link" id="nav-npwp-tab" data-bs-toggle="tab" data-bs-target="#nav-npwp" type="button" role="tab" aria-controls="nav-npwp" aria-selected="false">
                                                            <span class="text-dark">
                                                                <i class="fa-regular fa-file-word"></i>
                                                                <small><b>NPWP</b></small>
                                                            </span>
                                                        </button>

                                                        <input type="hidden" name="url_get_spt" value="<?= base_url('validator/rekanan_tervalidasi/get_data_spt/') ?>">
                                                        <input type="hidden" name="url_by_id_spt" value="<?= base_url('validator/rekanan_tervalidasi/by_id_spt/') ?>">
                                                        <button class="nav-link" id="nav-spt-tab" data-bs-toggle="tab" data-bs-target="#nav-spt" type="button" role="tab" aria-controls="nav-spt" aria-selected="false">
                                                            <span class="text-dark">
                                                                <i class="fa-regular fa-file-word"></i>
                                                                <small><b>SPT</b></small>
                                                            </span>
                                                        </button>
                                                        <input type="hidden" name="url_get_neraca" value="<?= base_url('validator/rekanan_tervalidasi/get_data_neraca/') ?>">
                                                        <input type="hidden" name="url_by_id_neraca" value="<?= base_url('validator/rekanan_tervalidasi/by_id_neraca/') ?>">
                                                        <button class="nav-link" id="nav-neraca-tab" data-bs-toggle="tab" data-bs-target="#nav-neraca" type="button" role="tab" aria-controls="nav-neraca" aria-selected="false">
                                                            <span class="text-dark">
                                                                <i class="fa-regular fa-file-word"></i>
                                                                <small><b>Neraca Keuangan</b></small>
                                                            </span>
                                                        </button>
                                                        <input type="hidden" name="url_get_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/get_data_keuangan/') ?>">
                                                        <input type="hidden" name="url_by_id_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/by_id_keuangan/') ?>">
                                                        <button class="nav-link" id="nav-keuangan-tab" data-bs-toggle="tab" data-bs-target="#nav-keuangan" type="button" role="tab" aria-controls="nav-keuangan" aria-selected="false">
                                                            <span class="text-dark">
                                                                <i class="fa-regular fa-file-word"></i>
                                                                <small><b>Laporan Keuangan</b></small>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                                        <div class="tab-pane fade active show" id="nav-sppkp" role="tabpanel" aria-labelledby="nav-sppkp-tab">
                                                            <div class="card border-dark shadow-sm">
                                                                <div class="card-header border-dark d-flex bd-highlight">
                                                                    <div class="flex-grow-1 bd-highlight">
                                                                        <span class="text-dark">
                                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                                            <small><strong>Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)</strong></small>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">

                                                                    <table class="table table-sm table-bordered table-striped">
                                                                        <thead class="bg-dark text-white">
                                                                            <tr>
                                                                                <th><small>No. Surat<small></th>
                                                                                <th><small>Berlaku Sampai<small></th>
                                                                                <th colspan="2"><small>File Dokumen<small></th>
                                                                                <th><small>Status Validasi<small></th>
                                                                                <th><small>Nama Validator<small></th>
                                                                                <th class="text-center"><small>More Options<small></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="load_sppkp">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-npwp" role="tabpanel" aria-labelledby="nav-npwp-tab">
                                                            <div class="card border-dark shadow-sm">
                                                                <div class="card-header border-dark d-flex bd-highlight">
                                                                    <div class="flex-grow-1 bd-highlight">
                                                                        <span class="text-dark">
                                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                                            <small><strong>Nomor Pokok Wajib Pajak (NPWP)</strong></small>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">

                                                                    <table class="table table-sm table-bordered table-striped">
                                                                        <thead class="bg-dark text-white">
                                                                            <tr>
                                                                                <th><small>No. Surat<small></th>
                                                                                <th><small>Berlaku Sampai<small></th>
                                                                                <th colspan="2"><small>File Dokumen<small></th>
                                                                                <th><small>Status Validasi<small></th>
                                                                                <th><small>Nama Validator<small></th>
                                                                                <th class="text-center"><small>More Options<small></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="load_npwp">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-spt" role="tabpanel" aria-labelledby="nav-spt-tab">
                                                            <div class="card border-dark shadow-sm">
                                                                <div class="card-header border-dark d-flex bd-highlight">
                                                                    <div class="p-1 flex-grow-1 bd-highlight">
                                                                        <span class="text-dark">
                                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                                            <small><strong>Surat Pemberitahuan Tahunan (SPT)</strong></small>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="get_spt" value="<?= base_url('validator/rekanan_tervalidasi/get_data_spt/') ?>">
                                                                    <input type="hidden" name="url_get_spt_by_id" value="<?= base_url('validator/rekanan_tervalidasi/get_spt_by_id/') ?>">
                                                                    <table id="tbl_spt" class="table table-sm table-bordered table-striped">
                                                                        <thead class="bg-dark">
                                                                            <tr class="shadow-lg">
                                                                                <th style="width:5%;"><small class="text-white">No</small></th>
                                                                                <th style="width:10%;"><small class="text-white">Nomor TTE/SPT</small></th>
                                                                                <th style="width:10%;"><small class="text-white">Tahun SPT</small></th>
                                                                                <th style="width:10%;"><small class="text-white">Jenis SPT</small></th>
                                                                                <th style="width:10%;"><small class="text-white">Tgl. Penyampaian</small></th>
                                                                                <th style="width:15%;"><small class="text-white">
                                                                                        <div class="text-center">File SPT</div>
                                                                                    </small></th>
                                                                                <th style="width:15%;"><small class="text-white">
                                                                                        <div class="text-center">Enkrip/Dekrip File</div>
                                                                                    </small></th>
                                                                                <th style="width:10%;"><small class="text-white">
                                                                                        <div class="text-center">Status Validasi</div>
                                                                                    </small>

                                                                                </th>
                                                                                <th style="width:10%;"><small class="text-white">
                                                                                        <div class="text-center">Nama Validator</div>
                                                                                    </small>

                                                                                </th>
                                                                                <th style="width:20%;"><small class="text-white">
                                                                                        <div class="text-center">More Options</div>
                                                                                    </small>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-keuangan" role="tabpanel" aria-labelledby="nav-keuangan-tab">
                                                            <div class="card border-dark shadow-sm">
                                                                <div class="card-header border-dark d-flex bd-highlight">
                                                                    <div class="p-1 flex-grow-1 bd-highlight">
                                                                        <span class="text-dark">
                                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                                            <small><strong>Laporan Keuangan</strong></small>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="get_keuangan" value="<?= base_url('validator/rekanan_tervalidasi/get_keuangan/') ?>">
                                                                    <input type="hidden" name="url_get_keuangan_by_id" value="<?= base_url('validator/rekanan_tervalidasi/get_keuangan_by_id/') ?>">
                                                                    <div style="overflow-x:auto">
                                                                        <table id="tbl_keuangan" class="table table-sm table-bordered table-striped">
                                                                            <thead class="bg-dark">
                                                                                <tr class="shadow-lg">
                                                                                    <th style="width:5%;"><small class="text-white">No</small></th>
                                                                                    <th style="width:10%;"><small class="text-white">Tahun Laporan</small></th>

                                                                                    <th style="width:10%;"><small class="text-white">
                                                                                            <div class="text-center">File Auditor</div>
                                                                                        </small>
                                                                                    </th>
                                                                                    <th style="width:10%;"><small class="text-white">
                                                                                            <div class="text-center">File Keuangan</div>
                                                                                        </small>
                                                                                    </th>
                                                                                    <th style="width:10%;"><small class="text-white">
                                                                                            <div class="text-center">Jenis Audit</div>
                                                                                        </small>
                                                                                    </th>
                                                                                    <th style="width:15%;"><small class="text-white">
                                                                                            <div class="text-center">Enkrip/Dekrip File</div>
                                                                                        </small></th>
                                                                                    <th style="width:10%;"><small class="text-white">
                                                                                            <div class="text-center">Status Validasi</div>
                                                                                        </small>
                                                                                    </th>
                                                                                    <th style="width:10%;"><small class="text-white">
                                                                                            <div class="text-center">Nama Validator</div>
                                                                                        </small>
                                                                                    </th>
                                                                                    <th style="width:20%;"><small class="text-white">
                                                                                            <div class="text-center">More Options</div>
                                                                                        </small>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-neraca" role="tabpanel" aria-labelledby="nav-neraca-tab">
                                                            <div class="card border-dark shadow-sm">
                                                                <div class="card-header border-dark d-flex bd-highlight">
                                                                    <div class="p-1 flex-grow-1 bd-highlight">
                                                                        <span class="text-dark">
                                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                                            <small><strong>Form Pajak - Neraca Keuangan</strong></small>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <div class="card-body">
                                                                    <input type="hidden" name="get_neraca" value="<?= base_url('validator/rekanan_tervalidasi/get_data_neraca/') ?>">
                                                                    <input type="hidden" name="url_get_neraca_by_id" value="<?= base_url('validator/rekanan_tervalidasi/get_neraca_by_id/') ?>">
                                                                    <table id="tbl_neraca" class="table table-sm table-bordered table-striped">
                                                                        <thead class="bg-dark">
                                                                            <tr class="shadow-lg">
                                                                                <th style="width:5%;" class="text-white">No</th>
                                                                                <!-- <th style="width:10%;"><small class="text-white">Tanggal Laporan</small></th>
                                                                                <th style="width:20%;"><small class="text-white">Nama Akuntan Publik</small></th> -->
                                                                                <th style="width:5%;"><small class="text-white">File Neraca Keuangan</small></th>
                                                                                <!-- <th style="width:5%;"><small class="text-white">File Sertifikat</small></th> -->
                                                                                <th style="width:15%;"><small class="text-white">
                                                                                        <div class="text-center">Enkrip/Dekrip File</div>
                                                                                    </small></th>
                                                                                <th style="width:10%;"><small class="text-white">
                                                                                        <div class="text-center">Status Validasi</div>
                                                                                    </small></th>
                                                                                <th style="width:10%;"><small class="text-white">
                                                                                        <div class="text-center">Nama Validator</div>
                                                                                    </small>
                                                                                </th>
                                                                                <th style="width:10%;"><small class="text-white">
                                                                                        <div class="text-center">More Options</div>
                                                                                    </small></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
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
</main>

<?php $this->load->view('validator/data_rekanan/modal'); ?>