<style>


  .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
  }

  .alert.success {
    background-color: #4CAF50;
  }

  .alert.info {
    background-color: #2196F3;
  }

  .alert.warning {
    background-color: #ff9800;
  }

  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }
</style>

<style>
  .foo {
    float: left;
    width: 20px;
    height: 20px;
    margin: 5px;
    border: 1px solid rgba(0, 0, 0, .2);
  }
</style>

<!-- ### STYLE UNTUK CARD  -->
<style>
  .bungkus {
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    cursor: pointer;

  }

  .bungkus:hover {
    /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); */
    box-shadow: 0 0 20px rgba(33, 33, 33, .2);
    transform: scale(1.05, 1.05);
  }
</style>

<!-- button create RKF baru -->
<div class="row">
  <div class="col-lg-12 text-right">
    <a href="<?= base_url(); ?>rbb/rkf/show-new" class="btn btn-primary" style="text-align:right;">CREATE RKF 2020</a>
  </div>
</div>

<!-- judul periode rkf -->
<div class="row" style="margin-bottom:30px">
  <div class="col-lg-12 text-center m-t-md">
    <h4 style="padding-bottom:0.1px; margin-bottom:0.1px"> Periode Aktif RBB: </h4>
    <h2 style="padding-top:0.1px; margin-top:0.1px"><strong><?php echo $periode->rkf_jenis_nama; ?> <?= date("Y") ?></strong></h2>
    <h5><?= (!empty($_SESSION['pegawai']->unit_kerja)) ? $_SESSION['pegawai']->unit_kerja : ' '; ?></h5>
  </div>
</div>

<!-- ############### Rekap RKF -->
<div class="row">
  <!-- total -->
  <div class="col-md-3 ">
    <div class="hpanel hbgblue bungkus" onclick="window.open('<?= base_url(); ?>rbb/rkf/show', '_self')">
      <div class="panel-heading" style="background-color:#969696; text-align:center">
        <h5 style="color:white">Total RKF</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalRkf->jml_rkf; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- selesai -->
  <div class="col-md-3 ">
    <div class="hpanel hbggreen ">
      <div class="panel-heading" style="background-color:#969696; text-align:center">
        <h5 style="color:white">Selesai</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalRkf->jml_selesai; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- jatuh tempo -->
  <div class="col-md-3 ">
    <div class="hpanel hbgyellow ">
      <div class="panel-heading" style="background-color:#969696; text-align:center">
        <h5 style="color:white">JT Pada Bulan <?= parse_bulan(Date('m')) ?></h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalRkf->jml_jt; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- terlambat -->
  <div class="col-md-3 ">
    <div class="hpanel hbgred ">
      <div class="panel-heading" style="background-color:#969696; text-align:center">
        <h5 style="color:white">Terlambat dari Jadwal</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalRkf->jml_terlambat; ?></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ############### Rekap RKF Quick Win -->
<div class="row">
  <!-- total -->
  <div class="col-md-3 ">
    <div class="hpanel hbgblue ">
      <div class="panel-heading" style="background-color:#b3b1b1; text-align:center">
        <h5 style="color:white">Total RKF Quick Win</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalQuickWin->jml_rkf; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- selesai -->
  <div class="col-md-3 ">
    <div class="hpanel hbggreen ">
      <div class="panel-heading" style="background-color:#b3b1b1; text-align:center">
        <h5 style="color:white">Selesai</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalQuickWin->jml_selesai; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- jatuh tempo -->
  <div class="col-md-3 ">
    <div class="hpanel hbgyellow ">
      <div class="panel-heading" style="background-color:#b3b1b1; text-align:center">
        <h5 style="color:white">JT Pada Bulan <?= parse_bulan(Date('m')) ?></h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalQuickWin->jml_jt; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- terlambat -->
  <div class="col-md-3 ">
    <div class="hpanel hbgred ">
      <div class="panel-heading" style="background-color:#b3b1b1; text-align:center">
        <h5 style="color:white">Terlambat dari Jadwal</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalQuickWin->jml_terlambat; ?></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ############### Rekap Aktivitas-->
<div class="row">
  <!-- total -->
  <div class="col-md-3 ">
    <div class="hpanel hbgblue bungkus" onclick="window.open('<?= base_url() ?>rbb/rkf/aktivitas/show-report/<?= Date('m'); ?>', '_self')">
      <div class="panel-heading" style="background-color:#c9c9c9; text-align:center">
        <h5 style="color:white">Total Aktivitas</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"> <?= $totalAktivitas->jml_aktivitas; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- selesai -->
  <div class="col-md-3 ">
    <div class="hpanel hbggreen ">
      <div class="panel-heading" style="background-color:#c9c9c9; text-align:center">
        <h5 style="color:white">Selesai</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalAktivitas->jml_selesai; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- jatuh tempo -->
  <div class="col-md-3 ">
    <div class="hpanel hbgyellow ">
      <div class="panel-heading" style="background-color:#c9c9c9; text-align:center">
        <h5 style="color:white">JT Pada Bulan <?= parse_bulan(Date('m')) ?></h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalAktivitas->jml_jt; ?></span>
        </div>
      </div>
    </div>
  </div>
  <!-- terlambat -->
  <div class="col-md-3 ">
    <div class="hpanel hbgred ">
      <div class="panel-heading" style="background-color:#c9c9c9; text-align:center">
        <h5 style="color:white">Terlambat dari Jadwal</h5>
      </div>
      <div class="panel-body">
        <div class="text-center">
          <span class="text-big font-light"><?= $totalAktivitas->jml_terlambat; ?></span>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <!-- ############### progres penyelesaian rkf -->
  <div class="col-md-6 ">
    <div class="hpanel hgreen ">
      <div class="panel-body">
        <div class="text-center">
          <h4 class="text-center" style="font-size:1.5em">Progress Penyelesaian RKF</h4>
          <div class="m">
            <h5 style="text-align:left">Selesai</h5>
            <div class="progress m-t-xs full progress-striped active">
              <div style="width: <?= round(($progresRkf->jml_selesai / $totalRkf->jml_rkf * 100), 2) ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class=" progress-bar progress-bar-success">
                <?= round(($progresRkf->jml_selesai / $totalRkf->jml_rkf * 100), 2) ?>%
              </div>
            </div>
          </div>
          <div class="m">
            <h5 style="text-align:left">Dalam Proses</h5>
            <div class="progress m-t-xs full progress-striped active">
              <div style="width: <?= round(($progresRkf->jml_proses / $totalRkf->jml_rkf * 100), 2) ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar" class=" progress-bar progress-bar-warning">
                <?= round(($progresRkf->jml_proses / $totalRkf->jml_rkf * 100), 2) ?>%
              </div>
            </div>
          </div>
          <div class="m">
            <h5 style="text-align:left">Belum Dilaksanakan</h5>
            <div class="progress m-t-xs full progress-striped active">
              <div style="width:<?= round(($progresRkf->jml_belum / $totalRkf->jml_rkf * 100), 2) ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" role="progressbar" class=" progress-bar progress-bar-danger">
                <?= round(($progresRkf->jml_belum / $totalRkf->jml_rkf * 100), 2) ?>%
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ############### progres penyelesaian aktivitas -->
  <div class="col-md-6 ">
    <div class="hpanel hgreen ">
      <div class="panel-body">
        <div class="text-center">
          <h4 class="text-center" style="font-size:1.5em">Progress Penyelesaian Aktivitas</h4>
          <div class="m">
            <h5 style="text-align:left">Selesai</h5>
            <div class="progress m-t-xs full progress-striped active">
              <div style="width:<?= round(($progresAktivitas->jml_selesai / $totalAktivitas->jml_aktivitas * 100), 2) ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class=" progress-bar progress-bar-success">
                <?= round(($progresAktivitas->jml_selesai / $totalAktivitas->jml_aktivitas * 100), 2) ?>%
              </div>
            </div>
          </div>
          <div class="m">
            <h5 style="text-align:left">Dalam Proses</h5>
            <div class="progress m-t-xs full progress-striped active">
              <div style="width: <?= round(($progresAktivitas->jml_proses / $totalAktivitas->jml_aktivitas * 100), 2) ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar" class=" progress-bar progress-bar-warning">
                <?= round(($progresAktivitas->jml_proses / $totalAktivitas->jml_aktivitas * 100), 2) ?>%
              </div>
            </div>
          </div>
          <div class="m">
            <h5 style="text-align:left">Belum Dilaksanakan</h5>
            <div class="progress m-t-xs full progress-striped active">
              <div style="width:<?= round(($progresAktivitas->jml_belum / $totalAktivitas->jml_aktivitas * 100), 2) ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" role="progressbar" class=" progress-bar progress-bar-danger">
                <?= round(($progresAktivitas->jml_belum / $totalAktivitas->jml_aktivitas * 100), 2) ?>%
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ######################################################################## preview RKF dan monev-->
<div class="row" style="horizontal-align:center;">
  <div class="col-md-6">
    <!-- inputan preview data rkf -->
    <div class="hpanel hblue">
      <div class="panel-body">
        <h4><b>Preview Data RKF</b></h4>
        <?= (!empty($this->session->flashdata('pesanReportRkf'))) ? '<div class="alert alert-warning"><strong>' . $this->session->flashdata('pesanReportRkf') . '</strong></div>' : '' ?>
        <div class="col-sm-4">
          <div class="form-group">
            <label class="control-label">Tahun</label>
            <select id="tahun-rkf" name="tahun_rkf" required="required" class="form-control mb">
              <?php
              $tahun = date("Y");
              for ($tahun; $tahun >= (date("Y") - 5); $tahun--) { ?>
                <option value="<?= $tahun ?>"><?= $tahun; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label class=" control-label">Jenis RKF</label>
            <select id="jenis-rkf" name="jenis_rkf" required="required" class="form-control mb">
              <?php foreach ($jenisrkf as $valuejr) { ?>
                <option value="<?= $valuejr->rkf_jenis_id ?>"><?= $valuejr->rkf_jenis_nama; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-sm-2">
          <button onclick="openReport()" class="btn block btn-info pull-right" style="width:100%;margin-top:23px">Lihat</button>
        </div>
      </div>
    </div>
  </div>


  <div class="col-sm-6">
    <div class="hpanel hgreen">
      <div class="panel-body">
        <h4><b>Preview Laporan Monitoring dan Evaluasi</b></h4>
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
              <label class="control-label">Bulan</label>
              <select id="bulanSelect" class="form-control m-b" name="bulan">
                <option value=" ">-- Pilih Bulan --</option>
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                  <option value="<?= $i; ?>"><?= parse_bulan($i); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-2 ">
            <button onclick=openMonev() class="btn btn-block btn-info" style="width:100%;margin-top:23px">Lihat</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ####### monitoring pegawai di divisinya -->
<?php if(!empty($rekapPegawai)) { ?>
<div class="row">
  <div class="col-md-12 ">
    <div class="hpanel hgreen ">
      <div class="panel-body">
        <div class="text-center">
          <h4 class="text-center" style="font-size:1.5em">Monitoring Pelaksanaan RKF dan Aktivitas Pegawai</h4>
          <div class="table-responsive">
            <table class="table  table-bordered ">
              <thead>
                <tr>
                  <th rowspan="2" style="text-align:center; width:3%">No.</th>
                  <th rowspan="2" style="text-align:center ; width:20%">Nama</th>
                  <th rowspan="2" style="text-align:center; width:5%">NIP</th>
                  <th colspan="7" style="text-align:center; border-bottom:1px solid #DDDDDD">RKF</th>
                  <th colspan="7" style="text-align:center; border-bottom:1px solid #DDDDDD">Aktivitas</th>
                </tr>
                <tr>
                  <th style="width:5%">Total</th>
                  <th colspan="2" style="text-align:center;width:10%">Selesai</th>
                  <th colspan="2" style="text-align:center;width:10%">Proses</th>
                  <th colspan="2" style="text-align:center;width:10%">Belum</th>
                  <th style="text-align:center;width:5%">Total</th>
                  <th colspan="2" style="text-align:center;width:10%">Selesai</th>
                  <th colspan="2" style="text-align:center;width:10%">Proses</th>
                  <th colspan="2" style="text-align:center;width:10%">Belum</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rekapPegawai as $key => $dtpeg) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td style="text-align:left">
                      <?php
                        if (isset($kamusPegawai[$dtpeg->nip])) {
                          echo cetakv2($kamusPegawai[$dtpeg->nip]);
                        } else {
                          // $nama = json_decode(file_get_contents(SDM_API . '/api_v2/pegawai/prc_get_pegawai_detail/' . $dtpeg->nip . '?api_key=prc'))->result[0][0]->nama;
                          // echo $nama;
                          echo $dtpeg->nip;
                        }
                        ?>
                    </td>
                    <td><?= cetakv2($dtpeg->nip); ?></td>
                    <td><?= cetakv2($dtpeg->jml_rkf_total); ?></td>
                    <td><?= cetakv2($dtpeg->jml_rkf_selesai); ?></td>
                    <td><?= $dtpeg->persen_rkf_selesai ?></td>
                    <td><?= cetakv2($dtpeg->jml_rkf_proses); ?></td>
                    <td><?= $dtpeg->persen_rkf_proses ?></td>
                    <td><?= cetakv2($dtpeg->jml_rkf_belum); ?></td>
                    <td><?= $dtpeg->persen_rkf_belum ?></td>
                    <td><?= cetakv2($dtpeg->jml_aktivitas_total); ?></td>
                    <td><?= cetakv2($dtpeg->jml_aktivitas_selesai); ?></td>
                    <td><?= $dtpeg->persen_aktivitas_selesai ?></td>
                    <td><?= cetakv2($dtpeg->jml_aktivitas_proses); ?></td>
                    <td><?= $dtpeg->persen_aktivitas_proses ?></td>
                    <td><?= cetakv2($dtpeg->jml_aktivitas_belum); ?></td>
                    <td><?= $dtpeg->persen_aktivitas_belum ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- ############### grafik persebaran data -->
<div class="row">
  <div class="col-md-12">
    <div class="hpanel hgreen">
      <div class="panel-body">
        <h4 class="text-center" style="font-size:1.5em"><b>Persebaran RKF, RKF Quick Win dan Aktivitas Jatuh Tempo</b></h4>
        <!-- grafiknya -->
        <div>
          <canvas id="barOptions" height="100px"></canvas>
        </div>
        <!-- legendnya -->
        <div class="col-md-3">
          <div style="margin-top:20px">
            <span class="badge badge-warning" style="background-color: #003f5c">&nbsp;</span> RKF
          </div>
        </div>
        <div class="col-md-3">
          <div style="margin-top:20px">
            <span class="badge badge-warning" style="background-color: #bc5090">&nbsp;</span> RKF Quick Win
          </div>
        </div>
        <div class="col-md-3">
          <div style="margin-top:20px">
            <span class="badge badge-warning" style="background-color: #ffa600">&nbsp;</span> Aktivitas
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  var close = document.getElementsByClassName("closebtn");
  var i;

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(e) {
      e.preventDefault();
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function() {
        div.style.display = "none";
      }, 600);
    }
  }
</script>

<script>
  function openReport() {
    var tahun = document.getElementById('tahun-rkf').value;
    var jenis = document.getElementById('jenis-rkf').value;
    window.open('<?= base_url() ?>rbb/rkf/show-report/' + tahun + '/' + jenis, '_self');

  }

  function openMonev() {
    var bulan = document.getElementById('bulanSelect').value;
    if (bulan == " ") {
      alert('pilih bulan dahulu');
    } else {
      window.open('<?= base_url() ?>rbb/rkf/aktivitas/show-report/' + bulan, '_self');
    }
  }
</script>



<script>
  var chartSebarRkf = [
    <?= $grafikbar[0]['rkf'] ?>,
    <?= $grafikbar[1]['rkf'] ?>,
    <?= $grafikbar[2]['rkf'] ?>,
    <?= $grafikbar[3]['rkf'] ?>,
    <?= $grafikbar[4]['rkf'] ?>,
    <?= $grafikbar[5]['rkf'] ?>,
    <?= $grafikbar[6]['rkf'] ?>,
    <?= $grafikbar[7]['rkf'] ?>,
    <?= $grafikbar[8]['rkf'] ?>,
    <?= $grafikbar[9]['rkf'] ?>,
    <?= $grafikbar[10]['rkf'] ?>,
    <?= $grafikbar[11]['rkf'] ?>,
  ];
  var chartSebarQuickWin = [
    <?= $grafikbar[0]['quickwin'] ?>,
    <?= $grafikbar[1]['quickwin'] ?>,
    <?= $grafikbar[2]['quickwin'] ?>,
    <?= $grafikbar[3]['quickwin'] ?>,
    <?= $grafikbar[4]['quickwin'] ?>,
    <?= $grafikbar[5]['quickwin'] ?>,
    <?= $grafikbar[6]['quickwin'] ?>,
    <?= $grafikbar[7]['quickwin'] ?>,
    <?= $grafikbar[8]['quickwin'] ?>,
    <?= $grafikbar[9]['quickwin'] ?>,
    <?= $grafikbar[10]['quickwin'] ?>,
    <?= $grafikbar[11]['quickwin'] ?>,
  ];
  var chartSebarAktivitas = [
    <?= $grafikbar[0]['aktivitas'] ?>,
    <?= $grafikbar[1]['aktivitas'] ?>,
    <?= $grafikbar[2]['aktivitas'] ?>,
    <?= $grafikbar[3]['aktivitas'] ?>,
    <?= $grafikbar[4]['aktivitas'] ?>,
    <?= $grafikbar[5]['aktivitas'] ?>,
    <?= $grafikbar[6]['aktivitas'] ?>,
    <?= $grafikbar[7]['aktivitas'] ?>,
    <?= $grafikbar[8]['aktivitas'] ?>,
    <?= $grafikbar[9]['aktivitas'] ?>,
    <?= $grafikbar[10]['aktivitas'] ?>,
    <?= $grafikbar[11]['aktivitas'] ?>,
  ];
  $(function() {
    /**
     * Options for Bar chart
     */
    var barOptions = {
      scaleBeginAtZero: true,
      scaleShowGridLines: true,
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleGridLineWidth: 1,
      barShowStroke: true,
      barStrokeWidth: 1,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      responsive: true
    };

    /**
     * Data for Bar chart
     */
    var barData = {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [{
          label: "RKF",
          fillColor: "#003f5c",
          strokeColor: "#012645",
          highlightFill: "#012645",
          highlightStroke: "#003f5c",
          data: chartSebarRkf
        },
        {
          label: "QuickWin",
          fillColor: "#bc5090",
          strokeColor: "#f21397",
          highlightFill: "#f21397",
          highlightStroke: "#bc5090",
          data: chartSebarQuickWin
        },
        {
          label: "Aktivitas",
          fillColor: "#ffa600",
          strokeColor: "#ffd000",
          highlightFill: "#ffd000",
          highlightStroke: "#ffa600",
          data: chartSebarAktivitas
        }
      ]
    };

    var ctx = document.getElementById("barOptions").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);
  });
</script>