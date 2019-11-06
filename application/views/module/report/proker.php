<?php
if($download==1){
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Rkf.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
}else{ ?>
     <a href="<?=base_url()?>rbb/user/downloadreport"><button class="btn-success btn-lg pull-right">Download</button></a>
<?php } ?>
<h3><b>RENCANA KERJA FUNGSIONAL TAHUN <?=$tahun?></b></h3>
<h4><?=$divisi;?><br /><?=$jenisrkf?></h4>
<table border=1 cellspacing=0 cellpadding=0>
  <tr bgcolor="white">
    <th rowspan="2" style="text-align:center; width:3%;">
      NO
    </th>
    <th rowspan="2" style="text-align:center; width:15%;">
      KEBIJAKAN UMUM DIREKSI
    </th>
    <th rowspan="2" style="text-align:center; width:3%;">
      NO
    </th>
    <th rowspan="2" style="text-align:center; width:15%;">
      PROGRAM KERJA
    </th>
    <th colspan="2" style="text-align:center; width:30%;">
      UKURAN KEBERHASILAN
    </th>
    <th style="text-align:center; width:10%;">
      JADWAL
    </th>
    <th rowspan="2" style="text-align:center; width:10%;">
       FUNGSI LAIN TERKAIT
    </th>
    <th rowspan="2" style="text-align:center; width:10%;">
      PIC
    </th>
    <th rowspan="2" style="text-align:center; width:4%;">
      KET
    </th>
  </tr>
  <tr bgcolor="white">
    <th style="text-align:center; width:15%;">
      INDIKATOR
    </th>
    <th style="text-align:center; width:15%;">
      TARGET PENCAPAIAN
    </th>
    <th style="text-align:center;">
      (BULAN)
    </th>
  </tr>
  <?php
     //Foreach Prespektif
    foreach($data as $prespektif){
  ?>
       <tr bgcolor="#CCCCCC">
         <td colspan="10">
             <b><?=$prespektif['nama']?></b>
         </td>
       </tr>
            <?php
              //Foreach kud
              $nomor_kud=1;
             foreach($prespektif["result"] as $kud_key =>$kud  ){
                  $count_kud= count($kud["result"]);
                  $n=1;
                  //Foreach Program Kerja
                  foreach($kud["result"] as $dt){
            ?>
                <tr bgcolor="white">
                     <?php if($n==1){ ?>
                          <td rowspan="<?=$count_kud?>" style="vertical-align:top;text-align:center;">
                               <?=$nomor_kud?>
                          </td>
                            <td rowspan="<?=$count_kud?>" style="vertical-align:top;text-align:justify;">
                                 <ul>
                                      <?php
                                       if($kud_key <> "-"){
                                            $pecah_kud= explode("-",$kud_key);
                                            foreach($pecah_kud as $detail_kud){
                                                 $detail= json_decode(file_get_contents(IP_API.'/master/kud/'.$detail_kud, false));
                                                 $pecah_nama_kud= explode("-",$detail[0]->kud_nama);
                                                 echo "<li>".$pecah_nama_kud[1]."</li>";
                                            }
                                       }else{
                                            echo "<li><b>-</b></li>";
                                       } ?>
                                 </ul>
                            </td>
                       <?php } ?>

                  <td style="text-align:center; vertical-align:top;">
                    <?=$n?>
                  </td>
                  <td style="vertical-align:top;">
                    <?=$dt->rkf_proker?>
                  </td>
                  <td style="vertical-align:top;">
                    <?=$dt->rkf_indikator?>
                  </td>
                  <td style="vertical-align:top;">
                    <?=$dt->rkf_tujuan_proker?>
                  </td>
                  <td style="vertical-align:top;">
                    <?php if (!empty($dt->rkf_jadwal)) { ?>
                      <?php
                        asort($dt->rkf_jadwal);
                        $count= count($dt->rkf_jadwal);
                        $k=1;
                        foreach ($dt->rkf_jadwal as $key => $dk){ ?>
                        <?php
                        if($count <> $k){
                          echo $this->gmodel->kondisi_bulan_short($dk).",";
                        }else{
                          if($count<>1){
                            echo $this->gmodel->kondisi_bulan_short($dk).".";
                          }else{
                            echo $this->gmodel->kondisi_bulan_short($dk);
                          }
                        }
                        ?>
                      <?php $k++; } ?>
                    <?php } ?>
                  </td>
                  <td style="vertical-align:top;">
                    <!-- fungsilain -->
                  </td>
                  <td style="vertical-align:top;">
                    <?php
                      if(!empty($dt->rkf_unit_pelaksana)){
                        $subdiv= "";
                        foreach($dt->rkf_unit_pelaksana as $unit){
                          $pegawaijson  = file_get_contents("http://10.66.10.40/api_v2/pegawai/prc_get_pegawai_detail/".$unit->pegawaiUnitKerja."?api_key=prc", false);
                          $pegawai      = json_decode($pegawaijson);
                          //echo ucwords(strtolower($pegawai->result[0][0]->nama))." - ".$pegawai->result[0][0]->subdiv."<br />";
                          if(!empty($pegawai)){
                            if($pegawai->result[0][0]->subdiv <> $subdiv){
                              echo $pegawai->result[0][0]->subdiv."<br />";
                            }
                            $subdiv= $pegawai->result[0][0]->subdiv;
                          }
                        }
                      }
                    ?>
                  </td>
                  <td style="vertical-align:top;">
                  </td>
                </tr>
<?php
                         $n++;
                        }
                        $nomor_kud++;
                   }
              }
?>
</table>

<br />
<br />
<br />
<br />
<br />
