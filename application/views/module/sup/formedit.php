<!-- copas dari detail_rkf -->
<?php
$data           = $datas[0];
$alljson        = file_get_contents(IP_API . "/master/all", false);
$all            = json_decode($alljson);

$data_anggaran = json_decode(file_get_contents(IP_API . "/master/poscoa"));

?>

<!--  jangan dihapus-->
<!-- tindak lanjut audit -->
<?php $dtAudit = array() ?>
<?php
if (!empty($data->rkf_tlaudit)) {
  foreach ($all->allTLAudit as $key => $dt) {
    if (array_search($dt->tindak_lanjut_id, array_column($data->rkf_tlaudit, 'tlAudit')) !== false) {
      $dtAudit['tlnama'][] = array($dt->tindak_lanjut_nama);
    }
  }
}
?>

<?php
if (!empty($data->rkf_tlaudit)) {
  foreach ($data->rkf_tlaudit as $dt) {
    $dtAudit['tahun'][] = array($dt->tahunAudit);
  }
}
?>

<!-- anggaran -->
<?php
if (!empty($data->rkf_anggaran)) {
  $dtAnggaran = array();
  foreach ($all->allPosBiaya as $key => $dt) {
    if (array_search($dt->posbiaya_id, array_column($data->rkf_anggaran, 'posBiaya')) !== false) {
      $dtAnggaran['posBiaya'][] = array($dt->posbiaya_nama);
    }
  }
}
?>

<!-- <?php
      if (!empty($data->rkf_anggaran)) {
        foreach ($data->rkf_anggaran as $key => $dt) {
          $dtAnggaran['coa'][] = array($dt->coa);
          $dtAnggaran['bulan'][] = array($data->rkf_anggaran[$key]->bulan);
          $dtAnggaran['nominal'][] = array($data->rkf_anggaran[$key]->nominal);
        }
      }
      ?> -->



<!-- fungsilain -->
<?php
if (!empty($data->rkf_fungsilain)) {
  $dtFungsiLain = array();
  foreach ($all->divisi as $key => $dt) {
    if (array_search($dt->unit_kerja_id, array_column($data->rkf_fungsilain, 'unitKerja')) !== false) {
      $dtFungsiLain['unit_kerja_nama'][] = array($dt->unit_kerja_nama);
    }
  }

  foreach ($data->rkf_fungsilain as $key => $dt) {
    $dtFungsiLain['notes'][] = array($dt->notes);
  }
}
?>


<!--  jangan dihapus end-->

<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="hpanel hred">
      <div class="panel-heading">
        <h3><strong><?php echo $data->rkf_proker; ?></strong></h3>
        <!-- <?php print_r($data); ?> -->
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <tr>
            <td class="col-sm-2">
              RKF ID
            </td>
            <td class="col-sm-9">
              <?= $data->rkf_id; ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Status
            </td>
            <td class="col-sm-9">
              <?php
              switch ($data->rkf_sts) {
                case '0':
                  echo  "<div style='color:#ff9933;'>Review</div>";
                  break;
                case '1':
                  echo  "<div style='color:#62cb31;'>Draft</div>";
                  break;
                default:
                  echo  "<div style='color: #ff0000;'>Approved</div>";
                  break;
              }
              ?>
                <p>[<?php echo (!empty($data->rkf_note_otor)) ? "$data->rkf_note_otor" : ""; ?>]</p>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Visi
            </td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_visi)) { ?>
                <?php foreach ($data->rkf_visi as $key => $dt) : ?>
                  <?php echo $dt->value . ". " . $dt->label . "<br> "; ?>
                <?php endforeach; ?>
              <?php } ?>

            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Misi
            </td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_misi)) { ?>
                <?php foreach ($data->rkf_misi as $key => $dt) : ?>
                  <?php echo $dt->value . ". " . $dt->label . "<br> "; ?>
                <?php endforeach; ?>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Coreplan
            </td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_coreplan)) { ?>
                <?php foreach ($data->rkf_coreplan as $key => $dt) : ?>
                  <?php $data_corplan = json_decode(file_get_contents(IP_API . "/master/coreplan/detail/" . $dt)); ?>
                  <!-- <?php print_r($data_corplan);
                            echo "<br>"; ?> -->
                  <?php echo "Tahun   :";
                      cetak($data_corplan[0]->is_tahun);
                      echo "<br>"; ?>
                  <?php echo "Inisiatif   :";
                      cetak($data_corplan[0]->is_inisiatif_cp);
                      echo "<br>"; ?>
                  <?php echo "Target   :";
                      cetak($data_corplan[0]->is_inisiatif_cp_target);
                      echo "<br>"; ?>
                  <?php echo "Sasaran   :";
                      cetak($data_corplan[0]->is_sasaran_cp);
                      echo "<br>"; ?>
                  <?php echo "KPI   :";
                      cetak($data_corplan[0]->is_kpi);
                      echo "<br>"; ?>
                  <?php echo "Target KPI   :";
                      cetak($data_corplan[0]->is_kpi_target);
                      echo "<br>"; ?>
                  <hr />
                <?php endforeach; ?>
              <?php  } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Kebijakan Umum Direksi
            </td>
            <td class="col-sm-9">
              <?php if (!empty($all->allKUD)) { ?>
                <?php foreach ($all->allKUD as $dt) {
                    if (array_search($dt->kud_id, array_column($data->rkf_kud, 'kud')) !== false) {
                      echo $dt->kud_nama;
                      echo "<br>";
                    } ?>
              <?php }
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Program kerja
            </td>
            <td class="col-sm-9">
              <?php if ($data->rkf_proker) {
                echo $data->rkf_proker;
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Status Program Kerja
            </td>
            <td class="col-sm-9">

              <?php if (!empty($all->allStsProker)) {
                foreach ($all->allStsProker as $dt) {
                  if ($dt->sts_proker_id == $data->rkf_status_proker) {
                    echo $dt->sts_proker_nama;
                  }
                }
              } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Skala Program Kerja
            </td>
            <td class="col-sm-9">
              <?php if (!empty($all->allSkalaProker)) { ?>
                <?php foreach ($all->allSkalaProker as $dt) {
                    if ($dt->skala_proker_id == $data->rkf_skala_proker) {
                      echo $dt->skala_proker_nama;
                    }
                  } ?>
              <?php  } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Kategori Program kerja
            </td>
            <td class="col-sm-9">
              <?php if (!empty($all->allKatProker)) { ?>
                <?php foreach ($all->allKatProker as $dt) {
                    if ($dt->kat_proker_id == $data->rkf_kat_proker) {
                      echo $dt->kat_proker_nama;
                    }
                  } ?>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Prespektif BSC
            </td>
            <td class="col-sm-9">
              <?php if (!empty($all->allBSC)) { ?>
                <?php foreach ($all->allBSC as $dt) {
                    if ($dt->bsc_id == $data->rkf_bsc) {
                      echo $dt->bsc_nama;
                    }
                  } ?>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Kerjasama dengan Konsultan
            </td>
            <td class="col-sm-9">
              <?php if (isset($data->rkf_konsultan)) {
                echo ($data->rkf_konsultan == 1) ? "iya" : "tidak";
              }
              ?>

            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Tindak Lanjut Audit / Tahun
            </td>
            <td class="col-sm-9">
              <?php
              if (!empty($dtAudit['tlnama'])) {
                foreach ($dtAudit['tlnama'] as $key => $dt) {
                  echo ($key + 1) . ". " . $dtAudit['tlnama'][$key][0] . " / " . $dtAudit['tahun'][$key][0];
                  echo "<br>";
                }
              }
              ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Tujuan Program Kerja
            </td>
            <td class="col-sm-9">
              <?php if ($data->rkf_tujuan_proker) { ?>
                <?php foreach ($data->rkf_tujuan_proker as $key => $dt) { ?>
                  <?php if (!empty($dt)) {  ?>
                    <?php echo ($key + 1) . ". " . $dt; ?>
                    <?php echo "<br>" ?>
                <?php }
                  } ?>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Indikator Keberhasilan
            </td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_indikator)) { ?>
                <?php foreach ($data->rkf_indikator as $key => $dt) { ?>
                  <?php if (!empty($dt)) {  ?>
                    <?php echo ($key + 1) . ". " . $dt; ?>
                    <?php echo "<br>" ?>
                <?php }
                  } ?>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="col-sm-3">
              Jadwal Pelaksanaan /Target Penyelesaian
            </td>
            <td class="col-sm-9">
              <?php if (!empty($data->rkf_jadwal)) {
                asort($data->rkf_jadwal);
                $count = count($data->rkf_jadwal);
                $k = 1;
                foreach ($data->rkf_jadwal as $key => $dk) {
                  if ($count <> $k) {
                    echo $this->gmodel->kondisi_bulan($dk) . ",&nbsp;";
                  } else {
                    if ($count <> 1) {
                      echo $this->gmodel->kondisi_bulan($dk) . ".";
                    } else {
                      echo $this->gmodel->kondisi_bulan($dk);
                    }
                  }

                  $k++;
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
              <th class="col-sm-6">
                Uraian
              </th>
              <th class="col-sm-3">
                Target Kuantitatif
              </th>
              <th class="col-sm-3">
                Satuan
              </th>
            </tr>
            <?php foreach ($data->rkf_targetfin as $key => $dt) : ?>
              <tr>
                <td class="col-sm-6">
                  <?php echo $dt->uraian; ?>
                </td>
                <td class="col-sm-3">
                  <?php echo $dt->targetKuantitatif; ?>
                </td>
                <td class="col-sm-3">
                  <?php echo $dt->satuan; ?>
                </td>
              </tr>
            <?php endforeach; ?>
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
        <table class="table table-striped">
          <tr class="info">
            <th class="col-sm-2">
              Jenis
            </th>
            <th class="col-sm-2">
              COA
            </th>
            <th class="col-sm-2">
              Sub Nama 1
            </th>
            <th class="col-sm-2">
              Sub Nama 2
            </th>
            <th class="col-sm-2">
              Sub Nama 3
            </th>
            <th class="col-sm-2">
              Nominal
            </th>
          </tr>
          <?php if (!empty($data->rkf_anggaran)) { ?>
            <?php foreach ($data->rkf_anggaran as $key => $dt) { ?>
              <?php
                  $idnya = $dt->coa;
                  $data_angg = array_filter($data_anggaran, function ($var) use ($idnya) {
                    return ($var->pos_coa_sub3_id == $idnya);
                  });
                  $data_angg = array_values($data_angg);
                  ?>
              <!-- <?php echo "<pre>";
                        print_r($data_angg);
                        echo "</pre>"; ?> -->
              <tr>
                <td class="col-sm-2">
                  <?php echo ($data_angg[0]->pos_coa_jenis_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?php echo ($data_angg[0]->pos_coa_header_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?php echo ($data_angg[0]->pos_coa_sub1_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?php echo ($data_angg[0]->pos_coa_sub2_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?php echo ($data_angg[0]->pos_coa_sub3_nama); ?>
                </td>
                <td class="col-sm-2">
                  <?php
                      foreach ($dt->nominal as $key_nominal => $dt_nominal) {
                        echo parse_bulan_short($key_nominal + 1) . " : Rp. ";
                        cetak($dt_nominal);
                        echo "<br/>";
                      }
                      if ($data_angg[0]->pos_coa_jenis_nama == "LABA RUGI") {
                        echo "<b>Total : </b> Rp. " . array_sum($dt->nominal);
                      }; ?>
                </td>
              </tr>
            <?php } ?>
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
              <th class="col-sm-6">
                Unit Kerja Setingkat Sub Divisi
              </th>
              <th class="col-sm-3">
                Person In Charge
              </th>
            </tr>
            <?php
              foreach ($data->rkf_unit_pelaksana as $value) {
                $pegawaijson  = file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_pegawai_detail/" . $value->pegawaiUnitKerja . "?api_key=prc", false);
                $pegawai      = json_decode($pegawaijson);
                ?>
              <tr>
                <td class="col-sm-6">
                  <?php echo $pegawai->result[0][0]->subdiv; ?>

                </td>
                <td class="col-sm-3">
                  <?php echo $pegawai->result[0][0]->nama; ?>
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
        <?php if (!empty($dtFungsiLain['unit_kerja_nama'])) { ?>
          <table class="table table-striped">
            <tr class="info">
              <th class="col-sm-6">
                Unit Kerja
              </th>
              <th class="col-sm-3">
                Notes
              </th>
            </tr>
            <?php foreach ($dtFungsiLain['unit_kerja_nama'] as $key => $dt) : ?>
              <tr>
                <td class="col-sm-6">
                  <?php echo $dtFungsiLain['unit_kerja_nama'][$key][0]; ?>
                </td>
                <td class="col-sm-3">
                  <?php echo $dtFungsiLain['notes'][$key][0]; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        <?php } else { ?>
          <h4><b>Tidak ada.</b></h4>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- copas dari detail_rkf end -->

<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="hpanel hred">
        <div class="panel-heading">
          <h3><strong>Catatan Untuk review...</strong></h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <textarea rows="6" class="col-md-12" style="max-width: 100%;" name="rkfCatatanReview" placeholder="Catatan RKF..." required><?= $data->rkf_note_otor ?></textarea>
          </div>
          <div class="col-md-6"><button type="submit" name="submit" value='0' class="btn btn-warning btn-block"><i class="fa fa-reply pull-center"></i>&nbsp;&nbsp;Review</button></div>
          <div class="col-md-6"><button type="submit" name="submit" value='2' class="btn btn-success btn-block"><i class="fa fa-floppy-o pull-center"></i>&nbsp;&nbsp;Approve</button></div>
        </div>
      </div>
    </div>
  </div>
</form>

<div style="padding-bottom: 50px;"></div>