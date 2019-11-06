<style >
  #tbl-report {font-size:11px;}
</style>

<div class="row" >
    <div class="col-lg-8">
        <div class="hpanel">
            <div class="panel-heading hbuilt">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Filter
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4 border-right animated-panel zoomIn" style="animation-delay: 0.3s;">
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option1" id="checkbox-kud" onclick="myOption(id)" checked> KUD </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option2" id="checkbox-proker" onclick="myOption(id)" checked> Program Kerja </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-status-proker" onclick="myOption(id)" checked> Status Proker </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-skala-proker" onclick="myOption(id)" checked> Skala Proker </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-kategori-proker" onclick="myOption(id)" checked> Kategori Proker </label>
                    </div>
                    <div class="col-lg-4 border-right  animated-panel zoomIn" style="animation-delay: 0.4s;">
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-perspektif" onclick="myOption(id)" checked> Perspektif BSC </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-kerjasama-dgn-konsultan" onclick="myOption(id)" checked> Kerjasama dgn Konsultan </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-audit" onclick="myOption(id)" checked>Audit </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-tujuan-proker" onclick="myOption(id)" checked> Tujuan Proker </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-indikator-keberhasilan" onclick="myOption(id)" checked> Indikator Keberhasilan </label>
                    </div>
                    <div class="col-lg-4 animated-panel zoomIn" style="animation-delay:0.4s;">
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-target-finansial" onclick="myOption(id)" checked> Target Finansial </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-jadwal" onclick="myOption(id)" checked> Jadwal Pelaksanaan </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-anggaran" onclick="myOption(id)" checked> Anggaran </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-unit-pelaksana" onclick="myOption(id)" checked> Unit Pelaksana </label>
                        <br>
                        <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-support-fungsi-lain" onclick="myOption(id)" checked> Support Fungsi Lain </label>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <label class="checkbox-inline"> <input class="checkall" type="checkbox" value="option3" id="checkbox-all" onclick="myOption(id)" checked> Select All</label>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="hpanel" style="width:100%;">
            <div class="panel-body" style="">
                <div class="" style="overflow-x:scroll;height:500px">
                    <table id="tbl-report" class="table table-striped table-bordered table-hover " style="width:2840px" >
                        <thead>
                            <tr style="background:">
                                <th  id="th-kud" style="text-align:center; vertical-align:middle;display:;" >KUD</th>
                                <th  id="th-proker" style="text-align:center; vertical-align:middle;display:;" >Program Kerja</th>
                                <th  id="th-status-proker" style="text-align:center; vertical-align:middle;" >Status Proker</th>
                                <th  id="th-skala-proker" style="text-align:center; vertical-align:middle;" >Skala Proker</th>
                                <th  id="th-kategori-proker" style="text-align:center; vertical-align:middle;"  >Kategori Proker</th>
                                <th  id="th-perspektif" style="text-align:center; vertical-align:middle;"  >Perspektif BSC</th>
                                <th  id="th-kerjasama-dgn-konsultan" style="text-align:center; vertical-align:middle;"  >Kerjasama Dengan Konsultan</th>
                                <th  id="th-audit" style="text-align:center; vertical-align:middle;"   >Audit</th>
                                <th  id="th-tujuan-proker" style="text-align:center; vertical-align:middle;"  >Tujuan Proker</th>
                                <th  id="th-indikator-keberhasilan" style="text-align:center; vertical-align:middle;"  >Indikator Keberhasilan</th>
                                <th  id="th-target-finansial" style="text-align:center; vertical-align:middle;"   >Target Finansial</th>
                                <th  id="th-jadwal" style="text-align:center; vertical-align:middle;"  >Jadwal Pelaksanaan</th>
                                <th  id="th-anggaran" style="text-align:center; vertical-align:middle;"   >Anggaran</th>
                                <th  id="th-unit-pelaksana" style="text-align:center; vertical-align:middle;"   >Unit Pelaksana</th>
                                <th  id="th-support-fungsi-lain" style="text-align:center; vertical-align:middle;"   >Support Fungsi Lain</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($data as $dt) {?>
                              <tr>
                      <!-- td kud -->
                                  <td class="td-kud" style="display:;" >
                                    <?php foreach ($dt->kud_nama as $dtKud) {
                                      echo $dtKud."<hr/>";
                                    } ?>
                                  </td>
                      <!-- td proker -->
                                  <td class="td-proker" style="display:;"><?=$dt->rkf_proker;?></td>
                      <!-- td status proker -->
                                  <td class="td-status-proker" ><?=$dt->sts_proker_nama;?></td>
                      <!-- td skala proker -->
                                  <td class="td-skala-proker" ><?=$dt->skala_proker_nama;?></td>
                      <!-- td kategori proker -->
                                  <td class="td-kategori-proker" ><?=$dt->kat_proker_nama;?></td>
                      <!-- td perspektif -->
                                  <td class="td-perspektif" ><?=$dt->perspektif;?></td>
                      <!-- td kerja sama dengan konsultan -->
                                  <td class="td-kerjasama-dgn-konsultan" ><?=($dt->rkf_konsultan == '1') ? 'Iya':'Tidak';?></td>
                      <!-- td tindak lanjut audit -->
                                  <td class="td-audit" >
                                    <?php
                                            foreach ($dt->audit_nama as $dtAudit) {
                                                      $temp= explode('|', $dtAudit);
                                                      echo "<ul>";
                                                      echo "<li>pengaudit : ".$temp[0]."</li>";
                                                      echo "<li>Tahun     : ".$temp[1]."</li>";
                                                      echo "</ul><hr/>";
                                                    }
                                    ?>
                                  </td>
                      <!-- td tujuan proker -->
                                  <td class="td-tujuan-proker" >
                                    <?php
                                            foreach ($dt->rkf_tujuan_proker as $dtTujProk) {
                                                      echo $dtTujProk.'<hr/>';
                                                        }
                                    ?>
                                  </td>

                      <!-- td indikator keberhasilan -->
                                  <td class="td-indikator-keberhasilan" >
                                    <?php
                                            foreach ($dt->rkf_indikator as $dtIndikator) {
                                                      echo $dtIndikator.'<hr/>';
                                                    }
                                    ?>
                                  </td>
                      <!-- td target finansial -->
                                  <td class="td-target-finansial" >
                                      <?php
                                              foreach ($dt->rkf_targetfin as $dtFinansial) {
                                                        echo "<ul>";
                                                        echo "<li>Uraian            : </li>";
                                                        echo "<li>Target Kuantitas  : </li>";
                                                        echo "<li>Satuan            : </li>";
                                                        echo "</ul><hr/>";
                                                      }
                                      ?>
                                  </td>
                      <!-- td jadwal -->
                                  <td class="td-jadwal" >
                                      <?php
                                            asort($dt->rkf_jadwal);
                                            foreach ($dt->rkf_jadwal as $dtJadwal) {
                                                        echo $this->gmodel->kondisi_bulan($dtJadwal).'<br/>';
                                                  }
                                      ?>
                                  </td>
                      <!-- td anggaran -->
                                  <td class="td-anggaran" >
                                      <?php
                                              foreach ($dt->rkf_anggaran as $dtAnggaran) {
                                                      echo "<ul>";
                                                      echo "<li>Pos Biaya : ".$dtAnggaran->posBiaya.'</li>';
                                                      echo "<li>Bulan     : ".$dtAnggaran->bulan."</li>";
                                                      echo "<li>Nominal   : ".$dtAnggaran->nominal."</li>";
                                                      echo "</ul><hr/>";
                                                  }
                                      ?>
                                  </td>
                      <!-- td unit pelaksana -->
                                  <td class="td-unit-pelaksana" >
                                      <?php
                                            foreach ($dt->rkf_unit_pelaksana as $dtUnitPelaksana) {
                                                      echo "<ul>";
                                                      echo "<li>Unit Kerja  : ".$dtUnitPelaksana->unitKerja."</li>";
                                                      echo "<li>PIC         : ".$dtUnitPelaksana->pegawaiUnitKerja."</li>";
                                                      echo "</ul><hr/>";
                                                    }
                                      ?>
                                  </td>
                      <!-- td support fungsi lain -->
                                  <td class="td-support-fungsi-lain" >
                                      <?php
                                            foreach ($dt->rkf_fungsilain as $dtFungsiLain) {
                                                      echo "<ul>";
                                                      echo "<li>Fungsi :".$dtFungsiLain->unitKerja."</li>";
                                                      echo "<li>Notes :".$dtFungsiLain->notes."</li>";
                                                      echo "</ul><hr/>";
                                                    }
                                      ?>
                                  </td>
                              </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?=base_url()?>assets/filterReport.js"></script>


 <script>
      $(document).ready(function(){
            $("#tbl-report").DataTable({
              "autoWidth": false,
              "fixedHeader": {
                            "header": true,
                              "footer":true,
                            },
              "paging": false,
              "responsive":{
                "details": false
              },
              "columns": [
                {
                  //KUD
                  "width": "200px",
                  "orderable": true
                },
                {
                  //proker
                  "width": "100px",
                  "orderable": true
                },
                {
                  //status proker
                  "width": "100px",
                  "orderable": true
                },
                {
                  //skala proker
                  "width": "100px",
                  "orderable": true
                },
                {
                  //kat proker
                  "width": "100px",
                  "orderable": true
                },
                {
                  //perspektif BSC
                  "width": "100px",
                  "orderable": true
                },
                {
                  //kerjasama dengan konsultan
                  "width": "60px",
                  "orderable": true
                },
                {
                  //audit
                  "width": "200px",
                  "orderable": true
                },
                {
                  //tujuan proker
                  "width": "200px",
                  "orderable": true
                },
                {
                  //indikator keberhasilan
                  "width": "100px",
                  "orderable": true
                },
                {
                  //target finansial
                  "width": "500px",
                  "orderable": true
                },
                {
                  //jadwal pelaksanaan
                  "width": "80px",
                  "orderable": true
                },
                {
                  //anggaran
                  "width": "400px",
                  "orderable": true
                },
                {
                  //unit pelaksana
                  "width": "300px",
                  "orderable": true
                },
                {
                  //support fungsi lain
                "width": "300px",
                "orderable": true
              }
            ],
        });
      });

 </script>
