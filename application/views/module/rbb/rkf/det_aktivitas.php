<style>
  body.modal-open {
    padding-right: 0 !important;
    /* overflow: hidden !important; */
    position: fixed !important;
  }
</style>

<!-- judul info program kerja dari aktivitas2 dibawah -->
<div class="row">
  <div class="col-lg-12 text-center">
    <h6><b>Program Kerja : </b></h6>
    <h4><b><?= $proker[0]->rkf_proker ?></b></h4>
  </div>
</div>

<div class="row">
  <!-- grafik progres aktivitas -->
  <div class="col-lg-6">
    <div class="hpanel hgreen">
      <div class="panel-body">
        <h4 style="text-align:center"><b>Progress Aktivitas</b></h4>
        <hr />
        <div class="col-lg-6 text-right">
          <canvas style="padding-right:0" id="doughnutChart" height="200px"></canvas>
        </div>
        <div class="col-lg-6">
          <ul style="list-style: none">
            <li><span class="badge badge-warning" style="background-color: #d63524">&nbsp;</span> Belum Dilaksanakan</li>
            <li><span class="badge badge-warning" style="background-color: #e8c827">&nbsp;</span> Dalam Proses</li>
            <li><span class="badge badge-warning" style="background-color: #4bd765">&nbsp;</span> Selesai</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- grafik persebaran aktivitas -->
  <div class="col-lg-6">
    <div class="hpanel hblue">
      <div class="panel-body">
        <h4 style="text-align:center"><b>Grafik Persebaran Aktivitas</b></h4>
        <hr />
        <div>
          <canvas id="singleBarOptions" height="100px"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="hpanel hgreen">
      <div class="panel-body">
        <div class="row" style="overflow-y:auto; ">
          <h4 style="text-align:center"><b>Rekapitulasi Aktivitas</b></h4>
          <table class="table table-bordered table-stripped table-hover" style="width:100%; font-size:11px">
            <thead>
              <tr>
                <th style="width:5%; text-align:center;vertical-align:top">No.</th>
                <th style="width:20%; text-align:center;vertical-align:top">Aktivitas</th>
                <th style="width:10%; text-align:center;vertical-align:top">Jatuh Tempo</th>
                <th style="width:20%; text-align:center;vertical-align:top">PIC</th>
                <th style="width:15%; text-align:center;vertical-align:top">Status Terakhir</th>
                <th style="width:20%; text-align:center;vertical-align:top">Penjelasan</th>
                <th style="width:10%; text-align:center;vertical-align:top">File Pendukung</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataMonev  as $keydt => $dt) { ?>
                <tr data-aktid="<?= $dt->aktivitas_id ?>">
                  <td><?= $keydt + 1 ?></td>
                  <td class="td-nama" data-nama="<?= cetakv2($dt->aktivitas_nama); ?>"><?= cetakv2($dt->aktivitas_nama) ?></td>
                  <td class="td-bulan" data-bulan="<?= cetakv2($dt->aktivitas_bulan); ?>"><?= cetakv2(parse_bulan($dt->aktivitas_bulan)); ?></td>
                  <td>
                    <ul style="padding-left:20px;">
                      <?php if (!empty($dt->aktivitas_pic)) {
                          foreach ($dt->aktivitas_pic as $key => $dtPic) { ?>
                          <li>
                            <?php
                                  $nama = $kamusPegawai[$dtPic->pic] ?? null;
                                  cetak($nama);
                                  ?>
                          </li>
                      <?php }
                        } ?>
                    </ul>
                  </td>
                  <td class="td-status" data-status="<?= $dt->aktivitas_status ?>">
                    <?php if ($dt->aktivitas_status == 1) {
                        echo "Belum Dilaksanakan";
                      } elseif ($dt->aktivitas_status == 2) {
                        echo "Dalam Proses";
                      } elseif ($dt->aktivitas_status == 3) {
                        echo "Selesai Lebih Cepat";
                      } elseif ($dt->aktivitas_status == 4) {
                        echo "Selesai tepat Waktu";
                      } elseif ($dt->aktivitas_status == 5) {
                        echo "Selesai Terlambat";
                      } ?>
                  </td>
                  <td class="td-ket">
                    <?php echo (!empty($dt->aktivitas_penjelasan)) ? cetakv2($dt->aktivitas_penjelasan) : '-'; ?>
                  </td>
                  <td class="td-file">
                    <?php
                      if (array_key_exists($dt->aktivitas_id, $fileDokumenAktivitas)) {
                        echo "<a href='" . base_url() . "assets/file/aktivitas/" . $fileDokumenAktivitas[$dt->aktivitas_id] . "' target='_blank'>" . $fileDokumenAktivitas[$dt->aktivitas_id] . "</a>";
                      } else {
                        echo "-";
                      }
                      ?>
                  </td>
                  <td>
                    <div class="tooltip-demo text-center">
                      <button data-toggle="modal" data-target="#myModal" class="btn btn-info button_lapor" data-prokerid=<?= $proker[0]->rkf_id ?> data-aktid=<?= $dt->aktivitas_id ?>>Lapor</button>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




</div>



<div class="modal fade hmodal-info" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="color-line"></div>
      <div class="modal-header text-center">
        <h4 class="modal-title">Lapor Pelaksanaan Aktivitas</h4>
        <h5 class="font-bold modal-infonya"></h5>
      </div>
      <div class="modal-body">
        <form id="submit-aktivitas">
          <div class="row" style="text-align:left;background:">
            <div class="col-lg-6 text-left">
              <div class="form-group" style="text-align:left;background:">
                <label class=" control-label">Status Sebelumnya</label>
                <div class=""><input type="text" class="form-control stat-seb" value="asd" disabled></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group ">
                <label class=" control-label">Status Terbaru</label>
                <div class="text-right">
                  <select class="form-control m-b lapor-stat" name="lapor-stat">
                    <option value="1">Belum Dilaksanakan</option>
                    <option value="2">Dalam Proses</option>
                    <option value="3">Selesai</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label class=" control-label">Penjelasan</label>
                <div class="">
                  <textarea class="lapor-ket form-control" name="lapor-ket" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleFormControlFile1">File Pendukung Aktivitas</label>
                <input type="file" class="form-control-file lapor-file" name="lapor-file" id="exampleFormControlFile1">
              </div>
            </div>
          </div>

          <!-- ###### -->
          <div class="row" style="display:none">
            <input type="text" class="lapor-aktid" name="lapor-aktid" value=''>
            <input type="text" class="lapor-bulan" name="lapor-bulan" value=''>
            <input type="text" class="lapor-prokerid" name="lapor-prokerid" value=''>
          </div>
          <!-- ###########end -->
          <div class="modal-footer text-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary lapor-submit" data-aktid="">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<script>
  $(document).on("click", ".button_lapor", function() {
    var aktId = $(this).data("aktid");
    var prokerId = $(this).data("prokerid");
    var aktivitas = $(this).parents("tr").find('td.td-nama').data("nama");
    var bulan = $(this).parents("tr").find('td.td-bulan').data("bulan");
    var bulanNama = $(this).parents("tr").find('td.td-bulan').text();
    var statusLast = $(this).parents("tr").find('td.td-status').data("status");
    var statusLastNama = $(this).parents("tr").find('td.td-status').text();
    statusLastNama = statusLastNama.trim();
    var ket = $(this).parents("tr").find('td.td-ket').text();
    ket = ket.trim();

    $("#myModal").find(".modal-infonya").text(aktivitas);
    $("#myModal").find(".stat-seb").val(statusLastNama);
    $("#myModal").find(".lapor-ket").val("");
    $("#myModal").find(".lapor-file").val(null);
    $('#myModal').find("select").prop('selectedIndex', 0);
    $('#myModal').find(".lapor-submit").data('aktid', aktId);
    $('#myModal').find(".lapor-submit").data('prokerid', prokerId);
    $('#myModal').find(".lapor-aktid").val(aktId);
    $('#myModal').find(".lapor-bulan").val(<?= $bulan; ?>);
    $('#myModal').find(".lapor-prokerid").val(prokerId);

  });


  $(document).on('submit', '#submit-aktivitas', function(e) {
    e.preventDefault();
    var aktId = $(this).find('.lapor-submit').data('aktid');
    var prokerId = $(this).find('.lapor-submit').data("prokerid");
    var statusNew = $(this).parents(".modal-body").find("select.lapor-stat").children("option:selected").val();
    var keterangan = $(this).parents(".modal-body").find("textarea.lapor-ket").val();
    var bulannya = <?= $bulan;  ?>;
    var dataForm = new FormData(this);
    var urlnya = "<?= base_url() ?>rbb/rkf/monev/insert";
    var namaFile = $(this).find('.lapor-file').val().replace(/C:\\fakepath\\/i, '');
    // var urlnya = "<?= base_url() ?>rbb/user/do_upload";
    // alert(bulannya);
    // console.log(aktId);
    // console.log(prokerId);
    // console.log(statusNew);
    // console.log(keterangan);
    // console.log(bulannya);
    // console.log(dataForm);

    $.ajax({
      type: "POST",
      dataType: "JSON",
      url: urlnya,
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      data: dataForm,
      success: function(data) {
        console.log("hai");
        console.log($("tr[data-aktid ='" + aktId + "']").find('td.td-status').text());
        if (statusNew == 1) {
          statusNama = "<b>Belum Dilaksanakan</b>";
        } else if (statusNew == 2) {
          statusNama = "Dalam Proses";
        } else if (statusNew == 3) {
          statusNama = "Selesai Lebih Cepat";
        } else if (statusNew == 4) {
          statusNama = "Selesai Tepat Waktu";
        } else if (statusNew == 5) {
          statusNama = "Selesai Melebihi Waktu";
        }
        var aaa =
          $("tr[data-aktid ='" + aktId + "']").find('td.td-status').html(statusNama);
        $("tr[data-aktid ='" + aktId + "']").find('td.td-ket').text(keterangan);
        $("tr[data-aktid ='" + aktId + "']").find('td.td-file').text(namaFile);
      }
    });
    $('#myModal').modal('hide');
  });
</script>



<script>
  $(document).ready(function() {

    // Page scrolling feature
    $('a.page-scroll').bind('click', function(event) {
      var link = $(this);
      $('html, body').stop().animate({
        scrollTop: $(link.attr('href')).offset().top - 50
      }, 500);
      event.preventDefault();
    });

    $('body').scrollspy({
      target: '.navbar-fixed-top',
      offset: 80
    });

  });
</script>

<script>
  $(function() {
    var doughnutData = [{
        value: <?php echo $dataChart['belumDilaksanakan']; ?>,
        color: "#d63524",
        highlight: "#fa1800",
        label: "Belum Dilaksanakan"
      },
      {
        value: <?php echo $dataChart['dalamProses']; ?>,
        color: "#e8c827",
        highlight: "#ffd500",
        label: "Dalam Proses"
      },
      {
        value: <?php echo $dataChart['selesai']; ?>,
        color: "#4bd765",
        highlight: "#2aeb4e",
        label: "Selesai"
      }
    ];

    var doughnutOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: "#fff",
      segmentStrokeWidth: 2,
      percentageInnerCutout: 45, // This is 0 for Pie charts
      animationSteps: 100,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
    };
    var ctx = document.getElementById("doughnutChart").getContext("2d");
    var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

    /**
     * Options for Bar chart
     */
    var singleBarOptions = {
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
    var dataAktPerBulan = [
      <?= $dataBar[0] ?>,
      <?= $dataBar[1] ?>,
      <?= $dataBar[2] ?>,
      <?= $dataBar[3] ?>,
      <?= $dataBar[4] ?>,
      <?= $dataBar[5] ?>,
      <?= $dataBar[6] ?>,
      <?= $dataBar[7] ?>,
      <?= $dataBar[8] ?>,
      <?= $dataBar[9] ?>,
      <?= $dataBar[10] ?>,
      <?= $dataBar[11] ?>
    ];
    var singleBarData = {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "sep", "Okt", "Nov", "Des"],
      datasets: [{
        label: "My Second dataset",
        fillColor: "rgba(98,203,49,0.5)",
        strokeColor: "rgba(98,203,49,0.8)",
        highlightFill: "rgba(98,203,49,0.75)",
        highlightStroke: "rgba(98,203,49,1)",
        data: dataAktPerBulan
      }]
    };

    var ctx = document.getElementById("singleBarOptions").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(singleBarData, singleBarOptions);


  });
</script>