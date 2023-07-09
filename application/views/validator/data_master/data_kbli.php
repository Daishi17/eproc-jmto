<main class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - Klasifikasi Baku Lapangan Usaha Indonesia (KBLI)</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <a href="javascript:;" class="btn btn-primary btn-sm shadow-lg" onclick="byid('', 'add')">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Create Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="url_get_nib" value="<?= base_url('validator/data_kbli/get_data_kbli') ?>">
                    <input type="hidden" name="url_get_row" value="<?= base_url('validator/data_kbli/get_row_data/') ?>">
                    <input type="hidden" name="url_post" value="<?= base_url('validator/data_kbli/post_data') ?> ">
                    <input type="hidden" name="url_aktifkan_kbli" value="<?= base_url('validator/data_kbli/aktifkan_kbli') ?> ">
                    <input type="hidden" name="url_nonaktifkan_kbli" value="<?= base_url('validator/data_kbli/nonaktifkan_kbli') ?> ">
                    <table id="example1" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">No</small></th>
                                <th style="width:10%;"><small class="text-white">Kode KBLI</small></th>
                                <th style="width:35%;"><small class="text-white">Jenis KBLI</small></th>
                                <th style="width:15%;"><small class="text-white">Status Data</small></th>
                                <th style="width:20%;"><small class="text-white">
                                        <div class="text-center">Aksi</div>
                                    </small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td><small>62019</small></td>
                                <td><small>Aktivitas Pemrograman Komputer Lainnya</small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-tambah">
                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                            <small><b>View</b></small>
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
    <div class="modal fade" tabindex="-1" id="modal-xl-tambah">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="card border-dark shadow-lg">
                            <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1 bd-highlight">
                                    <span class="text-dark">
                                        <i class="fa-regular fa-rectangle-list px-1"></i>
                                        <small><strong>Form Data - Klasifikasi Baku Lapangan Usaha Indonesia (KBLI)</strong></small>
                                    </span>
                                </div>
                                <div class="bd-highlight">
                                    <!-- <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                        Edit Data
                                    </button> -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form id="form_kbli">
                                        <input type="hidden" name="id_kbli">
                                        <input type="hidden" name="type" value="add">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                <input type="text" class="form-control" name="kode_kbli" placeholder="Kode KBLI">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                <textarea name="nama_kbli" class="form-control" name="nama_kbli" placeholder="Nama/Jenis KBLI"></textarea>
                                                <!-- <input type="text" class="form-control" placeholder="Jenis KBLI"> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-5 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success btn-sm shadow-lg">
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Save Data
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</main>