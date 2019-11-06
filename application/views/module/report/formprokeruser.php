<?php
     $jenisrkfjson  = file_get_contents(IP_API."/master/jenisrkf", false);
     $jenisrkf       = json_decode($jenisrkfjson);
?>
<div class="row" style="horizontal-align:center;">
  <div class="col-lg-6">
      <div class="hpanel hblue">
          <div class="panel-heading">
              <h4><i class="fa fa-cloud-download" aria-hidden="true"></i>  <b>Laporan Rencana Kerja Fungsional</b></h4>
          </div>
          <div class="panel-body">
          <div class="form-group">
          <form method="post" class="form-horizontal">
          <?php
               if(!empty($notif)){ ?>
                    <div class="alert alert-warning">
                      <strong>Gagal!</strong> <?=$notif?>
                    </div>
               <?php } ?>
          <label class="col-sm-3 control-label">Jenis RKF</label>
          <div class="col-sm-9">
               <select name="jenis_rkf" required="required" class="form-control select2">
                    <?php foreach ($jenisrkf as $valuejr) { ?>
                         <option value="<?=$valuejr->rkf_jenis_id?>*<?=$valuejr->rkf_jenis_nama;?>"><?=$valuejr->rkf_jenis_nama;?></option>
                    <?php } ?>
               </select>
          </div>
          <br />
          <br />
          <label class="col-sm-3 control-label">Tahun</label>
          <div class="col-sm-9">
               <select name="tahun_rkf" required="required" class="form-control select2">
                    <?php
                         $tahun= date("Y");
                         $tahunawal= $tahun-5;
                         for ($tahun; $tahun >= $tahunawal; $tahun--) {
                    ?>
                         <option value="<?=$tahun?>"><?=$tahun;?></option>
                    <?php } ?>
               </select>
          </div>
          <div class="hr-line-dashed"></div>
              <div class="col-sm-12">
                   <br />
                  <button class="btn btn-primary pull-right" type="submit" name="submit">Lihat</button>
              </div>
          </form>
          </div>
      </div>
  </div>
</div>

<script>
 $(".select2").select2();
 </script>
