<?php

$data           = $datas[0];
$alljson        = file_get_contents(IP_API . "/master/all", false);
$all            = json_decode($alljson);



$subdivjson     = file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_unit_kerja/" . $_SESSION['pegawai']->unit_kerja_id . "?api_key=prc", false);
$subdiv         = json_decode($subdivjson);
$pegsubdivjson  = file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_pegawai_per_subdiv/B001DMR201?api_key=prc", false);
$pegsubdiv      = json_decode($pegsubdivjson);

$data_anggaran = json_decode(file_get_contents(IP_API . "/master/poscoa"));

?>

<!--  jangan dihapus-->
<!-- tindak lanjut audit -->
<?php $dtAudit = array() ?>
<?php foreach ($all->allTLAudit as $key => $dt) {
  if (array_search($dt->tindak_lanjut_id, array_column($data->rkf_tlaudit, 'tlAudit')) !== false) {
    $dtAudit['tlnama'][] = array($dt->tindak_lanjut_nama);
  }
} ?>

<?php foreach ($data->rkf_tlaudit as $dt) {
  $dtAudit['tahun'][] = array($dt->tahunAudit);
} ?>

<!-- anggaran -->
<!-- <?php $dtAnggaran = array() ?>
<?php foreach ($all->allPosBiaya as $key => $dt) {
  if (array_search($dt->posbiaya_id, array_column($data->rkf_anggaran, 'posBiaya')) !== false) {
    $dtAnggaran['posBiaya'][] = array($dt->posbiaya_nama);
  }
} ?>

<?php foreach ($data->rkf_anggaran as $key => $dt) {
  $dtAnggaran['coa'][] = array($dt->coa);
  $dtAnggaran['bulan'][] = array($data->rkf_anggaran[$key]->bulan);
  $dtAnggaran['nominal'][] = array($data->rkf_anggaran[$key]->nominal);
} ?>
 -->


<!-- fungsilain -->
<?php $dtFungsiLain = array() ?>
<?php foreach ($all->divisi as $key => $dt) {
  if (array_search($dt->unit_kerja_id, array_column($data->rkf_fungsilain, 'unitKerja')) !== false) {
    $dtFungsiLain['unit_kerja_nama'][] = array($dt->unit_kerja_nama);
  }
} ?>

<?php foreach ($data->rkf_fungsilain as $key => $dt) {
  $dtFungsiLain['notes'][] = array($dt->notes);
} ?>


<!-- Unit pelaksana -->
<?php $dtUnitPelaksana = array() ?>
<?php foreach ($subdiv->result[0] as $key => $dt) {
  if (array_search($dt->id, array_column($data->rkf_unit_pelaksana, 'unitKerja')) !== false) {
    $dtUnitPelaksana['unit_kerja'][] = array($dt->nama);
  }
} ?>

<?php foreach ($pegsubdiv->result[0] as $key => $dt) {
  if (array_search($dt->pegawai_id, array_column($data->rkf_unit_pelaksana, 'pegawaiUnitKerja')) !== false) {
    $dtUnitPelaksana['pegawai'][] = array($dt->nama);
  } else {
    $dtUnitPelaksana['pegawai'][] = "-";
  }
} ?>

<!--  jangan dihapus end-->


<table align="center" border="1" style="border-collapse:collapse;" width="700">
  <tr>
    <th width="700" align="center" colspan="2" >
      <h3><?php echo $data->rkf_proker; ?></h3>

    </th>
  </tr>
  <tr>
    <td width="200">
      <b>Program kerja</b>
    </td>
    <td width="400">
      <?php if ($data->rkf_proker) {
        echo $data->rkf_proker;
      } ?>
    </td>
  </tr>
  <!-- <tr>
    <td width="200">
      <b>RKF ID</b>
    </td>
    <td width="530">
      <?= $data->rkf_id; ?>
    </td>
  </tr> -->
  <!-- <tr>
      <td width="200">
          <b>Status</b>
      </td>
      <td width="530">
        <?php
        if ($data->rkf_sts == 0) {
          echo  "<div style='color:#ff0000;'>Review</div>";
        } elseif ($data->rkf_sts == 1) {
          echo  "<div style='color:#62cb31;'>Draft</div>";
        } else {
          echo  "<div style='color: #ff9933;'>Otorisasi</div>";
        }
        ?>
      </td>
  </tr> -->
  <tr>
    <td width="200">
      <b>Visi</b>
    </td>
    <td width="400">
      <?php if (!empty($data->rkf_visi)) { ?>
        <?php foreach ($data->rkf_visi as $key => $dt) : ?>
          <?php echo $dt->label . "<br> "; ?>
          <!-- <?php echo $dt->value . ". " . $dt->label . "<br> "; ?> -->
        <?php endforeach; ?>
      <?php } ?>

    </td>
  </tr>
  <tr>
    <td width="200">
      <b>Misi</b>
    </td>
    <td width="400">
      <?php if (!empty($data->rkf_misi)) { ?>
        <?php foreach ($data->rkf_misi as $key => $dt) : ?>
          <?php echo $dt->label . "<br> "; ?>
          <!-- <?php echo $dt->value . ". " . $dt->label . "<br> "; ?> -->
        <?php endforeach; ?>
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td width="200">
      <b>Coreplan</b>
    </td>
    <td width="400">
      <?php if (!empty($data->rkf_coreplan)) { ?>
        <?php foreach ($data->rkf_coreplan as $key => $dt) : ?>
          <?php $data_corplan = json_decode(file_get_contents(IP_API . "/master/coreplan/detail/" . $dt)); ?>
          <!-- <?php print_r($data_corplan);
                    echo "<br>"; ?> -->
          <?php echo "Tahun   :".cetakv2($data_corplan[0]->is_tahun)."<br>"; ?>
          <?php echo "Inisiatif   :".cetakv2($data_corplan[0]->is_inisiatif_cp)."<br>"; ?>
          <?php echo "Target   :".cetakv2($data_corplan[0]->is_inisiatif_cp_target);
              echo "<br>"; ?>
          <?php echo "Sasaran   :";
              echo cetakv2($data_corplan[0]->is_sasaran_cp);
              echo "<br>"; ?>
          <?php echo "KPI   :";
              echo cetakv2($data_corplan[0]->is_kpi);
              echo "<br>"; ?>
          <?php echo "Target KPI   :";
              echo cetakv2($data_corplan[0]->is_kpi_target);
              echo "<br>"; ?>
          <hr />
        <?php endforeach; ?>
      <?php  } ?>
    </td>
  </tr>
  <tr>
    <td width="200">
      <b>Kebijakan Umum Direksi</b>
    </td>
    <td width="400">
      <?php if (!empty($all->allKUD)) { ?>
        <?php foreach ($all->allKUD as $dt) {
            if (array_search($dt->kud_id, array_column($data->rkf_kud, 'kud')) !== false) {
              $expl = explode("-", $dt->kud_nama);
              echo $expl[1];
              echo "<br>";
            } ?>
      <?php }
      } ?>
    </td>
  </tr>

  <tr>
    <td class="200"><b>Mendukung Transformasi BPD</b></td>
    <td class="400">
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
    <td class="200"><b>Mendukung RAKB</b></td>
    <td class="400">
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
    <td width="200">
      <b>Status Program Kerja</b>
    </td>
    <td width="400">

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
    <td width="200">
      <b>Skala Program Kerja</b>
    </td>
    <td width="400">
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
    <td width="200">
      <b>Kategori Program kerja</b>
    </td>
    <td width="400">
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
    <td width="200">
      <b>Prespektif BSC</b>
    </td>
    <td width="400">
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
    <td width="200">
      <b>Kerjasama dengan Konsultan</b>
    </td>
    <td width="400">
      <?php if (!empty($data->rkf_konsultan)) { ?>
        <?php if ($data->rkf_konsultan == 1) {
            echo "Iya";
          } else {
            echo "Tidak";
          } ?>
      <?php } ?>

    </td>
  </tr>
  <tr>
    <td width="200">
      <b>Tindak Lanjut Audit / Tahun</b>
    </td>
    <td width="400">
      <?php if (!empty($dtAudit['tlnama'])) { ?>
        <?php foreach ($dtAudit['tlnama'] as $key => $dt) {
            echo ($key + 1) . ". " . $dtAudit['tlnama'][$key][0] . " / " . $dtAudit['tahun'][$key][0];
            echo "<br>";
          } ?>
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td width="200">
      <b>Tujuan Program Kerja</b>
    </td>
    <td width="400">
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
    <td width="200"><b>Indikator Keberhasilan</b></td>
    <td width="400"></td>
    </tr>
    <tr>
    <td width="200" style="text-align:center"> Output</td>
    <td width="400">
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
    <td width="200" style="text-align:center">Outcome</td>
    <td width="400">
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
    <td width="200" style="text-align:center">Impact</td>
    <td width="400">
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
    <td width="200">
      <b>Jadwal Pelaksanaan /Target Penyelesaian</b>
    </td>
    <td width="400">
      <?php if (!empty($data->rkf_jadwal)) { ?>
        <?php foreach ($data->rkf_jadwal as $key => $dt) { ?>
          <?php echo $dt == end($data->rkf_jadwal) ? parse_bulan($dt) . "." : parse_bulan($dt) . ",";  ?>
        <?php } ?>
      <?php } ?>
    </td>
  </tr>
</table>

<br>
<br>
<table align="center" border="1" style="border-collapse:collapse;">
  <tr bgcolor="#CCCCCC">
    <th align="center" colspan="3">
      <h4><strong>Target Finansial</strong></h4>
    </th>
  </tr>
  <tr>
    <th width="400" align="center" bgcolor="#CCCCCC">
      Uraian
    </th>
    <th width="170" align="center" bgcolor="#CCCCCC">
      Target Kuantitatif
    </th>
    <th width="150" align="center" bgcolor="#CCCCCC">
      Satuan
    </th>
  </tr>
  <?php if ($data->rkf_targetfin) { ?>
    <?php foreach ($data->rkf_targetfin as $key => $dt) : ?>
      <tr>
        <td width="400">
          &nbsp;&nbsp;&nbsp;<?php echo $dt->uraian; ?>
        </td>
        <td width="170" align="center">
          <?php echo number_format($dt->targetKuantitatif, 0, ",", "."); ?>
        </td>
        <td width="150" align="center">
          <?php echo $dt->satuan; ?>
        </td>
      </tr>

    <?php endforeach; ?>
  <?php } ?>
</table>

<br><br>

<table align="center" border="1" style="border-collapse:collapse;">
  <tr>
    <th align="center" colspan="6" bgcolor="#CCCCCC">
      <h4><strong>Anggaran</strong></h4>
    </th>
  </tr>

  <tr class="info">
    <th width="90" align="center" bgcolor="#CCCCCC">
      Jenis
    </th>
    <th width="150" align="center" bgcolor="#CCCCCC">
      COA
    </th>
    <th width="100" align="center" bgcolor="#CCCCCC">
      Sub Nama 1
    </th>
    <th width="100" align="center" bgcolor="#CCCCCC">
      Sub Nama 2
    </th>
    <th width="100" align="center" bgcolor="#CCCCCC">
      Sub Nama 3
    </th>
    <th width="150" align="center" bgcolor="#CCCCCC">
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
        <td width="90" align="center">
          <?php echo ($data_angg[0]->pos_coa_jenis_nama); ?>
        </td>
        <td width="150" align="center">
          <?php echo ($data_angg[0]->pos_coa_header_nama); ?>
        </td>
        <td width="100" align="center">
          <?php echo ($data_angg[0]->pos_coa_sub1_nama); ?>
        </td>
        <td width="100" align="center">
          <?php echo ($data_angg[0]->pos_coa_sub2_nama); ?>
        </td>
        <td width="100" align="center">
          <?php echo ($data_angg[0]->pos_coa_sub3_nama); ?>
        </td>
        <td width="150" align="center">
          <?php
              foreach ($dt->nominal as $key_nominal => $dt_nominal) {
                echo parse_bulan_short($key_nominal + 1) . " : Rp. ";
                echo (!empty($dt_nominal))? cetakv2(number_format($dt_nominal)): '';
                echo "<br/>";
              }
              if ($data_angg[0]->pos_coa_jenis_nama == "LABA RUGI") {
                $total = array_sum($dt->nominal);
                echo "<b>Total : </b> Rp. " .number_format($total) ;
              }; ?>
        </td>
      </tr>
    <?php } ?>
  <?php } ?>
</table>



<br><br>

<table align="center" border="1" style="border-collapse:collapse;">
  <tr>
    <th align="center" colspan="2" bgcolor="#CCCCCC">
      <h4><strong>Unit Pelaksana</strong></h4>
    </th>
  </tr>
  <tr>
    <th width="370" bgcolor="#CCCCCC" align="center">
      Unit Kerja Setingkat Sub Divisi
    </th>
    <th width="370" bgcolor="#CCCCCC" align="center">
      Person In Charge
    </th>

  </tr>
  <?php
  foreach ($data->rkf_unit_pelaksana as $value) {
    $pegawaijson  = file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_pegawai_detail/" . $value->pegawaiUnitKerja . "?api_key=prc", false);
    $pegawai      = json_decode($pegawaijson);
    ?>
    <tr>
      <td width="370">
        <?php cetak($pegawai->result[0][0]->subdiv); ?>

      </td>
      <td width="370">
        <?php cetak($pegawai->result[0][0]->nama); ?>
      </td>
    </tr>
  <?php } ?>
</table>

<br><br>

<table align="center" border="1" style="border-collapse:collapse;">
  <tr>
    <th align="center" colspan="2" bgcolor="#CCCCCC">
      <h4><strong>Support Fungsi Lain</strong></h4>
    </th>
  </tr>
  <tr>
    <th width="370" bgcolor="#CCCCCC" align="center">
      Unit Kerja
    </th>
    <th width="370" bgcolor="#CCCCCC" align="center">
      Notes
    </th>
  </tr>
  <?php if (!empty($dtFungsiLain['unit_kerja_nama'])) { ?>
    <?php foreach ($dtFungsiLain['unit_kerja_nama'] as $key => $dt) : ?>
      <tr>
        <td width="370">
          &nbsp;&nbsp;&nbsp;<?php echo $dtFungsiLain['unit_kerja_nama'][$key][0]; ?>
        </td>
        <td width="370">
          &nbsp;&nbsp;&nbsp;<?php echo $dtFungsiLain['notes'][$key][0]; ?>
        </td>
      </tr>

    <?php endforeach; ?>
  <?php } ?>
</table>