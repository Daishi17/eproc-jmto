<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark swatch-purple d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - Data Rekanan Terundang (DRT)</strong></small>
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
                                                    <option selected>Filter Status Revisi Dokumen</option>
                                                    <option value="all">All</option>
                                                    <option value="valid">Dokumen Tervalidasi</option>
                                                    <option value="revisi">Revisi Dokumen</option>
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
                    <table id="example1" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary shadow-lg">
                            <tr>
                                <th style="width:20%;"><small class="text-white">Nama Rekanan</small></th>
                                <th style="width:18%;"><small class="text-white">Jenis Usaha</small></th>
                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                <th style="width:15%;"><small class="text-white">Status Rekanan</small></th>
                                <th style="width:15%;"><small class="text-white">Status Revisi Dokumen</small></th>
                                <th style="width:22%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>Kreatif Intelegensi Teknologi</small></td>
                                <td><small>Jasa lainnya, Jasa Konsultasi, Jasa Pengadaan Barang</small></td>
                                <td><small>Menengah - (M1)</small></td>
                                <td><small><span class="badge bg-primary text-white">Rekanan Terundang</span></small></td>
                                <td><small><span class="badge bg-warning text-dark">Revisi Dokumen</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-warning btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-view">
                                            <i class="fa-solid fa-share-from-square px-1"></i>
                                            <small>Check</small>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                            <i class="fa-solid fa-envelope px-1"></i>
                                            <small>Message</small>
                                        </button>
                                        <button type="button" class="btn btn-dark btn-sm shadow-lg">
                                            <i class="fa-solid fa-ban px-1"></i>
                                            <small>Black List</small>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>