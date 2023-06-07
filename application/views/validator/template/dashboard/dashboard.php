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
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-danger">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-tv mr-2"></i>
                                            Info Grafis Rekanan
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box shadow-lg">
                                                    <span class="info-box-icon bg-danger"><i class="fas fa-user-plus"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">
                                                            <b>Daftar Rekanan Baru</b>
                                                        </span>
                                                        <span class="info-box-number text-danger">
                                                            <h5>
                                                                <b>100</b>
                                                            </h5>
                                                        </span>
                                                        <a href="<?= base_url() ?>validator/rekanan_baru" class="info-box-footer">
                                                            Informasi Lebih Lanjut
                                                            <i class="fas fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box shadow-lg">
                                                    <span class="info-box-icon bg-success"><i class="fas fa-user-shield"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">
                                                            <b>Data Status Rekanan Tervalidasi</b>
                                                        </span>
                                                        <span class="info-box-number text-success">
                                                            <h5>
                                                                <b>30</b>
                                                            </h5>
                                                        </span>
                                                        <a href="<?= base_url() ?>validator/rekanan_blm_validasi" class="info-box-footer">
                                                            Informasi Lebih Lanjut
                                                            <i class="fas fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box shadow-lg">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-user-check"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">
                                                            <b>Data Rekanan Terudang</b>
                                                        </span>
                                                        <span class="info-box-number text-primary">
                                                            <h5>
                                                                <b>240</b>
                                                            </h5>
                                                        </span>
                                                        <a href="<?= base_url() ?>validator/rekanan_terundang" class="info-box-footer">
                                                            Informasi Lebih Lanjut
                                                            <i class="fas fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box shadow-lg">
                                                    <span class="info-box-icon bg-secondary"><i class="fas fa-user-times"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">
                                                            <b>Daftar Hitam Rekanan</b>
                                                        </span>
                                                        <span class="info-box-number text-secondary">
                                                            <h5>
                                                                <b>2</b>
                                                            </h5>
                                                        </span>
                                                        <a href="#" class="info-box-footer">
                                                            Informasi Lebih Lanjut
                                                            <i class="fas fa-arrow-circle-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-navy">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            <i class="fas fa-signal mr-2"></i>
                                            Info Grafik Rekanan
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card card-danger">
                                                    <div class="card-header">
                                                        <h5 class="card-title">
                                                            <i class="fas fa-chart-area mr-2"></i>
                                                            Info Grafik Rekanan Baru
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart">
                                                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h5 class="card-title">
                                                            <i class="fas fa-chart-line mr-2"></i>
                                                            Info Grafik Rekanan Terundang
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart">
                                                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
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