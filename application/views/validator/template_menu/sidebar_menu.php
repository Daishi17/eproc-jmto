<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper layout-fixed">
  <!-- Content Header (Page header) -->

  <?php
  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 => 'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $hari = array(
      1 => 'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );
    $pecahkan = explode('-', $tanggal);

    // Contoh tanggal 20 Maret 2016 adalah hari Minggu
    $num = date(
      'N',
      strtotime($tanggal)
    );
    return $pecahkan[2]  . '-' . $bulan[(int)$pecahkan[1]] . '-' . $pecahkan[0];
  }
  ?>
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-light" style="margin-top: 50px;height:60px;">
    <a class="navbar-brand">
      <h5> <img src="<?php echo base_url(); ?>assets/frontend/dist/img/jm1.png" class="brand-image img-circle elevation-3">
        <span class="text-primary">
          <strong>Jasamarga Tollroad Operator</strong>
        </span>
      </h5>
    </a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">

      </ul>
      <h5>
        <strong><?= tgl_indo(date('Y-m-d')) ?> || <label for="" id="jam"></label></strong>
      </h5>
    </div>
  </nav><br>