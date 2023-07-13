<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bd-red-700">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-gauge-high px-1"></i>
                            <small><strong>Dashboard Validator</strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-light border-dark">
                            <strong class="text-primary">
                                <i class="fa-solid fa-shapes px-1"></i>
                                Info Grafis
                            </strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="card shadow-lg" style="width: 18rem;">
                                        <div class="card-body swatch-cyan">
                                            <div class="text-start">
                                                <i class="fa-solid fa-users-rectangle fa-beat fa-2xl"></i>
                                            </div>
                                            <div class="text-end">
                                                <h5>
                                                    <small class="text-white"><b><?= $rekanan_baru ?></b></small>
                                                </h5>
                                                <small class="text-white"><b>Daftar Rekanan Baru</b></small>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-light">
                                            <a href="<?= base_url('validator/rekanan_baru') ?>" class="small-box-footer">
                                                <small>Informasi Lebih Lanjut</small> <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="card shadow-lg" style="width: 18rem;">
                                        <div class="card-body swatch-pink">
                                            <div class="text-start">
                                                <i class="fa-solid fa-user-shield fa-bounce fa-2xl"></i>
                                            </div>
                                            <div class="text-end">
                                                <h5>
                                                    <small class="text-white"><b><?= $rekanan_tervalidasi ?></b></small>
                                                </h5>
                                                <small class="text-white"><b>Status Rekanan Tervalidasi</b></small>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-light">
                                            <a href="<?= base_url('validator/rekanan_tervalidasi') ?>" class="small-box-footer">
                                                <small>Informasi Lebih Lanjut</small> <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="card shadow-lg" style="width: 18rem;">
                                        <div class="card-body swatch-purple">
                                            <div class="text-start">
                                                <i class="fa-solid fa-address-card fa-fade fa-2xl"></i>
                                            </div>
                                            <div class="text-end">
                                                <h5>
                                                    <small class="text-white"><b><?= $rekanan_terundang ?></b></small>
                                                </h5>
                                                <small class="text-white"><b>Status Rekanan Terundang</b></small>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-light">
                                            <a href="<?= base_url('validator/rekanan_terundang') ?>" class="small-box-footer">
                                                <small>Informasi Lebih Lanjut</small> <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="card shadow-lg" style="width: 18rem;">
                                        <div class="card-body bg-dark">
                                            <div class="text-start text-white">
                                                <i class="fa-solid fa-user-secret fa-2xl"></i>
                                            </div>
                                            <div class="text-end">
                                                <h5>
                                                    <small class="text-white"><b><?= $rekanan_daftar_hitam ?></b></small>
                                                </h5>
                                                <small class="text-white"><b>Daftar Hitam Rekanan</b></small>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-light">
                                            <a href="<?= base_url('validator/daftar_hitam') ?>" class="small-box-footer">
                                                <small>Informasi Lebih Lanjut</small> <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card border-primary shadow-lg">
                        <div class="card-header bg-light border-primary">
                            <strong class="text-dark">
                                <i class="fa-solid fa-chart-simple px-1"></i>
                                Info Grafik
                            </strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border-danger">
                                        <div class="card-header bg-danger border-danger">
                                            <strong class="text-dark">
                                                <i class="fa-solid fa-chart-area px-1"></i>
                                                Grafik Rekanan Aktif
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-info">
                                        <div class="card-header bg-info border-info">
                                            <strong class="text-dark">
                                                <i class="fa-solid fa-chart-line px-1"></i>
                                                Grafik Terundang
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="areaChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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