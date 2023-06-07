<div class="content-wrapper">
    <div class="content text-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0">
                            <strong>
                                <i class="fas fa-barcode mr-2"></i>
                                Daftar Data Kode SBU
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
                                            Tabel Data Daftar Kode SBU
                                        </h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-xl-tambahsbu">
                                                <i class="fas fa-plus-circle mr-2"></i>
                                                Create Data
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-sm table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 90px">Kode SBU</th>
                                                    <th style="width: 250px">Jenis SBU</th>
                                                    <th>Keterangan SBU</th>
                                                    <th class="text-center" style="width: 140px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BG001</td>
                                                    <td>Jasa Pelaksana Konstruksi Bangunan Hunian Tunggal dan Kopel</td>
                                                    <td>
                                                        Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, serta peningkatan)
                                                        dari bangunan perumahan yang terdiri dari satu atau dua tempat tinggal maksimum 2 lantai.
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-xl-editsbu">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>BG002</td>
                                                    <td>Jasa Pelaksana konstruksi Bangunan Multi atau Banyak Hunian</td>
                                                    <td>
                                                        Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan serta peningkatan) dari bangunan perumahan bertingkat tinggi yang lebih dari 2 lantai.
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>EL001</td>
                                                    <td>Jasa Pelaksana Konstruksi Instalasi Pembangkit Tenaga Listrik Semua Daya</td>
                                                    <td>
                                                        Pekerjaan pemasangan dan perawatan elektromekanik dan kelistrikan pembangkit tenaga listrik semua daya.
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </duv>
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
<div class="modal fade" id="modal-xl-tambahsbu">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5> <img src="<?php echo base_url(); ?>assets/frontend/dist/img/jm1.png" class="brand-image img-circle elevation-3">
                    <span class="text-primary">
                        <strong>Jasamarga Tollroad Operator</strong>
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fab fa-wpforms mr-2"></i>
                                    Form Tambah Data SBU
                                </h5>
                            </div>
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-1 col-form-label">
                                            Kode
                                        </label>
                                        <div class="col-sm-2">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                </div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 col-form-label">
                                            Jenis
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sitemap"></i></span>
                                                </div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 col-form-label">
                                            Keterangan
                                        </label>
                                        <div class="col-sm-11">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-stream"></i></span>
                                                </div>
                                                <textarea class="form-control" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <i class="fas fa-save mr-2"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <i class="fas fa-window-close mr-2"></i>
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modal-xl-editsbu">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5> <img src="<?php echo base_url(); ?>assets/frontend/dist/img/jm1.png" class="brand-image img-circle elevation-3">
                    <span class="text-primary">
                        <strong>Jasamarga Tollroad Operator</strong>
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fab fa-wpforms mr-2"></i>
                                    Form Edit Data SBU
                                </h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Changes
                                    </button>
                                </div>
                            </div>
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-1 col-form-label">
                                            Kode
                                        </label>
                                        <div class="col-sm-2">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="BG001" disabled>
                                            </div>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 col-form-label">
                                            Jenis
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sitemap"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Jasa Pelaksana Konstruksi Bangunan Hunian Tunggal dan Kopel" disabled>
                                            </div>
                                        </div>
                                        <label for="inputEmail3" class="col-sm-1 col-form-label">
                                            Keterangan
                                        </label>
                                        <div class="col-sm-11">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-stream"></i></span>
                                                </div>
                                                <textarea class="form-control" rows="2" placeholder="Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, serta peningkatan) dari bangunan perumahan yang terdiri dari satu atau dua tempat tinggal maksimum 2 lantai." disabled></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <i class="fas fa-save mr-2"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <i class="fas fa-window-close mr-2"></i>
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>