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

                                            <input type="hidden" name="url_get_vendor" value="<?= base_url('validator/rekanan_tervalidasi/get_dokumen_vendor/') ?>">
                                            <input type="hidden" name="url_download_nib" value="<?= base_url('validator/rekanan_tervalidasi/url_download_nib/') ?>">
                                            <button class="nav-link" id="nav-nib-tab" data-bs-toggle="tab" data-bs-target="#nav-nib" type="button" role="tab" aria-controls="nav-nib" aria-selected="false">
                                                <i class="fa-regular fa-file-word"></i>
                                                <small><b>NIB/TDP</b></small>
                                            </button>

                                            <input type="hidden" name="url_get_vendor" value="<?= base_url('validator/rekanan_tervalidasi/get_dokumen_vendor/') ?>">
                                            <input type="hidden" name="url_download_sbu" value="<?= base_url('validator/rekanan_tervalidasi/url_download_sbu/') ?>">
                                            <button class="nav-link" id="nav-sbu-tab" data-bs-toggle="tab" data-bs-target="#nav-sbu" type="button" role="tab" aria-controls="nav-sbu" aria-selected="false">
                                                <i class="fa-regular fa-file-excel"></i>
                                                <small><b>SBU</b></small>
                                            </button>
                                            <button class="nav-link" id="nav-siujk-tab" data-bs-toggle="tab" data-bs-target="#nav-siujk" type="button" role="tab" aria-controls="nav-siujk" aria-selected="false">
                                                <i class="fa-regular fa-file-pdf"></i>
                                                <small><b>SIUJK</b></small>
                                            </button>
                                            <button class="nav-link" id="nav-akta-tab" data-bs-toggle="tab" data-bs-target="#nav-akta" type="button" role="tab" aria-controls="nav-akta" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Akta</b></small>
                                            </button>
                                            <button class="nav-link" id="nav-manajerial-tab" data-bs-toggle="tab" data-bs-target="#nav-manajerial" type="button" role="tab" aria-controls="nav-manajerial" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Manajerial</b></small>
                                            </button>
                                            <button class="nav-link" id="nav-pengalaman-tab" data-bs-toggle="tab" data-bs-target="#nav-pengalaman" type="button" role="tab" aria-controls="nav-pengalaman" aria-selected="true">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>Pengalaman</b></small>
                                            </button>
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
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

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
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-akta" role="tabpanel" aria-labelledby="nav-akta-tab">
                                                <div class="col">
                                                    <table class="table table-bordered table-sm">
                                                        <thead class="bg-info">
                                                            <tr>
                                                                <th><small>No. Surat<small></th>
                                                                <th><small>Berlaku Sampai<small></th>
                                                                <th colspan="2"><small>File Dokumen<small></th>
                                                                <th><small>Status Validasi<small></th>
                                                                <th class="text-center"><small>More Options<small></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
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
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-manajerial" role="tabpanel" aria-labelledby="nav-manajerial-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bg-danger">
                                                                <tr>
                                                                    <th><small>No. Surat<small></th>
                                                                    <th><small>Berlaku Sampai<small></th>
                                                                    <th colspan="2"><small>File Dokumen<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
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
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-pengalaman" role="tabpanel" aria-labelledby="nav-pengalaman-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <table id="example1" class="table table-sm table-bordered table-striped">
                                                            <thead class="bg-secondary">
                                                                <tr>
                                                                    <th style="width:8%;"><small class="text-white">No. Kontrak</small></th>
                                                                    <th style="width:8%;"><small class="text-white">Tanggal</small></th>
                                                                    <th style="width:14%;"><small class="text-white">Nama Pekerjaan</small></th>
                                                                    <th style="width:8%;"><small class="text-white">Nilai (Rp.)</small></th>
                                                                    <th style="width:10%;"><small class="text-white">Instansi</small></th>
                                                                    <th style="width:12%;"><small class="text-white">File Dok.</small></th>
                                                                    <th style="width:8%;"><small class="text-white">
                                                                            <div class="text-center">Status</div>
                                                                        </small></th>
                                                                    <th style="width:12%;"><small class="text-white">
                                                                            <div class="text-center">More Options</div>
                                                                        </small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><small>1234567890123456</small></td>
                                                                    <td><small>14/08/2022</small></td>
                                                                    <td><small>Pekerjaan Sewa Kendaraan Operasional Kantor Pusat 1, periode ke-2</small></td>
                                                                    <td><small>
                                                                            <div class="text-end">20.000.000.000</div>
                                                                        </small></td>
                                                                    <td><small>Kementrian BUMN</small></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-light btn-sm text-start col-sm-12 shadow-lg">
                                                                            <i class="fa-solid fa-file-pdf px-1"></i>
                                                                            Nama File .pdf
                                                                        </button>
                                                                        <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                                            <i class="fa-solid fa-lock-open px-1"></i>
                                                                            Dekripsi File
                                                                        </button>
                                                                    </td>
                                                                    <td><small>
                                                                            <div class="text-center">
                                                                                <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                            </div>
                                                                        </small>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-square-check px-1"></i>
                                                                            <small>Valid</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-rectangle-xmark px-1"></i>
                                                                            <small>Not Valid</small>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-pajak" role="tabpanel" aria-labelledby="nav-pajak-tab">
                                                <div class="row">
                                                    <div class="col">
                                                        <table class="table table-bordered table-sm">
                                                            <thead class="bg-danger">
                                                                <tr>
                                                                    <th><small>Jenis Dok.<small></th>
                                                                    <th><small>No. Surat/TTE<small></th>
                                                                    <th><small>Tahun / Periode<small></th>
                                                                    <th colspan="2"><small>File Dokumen<small></th>
                                                                    <th><small>Status Validasi<small></th>
                                                                    <th class="text-center"><small>More Options<small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><small>SPPKP</small></td>
                                                                    <td><small>23123123123</small></td>
                                                                    <td><small>2022 / Seumur Hidup</small></td>
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
                                                                </tr>
                                                                <tr>
                                                                    <td><small>NPWP</small></td>
                                                                    <td><small>23123123123</small></td>
                                                                    <td><small>2022 / Seumur Hidup</small></td>
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
                                                                </tr>
                                                                <tr>
                                                                    <td><small>SPT</small></td>
                                                                    <td><small>23123123123</small></td>
                                                                    <td><small>2022 / Seumur Hidup</small></td>
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
                                                                </tr>
                                                                <tr>
                                                                    <td><small>Neraca Keu.</small></td>
                                                                    <td><small>23123123123</small></td>
                                                                    <td><small>2022 / Seumur Hidup</small></td>
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
                                                                </tr>
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
</main>

<?php $this->load->view('validator/data_rekanan/modal'); ?>