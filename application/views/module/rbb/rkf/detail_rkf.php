<?php 
asort($data->rkf_jadwal);
//  echo "<pre>";
//  print_r($data->rkf_jadwal);
//  echo "</pre>";

?>


<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hred">
      <div class="panel-heading">
        <div class="row" style="text-align:right">
          <?php if (isset($showBdAktivitas)) {
            if ($showBdAktivitas == 1) { ?>
              <a class="btn btn-info page-scroll pull-right" page-scroll href="#bd-aktivitas"> Tambah Aktivitas</a>
              <hr />
          <?php }
          } ?>
          <?php if (isset($showMonev)) {
            if ($showMonev == 1) { ?>
              <a class="btn btn-info page-scroll pull-right" page-scroll href="#monev"><i class="fa fa-caret-down"></i> Monev</a>
              <hr />
          <?php }
          } ?>
          <?php if (isset($showApprove)) {
            if ($showApprove == 1) { ?>
              <a class="btn btn-info page-scroll pull-right button_approve" data-rkfid="<?= $data->rkf_id ?>">Approve</a>
              <hr />
          <?php }
          } ?>

          <hr />
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <tr>
            <td class="col-sm-3">Program Kerja</td>
            <td class="col-sm-9" style="color:tomato">
              <b><?= cetakv2($data->rkf_proker); ?></b>
            </td>
          </tr>
          <!-- <tr>
            <td class="col-sm-3">RKF ID</td>
            <td class="col-sm-9">
              <?= cetakv2($data->rkf_id); ?>
            </td>
          </tr> -->
          <tr>
            <td class="col-sm-3">Status</td>
            <td class="col-sm-9">
              <?php
              if ($data->rkf_sts == 0) {
                echo  "<div style='color:#ff9933;'>Review</div>";
              } elseif ($data->rkf_sts == 1) {
                echo  "<div style='color:#ff0000;'>Draft</div>";
              } else {
                echo  "<div style='color: #62cb31;'>Approve</div>";
              }
              ?>
              <p><?php echo ((!empty($data->rkf_note_otor)) && $data->rkf_sts == 0) ? "[$data->rkf_note_otor]" : ""; ?></p>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Visi</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_visi)) {
                foreach ($data->rkf_visi as $dt) {
                  echo cetakv2($dt->value . ". " . $dt->label) . "<br>";
                }
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Misi</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_misi)) {
                foreach ($data->rkf_misi as  $dt) {
                  echo cetakv2($dt->value . ". " . $dt->label) . "<br>";
                }
              } ?>
            </td>
          </tr>
         
          <tr>
            <td class="col-sm-3">Corporate Plan</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_coreplan)) {
                foreach ($data->rkf_coreplan as $key => $dt) {
                  $data_corplan = json_decode(file_get_contents(IP_API . "/master/coreplan/detail/" . $dt));
                  echo "Tahun: " . cetakv2($data_corplan[0]->is_tahun) . "<br>";
                  echo "Inisiatif: " . cetakv2($data_corplan[0]->is_inisiatif_cp) . "<br>";
                  echo "Target: " . cetakv2($data_corplan[0]->is_inisiatif_cp_target) . "<br>";
                  echo "Sasaran: " . cetakv2($data_corplan[0]->is_sasaran_cp) . "<br>";
                  echo "KPI: " . cetak($data_corplan[0]->is_kpi) . "<br>";
                  echo "Target KPI: " . cetakv2($data_corplan[0]->is_kpi_target) . "<br>";
                  echo "<hr/>";
                }
              } ?>
            </td>
          </tr>
           <tr>
            <td class="col-sm-3">Kebijakan Umum Direksi</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_kud)) {
                foreach ($data->rkf_kud as $dt) {
                  $keyKud = array_search($dt->kud, array_column($all->allKUD, 'kud_id'));
                  echo cetakv2($all->allKUD[$keyKud]->kud_nama) . "<br/>";
                }
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Mendukung Transformasi BPD</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_transformasi_bpd)) {
                    $trans_nama = json_decode(file_get_contents(IP_API."/master/transformasibpd/".$data->rkf_transformasi_bpd));
                    echo $trans_nama[0]->transformasi_bpd_nama;
                }else{
                  echo "Tidak";
                }
              ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Mendukung RAKB</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_rakb)) {
                $rakb_nama = json_decode(file_get_contents(IP_API."/master/rakb/".$data->rkf_rakb));
                  echo $rakb_nama[0]->rakb_nama;
                }else{
                  echo "Tidak";
                }
              ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Status Program Kerja</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_status_proker)) {
                $keyStatusProker = array_search($data->rkf_status_proker, array_column($all->allStsProker, 'sts_proker_id'));
                echo cetakv2($all->allStsProker[$keyStatusProker]->sts_proker_nama) . "<br/>";
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Skala Program Kerja</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_skala_proker)) {
                $keySkalaProker = array_search($data->rkf_skala_proker, array_column($all->allSkalaProker, 'skala_proker_id'));
                echo cetakv2($all->allSkalaProker[$keySkalaProker]->skala_proker_nama) . "<br/>";
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Kategori Program kerja</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_kat_proker)) {
                $keyKatProker = array_search($data->rkf_kat_proker, array_column($all->allKatProker, 'kat_proker_id'));
                echo cetakv2($all->allKatProker[$keyKatProker]->kat_proker_nama) . "<br/>";
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Prespektif BSC</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_bsc)) {
                $keyBscProker = array_search($data->rkf_bsc, array_column($all->allBSC, 'bsc_id'));
                echo cetakv2($all->allBSC[$keyBscProker]->bsc_nama) . "<br/>";
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Kerjasama dengan Konsultan</td>
            <td class="col-sm-9">
              <?php if (isset($data->rkf_konsultan)) {
                echo ($data->rkf_konsultan == 1) ? 'Ya' : 'Tidak';
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Tindak Lanjut Audit / Tahun</td>
            <td class="col-sm-9">
              <?php
              if (!empty($data->rkf_tlaudit)) {
                foreach ($data->rkf_tlaudit as $dt) {
                  $keyAudit = array_search($dt->tlAudit, array_column($all->allTLAudit, 'tindak_lanjut_id'));
                  $namaAudit = $all->allTLAudit[$keyAudit]->tindak_lanjut_nama;
                  echo $namaAudit . " / " . $dt->tahunAudit;
                  echo "<br>";
                }
              } else {
                echo "-";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Tujuan Program Kerja</td>
            <td class="col-sm-9">
              <?php if ($data->rkf_tujuan_proker) {
                foreach ($data->rkf_tujuan_proker as  $dt) {
                  cetak($dt);
                  echo "<br>";
                }
              } else {
                echo "-";
              } ?>
            </td>
          </tr>
          <!-- <tr>
            <td class="col-sm-3">Indikator Keberhasilan</td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_indikator)) {
                foreach ($data->rkf_indikator as $key => $dt) {
                  cetak($dt);
                  echo "<br>";
                }
              } else {
                echo "-";
              } ?>
            </td>
          </tr> -->
          <tr>
          <td class="col-sm-3">Indikator Keberhasilan</td>
          <td class="col-sm-9"></td>
          </tr>
          <tr>
          <td class="col-sm-3 text-center" >Output</td>
          <td>
              <ul>
              <?php if (!empty($data->rkf_indikator->rkf_indikator_output)) {
                foreach ($data->rkf_indikator->rkf_indikator_output as $key => $dt) {?>
                  <li><?= cetakv2($dt); ?></li>
                <?php }
              } else {
                echo "-";
              } ?>
              </ul>
          </td>
          </tr>
          <tr>
          <td class="col-sm-3 text-center" >Outcome</td>
          <td>
              <ul>
              <?php if (!empty($data->rkf_indikator->rkf_indikator_outcome)) {
                foreach ($data->rkf_indikator->rkf_indikator_outcome as $key => $dt) {?>
                  <li><?= cetakv2($dt); ?></li>
                <?php }
              } else {
                echo "-";
              } ?>
              </ul>
          </td>
          </tr>
          <tr>
          <td class="col-sm-3 text-center" >Impact</td>
          <td>
              <ul>
              <?php if (!empty($data->rkf_indikator->rkf_indikator_impact)) {
                foreach ($data->rkf_indikator->rkf_indikator_impact as $key => $dt) {?>
                  <li><?= cetakv2($dt); ?></li>
                <?php }
              } else {
                echo "-";
              } ?>
              </ul>
          </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Jadwal Pelaksanaan /Target Penyelesaian
            </td>
            <td class="col-sm-9">
              <?php
              if (!empty($data->rkf_jadwal)) {
                foreach ($data->rkf_jadwal as $keyJadwal => $dtJadwal) {
                  echo  parse_bulan_short($dtJadwal);
                  echo ($dtJadwal == end($data->rkf_jadwal)) ? "" : "-";
                }
              }
              ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hblue">
      <div class="panel-heading">
        <h3><strong>Target Finansial</strong></h3>
      </div>
      <div class="panel-body">
        <?php if ($data->rkf_targetfin) { ?>
          <table class="table table-striped">
            <tr class="info">
              <th class="col-sm-6">Uraian</th>
              <th class="col-sm-3">Target Kuantitatif</th>
              <th class="col-sm-3">Satuan</th>
            </tr>
            <?php foreach ($data->rkf_targetfin as $dt) { ?>
              <tr>
                <td class="col-sm-6">
                  <?= cetakv2($dt->uraian); ?>
                </td>
                <td class="col-sm-3">
                  <?= number_format(cetakv2($dt->targetKuantitatif)); ?>
                </td>
                <td class="col-sm-3">
                  <?= cetakv2($dt->satuan); ?>
                </td>
              </tr>
            <?php } ?>
          </table>
        <?php } else { ?>
          <h4><b>Tidak ada.</b></h4>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hblue">
      <div class="panel-heading">
        <h3><strong>Anggaran</strong></h3>
      </div>
      <div class="panel-body">
        <?php if (!empty($data->rkf_anggaran)) { ?>
          <table class="table table-striped">
            <tr class="info">
              <th class="col-sm-2">Jenis</th>
              <th class="col-sm-2">COA</th>
              <th class="col-sm-2">Sub Nama 1</th>
              <th class="col-sm-2">Sub Nama 2</th>
              <th class="col-sm-2">Sub Nama 3</th>
              <th class="col-sm-2">Nominal</th>
            </tr>
            <?php foreach ($data->rkf_anggaran as $key => $dt) {
                $idnya = $dt->coa;
                $data_angg = array_filter($data_anggaran, function ($var) use ($idnya) {
                  return ($var->pos_coa_sub3_id == $idnya);
                });
                $data_angg = array_values($data_angg);
                ?>
              <tr>
                <td class="col-sm-2">
                  <?= ($data_angg[0]->pos_coa_jenis_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?= ($data_angg[0]->pos_coa_header_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?= ($data_angg[0]->pos_coa_sub1_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?= ($data_angg[0]->pos_coa_sub2_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?= ($data_angg[0]->pos_coa_sub3_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?php
                      foreach ($dt->nominal as $key_nominal => $dt_nominal) {
                        echo parse_bulan_short($key_nominal + 1) . " : Rp. " ;
                        echo (!empty($dt_nominal))? number_format(cetakv2($dt_nominal)) :'' ;
                        echo  "<br/>";
                      }
                      if ($data_angg[0]->pos_coa_jenis_nama == "LABA RUGI") {
                        echo "<b>Total : </b> Rp. " ;
                        echo (!empty(array_sum($dt->nominal)))? number_format(array_sum($dt->nominal)):'';
                      };
                      ?>
                </td>
              </tr>
            <?php } ?>
          <?php } else { ?>
            <h4><b>Tidak ada.</b></h4>
          <?php } ?>
          </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hblue">
      <div class="panel-heading">
        <h3><strong>Unit Pelaksana</strong></h3>
      </div>
      <div class="panel-body">
        <?php if (!empty($data->rkf_unit_pelaksana)) { ?>
          <table class="table table-striped">
            <tr class="info">
              <th class="col-sm-6">Unit Kerja Setingkat Sub Divisi</th>
              <th class="col-sm-3">Person In Charge</th>
            </tr>
            <?php
              foreach ($data->rkf_unit_pelaksana as $value) {
                $pegawaijson  = file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_pegawai_detail/" . $value->pegawaiUnitKerja . "?api_key=prc", false);
                $pegawai      = json_decode($pegawaijson);
                ?>
              <tr>
                <td class="col-sm-6">
                  <?= cetakv2($pegawai->result[0][0]->subdiv); ?>
                </td>
                <td class="col-sm-3">
                  <?= cetakv2($pegawai->result[0][0]->nama); ?>
                </td>
              </tr>
            <?php } ?>
          </table>
        <?php } else { ?>
          <h4><b>Tidak ada.</b></h4>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hblue">
      <div class="panel-heading">
        <h3><strong>Support Fungsi Lain</strong></h3>
      </div>
      <div class="panel-body">
        <?php if (!empty($data->rkf_fungsilain)) { ?>
          <table class="table table-striped">
            <tr class="info">
              <th class="col-sm-6">Unit Kerja</th>
              <th class="col-sm-3">Notes</th>
            </tr>
            <?php foreach ($data->rkf_fungsilain as $key => $dt) { ?>
              <tr>
                <td class="col-sm-6">
                  <?= cetakv2($kamusDivisi[$dt->unitKerja]); ?>
                </td>
                <td class="col-sm-3">
                  <?= cetakv2($dt->notes); ?>
                </td>
              </tr>
            <?php } ?>
          </table>
        <?php } else { ?>
          <h4><b>Tidak ada.</b></h4>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php 
  $pab = json_decode(file_get_contents(IP_API."/pab/".$data->rkf_id));
  if(!empty($pab)) { 
    ?>
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hblue">
      <div class="panel-heading">
        <h3><strong>Produk Aktivitas Baru</strong></h3>
      </div>
      <div class="panel-body">
  <table class="table table-striped">
          <tr>
            <td class="col-sm-3">Jenis</td>
            <td class="col-sm-9" >
              <?php echo $pab[0]->pab_jenis; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Nama</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_nama; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Tujuan Bank</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_tujuan_bank; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Tujuan Nasabah</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_tujuan_nasabah; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Keterkaitan</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_keterkaitan; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Resiko</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_resiko; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Mitigasi Resiko</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_mitigasi_resiko; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">Deskripsi</td>
            <td class="col-sm-9">
            <?php echo $pab[0]->pab_deskripsi; ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php  }?>

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
  $(document).on("click", ".button_approve", function() {
    let fromRKFId = $(this).data("rkfid");
    var urlnya = "<?= base_url() ?>rbb/rkf/approve-sfl";
    swal({
        title: "Jadikan Sebagai Program Kerja Baru?",
        text: '',
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya!"
      },
      function() {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: {
              fromRKFId: fromRKFId,
            },
            url: urlnya,
            success: function(data) {
                console.log(data);
                if (data) {
                  window.open('<?= base_url(); ?>rbb/rkf/show-new', '_self');
                }
            }
        });
      });
  });
</script>