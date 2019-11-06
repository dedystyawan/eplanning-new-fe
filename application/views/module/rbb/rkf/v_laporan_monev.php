<style >
  div .sentuh:hover{
    background-color: #89b1c7;
    cursor: pointer;
  }
  .proker:hover{
    cursor:pointer;
    background-color:grey;
    color:white;
    font-weight: bold;
  }

</style>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


<?php

$periode = json_decode(file_get_contents(IP_API."/master/perioderkf/".date("Y")),false);
$dataRkf = json_decode(file_get_contents(IP_API."/"."rkf/".$_SESSION['pegawai']->unit_kerja_id."/".date("Y")."/".$periode->periode_jenis, false));

$kamusUnitKerja =  file_get_contents(SDM_API."/api_v2/pegawai/prc_get_unit_kerja/".$_SESSION['pegawai']->unit_kerja_id."?api_key=prc");
$kamusUnitKerja = json_decode($kamusUnitKerja, true);
$kamusUnitKerja =  $kamusUnitKerja['result'][0];
$laporanAktivitasjson = file_get_contents(IP_API.'/dashboard/detailaktivitas/'.$_SESSION['pegawai']->unit_kerja_id.'/'.date("Y").'/'.$bulan);
$laporanAktivitas = json_decode($laporanAktivitasjson);


//untuk table laporan
$skalaProker = json_decode(file_get_contents(IP_API.'/master/skalaprokerall'));
$bsc = json_decode(file_get_contents(IP_API.'/master/bscall'));
$subdiv = json_decode(file_get_contents(SDM_API.'/api_v2/pegawai/prc_get_unit_kerja/'.$_SESSION['pegawai']->unit_kerja_id.'?api_key=prc"'))->result[0];
$kamusSubdiv = array_column($subdiv, 'nama', 'id');


$fileDokumenAktivitas = json_decode(file_get_contents(IP_API.'/aktivitas/docupload/all'));
$fileDokumenAktivitas = array_column($fileDokumenAktivitas, 'doc_aktivitas_nama', 'doc_aktivitas_id');

// echo "<pre>";
// print_r($bsc);
// // print_r($subdiv);
// // print_r($laporanAktivitas[0]);
// echo "</pre>";

$temp = $bsc;
$bsc[0] = $temp[0];
$bsc[1] = $temp[3];
$bsc[2] = $temp[1];
$bsc[3] = $temp[2];

// echo "<pre>";
// print_r($bsc);
// // print_r($subdiv);
// // print_r($laporanAktivitas[0]);
// echo "</pre>";


//untuk laporan berdasarkan subdiv
// foreach($laporanAktivitas as $dt){
//   echo "<pre>";
//   print_r($dt->daunit_pelaksana[0]);
//   echo "</pre>";
// }


foreach($subdiv as  $dt){
  $selektor = $dt->id;
  $lapKatSubdiv[$dt->nama] = array_filter($laporanAktivitas, function ($var) use($selektor){
    return ($var->daunit_pelaksana[0]->unitKerja == $selektor);
  });
  $lapKatSubdiv[$dt->nama] = array_values($lapKatSubdiv[$dt->nama]);
}
// echo "<pre>";
// // print_r($subdiv);
// // print_r($lapKatSubdiv);
// echo "</pre>";



// foreach($laporanAktivitas as $dt){
//   echo "<pre>";
//   print_r($dt->daunit_pelaksana[0]->unitKerja);
//   echo "</pre>";
 
// }

//untuk laporan berdasarkan skala proker
foreach($skalaProker as $dt){
  $selektor = $dt->skala_proker_id;
  $lapKatSkala[$dt->skala_proker_nama] = array_filter($laporanAktivitas, function ($var) use($selektor){
    return ($var->daskala_proker == $selektor );
  });  
  $lapKatSkala[$dt->skala_proker_nama] = array_values($lapKatSkala[$dt->skala_proker_nama]);
}

//untuk laporan berdasarkan perspektif
foreach($bsc as $dt){
  $selektor = $dt->bsc_id;
  $lapKatBsc[$dt->bsc_nama] = array_filter($laporanAktivitas, function ($var) use($selektor){
    return ($var->dabsc == $selektor );
  });  
  $lapKatBsc[$dt->bsc_nama] = array_values($lapKatBsc[$dt->bsc_nama]);
}
$lapKatSkala = array_reverse($lapKatSkala);





// echo "<pre>";
// print_r($kamusUnitKerja);
// print_r($lapKatBsc);
// print_r($lapKatSubdiv);
// foreach($lapKatSkala as $dt);
// print_r($dataRkf);
// echo "</pre>";


 ?>



<div class="row">

    <div class="col-lg-12 animated-panel zoomIn" style="animation-delay: 0.01s;">
        <div class="hpanel " style="font-size:12px">
          <!-- headingnya -->
            <div class="panel-heading hbuilt text-center">
              <h3><b>LAPORAN MONEV</b></h3>
              <h4><b><?=$_SESSION['pegawai']->unit_kerja?></b></h4>
              <h4><b>Bulan: <?=parse_bulan($bulan)?> <?=Date("Y")?></b></h4>
            </div>
            <div class="panel-body" style="display: block;">
                <div class="row" >
              <div class="col-md-2 pull-right " style="margin-bottom:10px" >
              <select name="" class="form-control filternya" style="background-color:#dbdbdb">
                <option value="1">Skala</option>
                <option value="2">Perspektif</option>
                <option value="3">Sub Bagian</option>
              </select>
              </div>

                </div>
                <div class="row m-b-md table-responsive" >
                  <table class="table table-bordered table-stripped table-hover" style="width:100%; font-size:12px;">
                  <thead>
                    <tr>
                      <th rowspan="3" style="width:5%; text-align:center;vertical-align:middle">No.</th>
                      <th rowspan="3" style="width:40%; text-align:center;vertical-align:middle">Program Kerja</th>
                      <th rowspan="3" style="width:5%; text-align:center;vertical-align:middle">Total Aktivitas</th>
                      <th colspan="5" style=" text-align:center;vertical-align:top;  border-bottom:1px solid #DDDDDD">Aktivitas Pada Bulan <?=parse_bulan($bulan);?></th>
                      <th colspan=4 style="text-align:center;vertical-align:top; border-bottom:1px solid #DDDDDD">Aktivitas Total</th>
                    </tr>
                    
                    <tr>
                      <th rowspan="2" style="width:5%; text-align:center;vertical-align:top">Jatuh Tempo</th>
                      <th colspan="3" style="text-align:center;vertical-align:top;  border-bottom:1px solid #DDDDDD">Pencapaian</th>
                      <th rowspan="2" style="width:5%; text-align:center;vertical-align:middle">%</th>
                      <th colspan="3" style="width:5%; text-align:center;vertical-align:top; border-bottom:1px solid #DDDDDD">Pencapaian</th>
                      <th rowspan="2" style="width:5%; text-align:center;vertical-align:middle">%</th>
                    </tr>
                    <tr>
                      <th style="width:5%; text-align:center;vertical-align:top">Selesai</th>
                      <th style="width:5%; text-align:center;vertical-align:top">Dalam Proses</th>
                      <th style="width:5%; text-align:center;vertical-align:top">Belum</th>
                      <th style="width:5%; text-align:center;vertical-align:top">Selesai</th>
                      <th style="width:5%; text-align:center;vertical-align:top">Dalam Proses</th>
                      <th style="width:5%; text-align:center;vertical-align:top">Belum</th>
                    </tr>
                  </thead>
                  <tbody class = "bungkus-laporan">
                    <?php 
                    $aktTotal = 0;
                    $aktJT = 0;
                    $aktblnSelesai = 0;
                    $aktblnProses  = 0;
                    $aktblnBelum = 0;
                    $aktSelesai = 0;
                    $aktProses = 0;
                    $aktBelum = 0;
                     foreach($lapKatSkala as $keyKat => $dtKat){?>
                    <tr>
                      <td colspan="12"> <?php echo "<b>" ;cetak($keyKat); echo "</b>"; ?></td>
                    </tr>
                    <?php 
                       $subaktTotal = 0;
                       $subaktJT = 0;
                       $subaktblnSelesai = 0;
                       $subaktblnProses  = 0;
                       $subaktblnBelum = 0;
                       $subaktSelesai = 0;
                       $subaktProses = 0;
                       $subaktBelum = 0;
                    if(!empty($dtKat)){ foreach($dtKat as $key => $dt) {
                      $subaktTotal += $dt->totalaktivitas;
                      $subaktJT += $dt->blnini_jt;
                      $subaktblnSelesai += $dt->blnini_selesai;
                      $subaktblnProses  += $dt->blnini_proses;
                      $subaktblnBelum += $dt->blnini_belum;
                      $subaktSelesai += $dt->aktselesai;
                      $subaktProses += $dt->aktproses;
                      $subaktBelum += $dt->aktbelum;
                      
                      ?>
                    <tr>
                    <td style="text-align:center"><?php echo $key+1; ?></td>
                    <td class="proker"  onclick="keHalaman('<?= base_url() ?>rbb/rkf/monev/show/<?=$dt->daid?>/<?=$bulan?>')" ><?php cetak($dt->danama); ?></td>
                    <td style="text-align:center"><?php cetak($dt->totalaktivitas); ?></td>
                    <td style="text-align:center"><?php cetak($dt->blnini_jt); ?></td>
                    <td style="text-align:center"><?php cetak($dt->blnini_selesai); ?></td>
                    <td style="text-align:center"><?php cetak($dt->blnini_proses); ?></td>
                    <td style="text-align:center"><?php cetak($dt->blnini_belum); ?></td>
                    <td style="text-align:center">
                    <?php 
                      if($dt->blnini_jt != 0){
                        echo (round($dt->blnini_selesai/$dt->blnini_jt*100))."%";
                      }else{
                        echo "0%";
                      }
                     ?>
                    </td>
                    <td style="text-align:center"><?php cetak($dt->aktselesai); ?></td>
                    <td style="text-align:center"><?php cetak($dt->aktproses); ?></td>
                    <td style="text-align:center"><?php cetak($dt->aktbelum); ?></td>
                    <td style="text-align:center"> <?php 
                      if($dt->totalaktivitas != 0){
                        echo (round($dt->aktselesai/$dt->totalaktivitas*100))."%";
                      }else{
                        echo "0%";
                      }
                     ?>
                     </td>
                    </tr>
                    
                    <?php }} ?>
                    <tr>
                          <td colspan="2" style="text-align:right"><b>Sub Total</b></td>
                          <td style="text-align:center"><b><?=$subaktTotal; ?></b></td>
                          <td style="text-align:center"><b><?=$subaktJT; ?></b></td>
                          <td style="text-align:center"><b><?=$subaktblnSelesai; ?></b></td>
                          <td style="text-align:center"><b><?=$subaktblnProses; ?></b></td>
                          <td style="text-align:center"><b><?= $subaktblnBelum; ?></b></td>
                          <td style="text-align:center"><b> 
                          <?php 
                          if($subaktJT != 0){
                            echo (round($subaktblnSelesai/$subaktJT*100))."%";
                          }else{
                            echo "0%";
                          }
                         ?></b>
                          </td>
                          <td style="text-align:center"><b><?=$subaktSelesai; ?></b></td>
                          <td style="text-align:center"><b><?=$subaktProses; ?></b></td>
                          <td style="text-align:center"><b><?=$subaktBelum; ?></b></td>
                          <td style="text-align:center">
                        <b>  <?php 
                          if($subaktTotal != 0){
                            echo (round($subaktSelesai/$subaktTotal*100))."%";
                          }else{
                            echo "0%";
                          }
                         ?></b>
                          </td>
                    </tr>
                 <?php 
                /////////////
                $aktTotal += $subaktTotal;
                $aktJT += $subaktJT;
                $aktblnSelesai +=  $subaktblnSelesai;
                $aktblnProses  += $subaktblnProses;
                $aktblnBelum +=  $subaktblnBelum;
                $aktSelesai += $subaktSelesai;
                $aktProses += $subaktProses;
                $aktBelum += $subaktBelum;
                } ?>
                    <tr>
                      <td colspan="2" style="text-align:right"><b>Total</b></td>
                      <td style="text-align:center"><b><?=$aktTotal; ?></b></td>
                      <td style="text-align:center"><b><?=$aktJT; ?></b></td>
                      <td style="text-align:center"><b><?=$aktblnSelesai; ?></b></td>
                      <td style="text-align:center"><b><?=$aktblnProses; ?></b></td>
                      <td style="text-align:center"><b><?=$aktblnBelum; ?></b></td>
                      <td style="text-align:center">
                      <b><?php 
                          if($aktJT != 0){
                            echo (round($aktblnSelesai/$aktJT*100))."%";
                          }else{
                            echo "0%";
                          }
                         ?></b>
                      </td>
                      <td style="text-align:center"><b><?=$aktSelesai; ?></b></td>
                      <td style="text-align:center"><b><?=$aktProses; ?></b></td>
                      <td style="text-align:center"><b><?=$aktBelum; ?></b></td>
                      <td style="text-align:center">
                      <b><?php 
                          if($aktTotal != 0){
                            echo (round($aktSelesai/$aktTotal*100))."%";
                          }else{
                            echo "0%";
                          }
                         ?></b>
                      </td>
                    </tr>
                  </tbody>
                  </table>
                </div>


            </div>
        </div>
    </div>

</div>


<div class="row" style="horizontal-align:center;">
    <div class="col-lg-12">
        <div class="hpanel hgreen">
            <!-- <div class="panel-heading">
                <h4><i class="fa fa-cloud-download" aria-hidden="true"></i>  <b>Preview Laporan Monitoring dan Evaluasi</b></h4>
            </div> -->
            <div class="panel-body">

              <!-- panel body yang ada collapse nya tiap tiap RKF -->
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!-- foreach untuk menampilkan rkf di collapse -->
                  <?php foreach($dataRkf as $key => $dt) {
                      asort($dt->rkf_jadwal);
                     ?>
              <!--  header colapsenya -->
                    <div class="panel panel-default" >
                      <a data-toggle="collapse"   data-target="#collapse_<?=$key?>" aria-expanded="true" aria-controls="collapse_<?=$key?>" class="">
                        <div class="panel-heading sentuh" role="tab" id="heading_<?=$key?>" >
                            <!-- content headernya -->
                            <div class="row">
                              <!-- isi content nama rkf -->
                              <div class="col-lg-9" style="font-weight:bold">
                                <?php echo ($key+1).". ".$dt->rkf_proker; ?>
                              </div>
                              <!-- isi content persentase selesainya -->
                              <div class="col-lg-3 pull-right text-right">
                                    <?php
                                    $untukHitungAktivitas = file_get_contents(IP_API."/aktivitas/".$dt->rkf_id);
                                    $untukHitungAktivitas = json_decode($untukHitungAktivitas , true);
                                    $jmlDataAktivitas = count($untukHitungAktivitas);


                                    $aktivitasBelumOtorEnd = 0;
                                    $aktivitasSelesai = 0;
                                    $aktivitasBelumOtor = 0;


                                    echo "<b>Total Aktivitas = <span class='badge badge-info'>".$jmlDataAktivitas."</span></b><br/>";

                                     ?>


                              </div>
                          <!-- isi content data jadwal dan pic  rkf-->
                            </div>
                            <div class="row">
                                <div class="col-lg-9 text-left" style="">
                                    <ul style="list-style: none">
                                      <li>
                                        Unit Kerja &emsp;: <?php if (!empty($dt->rkf_unit_pelaksana)) {
                                              $indexUKer = array_search($dt->rkf_unit_pelaksana[0]->unitKerja, array_column($kamusUnitKerja, 'id'));
                                              echo $kamusUnitKerja[$indexUKer]['nama'];
                                              } ?>
                                      </li>
                                      <li>Jadwal &nbsp;&emsp; &emsp;: <?php
                                                if (!empty($dt->rkf_jadwal)) {
                                                  foreach ($dt->rkf_jadwal as $keyJadwal => $dtJadwal) {
                                                    echo  parse_bulan_short($dtJadwal);
                                                    echo ($dtJadwal == end($dt->rkf_jadwal)) ? "":"-" ;
                                                  }
                                                }
                                                ?>
                                      </li>
                                      <li>PIC &emsp;&emsp;&emsp;&emsp;: <?php if (!empty($dt->rkf_unit_pelaksana)) {
                                                foreach ($dt->rkf_unit_pelaksana as $keyPic => $dtPic) {
                                                  $nama = $kamusPegawai[$dtPic->pegawaiUnitKerja]?? null;
                                                  if ($nama != null) {
                                                    echo $nama;
                                                  }else{
                                                    $nama = file_get_contents(SDM_API."/api_v2/pegawai/prc_get_pegawai_detail/".$dtPic->pegawaiUnitKerja."?api_key=prc");
                                                    $nama = json_decode($nama, false)->result[0][0]->nama;
                                                    echo ($nama);
                                                  }
                                                    echo ($dtPic == end($dt->rkf_unit_pelaksana)) ? "":", " ;
                                                }
                                              } ?>
                                      </li>

                                    </ul>
                                </div>
                                <div class="col-lg-3 text-right" style="font-weight:bold; font-size:13px">
                                  <?php

                                  if ($aktivitasSelesai == 0) {
                                    echo "<b>Selesai = <span class='badge badge-success'>0 | 0%</span></b><br/>";
                                  }elseif ($aktivitasSelesai != 0) {
                                    $persenSelesai = round(($aktivitasSelesai/$jmlDataAktivitas)*100);
                                    echo "<b>Selesai = <span class='badge badge-success'>".$aktivitasSelesai." | ".$persenSelesai."%</span></b><br/>";
                                  }

                                    if ($aktivitasBelumOtorEnd >= 1) {
                                      echo "Belum Diotor    = <span class='badge badge-danger'>".$aktivitasBelumOtorEnd."</span>";

                                    }
                                   ?>


                                </div>
                            </div>
                        </div>
                      </a>

                      <!-- isi colapsenya -->
                      <div id="collapse_<?=$key?>" class="panel-collapse collapse  " role="tabpanel" aria-labelledby="heading_<?=$key?>" aria-expanded="true" style="">
                        <div class="panel-body" style="display: block;">
                          <!-- table detail aktivitasnya -->
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped " style="width:100%; font-size:10px">
                                <thead>
                                  <tr>
                                    <!-- <th>id</th> -->
                                    <th style="text-align:center;width:5%">No.</th>
                                    <th style="text-align:center;width:30%">Aktivitas</th>
                                    <th style="text-align:center;width:5%">Bulan Target</th>
                                    <th style="text-align:center;width:10%" >Status</th>
                                    <th style="text-align:center;width:40%" >Penjelasan</th>
                                    <th style="text-align:center;width:10%" >Ket.</th>
                                    <th style="text-align:center;width:10%" >File Pendukung</th>
                                    <th style="text-align:center;width:10%">otor</th>
                                  </tr>
                                </thead>

                                <tbody>
                                    <?php
                                      $aktivitas =  file_get_contents(IP_API."/aktivitas/".$dt->rkf_id);
                                      $aktivitas = json_decode($aktivitas);
                                      foreach($aktivitas as $key => $dtakt){ ?>
                                          <tr class = "tr-otor" data-name="tes">
                                          <td style="text-align:center"><?=$key+1; ?></td>
                                          <td><?php cetak($dtakt->aktivitas_nama); ?></td>
                                          <td><?php cetak(parse_bulan($dtakt->aktivitas_bulan)); ?></td>
                                          <td><?php parse_stat($dtakt->aktivitas_status); ?></td>
                                          <td><?php cetak($dtakt->aktivitas_penjelasan); ?></td>
                                          <td><?php parse_stat_selesai($dtakt->aktivitas_status); ?></td>
                                          <td>
                                          <?php
                                            if(array_key_exists($dtakt->aktivitas_id, $fileDokumenAktivitas)){
                                                echo "<a href='".base_url()."assets/file/aktivitas/".$fileDokumenAktivitas[$dtakt->aktivitas_id]."' target='_blank'>".$fileDokumenAktivitas[$dtakt->aktivitas_id]."</a>";
                                            }else{
                                              echo "-";
                                            }
                                            ?>
                                          </td>
                                          <td class="td-otor" data-name="testbutopn">
                                            <?php 
                                              if(isset($dtakt->aktivitas_otor_user)){
                                                echo "<span style='color:green'>Approve</span>";
                                              }
                                            ?>
                                          </td>
                                          </tr>
                                     <?php } ?>
                                </tbody>

                            </table>
                            </div>
                            <!-- <label class="switch pull-right">
                              <input type="checkbox">
                              <span class="slider round "></span>
                            </label> -->
                            <?php if($_SESSION['user']->userrole == 2){ ?>
                              <button type="button" class="btn btn-primary pull-right otor" data-prokerid="<?=$dt->rkf_id?>" data-prokernama="<?php cetak($dt->rkf_proker)?>"  name="button" style="position:relative; right:0" >OTORISASI</button>
                            <?php } ?>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
              </div>

            </div>
        </div>
    </div>



<script>
  function keHalaman(link){
    // window.location.href = "http://google.com";
    window.open(link, "_self");
  }
$(document).on('change', '.filternya', function(){
  var base_url = '<?=base_url()?>';
  var filternya =$("option:selected", this).val();
  // var laporanAktivitas =  <?php echo json_encode($laporanAktivitas);?>;
  var content;
  // console.log(base_url);
  // console.log(laporanAktivitas);
  if(filternya == 2){
    // console.log("perspektif");
    content = '<?php $aktTotal = 0; $aktJT = 0; $aktblnSelesai = 0; $aktblnProses  = 0; $aktblnBelum = 0; $aktSelesai = 0; $aktProses = 0; $aktBelum = 0; foreach($lapKatBsc as $keyKat => $dtKat){?>';
    content += '<tr> <td colspan="12"> <?php echo "<b>" ;cetak($keyKat); echo "</b>"; ?></td> </tr>';
    content += '<?php $subaktTotal = 0; $subaktJT = 0; $subaktblnSelesai = 0; $subaktblnProses  = 0; $subaktblnBelum = 0; $subaktSelesai = 0; $subaktProses = 0; $subaktBelum = 0; if(!empty($dtKat)){ foreach($dtKat as $key => $dt) { $subaktTotal += $dt->totalaktivitas; $subaktJT += $dt->blnini_jt; $subaktblnSelesai += $dt->blnini_selesai; $subaktblnProses  += $dt->blnini_proses; $subaktblnBelum += $dt->blnini_belum; $subaktSelesai += $dt->aktselesai; $subaktProses += $dt->aktproses; $subaktBelum += $dt->aktbelum; ?>';                    
    content += '<tr>';                    
    content += '<td style="text-align:center"><?php echo $key+1; ?></td>';                    
    content += '<td class="proker"  onclick="keHalaman(`'+base_url+'rbb/user/aktivitas_monev/<?=$dt->daid?>/<?=$bulan?>`)" ><?php cetak($dt->danama); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->totalaktivitas); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_jt); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_selesai); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_proses); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_belum); ?></td>';                    
    content += '<td style="text-align:center"> <?php if($dt->blnini_jt != 0){ echo (round($dt->blnini_selesai/$dt->blnini_jt*100))."%"; }else{ echo "0%"; } ?> </td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktselesai); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktproses); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktbelum); ?></td>';                    
    content += '<td style="text-align:center"> <?php if($dt->totalaktivitas != 0){ echo (round($dt->aktselesai/$dt->totalaktivitas*100))."%"; }else{ echo "0%"; } ?> </td>';                    
    content += '</tr>';                    
    content += '<?php }} ?>';                    
    content += ' <tr>';                    
    content += '<td colspan="2" style="text-align:right"><b>Sub Total</b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktTotal; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktJT; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktblnSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktblnProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?= $subaktblnBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php if($subaktJT != 0){  echo (round($subaktblnSelesai/$subaktJT*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php  if($subaktTotal != 0){ echo (round($subaktSelesai/$subaktTotal*100))."%"; }else{ echo "0%"; } ?></b>  </td>';                    
    content += '</tr>';      
    
                 
    content += '<?php $aktTotal += $subaktTotal; $aktJT += $subaktJT; $aktblnSelesai +=  $subaktblnSelesai; $aktblnProses  += $subaktblnProses; $aktblnBelum +=  $subaktblnBelum; $aktSelesai += $subaktSelesai; $aktProses += $subaktProses; $aktBelum += $subaktBelum; } ?>';                    
    content += '<tr>';                    
    content += '<td colspan="2" style="text-align:right"><b>Total</b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktTotal; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktJT; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php if($aktJT != 0){ echo (round($aktblnSelesai/$aktJT*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php  if($aktTotal != 0){ echo (round($aktSelesai/$aktTotal*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '</tr>';   
     
    
    $(this).parents('div.panel-body').find('tbody.bungkus-laporan').html('');
    $(this).parents('div.panel-body').find('tbody.bungkus-laporan').append(content);   

  }else if(filternya == 1){
    // console.log("skala");
    content = '<?php $aktTotal = 0; $aktJT = 0; $aktblnSelesai = 0; $aktblnProses  = 0; $aktblnBelum = 0; $aktSelesai = 0; $aktProses = 0; $aktBelum = 0; foreach($lapKatSkala as $keyKat => $dtKat){?>';
    content += '<tr> <td colspan="12"> <?php echo "<b>" ;cetak($keyKat); echo "</b>"; ?></td> </tr>';
    content += '<?php $subaktTotal = 0; $subaktJT = 0; $subaktblnSelesai = 0; $subaktblnProses  = 0; $subaktblnBelum = 0; $subaktSelesai = 0; $subaktProses = 0; $subaktBelum = 0; if(!empty($dtKat)){ foreach($dtKat as $key => $dt) { $subaktTotal += $dt->totalaktivitas; $subaktJT += $dt->blnini_jt; $subaktblnSelesai += $dt->blnini_selesai; $subaktblnProses  += $dt->blnini_proses; $subaktblnBelum += $dt->blnini_belum; $subaktSelesai += $dt->aktselesai; $subaktProses += $dt->aktproses; $subaktBelum += $dt->aktbelum; ?>';                    
    content += '<tr>';                    
    content += '<td style="text-align:center"><?php echo $key+1; ?></td>';                    
    content += '<td  class="proker"  onclick="keHalaman(`'+base_url+'rbb/user/aktivitas_monev/<?=$dt->daid?>/<?=$bulan?>`)"  ><?php cetak($dt->danama); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->totalaktivitas); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_jt); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_selesai); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_proses); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_belum); ?></td>';                    
    content += '<td style="text-align:center"> <?php if($dt->blnini_jt != 0){ echo (round($dt->blnini_selesai/$dt->blnini_jt*100))."%"; }else{ echo "0%"; } ?> </td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktselesai); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktproses); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktbelum); ?></td>';                    
    content += '<td style="text-align:center"> <?php if($dt->totalaktivitas != 0){ echo (round($dt->aktselesai/$dt->totalaktivitas*100))."%"; }else{ echo "0%"; } ?> </td>';                    
    content += '</tr>';                    
    content += '<?php }} ?>';                    
    content += ' <tr>';                    
    content += '<td colspan="2" style="text-align:right"><b>Sub Total</b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktTotal; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktJT; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktblnSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktblnProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?= $subaktblnBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php if($subaktJT != 0){  echo (round($subaktblnSelesai/$subaktJT*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php  if($subaktTotal != 0){ echo (round($subaktSelesai/$subaktTotal*100))."%"; }else{ echo "0%"; } ?></b>  </td>';                    
    content += '</tr>';                    
    content += '<?php $aktTotal += $subaktTotal; $aktJT += $subaktJT; $aktblnSelesai +=  $subaktblnSelesai; $aktblnProses  += $subaktblnProses; $aktblnBelum +=  $subaktblnBelum; $aktSelesai += $subaktSelesai; $aktProses += $subaktProses; $aktBelum += $subaktBelum; } ?>';                    
    content += '<tr>';                    
    content += '<td colspan="2" style="text-align:right"><b>Total</b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktTotal; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktJT; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php if($aktJT != 0){ echo (round($aktblnSelesai/$aktJT*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php  if($aktTotal != 0){ echo (round($aktSelesai/$aktTotal*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '</tr>';                    

    $(this).parents('div.panel-body').find('tbody.bungkus-laporan').html('');
    $(this).parents('div.panel-body').find('tbody.bungkus-laporan').append(content);
  
  }else if(filternya == 3){
    // alert("hai");
    content = '<?php $aktTotal = 0; $aktJT = 0; $aktblnSelesai = 0; $aktblnProses  = 0; $aktblnBelum = 0; $aktSelesai = 0; $aktProses = 0; $aktBelum = 0; foreach($lapKatSubdiv as $keyKat => $dtKat){?>';
    content += '<tr> <td colspan="12"> <?php echo "<b>" ;cetak($keyKat); echo "</b>"; ?></td> </tr>';
    content += '<?php $subaktTotal = 0; $subaktJT = 0; $subaktblnSelesai = 0; $subaktblnProses  = 0; $subaktblnBelum = 0; $subaktSelesai = 0; $subaktProses = 0; $subaktBelum = 0; if(!empty($dtKat)){ foreach($dtKat as $key => $dt) { $subaktTotal += $dt->totalaktivitas; $subaktJT += $dt->blnini_jt; $subaktblnSelesai += $dt->blnini_selesai; $subaktblnProses  += $dt->blnini_proses; $subaktblnBelum += $dt->blnini_belum; $subaktSelesai += $dt->aktselesai; $subaktProses += $dt->aktproses; $subaktBelum += $dt->aktbelum; ?>';                    
    content += '<tr>';                    
    content += '<td style="text-align:center"><?php echo $key+1; ?></td>';                    
    content += '<td  class="proker"  onclick="keHalaman(`'+base_url+'rbb/user/aktivitas_monev/<?=$dt->daid?>/<?=$bulan?>`)"  ><?php cetak($dt->danama); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->totalaktivitas); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_jt); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_selesai); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_proses); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->blnini_belum); ?></td>';                    
    content += '<td style="text-align:center"> <?php if($dt->blnini_jt != 0){ echo (round($dt->blnini_selesai/$dt->blnini_jt*100))."%"; }else{ echo "0%"; } ?> </td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktselesai); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktproses); ?></td>';                    
    content += '<td style="text-align:center"><?php cetak($dt->aktbelum); ?></td>';                    
    content += '<td style="text-align:center"> <?php if($dt->totalaktivitas != 0){ echo (round($dt->aktselesai/$dt->totalaktivitas*100))."%"; }else{ echo "0%"; } ?> </td>';                    
    content += '</tr>';                    
    content += '<?php }} ?>';                    
    content += ' <tr>';                    
    content += '<td colspan="2" style="text-align:right"><b>Sub Total</b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktTotal; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktJT; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktblnSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktblnProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?= $subaktblnBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php if($subaktJT != 0){  echo (round($subaktblnSelesai/$subaktJT*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$subaktBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php  if($subaktTotal != 0){ echo (round($subaktSelesai/$subaktTotal*100))."%"; }else{ echo "0%"; } ?></b>  </td>';                    
    content += '</tr>';                    
    content += '<?php $aktTotal += $subaktTotal; $aktJT += $subaktJT; $aktblnSelesai +=  $subaktblnSelesai; $aktblnProses  += $subaktblnProses; $aktblnBelum +=  $subaktblnBelum; $aktSelesai += $subaktSelesai; $aktProses += $subaktProses; $aktBelum += $subaktBelum; } ?>';                    
    content += '<tr>';                    
    content += '<td colspan="2" style="text-align:right"><b>Total</b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktTotal; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktJT; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktblnBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php if($aktJT != 0){ echo (round($aktblnSelesai/$aktJT*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktSelesai; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktProses; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?=$aktBelum; ?></b></td>';                    
    content += '<td style="text-align:center"><b><?php  if($aktTotal != 0){ echo (round($aktSelesai/$aktTotal*100))."%"; }else{ echo "0%"; } ?></b></td>';                    
    content += '</tr>';                    

    $(this).parents('div.panel-body').find('tbody.bungkus-laporan').html('');
    $(this).parents('div.panel-body').find('tbody.bungkus-laporan').append(content);
  }

});
</script>

<script>


      // $(document).on('click', '.otoris', function(){
      //   var user = <?=$_SESSION['pegawai']->pegawai_id; ?>;
      //   if ($(this).prop("checked") == true) {
      //       // alert("this switch is on");
      //       var id = $(this).attr("data-id");
      //       console.log(user); console.log(id);

      //       $.ajax({
              
      //         type: "POST",
      //         dataType: "json",
      //         data:{detailAction:1, detailUser: user, detailAktivitasId: id},
      //         success: function(hasil){
      //           console.log(hasil);
      //         }
      //       });

      //   }else if ($(this).prop("checked") == false) {
      //       // alert("this switch is off");
      //       // console.log($(this).attr("data-id"));
      //       var id = $(this).attr("data-id");
      //       console.log(user); console.log(id);

      //       $.ajax({
      //         url:"<?=base_url()?>rbb/sup/otor_monev",
      //         type:"POST",
      //         dataType: "json",
      //         data:{detailAction:0, detailUser: user, detailAktivitasId: id},
      //         success: function(hasil){
      //             console.log(hasil);
      //         }
      //       })

      //   }
      // });

      $(document).on("click", ".otor", function(){
        var prokerId = $(this).data("prokerid");
          var prokerNama = $(this).data("prokernama");
          // var urlnya = "<?=base_url()?>rbb/user/deleteBdAjax";
          var urlnya = '<?=base_url();?>rbb/rkf/monev/otor';
          var user = '<?=$_SESSION['pegawai']->pegawai_id ?>';
          var e = $(this).parent('div').find('td.td-otor')
          console.log(prokerId);
          console.log(prokerNama);
          console.log(urlnya);
          console.log(user);
          swal({
                      title: "Otorisasi?",
                      text: '"'+prokerNama+'"',
                      type: "success",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Ya, Otorisasi!"
                  },
                  function () {
                    $.ajax({
                      url: urlnya,
                      type: 'POST',
                      dataType: 'JSON',
                      data : {detailAction: 1, detailUser: user, prokerid: prokerId},
                      success: function(hasil){
                        // alert(hasil);
                        e.html('<span style="color:green">Approve</span>');
                      },
                      error: function(){
                        alert('error');
                      }
                    });
                    
                  });


      });


</script>


