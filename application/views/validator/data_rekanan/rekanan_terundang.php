<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark swatch-purple d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-solid fa-table px-1"></i>
                            <small> <strong>Data Tabel - Data Rekanan Terundang (DRT)</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-sm-6">
                        <div class="card border-dark shadow-lg">
                            <div class="card-body">
                                <from>
                                    <div class="row g-1">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Filter Dokumen Upload</option>
                                                    <option value="all">All</option>
                                                    <option value="sudah">Sudah Upload</option>
                                                    <option value="belum">Belum Upload</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Filter Dokumen Cek</option>
                                                    <option value="all">All</option>
                                                    <option value="belum">Belum terundang</option>
                                                    <option value="valid">Dokumen terundang</option>
                                                    <option value="tidak">Dokumen Tidak Valid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-primary btn-sm shadow-lg">
                                                <i class="fa-solid fa-list px-1"></i>
                                                <small>Filtering</small>
                                            </button>
                                        </div>
                                    </div>
                                </from>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="url_get_rekanan_terundang" value="<?= base_url('validator/rekanan_terundang/get_rekanan_terundang') ?>">
                    <input type="hidden" name="url_get_rekanan_terundang_by_id" value="<?= base_url('validator/rekanan_terundang/get_id_rekanan_terundang/') ?>">
                    <input type="hidden" name="url_terima_rekanan_terundang" value="<?= base_url('validator/rekanan_terundang/terima') ?>">
                    <table id="tbl_rekanan_terundang" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary shadow-lg">
                            <tr>
                                <th style="width:5%;"><small class="text-white">No</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Rekanan</small></th>
                                <th style="width:18%;"><small class="text-white">Jenis Usaha</small></th>
                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                <th style="width:15%;"><small class="text-white">Status Rekanan</small></th>
                                <th style="width:15%;"><small class="text-white">Status Dokumen </small></th>
                                <th style="width:22%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td><small>Kreatif Intelegensi Teknologi</small></td>
                                <td><small>Jasa lainnya, Jasa Konsultasi, Jasa Pengadaan Barang</small></td>
                                <td><small>Menengah - (M1)</small></td>
                                <td><small><span class="badge bg-warning text-dark">Belum Upload Dokumen</span></small></td>
                                <td><small><span class="badge swatch-orange text-dark">Belum Upload</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-warning btn-sm shadow-lg" href="<?= base_url() ?>validator/cek_dokumen" role="button">
                                            <i class="fa-solid fa-share-from-square px-1"></i>
                                            Check
                                        </a>
                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                            <i class="fa-solid fa-envelope px-1"></i>
                                            <small>Message</small>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
                                            <i class="fa-solid fa-paper-plane px-1"></i>
                                            <small>Invited</small>
                                        </button>

                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>