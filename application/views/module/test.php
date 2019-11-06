<?php
      $alljson        = file_get_contents(IP_API."/master/all", false);
      $all            = json_decode($alljson);
      $subdivjson     = file_get_contents("http://10.66.10.40/api_v2/pegawai/prc_get_unit_kerja/001SDM?api_key=prc", false);
      $subdiv         = json_decode($subdivjson);
      $pegsubdivjson  = file_get_contents("http://10.66.10.40/api_v2/pegawai/prc_get_pegawai_per_subdiv/B001DMR201?api_key=prc", false);
      $pegsubdiv      = json_decode($pegsubdivjson);

      echo "<pre>";
      print_r($all);
      echo "</pre>";
 ?>
<script src="<?=base_url(); ?>assets/dynamicinput.js"></script>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel hblue">
                <div class="panel-heading">
                    <i class="fa fa-plus" aria-hidden="true"></i> Rencana Kerja Fungsional [Input]
                </div>
                <div class="panel-body">
                    <div class="row col-lg-12">
                         <form method="post" action="<?=base_url()?>Testing/triggertest" class="form-horizontal" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                         <label class="control-label" style="text-align:left;">Mendukung Visi</label>
                                         <select class="form-control" id="visi" multiple="multiple" name="rkf_visi[]" style="width: 98%; max-width: 98%;">
                                                   <?php
                                                   if(!empty($all->allVisi)){
                                                     foreach ($all->allVisi as $dt) { ?>
                                                      <option value="<?=$dt->visi_id; ?>|<?=$dt->visi_nama; ?>"><?=$dt->visi_nama; ?></option>;
                                                  <?php }} ?>
                                          </select>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                   <div class="form-group">
                                     <label class="control-label" style="text-align:left;">Mendukung Misi</label>
                                         <select class="form-control" id="misi" multiple="multiple" name="rkf_misi[]" style="width: 98%; max-width: 98%;">
                                                   <?php
                                                   if(!empty($all->allMisi)){
                                                     foreach ($all->allMisi as $dt) { ?>
                                                      <option value="<?=$dt->misi_id; ?>|<?=$dt->misi_nama; ?>"><?=$dt->misi_nama; ?></option>;
                                                  <?php }} ?>
                                          </select>
                                    </div>
                                 </div>
                            </div>
                            <div class="row">
                                   <div class="col-sm-6">
                                     <div class="form-group">
                                     <label class="control-label" style="text-align:left;">Mendukung Core Plan</label>
                                         <select class="form-control " id="cp" multiple="multiple" name="rkf_coreplan[]" style="width: 98%; max-width: 98%;">
                                                   <?php
                                                   if(!empty($all->allCorePlan)){
                                                     foreach ($all->allCorePlan as $dt) { ?>
                                                      <option value="<?=$dt->cp_id; ?>|<?=$dt->cp_nama; ?>"><?=$dt->cp_kode." - ".$dt->cp_nama; ?></option>;
                                                  <?php }} ?>
                                          </select>
                                     </div>
                                   </div>
                                   <div class="col-sm-6">
                                     <div class="form-group">
                                     <label class="control-label" style="text-align:left;">Mendukung Kebijakan Umum Direksi</label>
                                         <select class="form-control " id="kud" multiple="multiple" name="rkf_kud[]" style="width: 98%; max-width: 98%;">
                                                   <?php
                                                   if(!empty($all->allKUD)){
                                                      foreach ($all->allKUD as $dt) { ?>
                                                      <option value="<?=$dt->kud_id; ?>"><?=$dt->kud_kode." - ".$dt->kud_nama; ?></option>;
                                                  <?php }} ?>
                                          </select>
                                     </div>
                                   </div>
                            </div>
                            <hr>
                            <div class="row col-sm-12">
                               <div class="form-group">
                               <label class="control-label" style="text-align:left;">Program Kerja</label>
                                   <textarea rows="6" class="col-md-12" style="max-width: 100%;" name="rkf_proker"></textarea>
                               </div>
                            </div>
                            <div class="row">
                                   <div class="col-sm-2">
                                     <div class="form-group">
                                     <label class="control-label" style="text-align:left;">Status Program Kerja</label>
                                         <select class="form-control" name="rkf_status_proker" style="width: 90%; max-width: 90%;">
                                                  <option value="">Pilih</option>
                                                   <?php
                                                   if(!empty($all->allStsProker)){
                                                      foreach ($all->allStsProker as $dt) { ?>
                                                      <option value="<?=$dt->sts_proker_id; ?>"><?=$dt->sts_proker_nama; ?></option>;
                                                  <?php }} ?>
                                          </select>
                                     </div>
                                   </div>
                                   <div class="col-sm-2">
                                     <div class="form-group">
                                     <label class="control-label" style="text-align:left;">Skala Program Kerja</label>
                                         <select class="form-control" name="rkf_skala_proker" style="width: 90%; max-width: 90%;">
                                                 <option value="">Pilih</option>
                                                  <?php
                                                  if(!empty($all->allSkalaProker)){
                                                     foreach ($all->allSkalaProker as $dt) { ?>
                                                     <option value="<?=$dt->skala_proker_id; ?>"><?=$dt->skala_proker_nama; ?></option>;
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
                                                       <option value="<?=$dt->kat_proker_id; ?>"><?=$dt->kat_proker_nama; ?></option>;
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
                                                 <option value="<?=$dt->bsc_id; ?>"><?=$dt->bsc_nama; ?></option>;
                                             <?php }} ?>
                                          </select>
                                     </div>
                                   </div>
                                   <div class="col-sm-3">
                                     <div class="form-group">
                                     <label class="control-label" style="text-align:left;">Kerjasama dgn Konsultan</label>
                                         <select class="form-control" name="rkf_konsultan" style="width: 90%; max-width: 90%;">
                                              <option value="0">Tidak</option>
                                              <option value="1">Ya</option>
                                         </select>
                                     </div>
                                   </div>
                            </div>
                             <div class="row">
                                 <div class="row clearfix">
                                  <div class="col-md-12 table-responsive">
                                  <hr>
                                  <table border="0">
                                    <tr>
                                      <td class="col-md-11">
                                        <table class="table table-striped table-hover table-sortable" id="tab_audit">
                                          <thead>
                                              <th style="text-align:left; width:70%;">Tindak Lanjut Audit (Pilih jika 'Ya')</th>
                                              <th style="text-align:left; width:20%;">Tahun</th>
                                              <th style="text-align:left; width:10%;">&nbsp;</th>
                                          </thead>
                                          <tbody>
                                              <tr id='addr0' data-id="0" class="hidden">
                                              <td data-name="tlaudit[]">
                                                  <select class="form-control"  name="tlaudit[]" style="width: 90%; max-width: 90%;">
                                                       <option value="">Pilih tindak Lanjut</option>;
                                                       <?php
                                                       if(!empty($all->allTLAudit)){
                                                          foreach ($all->allTLAudit as $dt) { ?>
                                                          <option value="<?=$dt->tindak_lanjut_id; ?>"><?=$dt->tindak_lanjut_nama; ?></option>;
                                                      <?php }} ?>
                                                   </select>
                                              </td>
                                              <td data-name="tahunaudit[]">
                                                    <select class="form-control" name="tahunaudit[]" style="width: 90%; max-width: 90%;">
                                                        <option value="">Pilih Tahun</option>;
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                     </select>
                                              </td>
                                               <td data-name="de l">
                                                   <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                               </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                      <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_audit" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                      </td>
                                    </tr>
                                  </table>
                                  <hr>
                                  <table>
                                    <tr>
                                        <td class="col-md-11">
                                          <table class="table table-striped table-hover table-sortable" id="tab_tujuan">
                                            <thead>
                                                <th style="text-align:left; width:90%;">Tujuan Program Kerja</th>
                                                <th style="text-align:left; width:10%;">&nbsp;</th>
                                            </thead>
                                            <tbody>
                                                <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="rkf_tujuan_proker[]">
                                                  <input type="text" name='rkf_tujuan_proker[]'  placeholder='Tujuan Program Kerja' class="form-control"/>
                                                </td>
                                                <td data-name="del">
                                                     <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                            <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_tujuan" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-md-11">
                                          <table class="table table-striped table-hover table-sortable" id="tab_indikator">
                                            <thead>
                                                <th style="text-align:left; width:90%;">Indikator Keberhasilan</th>
                                                <th style="text-align:left; width:10%;">&nbsp;</th>
                                            </thead>
                                            <tbody>
                                                <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="rkf_indikator[]">
                                                  <input type="text" name='rkf_indikator[]'  placeholder='Indikator Keberhasilan' class="form-control"/>
                                                </td>
                                                <td data-name="del">
                                                     <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_indikator" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                        </td>
                                      </tr>
                                    </table>
                                    <hr>
                                    <table>
                                      <tr>
                                        <td colspan="2">
                                            <h4> Target Finansial</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-md-11">
                                          <table class="table table-striped table-hover table-sortable" id="tab_target">
                                            <thead>
                                                <th style="text-align:left; width:50%;">Uraian</th>
                                                <th style="text-align:left; width:20%;">Target Kuantitatif</th>
                                                <th style="text-align:left; width:20%;">Satuan</th>
                                                <th style="text-align:left; width:10%;">&nbsp;</th>
                                            </thead>
                                            <tbody>
                                              <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="target_finansial[]">
                                                    <input type="text" name='target_finansial[]'  placeholder='Uraian' class="form-control"/>
                                                </td>
                                                <td data-name="target_kuantitatif[]">
                                                   <input type="text" name='target_kuantitatif[]'  placeholder='Target Kuantitatif' class="form-control"/>
                                                </td>
                                                <td data-name="satuan[]">
                                                  <select class="form-control" name="satuan[]" style="width: 90%; max-width: 90%;">
                                                       <option value="">Pilih Satuan</option>
                                                       <option value="Rupiah">Rupiah</option>
                                                       <option value="Orang">Orang</option>
                                                       <option value="Unit">Unit</option>
                                                       <option value="Lainnya">Lainnya</option>
                                                  </select>
                                                </td>
                                                 <td data-name="de l">
                                                     <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                 </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_target" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                        </td>
                                      </tr>
                                    </table>
                                    <hr>
                                    <table>
                                      <tr>
                                        <td>
                                            <h4> Jadwal Pelaksanaan / Target Penyelesaian</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                                <!-- <input type="checkbox" name="jadwal_1" value="1">Jan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_2" value="2">Feb &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_3" value="3">Mar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_4" value="4">Apr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_5" value="5">Mei &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_6" value="6">Jun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_7" value="7">Jul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_8" value="8">Ags &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_9" value="9">Sep &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_10" value="10">Okt &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_11" value="11">Nov &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="jadwal_12" value="12">Des -->
                                                <select class="form-control " id="jadwal" multiple="multiple" name="rkf_jadwal[]" style="width: 100%; max-width: 100%;">
                                                    <option value="">Pilih Jadwal</option>;
                                                    <option value="1">Januari</option>
                                                    <option value="2">Febuari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                 </select>
                                        </td>
                                      </tr>
                                    </table>
                                    <hr>
                                    <table>
                                      <tr>
                                        <td colspan="2">
                                            <h4> Anggaran</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-md-11">
                                          <table class="table table-striped table-hover table-sortable" id="tab_anggaran">
                                            <thead>
                                                <th style="text-align:left; width:40%;">Pos Biaya</th>
                                                <th style="text-align:left; width:10%;">COA</th>
                                                <th style="text-align:left; width:20%;">Bulan</th>
                                                <th style="text-align:left; width:20%;">Nominal</th>
                                                <th style="text-align:left; width:10%;">&nbsp;</th>
                                            </thead>
                                            <tbody>
                                              <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="pos_biaya[]">
                                                   <select class="form-control" name="pos_biaya[]" style="width: 98%; max-width: 98%;">
                                                            <option value="">Pilih Pos Biaya</option>;
                                                            <?php
                                                            if(!empty($all->allPosBiaya)){
                                                              foreach ($all->allPosBiaya as $dt) { ?>
                                                               <option value="<?=$dt->posbiaya_id; ?>"><?=$dt->posbiaya_nama; ?></option>;
                                                           <?php }} ?>
                                                   </select>
                                                </td>
                                                <td data-name="coa[]">
                                                   <input type="text" name='coa[]'  placeholder='COA' class="form-control" readonly/>
                                                </td>
                                                <td data-name="bulan[]">
                                                  <select class="form-control" name="bulan[]" style="width: 90%; max-width: 90%;">
                                                       <option value="">Pilih Bulan</option>;
                                                       <option value="1">Januari</option>
                                                       <option value="2">Febuari</option>
                                                       <option value="3">Maret</option>
                                                       <option value="4">April</option>
                                                       <option value="5">Mei</option>
                                                       <option value="6">Juni</option>
                                                       <option value="7">Juli</option>
                                                       <option value="8">Agustus</option>
                                                       <option value="9">September</option>
                                                       <option value="10">Oktober</option>
                                                       <option value="11">November</option>
                                                       <option value="12">Desember</option>
                                                  </select>
                                                </td>
                                                <td data-name="nominal[]">
                                                   <input type="text" name='nominal[]'  placeholder='0' class="form-control"/>
                                                </td>
                                                 <td data-name="de l">
                                                     <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                 </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_anggaran" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                        </td>
                                      </tr>
                                    </table>
                                    <hr>
                                    <table>
                                      <tr>
                                        <td colspan="2">
                                            <h4> Unit Pelaksana</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-md-11">
                                          <table class="table table-striped table-hover table-sortable" id="tab_unitpelaksana">
                                            <thead>
                                                <th style="text-align:left; width:45%;">Unit Kerja Setingkat Sub Divisi</th>
                                                <th style="text-align:left; width:45%;">Person In Charge</th>
                                                <th style="text-align:left; width:10%;">&nbsp;</th>
                                            </thead>
                                            <tbody>
                                              <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="subdivisi[]">
                                                   <select class="form-control" name="subdivisi[]" style="width: 98%; max-width: 98%;">
                                                            <option value="">Pilih Sub Divisi</option>;
                                                            <?php
                                                            if(!empty($subdiv->result)){
                                                              foreach ($subdiv->result[0] as $dt) { ?>
                                                               <option value="<?=$dt->id; ?>"><?=$dt->nama; ?></option>;
                                                           <?php }} ?>
                                                   </select>
                                                </td>
                                                <td data-name="pic[]">
                                                  <select class="form-control" name="pic[]" style="width: 98%; max-width: 98%;">
                                                            <option value="">Pilih PIC</option>;
                                                            <?php
                                                            if(!empty($pegsubdiv->result)){
                                                              foreach ($pegsubdiv->result[0] as $dt) { ?>
                                                               <option value="<?=$dt->pegawai_id; ?>"><?=$dt->nama; ?></option>;
                                                           <?php }} ?>
                                                  </select>
                                                </td>
                                                 <td data-name="de l">
                                                     <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                 </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_unitpelaksana" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                        </td>
                                      </tr>
                                    </table>
                                    <table>
                                      <tr>
                                        <td colspan="2">
                                            <h4> Support Fungsi Lain</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-md-11">
                                          <table class="table table-striped table-hover table-sortable" id="tab_support">
                                            <thead>
                                                <th style="text-align:left; width:45%;">Unit Kerja</th>
                                                <th style="text-align:left; width:45%;">Notes</th>
                                                <th style="text-align:left; width:10%;">&nbsp;</th>
                                            </thead>
                                            <tbody>
                                              <tr id='addr0' data-id="0" class="hidden">
                                                <td data-name="divisi[]">
                                                   <select class="form-control" name="divisi[]" style="width: 98%; max-width: 98%;">
                                                            <option value="">Pilih Divisi</option>;
                                                            <?php
                                                            if(!empty($all->divisi)){
                                                              foreach ($all->divisi as $dt) { ?>
                                                               <option value="<?=$dt->unit_kerja_id; ?>"><?=$dt->unit_kerja_nama; ?></option>;
                                                           <?php }} ?>
                                                   </select>
                                                </td>
                                                <td data-name="notes[]">
                                                   <input type="text" name='notes[]'  placeholder='Sampaikan support yang diperlukan...' class="form-control"/>
                                                </td>
                                                 <td data-name="de l">
                                                     <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                                                 </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td class="col-md-1" style="vertical-align:bottom; text-align:center;">
                                            <a id="add_row_support" class="btn btn-info btn-block btn-md">Tambah</a>
                                            <div style="padding-bottom: 30px;"></div>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                              </div>
                           </div>
                            <div class="row" style="text-align: center;">
                                <button type="submit" name="postmode" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Proses&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#visi").select2();
    $("#misi").select2();
    $("#cp").select2();
    $("#kud").select2();
    $("#tlaudit").select2();
    $("#jadwal").select2();
</script>


<script>
// Audit //
$(document).ready(function() {
  $("#add_row_audit").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_audit tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_audit tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_audit tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_audit'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_audit").trigger("click");
});



// Tujuan //
$(document).ready(function() {
  $("#add_row_tujuan").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_tujuan tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_tujuan tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_tujuan tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_tujuan'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_tujuan").trigger("click");
});



// Indikator //
$(document).ready(function() {
  $("#add_row_indikator").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_indikator tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_indikator tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_indikator tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_indikator'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_indikator").trigger("click");
});


// Target //
$(document).ready(function() {
  $("#add_row_target").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_target tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_target tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_target tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_target'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_target").trigger("click");
});


// Anggaran //
$(document).ready(function() {
  $("#add_row_anggaran").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_anggaran tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_anggaran tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_anggaran tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_anggaran'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_anggaran").trigger("click");
});

// Unit Pelaksana //
$(document).ready(function() {
  $("#add_row_unitpelaksana").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_unitpelaksana tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_unitpelaksana tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_unitpelaksana tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_unitpelaksana'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_unitpelaksana").trigger("click");
});


// Support //
$(document).ready(function() {
  $("#add_row_support").on("click", function() {
      // Dynamic Rows Code

      // Get max row id and set new id
      var newid = 0;
      $.each($("#tab_support tr"), function() {
          if (parseInt($(this).data("id")) > newid) {
              newid = parseInt($(this).data("id"));
          }
      });
      //newid++;

      var tr = $("<tr></tr>", {
          id: "addr"+newid,
          "data-id": newid
      });

      // loop through each td and create new elements with name of newid
      $.each($("#tab_support tbody tr:nth(0) td"), function() {
          var cur_td = $(this);

          var children = cur_td.children();

          // add new td and element if it has a nane
          if ($(this).data("name") != undefined) {
              var td = $("<td></td>", {
                  "data-name": $(cur_td).data("name")
              });

              var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
              c.attr("name", $(cur_td).data("name"));
              c.appendTo($(td));
              td.appendTo($(tr));
          } else {
              var td = $("<td></td>", {
                  'text': $('#tab_support tr').length
              }).appendTo($(tr));
          }
      });



      // add the new row
      $(tr).appendTo($('#tab_support'));

      $(tr).find("td button.row-remove").on("click", function() {
           $(this).closest("tr").remove();
      });
});




  // Sortable Code
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();

      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });

      return $helper;
  };

  $(".table-sortable tbody").sortable({
      helper: fixHelperModified
  }).disableSelection();

  $(".table-sortable thead").disableSelection();



  $("#add_row_support").trigger("click");
});
</script>
