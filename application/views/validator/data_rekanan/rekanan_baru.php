<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - Data Rekanan Terbaru (DRT)</strong></small>
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
                                                    <option selected>Filter Jenis Usaha</option>
                                                    <option value="all">All</option>
                                                    <option value="lainnya">Jasa Lainnya</option>
                                                    <option value="lainnya">Jasa Konsultasi</option>
                                                    <option value="lainnya">Jasa Konstruksi</option>
                                                    <option value="lainnya">Jasa Pengadaan Barang</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Filter Bentuk Usaha</option>
                                                    <option value="all">All</option>
                                                    <option value="pt">Perseroan Terbatas (PT)</option>
                                                    <option value="cv">Commanditaire Vennootschap (CV)</option>
                                                    <option value="firma">Firma</option>
                                                    <option value="individu">Perorangan</option>
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
                    <input type="hidden" name="url_get_rekanan_baru" value="<?= base_url('validator/rekanan_baru/get_rekanan_baru') ?>">
                    <input type="hidden" name="url_get_rekanan_baru_by_id" value="<?= base_url('validator/rekanan_baru/get_id_rekanan_baru/') ?>">
                    <input type="hidden" name="url_terima_rekanan_baru" value="<?= base_url('validator/rekanan_baru/terima') ?>">
                    <table id="tbl_rekanan_baru" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th><small class="text-white">No</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Rekanan</small></th>
                                <th style="width:20%;"><small class="text-white">Jenis Usaha</small></th>
                                <th style="width:20%;"><small class="text-white">Bentuk Usaha</small></th>
                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                <th style="width:10%;"><small class="text-white">Tgl. Daftar</small></th>
                                <th style="width:20%;"><small class="text-white">
                                        <div class="text-center">Aksi</div>
                                    </small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td><small>1</small></td>
                                <td><small>Kreatif Intelegensi Teknologi</small></td>
                                <td><small>Jasa lainnya, Jasa Konsultasi, Jasa Pengadaan Barang</small></td>
                                <td><small>Perseroan Terbatas (PT)</small></td>
                                <td><small>Menengah - (M1)</small></td>
                                <td><small>01/07/2023</small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-view">
                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                            <small>View</small>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                            <i class="fa-solid fa-square-check px-1"></i>
                                            <small>Accepted</small>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                            <i class="fa-solid fa-trash-can px-1"></i>
                                            <small>Delete</small>
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

    <div class="modal fade" tabindex="-1" id="modal-xl-view">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="card border-dark shadow-lg">
                                <div class="card-header border-dark bg-danger d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-dark">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>View Data - Identitas Perusahaan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-bordered table-sm">
                                                <input type="hidden" name="id_vendor">
                                                <input type="hidden" name="nama_usaha">
                                                <tr>
                                                    <th class="bg-light"><small>Nama Perusahaan / Perorangan</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-city px-1"></i>
                                                            <label for="" id="nama_usaha"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>Jenis Usaha</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-industry px-1"></i>
                                                            <label for="" id="id_jenis_usaha"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>Kualifikasi Usaha</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-square-poll-vertical fa-lg px-1"></i>
                                                            <label for="" id="kualifikasi_usaha"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>NPWP</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-address-card px-1"></i>
                                                            <label for="" id="npwp"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>Email</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-envelope fa-lg px-1"></i>
                                                            <label for="" id="email"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>Bentuk Usaha</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-tags fa-lg px-1"></i>
                                                            <label for="" id="bentuk_usaha"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>Alamat</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-road px-1"></i>
                                                            <label for="" id="alamat"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light"><small>Provinsi</small></th>
                                                    <td>
                                                        <small>
                                                            <i class="fa-solid fa-landmark px-1"></i>
                                                            <label for="" id="nama_provinsi"></label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light" colspan="2">
                                                        <button type="button" onclick="Question_terima_modal()" class="btn btn-success btn-sm shadow-lg">
                                                            <i class="fa-solid fa-square-check px-1"></i>
                                                            <small>Terima</small>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                            <i class="fa-solid fa-trash-can px-1"></i>
                                                            <small>Tolak</small>
                                                        </button>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>