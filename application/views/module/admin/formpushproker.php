<?php
     $alljson        = file_get_contents(IP_API."/master/all", false);
     $all            = json_decode($alljson);
     $jenisrkfjson  = file_get_contents(IP_API."/master/jenisrkf", false);
     $jenisrkf       = json_decode($jenisrkfjson);
?>
<div class="row" style="horizontal-align:center;">
  <div class="col-lg-6">
      <div class="hpanel hblue">
          <!-- <div class="panel-heading">
              <h4><i class="fa fa-upload" aria-hidden="true"></i>  <b>Ganti status RKF</b></h4>
          </div> -->
          <div class="panel-body">
               <?php
                    if(!empty($status)){
                         if($status=="Sukses!"){
               ?>
                         <div class="alert alert-success">
                           <strong>Berhasil!</strong> Data berhasil tersimpan.
                         </div>
                         <br />
                    <?php }else{ ?>
                         <div class="alert alert-danger">
                           <strong>Gagal!</strong> <?=$status?>
                         </div>
                         <br />
               <?php     }
                    }
               ?>
               <form method="post" class="form-horizontal">
                    <div class="form-group">
                         <label class="col-sm-3 control-label">Jenis RKF Awal</label>
                         <div class="col-sm-9">
                              <select name="jenis_rkf_awal" required="required" onchange="depend(event)" class="form-control" id="jenis_rkf_awal">
                                   <?php foreach ($jenisrkf as $valuejr) { if($valuejr->rkf_jenis_id != 4){?>
                                        <option value="<?=$valuejr->rkf_jenis_id?>"><?=$valuejr->rkf_jenis_nama;?></option>
                                   <?php }} ?>
                              </select>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-3 control-label">Jenis RKF Tujuan</label>
                         <div class="col-sm-9">
                              <select name="jenis_rkf_tujuan" required="required" id="jenisrkf" class="form-control">
                                   <?php //foreach ($jenisrkf as $valuejr) { if($valuejr->rkf_jenis_id != 1){ ?>
                                   <?php foreach ($jenisrkf as $valuejr) { if($valuejr->rkf_jenis_id){ ?>
                                        <option value="<?=$valuejr->rkf_jenis_id?>"><?=$valuejr->rkf_jenis_nama;?></option>
                                   <?php }} ?>
                              </select>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-sm-3 control-label">Tahun</label>
                         <div class="col-sm-9">
                              <select name="tahun_rkf" required="required" class="form-control select2">
                                   <?php
                                        $tahun= date("Y") + 1;
                                        $tahunawal= $tahun-5;
                                        for ($tahun; $tahun >= $tahunawal; $tahun--) {
                                   ?>
                                        <option value="<?=$tahun?>" <?php if($tahun==$tahunawal+4){ echo "selected"; } ?>><?=$tahun;?></option>
                                   <?php } ?>
                              </select>
                         </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                   <div class="col-sm-12">
                        <br />
                       <button class="btn btn-primary pull-right" type="submit" name="submit">Update</button>
                   </div>
               </form>
          </div>
     </div>
</div>

<!-- <script>
 $(".select2").select2();
 function depend(e){
   var x=<?=$jenisrkfjson;?>;
   var temp="";
   for(var a=0;a<x.length;a++){
     if(parseInt($(e.target).val()) < x[a].rkf_jenis_id){
       temp+="<option value='"+x[a].rkf_jenis_id+"'>"+x[a].rkf_jenis_nama+"</option>";
     }
   }
   $("#jenisrkf").html(temp);
 }
 </script> -->
