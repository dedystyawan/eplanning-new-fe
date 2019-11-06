<?php
      $unit_kerja_id  = $_SESSION['pegawai']->unit_kerja_id;
      $subdivjson     = file_get_contents(SDM_API."/api_v2/pegawai/prc_get_unit_kerja/$unit_kerja_id?api_key=prc", false);
      $subdiv         = json_decode($subdivjson);
      $pegsubdivjson  = file_get_contents(SDM_API."/api_v2/pegawai/prc_get_pegawai_per_subdiv/B001PPB301?api_key=prc", false);
      $pegsubdiv      = json_decode($pegsubdivjson);
      //corplan
      $tahun_inisiatif = json_decode(file_get_contents(IP_API.'/master/coreplan/tahun'));

      //coa
      $coa = json_decode(file_get_contents(IP_API.'/master/poscoa'));
      $coa_jenis = array_column($coa, 'pos_coa_jenis_nama');
      $coa_jenis = array_unique($coa_jenis);
      $coa_jenis = array_values($coa_jenis);
  
      $coa_header = array_column($coa,'pos_coa_header_nama', 'pos_coa_header_id');
      $coa_sub_header1 = array_column($coa, 'pos_coa_sub1_nama', 'pos_coa_sub1_id');
      $coa_sub_header2 = array_column($coa, 'pos_coa_sub2_nama', 'pos_coa_sub2_id');
      $coa_sub_header3 = array_column($coa, 'pos_coa_sub3_nama', 'pos_coa_sub3_id');
 ?>
<script src="<?=base_url(); ?>assets/dynamicinput.js"></script>
<div class="content animate-panel" style="overflow:hidden">

<!-- untuk notif catatan review -->
<?php if(!empty($rkf['rkf_note_otor'])){ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="hpanel hred">
            <div class="panel-heading">
                <i class="fa fa-sticky-note" aria-hidden="true"></i> Catatan [Kadiv]
            </div>
            <div class="panel-body">
                <h5> <?= $rkf['rkf_note_otor']; ?> </h5>
 		        </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel hblue">
            <div class="panel-heading">
                <i class="fa fa-edit" aria-hidden="true"></i> Rencana Kerja Fungsional [Edit]
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                        <!-- baris program kerja -->
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label" style="text-align:left;">Program Kerja</label>
                                    <textarea rows="6" class="col-md-12" style="max-width: 100%;" name="rkf_proker"><?=$rkf['rkf_proker']?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- row visi -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label" style="text-align:left;">Mendukung Visi</label>
                                    <select class="form-control" id="visi" multiple="multiple" name="rkf_visi[]" style="max-width: 100%;">
                                        <?php
                                            if(!empty($all->allVisi)){
                                              foreach ($all->allVisi as $dt) { ?>
                                                <option value="<?=$dt->visi_id; ?>|<?=$dt->visi_nama; ?>"
                                                  <?php if(array_search($dt->visi_id, array_column($rkf['rkf_visi'], 'value')) !== false) { echo 'selected'; } ?>
                                                >
                                                  <?=$dt->visi_nama; ?>
                                                </option>;
                                          <?php }} ?>
                                  </select>
                                </div>
                            </div>
                        </div>  
                          <!-- row misi -->
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label" style="text-align:left;">Mendukung Misi</label>
                                      <select class="form-control" id="misi" multiple="multiple" name="rkf_misi[]" style="max-width: 100%;">
                                          <?php
                                            if(!empty($all->allMisi)){
                                              foreach ($all->allMisi as $dt) { ?>
                                                <option value="<?=$dt->misi_id; ?>|<?=$dt->misi_nama; ?>"
                                                    <?php if(array_search($dt->misi_id, array_column($rkf['rkf_misi'], 'value')) !== false) { echo 'selected'; } ?>
                                                >
                                                  <?=$dt->misi_nama; ?>
                                                </option>;
                                          <?php }} ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <!-- baris kud -->
                          <div class="row">
                              <div class="col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label" style="text-align:left;">Mendukung Kebijakan Umum Direksi</label>
                                      <select class="form-control " id="kud" multiple="multiple" name="rkf_kud[]" style="max-width: 100%;">
                                          <?php
                                            if(!empty($all->allKUD)){
                                              foreach ($all->allKUD as $dt) { ?>
                                                <option value="<?=$dt->kud_id; ?>"
                                                    <?php if(array_search($dt->kud_id, array_column($rkf['rkf_kud'], 'kud')) !== false) { echo 'selected'; } ?>
                                                >
                                                  <?=$dt->kud_nama; ?>
                                                </option>;
                                          <?php }} ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <!-- baris corplan -->
                          <div class="row" style="">
                              <div class="col-sm-12 text-left border-bottom " >
                                  <div class="form-group">
                                      <label class="control-label" style="text-align:left;">Mendukung Corporate Plan</label>
                                  </div>
                              </div>
                          </div>
                          <div class="row  border-bottom cor-kakek">
                              <div class="col-sm-10 input_fields_wrap_corplan ">
                                <!-- element dasar untuk dinamis,, di buat displaynya none, di script ubah displaynya supaya muncul -->
                              <div class="cor-bapak border-top border-right" style="display:none">
                                        <div class="row ">
                                            <!-- tahun -->
                                            <div class="col-sm-2">
                                                <div class="form-group cor-anak-tahun" >
                                                    <label class="control-label" style="text-align:left;">Tahun</label>
                                                        <select class="form-control cor-select-thn" name="" style="max-width: 90%;"   >
                                                        <option value="">Pilih Tahun</option>
                                                            <?php foreach($tahun_inisiatif as $dt){ ?>
                                                            <option value="<?=$dt->is_tahun?>"><?=$dt->is_tahun?></option>
                                                            <?php } ?>
                                                        </select>
                                                </div>
                                            </div>
                                            <!-- corplan -->
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <label class="control-label" style="text-align:left;">Inisiatif Strategis</label>
                                                        <select  class="form-control cor-select-cp" data-tahun="" name="rkf_corplan_id[]" style=" max-width: 99%;"   >
                                                            <option value="">-</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 align-self-bottom">
                                                    <label class="control-label" style="text-align:left; opacity:0">test</label>
                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_corplan'></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Target -->
                                            <div class="col-sm-2">
                                               
                                            </div>
                                            <div class="col-sm-9 ">
                                                <table class="table table-striped">
                                                <tr>
                                                <td>Target</td>
                                                <td class="cor-target-td"> 
                                                <input type="text" readonly class="form-control cor-target cor-inputan" name="" value="" style=" max-width: 100%;background:transparent; border:none"> </td>
                                                </tr>
                                                <tr>
                                                <td>Sasaran</td>
                                                <td class="cor-sasaran-td"> 
                                                <textarea readonly onkeyup="textAreaAdjust(this)"  class="form-control cor-sasaran cor-inputan" name="" id="" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" ></textarea>
                                                
                                                </td>

                                                </tr>
                                                <tr>
                                                <td>KPI</td>
                                                <td class="cor-kpi-td"> 
                                                <textarea readonly onkeyup="textAreaAdjust(this)"  class="form-control cor-kpi cor-inputan" name="" id="" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" ></textarea>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>Target KPI</td>
                                                <td class="cor-kpi-target-td">  <input type="text" readonly class="form-control cor-kpi-target  cor-inputan"  style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" name="" value=""></td>
                                                </tr>
                                                </table>
                                            </div>
                                           
                                        </div>
                                    </div>
                                  <?php foreach($rkf['rkf_coreplan'] as $dt){ 
                                    $dataCP = json_decode(file_get_contents(IP_API."/master/coreplan/detail/".$dt[0]))[0];
                                    $dataMasterCP = json_decode(file_get_contents(IP_API."/master/coreplan/".$dataCP->is_tahun));
                                  ?>
                                    <div class="cor-bapak border-top border-right">
                                        <div class="row ">
                                            <!-- tahun -->
                                            <div class="col-sm-2">
                                                <div class="form-group cor-anak-tahun" >
                                                    <label class="control-label" style="text-align:left;">Tahun</label>
                                                    <select class="form-control cor-select-thn" name="" style="max-width: 90%;">
                                                        <?php foreach($tahun_inisiatif as $dt){ ?>
                                                          <option value="<?=$dt->is_tahun?>" <?=($dt->is_tahun == $dataCP->is_tahun)? 'selected':'';?>><?=$dt->is_tahun?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- corplan -->
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <label class="control-label" style="text-align:left;">Inisiatif Strategis</label>
                                                    <select  class="form-control cor-select-cp" data-tahun="" name="rkf_corplan_id[]" style=" max-width: 99%;"   >
                                                        <?php foreach($dataMasterCP as $dt) { ?>
                                                          <option value="<?=$dt->is_id?>" <?=($dt->is_id == $dataCP->is_id)? 'selected':'';?> ><?=$dt->is_inisiatif_cp?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 align-self-bottom">
                                                <label class="control-label" style="text-align:left; opacity:0">test</label>
                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_corplan'></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Target -->
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-9 ">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Target</th>
                                                        <td class="cor-target-td"> 
                                                          <input type="text" readonly class="form-control cor-target cor-inputan" name="" value="<?=$dataCP->is_inisiatif_cp_target?>" style=" max-width: 100%;background:transparent; border:none"> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sasaran</th>
                                                        <td class="cor-sasaran-td"> 
                                                          <textarea readonly onkeyup="textAreaAdjust(this)"  class="form-control cor-sasaran cor-inputan" name="" id="" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" ><?=$dataCP->is_sasaran_cp?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>KPI</th>
                                                        <td class="cor-kpi-td"> 
                                                            <textarea readonly onkeyup="textAreaAdjust(this)"  class="form-control cor-kpi cor-inputan" name="" id="" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" ><?=$dataCP->is_kpi?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Target KPI</th>
                                                        <td class="cor-kpi-target-td">  <input type="text" readonly class="form-control cor-kpi-target  cor-inputan"  style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" name="" value="<?=$dataCP->is_kpi_target;?>"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                              </div>
                              <div class="col-sm-2 " >
                                  <label class="control-label" style="text-align:left; opacity:0">button tambah</label>
                                  <a class="btn btn-info add_field_button_corplan">Tambah</a>
                              </div>
                          </div>
                          <hr/>
                          <!-- baris status, skala, kategori, perspektif, dan kerjasama konsultan -->
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Status Program Kerja</label>
                                        <select class="form-control" name="rkf_status_proker" style="width: 90%; max-width: 90%;">
                                                  <option value="">Pilih</option>
                                                   <?php
                                                   if(!empty($all->allStsProker)){
                                                      foreach ($all->allStsProker as $dt) { ?>
                                                      <option value="<?=$dt->sts_proker_id; ?>" <?php echo ($dt->sts_proker_id==$rkf['rkf_status_proker'])? 'selected':'';?>>
                                                        <?=$dt->sts_proker_nama; ?>
                                                      </option>;
                                                  <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <?php echo ($dt->sts_proker_id==$rkf['rkf_status_proker'])? 'selected':'';?>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Skala Program Kerja</label>
                                        <select class="form-control" name="rkf_skala_proker" style="width: 90%; max-width: 90%;">
                                                 <option value="">Pilih</option>
                                                  <?php
                                                  if(!empty($all->allSkalaProker)){
                                                     foreach ($all->allSkalaProker as $dt) { ?>
                                                     <option value="<?=$dt->skala_proker_id; ?>" <?php if($dt->skala_proker_id==$rkf['rkf_skala_proker']) {echo 'selected'; } ?>>
                                                       <?=$dt->skala_proker_nama; ?>
                                                     </option>;
                                                 <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Kategori Program Kerja</label>
                                        <select class="form-control" name="rkf_kat_proker" style="width: 90%; max-width: 90%;">
                                               <option value="">Pilih</option>
                                                <?php
                                                if(!empty($all->allKatProker)){
                                                   foreach ($all->allKatProker as $dt) { ?>
                                                   <option value="<?=$dt->kat_proker_id; ?>" <?php if($dt->kat_proker_id==$rkf['rkf_kat_proker']) {echo 'selected'; } ?>>
                                                     <?=$dt->kat_proker_nama; ?>
                                                   </option>;
                                               <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Prespektif BSC</label>
                                        <select class="form-control" name="rkf_bsc" style="width: 90%; max-width: 90%;">
                                             <option value="">Pilih</option>
                                              <?php
                                              if(!empty($all->allBSC)){
                                                 foreach ($all->allBSC as $dt) { ?>
                                                 <option value="<?=$dt->bsc_id; ?>" <?php if($dt->bsc_id==$rkf['rkf_bsc']) {echo 'selected'; } ?>>
                                                   <?=$dt->bsc_nama; ?>
                                                 </option>;
                                             <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Kerjasama dgn Konsultan</label>
                                        <select class="form-control" name="rkf_konsultan" style="width: 90%; max-width: 90%;">
                                              <option value="0" <?php if($rkf['rkf_konsultan']== "0") {echo 'selected'; } ?>>Tidak</option>
                                              <option value="1" <?php if($rkf['rkf_konsultan']== "1") {echo 'selected'; } ?>>Ya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr/>

                            <!-- baris tindak lanjut audit -->
                            <div class="row" style="overflow:hidden">
                                <div class="col-md-12 text-left" >
                                    <div class="col-md-10" style="border-bottom: 1px solid grey">
                                        <div class="col-md-7">
                                            <h5>Tindak Lanjut Audit(Pilih Jika 'Ya')</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Tahun</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="input_fields_wrap_aud">
                                  <?php if (empty($rkf['rkf_tlaudit'])) { ?>
                                    <div>
                                        <div class="row"></div>
                                        <br/>
                                        <div class="col-md-10" >
                                            <div class="col-md-7">
                                                <select class="form-control"  name="tlaudit[]"   >
                                                    <option value="">Pilih tindak Lanjut</option>;
                                                      <?php
                                                          if(!empty($all->allTLAudit)){
                                                              foreach ($all->allTLAudit as $dt) { ?>
                                                                <option value="<?=$dt->tindak_lanjut_id; ?>"><?=$dt->tindak_lanjut_nama; ?></option>;
                                                      <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4" >
                                                <select class="form-control" name="tahunaudit[]"  >
                                                    <option value="">Pilih Tahun</option>;
                                                      <?php $n=6; for ($x = date("Y")-1; $n > 0; --$x) { ?>
                                                          <option value="<?=$x?>"><?=$x?></option>
                                                      <?php --$n; } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_aud'></a>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } else{
                                  foreach ($rkf['rkf_tlaudit'] as $key => $value) { ?>
                                    <div>
                                        <div class="row"></div>
                                        <br/>
                                        <div class="col-md-10" >
                                            <div class="col-md-7">
                                                <select class="form-control"  name="tlaudit[]"   >
                                                    <option value="">Pilih tindak Lanjut</option>;
                                                    <?php
                                                    if(!empty($all->allTLAudit)){
                                                       foreach ($all->allTLAudit as $dt) { ?>
                                                       <option value="<?=$dt->tindak_lanjut_id; ?>" <?php if($dt->tindak_lanjut_id==$value['tlAudit']) {echo 'selected'; } ?>>
                                                         <?=$dt->tindak_lanjut_nama; ?>
                                                       </option>;
                                                   <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4" >
                                                <select class="form-control" name="tahunaudit[]"  >
                                                    <option value="">Pilih Tahun</option>;
                                                    <option value="2019" <?php if($value['tahunAudit']=='2019') {echo 'selected'; } ?>>2019</option>
                                                    <option value="2018" <?php if($value['tahunAudit']=='2018') {echo 'selected'; } ?>>2018</option>
                                                    <option value="2017" <?php if($value['tahunAudit']=='2017') {echo 'selected'; } ?>>2017</option>
                                                    <option value="2016" <?php if($value['tahunAudit']=='2016') {echo 'selected'; } ?>>2016</option>
                                                    <option value="2015" <?php if($value['tahunAudit']=='2015') {echo 'selected'; } ?>>2015</option>
                                                    <option value="2014" <?php if($value['tahunAudit']=='2014') {echo 'selected'; } ?>>2014</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1">
                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_aud'></a>
                                            </div>
                                          </div>
                                    </div>
                                  <?php }}?>
                                    <div class="col-md-2 text-left" style="text-align:center;">
                                      <a class="btn btn-info add_field_button_aud">Tambah</a>
                                    </div>
                                </div>
                            </div>

                            <hr/>

                            <!-- Tujuan Program Kerja -->
                            <div class="row" style="overflow:hidden">
                                <div class="col-md-12 text-left" >
                                    <h4>Tujuan Program Kerja</h4>
                                </div>
                                <div class="col-md-12 text-left" >
                                    <div class="col-md-10" style="border-bottom:1px solid grey">
                                    </div>
                                </div>
                                <div class="input_fields_wrap_tuj">
                                  <?php if (empty($rkf['rkf_tujuan_proker'])) { ?>
                                    <div>
                                        <div class="row"></div>
                                        <br/>
                                        <div class="col-md-10" >
                                            <div class="col-md-11">
                                              <input type="text" name='rkf_tujuan_proker[]'  placeholder='Tujuan Program Kerja' class="form-control"   />
                                            </div>
                                            <div class="col-sm-1">
                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_tuj'></a>
                                            </div>
                                        </div>
                                    </div>
                                  <?php }else{
                                  foreach ($rkf['rkf_tujuan_proker'] as $value) { ?>
                                    <div>
                                        <div class="row"></div>
                                        <br/>
                                        <div class="col-md-10" >
                                            <div class="col-md-11">
                                              <input type="text" name='rkf_tujuan_proker[]' value="<?=$value?>"  placeholder='Indikator Keberhasilan' class="form-control"  />
                                            </div>
                                            <div class="col-sm-1">
                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_tuj'></a>
                                            </div>
                                        </div>
                                      </div>
                                  <?php }} ?>
                                    <div class="col-md-2 text-left" style="text-align:center;">
                                      <a class="btn btn-info add_field_button_tuj">Tambah</a>
                                    </div>
                                </div>
                            </div>

                            <hr/>


                            <!-- indikator keberhasilan -->
                                  <div class="row" style="overflow:hidden">
                                      <div class="col-md-12 text-left" >
                                        <h4>Indikator Keberhasilan</h4>
                                      </div>
                                      <div class="col-md-12 text-left" >
                                        <div class="col-md-10" style="border-bottom-style:groove">
                                        </div>
                                      </div>
                                      <div class="input_fields_wrap_ind">

                                        <?php if (empty($rkf['rkf_indikator'])) { ?>

                                          <div>
                                                <div class="row"></div>
                                                <br/>
                                                <div class="col-md-10" >
                                                    <div class="col-md-11">
                                                      <input type="text" name='rkf_indikator[]'  placeholder='Indikator Keberhasilan' class="form-control"  />
                                                    </div>



                                                    <div class="col-sm-1">
                                                        <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_ind'></a>
                                                    </div>
                                                </div>
                                          </div>

                                        <?php }else{
                                                foreach ($rkf['rkf_indikator'] as $value) { ?>
                                                  <div>
                                                        <div class="row"></div>
                                                        <br/>
                                                        <div class="col-md-10" >
                                                            <div class="col-md-11">
                                                              <input type="text" name='rkf_indikator[]' value="<?=$value?>"  placeholder='Indikator Keberhasilan' class="form-control"  />
                                                            </div>



                                                            <div class="col-sm-1">
                                                                <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_ind'></a>
                                                            </div>
                                                        </div>
                                                  </div>

                                        <?php }} ?>

                                          <div class="col-md-2 text-left" style="text-align:center;">
                                            <a class="btn btn-info add_field_button_ind">Tambah</a>
                                          </div>
                                      </div>
                                  </div>


<!-- target finansial -->
                                    <hr/>
                                    <div class="row" style="overflow:hidden">
                                        <div class="col-md-12 text-left" >
                                          <h4>Target Finansial</h4>
                                        </div>
                                        <div class="col-md-12 text-left" >
                                          <div class="col-md-10" style="border-bottom-style:groove">
                                              <div class="col-md-6">
                                                  <h5>Uraian</h5>
                                              </div>
                                              <div class="col-md-3">
                                                  <h5>Target Kuantitatif</h5>
                                              </div>
                                              <div class="col-md-2">
                                                  <h5>Satuan</h5>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="input_fields_wrap_tar">
                                          <?php if (empty($rkf['rkf_targetfin'])) { ?>
                                            <div>
                                                  <div class="row"></div>
                                                  <br/>
                                                  <div class="col-md-10" >
                                                      <div class="col-md-6">
                                                        <input type="text" name='target_finansial[]' value=""  placeholder='Uraian' class="form-control"/>
                                                      </div>
                                                      <div class="col-md-3" >
                                                        <input type="text" name='target_kuantitatif[]'  value="" placeholder='Target Kuantitatif' class="form-control"/>
                                                      </div>
                                                      <div class="col-md-2" >
                                                        <select class="form-control" name="satuan[]"  >
                                                             <option value="">Pilih</option>
                                                             <option value="Rupiah" >Rupiah</option>
                                                             <option value="Orang" >Orang</option>
                                                             <option value="Unit" >Unit</option>
                                                             <option value="Lainnya" >Lainnya</option>
                                                        </select>
                                                      </div>


                                                      <div class="col-sm-1">
                                                          <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_tar'></a>
                                                      </div>
                                                  </div>
                                            </div>

                                          <?php }else{
                                            foreach ($rkf['rkf_targetfin'] as $value) { ?>

                                            <div>
                                                  <div class="row"></div>
                                                  <br/>
                                                  <div class="col-md-10" >
                                                      <div class="col-md-6">
                                                        <input type="text" name='target_finansial[]' value="<?=$value['uraian']?>"  placeholder='Uraian' class="form-control"/>
                                                      </div>
                                                      <div class="col-md-3" >
                                                        <input type="text" name='target_kuantitatif[]'  value="<?=$value['targetKuantitatif']?>" placeholder='Target Kuantitatif' class="form-control"/>
                                                      </div>
                                                      <div class="col-md-2" >
                                                        <select class="form-control" name="satuan[]" style="width: 90%; max-width: 90%; "  >
                                                             <option value="">Pilih</option>
                                                             <option value="Rupiah" <?php if($value['satuan']=='Rupiah'){ echo "selected"; }?>>Rupiah</option>
                                                             <option value="Orang" <?php if($value['satuan']=='Orang'){ echo "selected"; } ?>>Orang</option>
                                                             <option value="Unit" <?php if($value['satuan']=='Unit'){ echo "selected"; } ?>>Unit</option>
                                                             <option value="Lainnya" <?php if($value['satuan']=='Lainnya'){ echo "selected"; } ?>>Lainnya</option>
                                                        </select>
                                                      </div>


                                                      <div class="col-sm-1">
                                                          <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_tar'></a>
                                                      </div>
                                                  </div>
                                            </div>

                                          <?php }} ?>



                                            <div class="col-md-2 text-left" style="text-align:center;">
                                              <a class="btn btn-info add_field_button_tar">Tambah</a>
                                            </div>
                                        </div>
                                    </div>



<!-- jadwal pelaksanaan -->
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                            <h4>Jadwal Pelaksanaan / Target Penyelesaian</h4>
                                        </div>
                                        <div class="col-sm-12">
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="1" class="i-checks" <?php if (in_array("1", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Jan</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="2" class="i-checks" <?php if (in_array("2", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Feb</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="3" class="i-checks" <?php if (in_array("3", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Mar</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="4" class="i-checks" <?php if (in_array("4", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Apr</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="5" class="i-checks" <?php if (in_array("5", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Mei</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="6" class="i-checks" <?php if (in_array("6", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Jun</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="7" class="i-checks" <?php if (in_array("7", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Jul</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="8" class="i-checks" <?php if (in_array("8", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Ags</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="9" class="i-checks" <?php if (in_array("9", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Sep</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="10" class="i-checks" <?php if (in_array("10", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Okt</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="11" class="i-checks" <?php if (in_array("11", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Nov</label>
                                          <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="12" class="i-checks" <?php if (in_array("12", $rkf['rkf_jadwal'])){ echo "checked";} ?>> Des</label>
                                        </div>
                                    </div>

<!-- anggaran -->

                                    <hr/>
                                    <div class="row" style="overflow:hidden">
                                        <div class="col-md-10 text-left" >
                                            <h4>Anggaran</h4>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-10 input_fields_wrap_coa" style="background-color:">
                                        <div class="coa-bapak" style="display:none">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="control-label" style="text-align:left;">Jenis</label>
                                                        <select class="form-control coa-select-jenis " name="" style="max-width: 100%;display:inline-block">
                                                            <option value="">Pilih</option>
                                                            <?php
                                                                if(!empty($coa_jenis)){
                                                                    foreach ($coa_jenis as $dt) { ?>
                                                                        <option style="text-transform:capitalize" value="<?=$dt; ?>"><?=$dt; ?></option>;
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-9" style="background-color:">
                                                        <label class="control-label" style="text-align:left;">COA</label>
                                                        <select class="form-control coa-select-nama hapus-coanya" name="rkf_coa_id[]" style=" max-width: 100%;"  >
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 " style="background-color:">
                                                    <label class="control-label " style="text-align:left;opacity:0">hehe</label>
                                                        <button  class='btn btn-danger glyphicon glyphicon-remove remove_field_coa' style="text-align:right;"></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jan</label>
                                                    <input type="text"  class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[0][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Feb</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[1][]" id="" style="font-size:10px;text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Mar</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[2][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Apr</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[3][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Mei</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[4][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jun</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[5][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jul</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[6][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Ags</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[7][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Sep</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[8][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Okt</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[9][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Nov</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[10][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Des</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[11][]" id="" style="font-size:10px; text-align:right">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php foreach($rkf['rkf_anggaran'] as $dtAng){?>
                                              <?php 
                                                $id = $dtAng['coa'];
                                              $filterAng = array_filter($coa, function($var) use ($id){
                                                    return ($var->pos_coa_sub3_id == $id);
                                              });
                                              $filterAng = array_values($filterAng)[0];
                                              ?> 
                                              <div class="coa-bapak">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="control-label" style="text-align:left;">Jenis</label>
                                                        <select class="form-control coa-select-jenis " name="" style="max-width: 100%;display:inline-block">
                                                            <?php
                                                                if(!empty($coa_jenis)){
                                                                    foreach ($coa_jenis as $dt) { ?>
                                                                        <option style="text-transform:capitalize" value="<?=$dt;?>" <?=($dt == $filterAng->pos_coa_jenis )? "selected":"" ;?>><?=$dt; ?></option>;
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-9" style="background-color:">
                                                        <label class="control-label" style="text-align:left;">COA</label>
                                                        <select class="form-control coa-select-nama hapus-coanya" name="rkf_coa_id[]" style=" max-width: 100%;"  >
                                                            <?php foreach($coa as $dt){ ?>
                                                              <option disabled style="" value="<?=$dt->pos_coa_sub3_id?>"><?=$dt->pos_coa_header_nama?></option>
                                                              <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;<?=$dt->pos_coa_sub1_nama?></option>
                                                              <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$dt->pos_coa_sub2_nama?></option>
                                                              <option style="font-style:italic" value="<?=$dt->pos_coa_sub3_id?>" <?=($dtAng['coa'] == $dt->pos_coa_sub3_id)? "selected":"" ; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$dt->pos_coa_sub3_nama?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 " style="background-color:">
                                                    <label class="control-label " style="text-align:left;opacity:0">hehe</label>
                                                        <button  class='btn btn-danger glyphicon glyphicon-remove remove_field_coa' style="text-align:right;"></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jan</label>
                                                    <input type="text"  class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[0][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][0]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Feb</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[1][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][1]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Mar</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[2][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][2]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Apr</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[3][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][3]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Mei</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[4][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][4]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jun</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[5][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][5]; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jul</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[6][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][6]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Ags</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[7][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][7]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Sep</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[8][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][8]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Okt</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[9][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][9]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Nov</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[10][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][10]; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Des</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[11][]" id="" style="font-size:10px; text-align:right" value="<?php echo $dtAng['nominal'][11]; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        
                                        <div class="col-md-2 text-left" style="text-align:center;">
                                            <label class="control-label " style="text-align:left;opacity:0">hehe</label><br/>
                                              <a class="btn btn-info add_field_button_coa">Tambah</a>
                                            </div>
                                        
                                    </div>


<!-- unit pelaksana -->

                                    <hr/>
                                    <div class="row" style="overflow:hidden">
                                        <div class="col-md-12 text-left" >
                                          <h4> Unit Pelaksana</h4>
                                        </div>
                                        <div class="col-md-12 text-left" >
                                          <div class="col-md-10" style="border-bottom-style:groove">
                                              <div class="col-md-6">
                                                  <h5>Unit Kerja Setingkat Sub Divisi</h5>
                                              </div>
                                              <div class="col-md-5">
                                                  <h5>Person In Charge</h5>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="input_fields_wrap_upel">
                                          <?php if (empty($rkf['rkf_unit_pelaksana'])) { ?>
                                            <div>
                                                  <div class="row"></div>
                                                  <br/>
                                                  <div class="col-md-10" >
                                                      <div class="col-md-6">
                                                          <select class="form-control selectsubdiv"  name="subdivisi[]" style="width: 98%; max-width: 98%;"   >
                                                              <option value="">Pilih Sub Divisi</option>;
                                                              <?php
                                                                  if(!empty($subdiv->result)){
                                                                      foreach ($subdiv->result[0] as $dt) { ?>
                                                                          <option value="<?=$dt->id; ?>"><?=$dt->nama; ?></option>;
                                                              <?php }} ?>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-5" >
                                                          <select class="form-control selectpic" name="pic[]" style="width: 98%; max-width: 98%;" >
                                                              <option value="">Pilih subdiv dahulu</option>;
                                                          </select>
                                                      </div>
                                                      <div class="col-sm-1">
                                                          <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_upel'></a>
                                                      </div>
                                                  </div>
                                            </div>
                                          <?php }else {
                                          foreach ($rkf['rkf_unit_pelaksana'] as $value){
                                              $pegawaijson  = file_get_contents(SDM_API."/api_v2/pegawai/prc_get_pegawai_detail/".$value['pegawaiUnitKerja']."?api_key=prc", false);
                                              $pegawai      = json_decode($pegawaijson, true)['result'][0][0];
                                               ?>
                                            <div>
                                                  <div class="row"></div>
                                                  <br/>
                                                  <div class="col-md-10" >
                                                      <div class="col-md-6">
                                                          <select class="form-control selectsubdiv"  name="subdivisi[]" style="width: 98%; max-width: 98%;"   >
                                                              <option value="">Pilih Sub Divisi</option>;
                                                              <?php
                                                                  if(!empty($subdiv->result)){
                                                                      foreach ($subdiv->result[0] as $dt) { ?>
                                                                          <option value="<?=$dt->id; ?>" <?php echo ($value['unitKerja'] == $dt->id) ? "selected":"" ?>><?=$dt->nama; ?></option>;
                                                              <?php }} ?>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-5" >
                                                          <select class="form-control selectpic" name="pic[]" style="width: 98%; max-width: 98%;" >
                                                              <option value="<?=$pegawai['pegawai_id'];?>"><?=$pegawai['nama'];?></option>;
                                                          </select>
                                                      </div>
                                                      <div class="col-sm-1">
                                                          <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_upel'></a>
                                                      </div>
                                                  </div>
                                            </div>

                                          <?php } } ?>


                                            <div class="col-md-2 text-left" style="text-align:center;">
                                              <a class="btn btn-info add_field_button_upel">Tambah</a>
                                            </div>
                                        </div>
                                    </div>


<!-- support fungsi lain -->

                                  <hr/>
                                  <div class="row" style="overflow:hidden">
                                      <div class="col-md-12 text-left" >
                                        <h4> Support Fungsi Lain</h4>
                                      </div>
                                      <div class="col-md-12 text-left" >
                                        <div class="col-md-10" style="border-bottom-style:groove">
                                            <div class="col-md-6">
                                                <h5>Unit Kerja</h5>
                                            </div>
                                            <div class="col-md-5">
                                                <h5>Notes</h5>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="input_fields_wrap_sup">
                                        <?php if (empty($rkf['rkf_fungsilain'])) { ?>
                                          <div>
                                                <div class="row"></div>
                                                <br/>
                                                <div class="col-md-10" >
                                                  <div class="col-md-6">
                                                    <select class="form-control" name="divisi[]" >
                                                             <option value="">Pilih Divisi</option>
                                                             <?php
                                                             if(!empty($all->divisi)){
                                                               foreach ($all->divisi as $dt) { ?>
                                                                <option value="<?=$dt->unit_kerja_id; ?>" ><?=$dt->unit_kerja_nama; ?></option>;
                                                            <?php }} ?>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-5" >
                                                    <input type="text" name='notes[]' value=""  placeholder='Sampaikan support yang diperlukan...' class="form-control" />
                                                  </div>
                                                  <div class="col-sm-1">
                                                      <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_sup'></a>
                                                  </div>
                                                </div>
                                          </div>
                                        <?php } else{ foreach ($rkf['rkf_fungsilain'] as $value) {?>

                                          <div>
                                                <div class="row"></div>
                                                <br/>
                                                <div class="col-md-10" >
                                                  <div class="col-md-6">
                                                    <select class="form-control" name="divisi[]" >
                                                             <option value="">Pilih Divisi</option>
                                                             <?php
                                                             if(!empty($all->divisi)){
                                                               foreach ($all->divisi as $dt) { ?>
                                                                <option value="<?=$dt->unit_kerja_id; ?>" <?php if($value['unitKerja']==$dt->unit_kerja_id){ echo "selected"; }?>><?=$dt->unit_kerja_nama; ?></option>;
                                                            <?php }} ?>
                                                    </select>
                                                  </div>
                                                  <div class="col-md-5" >
                                                    <input type="text" name='notes[]' value="<?=$value['notes']?>"  placeholder='Sampaikan support yang diperlukan...' class="form-control" />
                                                  </div>
                                                  <div class="col-sm-1">
                                                      <a  class='btn btn-danger glyphicon glyphicon-remove remove_field_sup'></a>
                                                  </div>
                                                </div>
                                          </div>

                                        <?php } } ?>
                                          <div class="col-md-2 text-left" style="text-align:center;">
                                            <a class="btn btn-info add_field_button_sup">Tambah</a>
                                          </div>
                                      </div>
                                  </div>




                                    <hr/>
                           </div>
                            <div class="row" style="text-align: center;">
                                <button type="submit" name="submit" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                          </form>

                </div>
            </div>
        </div>
    </div>
</div>




<script>
//auto resize text area corplan
function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
</script>


<script>

$('input.numbernya').keyup(function(event) {

// skip for arrow keys
if(event.which >= 37 && event.which <= 40) return;

// format number
$(this).val(function(index, value) {
  return value
  .replace(/\D/g, "")
  .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  ;
});
});
</script>

<!-- untuk dependent coa -->
<script>

// $('textarea').autoResize();

var coa = <?php echo json_encode($coa);?>;

$(document).on('change','.coa-select-jenis',function () {
    var coa_jenisId = $(this).val(); 
    // alert(coa_jenisId);
    var coa_jenisnya =  coa.filter(function(jenis){
        return jenis.pos_coa_jenis_nama == coa_jenisId;
    });
    console.log(coa_jenisnya);
    var tagCoaNama = $(this).parents('div.coa-bapak').find('select.coa-select-nama');
    console.log(tagCoaNama);
    if(coa_jenisId){
        tagCoaNama.empty();
        $.each(coa_jenisnya, function(key, value) {
                    tagCoaNama.append('<option disabled style="" value="'+ value.pos_coa_sub3_id +'">'+value.pos_coa_header_nama+'</option>');
                    tagCoaNama.append('<option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;'+value.pos_coa_sub1_nama+'</option>');
                    tagCoaNama.append('<option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+value.pos_coa_sub2_nama+'</option>');
                    tagCoaNama.append('<option  style="font-style:italic" value="'+ value.pos_coa_sub3_id +'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+value.pos_coa_sub3_id+' - '+value.pos_coa_sub3_nama+'</option>');
                  });
    }

});


$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_coa"); //Fields wrapper
var add_button      = $(".add_field_button_coa"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    x++; //text box increment
    // $(wrapper).append(content); //add input box
    $(".coa-bapak:first").clone().appendTo(".input_fields_wrap_coa").css('display', '').find(".hapus-coanya").val('').end();
    // $(".input_fields_wrap_coa").find("input.jumlahnya").val('').end();

    $('input.numbernya').keyup(function(event) {

// skip for arrow keys
if(event.which >= 37 && event.which <= 40) return;

// format number
$(this).val(function(index, value) {
  return value
  .replace(/\D/g, "")
  .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  ;
});
});
  }
});

$(wrapper).on("click",".remove_field_coa", function(e){ //user click on remove text
    e.preventDefault();
//    alert("ketriger");
  $(this).parents('div.coa-bapak').remove(); x--;
})
});

</script>



<!-- tambah input corplan -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_corplan"); //Fields wrapper
var add_button      = $(".add_field_button_corplan"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    x++; //text box increment
    // $(wrapper).append(content); //add input box
    $(".cor-bapak:first").clone().appendTo(".input_fields_wrap_corplan").css("display", "").find(".cor-inputan").val("");
    // $(".cor-bapak:first").clone().appendTo(".input_fields_wrap_corplan").find("td.isi").empty();

  }
});

$(wrapper).on("click",".remove_field_corplan", function(e){ //user click on remove text
    e.preventDefault();
//    alert("ketriger");
  $(this).parents('div.cor-bapak').remove(); x--;
})
});
</script>


<!-- untuk corplan -->
<script>

// ketika tahun corplan dipilih
$(document).on('change','.cor-select-thn',function () {
    var tahuncp = $(this).val(); 
    // var masterInisId = $(this).("option").data("master");
    // alert(inisiatifId);
    var tagnya = $(this);
    // alert(tagnya);
    var tagCp= tagnya.parents('div.cor-bapak').find("select.cor-select-cp");
    var ip_api = '<?php echo IP_API ?>';
    console.log(tahuncp);
    if(tahuncp){
        $.ajax({
          type:"GET",
            url: ip_api+"/master/coreplan/"+tahuncp,
            success: function(hasil) {
                // console.log(hasil);
              tagCp.empty();
              tagCp.data('tahun', tahuncp);
              tagCp.append('<option ">Pilih Inisiatif Strategis</option>');
              $.each(hasil, function(key, value) {
                    tagCp.append('<option value="'+ value.is_id +'">'+value.is_inisiatif_cp+'</option>');
                  });
              }
                });
    }else{
      tagCp.empty();
      tagCp.append('<option ">Pilih Tahun Dahulu</option>');
    }
});

//ketika corplan dipilih

$(document).on('change','.cor-select-cp',function () {
    var corplanId = $(this).val(); 
    var tahuncp = $(this).data('tahun');
    // alert(tahuncp);
    // var masterInisId = $(this).("option").data("master");
    // alert(inisiatifId);
    var tagnya = $(this);
    // alert(tagnya);
    var tagtarget= tagnya.parents('div.cor-bapak').find(".cor-target");
    var tagsasaran= tagnya.parents('div.cor-bapak').find(".cor-sasaran");
    var tagkpi= tagnya.parents('div.cor-bapak').find(".cor-kpi");
    var tagkpitarget= tagnya.parents('div.cor-bapak').find(".cor-kpi-target");
    //zzzzzzzz
    // var tagtarget_td= tagnya.parents('div.cor-bapak').find("td.cor-target-td");
    // var tagsasaran_td= tagnya.parents('div.cor-bapak').find("td.cor-sasaran-td");
    // var tagkpi_td= tagnya.parents('div.cor-bapak').find("td.cor-kpi-td");
    // var tagkpitarget_td= tagnya.parents('div.cor-bapak').find("td.cor-kpi-target-td");
    var ip_api = '<?php echo IP_API ?>';
    console.log(corplanId);
    if(corplanId != 'Pilih cp'){
        $.ajax({
          type:"GET",
            url: ip_api+"/master/coreplan/"+tahuncp,
            success: function(hasil) {
                // console.log(hasil);
                var seleksi =  hasil.filter(function(idnya) {
                    return idnya.is_id == corplanId;
                });
                console.log(seleksi[0]);
                tagtarget.val(seleksi[0].is_inisiatif_cp_target);
                tagsasaran.val(seleksi[0].is_sasaran_cp);
                tagkpi.val(seleksi[0].is_kpi);
                tagkpitarget.val(seleksi[0].is_kpi_target);
                //
                // tagtarget_td.html(seleksi[0].is_inisiatif_cp_target);
                // tagsasaran_td.html(seleksi[0].is_sasaran_cp);
                // tagkpi_td.html(seleksi[0].is_kpi);
                // tagkpitarget_td.html(seleksi[0].is_kpi_target);
              }
                });

    }else{
                tagtarget.val('');
                tagsasaran.val('');
                tagkpi.val('');
                tagkpitarget.val('');
    }


});

</script>


<!-- tindak lanjut audit -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_aud"); //Fields wrapper
var add_button      = $(".add_field_button_aud"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
    content += '<div class="row"></div>';
    content += '<br/>';
    content += "<div class='col-md-10' >";

    content += "<div class='col-md-7'>";
    content += "<select class='form-control'  name='tlaudit[]' >";
    content += "<option value=''>Pilih tindak Lanjut</option>;";
    content += "<?php if(!empty($all->allTLAudit)){ foreach ($all->allTLAudit as $dt) { ?>";
    content += "<option value='<?=$dt->tindak_lanjut_id; ?>'><?=$dt->tindak_lanjut_nama; ?></option>;";
    content += "<?php }} ?>";
    content += "</select>";
    content += "</div>";
    content += "<div class='col-md-4' >";
    content += "<select class='form-control' name='tahunaudit[]' >";
    content += "<option value=''>Pilih Tahun</option>;";
    content += "<?php $n=6; for ($x = date('Y')-1; $n > 0; --$x) { ?>";
    content += "<option value='<?=$x?>'><?=$x?></option>";
    content += "<?php --$n; } ?>";
    content += "</select>";
    content += "</div>";

    content += "<div class='col-sm-1'>";
    content += "<a  class='btn btn-danger glyphicon glyphicon-remove remove_field_aud'></a>";
    content += "</div>";
    content += "</div>";
    content += "</div>";


    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_aud", function(e){ //user click on remove text
   //alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>


<!-- tindak lanjut audit -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_tuj"); //Fields wrapper
var add_button      = $(".add_field_button_tuj"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
    content += '<div class="row"></div>';
    content += '<br/>';
    content += "<div class='col-md-10' >";

    content += "<div class='col-md-11'>";
    content += "<input type='text' name='rkf_tujuan_proker[]'  placeholder='Tujuan Program Kerja' class='form-control'   />";
    content += "</div>";

    content += "<div class='col-sm-1'>";
    content += "<a  class='btn btn-danger glyphicon glyphicon-remove remove_field_tuj'></a>";
    content += "</div>";
    content += "</div>";
    content += "</div>";


    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_tuj", function(e){ //user click on remove text
   //alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>



<!-- Indikator Keberhasilan -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_ind"); //Fields wrapper
var add_button      = $(".add_field_button_ind"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
    content += '<div class="row"></div>';
    content += '<br/>';
    content += "<div class='col-md-10' >";
    content += "<div class='col-md-11'>";
    content += "<input type='text' name='rkf_indikator[]'  placeholder='Indikator Keberhasilan' class='form-control'  />";
    content += "</div>";
    content += "<div class='col-sm-1'>";
    content += "<a  class='btn btn-danger glyphicon glyphicon-remove remove_field_ind'></a>";
    content += "</div>";
    content += "</div>";
    content += "</div>";


    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_ind", function(e){ //user click on remove text
   //alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>



<!-- target finansial -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_tar"); //Fields wrapper
var add_button      = $(".add_field_button_tar"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
    content += '<div class="row"></div>';
    content += '<br/>';
    content += "<div class='col-md-10' >";
    content += "<div class='col-md-6'>";
    content += "<input type='text' name='target_finansial[]'  placeholder='Uraian' class='form-control'/>";
    content += "</div>";

    content += "<div class='col-md-3'>";
    content += "<input type='text' name='target_kuantitatif[]'  value='' placeholder='Target Kuantitatif' class='form-control'/>";
    content += "</div>";
    content += "<div class='col-md-2' >";
    content += "<select class='form-control' name='satuan[]'>";
    content += "<option value=''>Pilih</option>";
    content += "<option value='Rupiah'>Rupiah</option>";
    content += "<option value='Orang'>Orang</option>";
    content += "<option value='Unit'>Unit</option>";
    content += "<option value='Lainnya'>Lainnya</option>";
    content += "</select>";
    content += "</div>";

    content += "<div class='col-sm-1'>";
    content += "<a  class='btn btn-danger glyphicon glyphicon-remove remove_field_tar'></a>";
    content += "</div>";
    content += "</div>";
    content += "</div>";


    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_tar", function(e){ //user click on remove text
   //alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>



<!-- anggaran -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_ang"); //Fields wrapper
var add_button      = $(".add_field_button_ang"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
    content += '<div class="row"></div>';
    content += '<br/>';

    content += '<div class="col-md-10" >';

    content += '<div class="col-md-4">';
    content += '<select class="form-control" name="pos_biaya[]">';
    content += '<option value="">Pilih Pos Biaya</option>';
    content += '<?php if(!empty($all->allPosBiaya)){ foreach ($all->allPosBiaya as $dt) { ?>';
    content += '<option value="<?=$dt->posbiaya_id; ?>"><?=$dt->posbiaya_nama; ?></option>';
    content += '<?php }} ?>';
    content += '</select>';
    content += '</div>';
    content += '<div class="col-md-2">';
    content += '<input type="text" name="coa[]" value=""  placeholder="COA" class="form-control" readonly/>';
    content += '</div>';
    content += '<div class="col-md-2" >';
    content += '<select class="form-control" name="bulan[]">';
    content += '<option value="">Pilih Bulan</option>';
    content += '<?php for ($i=1; $i <=12 ; $i++) {?>';
    content += '<option value="<?=$i?>"><?=parse_bulan($i)?></option>';
    content += '<?php } ?>';
    content += '</select>';
    content += '</div>';
    content += '<div class="col-md-3">';
    content += '<div class="input-group m-b">';
    content += '<span class="input-group-addon">Rp</span><input type="text" class="form-control" name="nominal[]"  placeholder="0">';
    content += '</div>';
    content += '</div>';
    content += '<div class="col-sm-1">';
    content += '<a  class="btn btn-danger glyphicon glyphicon-remove remove_field_ang"></a>';
    content += '</div>';
    content += '</div>';
    content += "</div>";





    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_ang", function(e){ //user click on remove text
   //alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>


<!-- unit pelaksana -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_upel"); //Fields wrapper
var add_button      = $(".add_field_button_upel"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
        content += "<div class='row'></div>";
        content += "<br/>";
        content += "<div class='col-md-10'>";
        content += "<div class='col-sm-6'>";
        content += "<select class='form-control selectsubdiv' name='subdivisi[]' >";
        content += "<option value=''>Pilih Sub Divisi</option>";
        content += "<?php if(!empty($subdiv->result)) { foreach ($subdiv->result[0] as $dt) { ?>";
        content += "<option value='<?=$dt->id; ?>'><?=$dt->nama; ?></option>";
        content += "<?php }} ?>";
        content += "</select>";
        content += "</div>";
        content += "<div class='col-md-5'>";
        content += "<select class='form-control selectpic' name='pic[]' >";
        content += "<option value=''>Pilih Subdivisi Dahulu</option>";
        content += "</select>";
        content += "</div>";
        content += "<div class='col-sm-1'>";
        content += "<a  class='btn btn-danger glyphicon glyphicon-remove remove_field_upel'></a>";
        content += "</div>";
        content += "</div>";
        content += "</div>";





    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_upel", function(e){ //user click on remove text
  // alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>




<!-- support fungsi lain -->
<script>
$(document).ready(function() {
var max_fields      = 100; //maximum input boxes allowed
var wrapper   		= $(".input_fields_wrap_sup"); //Fields wrapper
var add_button      = $(".add_field_button_sup"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
  if(x < max_fields){ //max input box allowed
    var content = "<div >";
        content += "<div class='row'></div>";
        content += "<br/>";
        content += "<div class='col-md-10'>";
        content += "<div class='col-sm-6'>";
        content += "<select class='form-control' name='divisi[]' >";
        content += "<option value=''>Pilih Divisi</option>";
        content += "<?php if(!empty($all->divisi)) { foreach ($all->divisi as $dt) { ?>";
        content += "<option value='<?=$dt->unit_kerja_id; ?>'><?=$dt->unit_kerja_nama; ?></option>;";
        content += "<?php }} ?>";
        content += "</select>";
        content += "</div>";
        content += "<div class='col-md-5'>";
        content += "<input type='text' name='notes[]' placeholder='Sampaikan support yang diperlukan...' class='form-control'/>";
        content += "</div>";
        content += "<div class='col-sm-1'>";
        content += "<a  class='btn btn-danger glyphicon glyphicon-remove remove_field_sup'></a>";
        content += "</div>";
        content += "</div>";
        content += "</div>";


    x++; //text box increment
    $(wrapper).append(content); //add input box
  }
});

$(wrapper).on("click",".remove_field_sup", function(e){ //user click on remove text
  //alert("ketriger");
  e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
})
});
</script>





<script type="text/javascript">
    $("#visi").select2();
    $("#misi").select2();
    $("#cp").select2();
    $("#kud").select2();
    $("#tlaudit").select2();
</script>

<!-- dependent input for pic -->
<script>
$(document).on('change','.selectsubdiv',function () {
    var subdivID = $(this).val();
    var tagnya = $(this);
    var tagPic = tagnya.parent('div').parent('div').children('div :eq(1)').children('select[name="pic[]"]');
    var sdm_api = '<?php echo SDM_API ?>';

    if(subdivID){
        $.ajax({
          type:"GET",
            url: sdm_api+"/api_v2/pegawai/prc_get_pegawai_per_subdiv/"+subdivID+"?api_key=prc",
            success: function(hasil) {
              tagPic.empty();
              $.each(hasil.result[0], function(key, value) {
                    tagPic.append('<option value="'+ value.pegawai_id +'">'+ value.nama +'</option>');
                  });
              }
                });

    }else{
      tagPic.empty();
      tagPic.append('<option ">Pilih Subdivisi Dahulu</option>');

    }


});

</script>
