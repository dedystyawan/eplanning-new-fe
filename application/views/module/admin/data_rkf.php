<?php
     $alljson        = file_get_contents(IP_API."/master/all", false);
     $all            = json_decode($alljson);
     $jenisrkfjson  = file_get_contents(IP_API."/master/jenisrkf", false);
     $jenisrkf       = json_decode($jenisrkfjson);
?>
<div class="alert alert-info" style="text-align:center;">
 <h3><b><?=$periode->rkf_jenis_nama."-".date("Y");?></b></h3>
</div>
 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
             <div class="panel-body">
             <table id="example2" class="table  table-bordered table-striped table-hover">
             <thead>
             <tr>
                 <th style="text-align:center; vertical-align:middle;">Unit Kerja</th>
                 <th style="text-align:center; vertical-align:middle;">Perspektif</th>
                 <th style="text-align:center; vertical-align:middle;">Program Kerja</th>
                 <th style="text-align:center; vertical-align:middle;">Tujuan Program Kerja</th>
                 <th style="text-align:center; vertical-align:middle;">Indikator Program kerja</th>
                 <th style="text-align:center; vertical-align:middle;">Jadwal</th>
             </tr>
             </thead>
             <tbody>
                   <?php foreach ($data as $dt){ ?>
                    <tr>
                           <td width="17%" style="text-align:center">
                              <?=$dt->rkf_user_from;?>
                           </td>
                           <td><?php echo $dt->perspektif; ?></td>
                           <td><?php echo $dt->rkf_proker; ?></td>
                           <td><?php echo $dt->rkf_tujuan_proker; ?></td>
                           <td><?php echo $dt->rkf_indikator; ?></td>
                           <td><?php if (!empty($dt->rkf_jadwal)) { ?>
                             <?php
                               asort($dt->rkf_jadwal);
                               $count= count($dt->rkf_jadwal);
                               $k=1;
                               foreach ($dt->rkf_jadwal as $key => $dk){ ?>
                               <?php
                               if($count <> $k){
                                 echo  parse_bulan_short($dk).",";
                               }else{
                                 if($count<>1){
                                   echo  parse_bulan_short($dk).".";
                                 }else{
                                   echo  parse_bulan_short($dk);
                                 }
                               }
                               ?>
                             <?php $k++; } ?>
                           <?php } ?>
                         </td>
                    </tr>
                  <?php } ?>
             </tbody>
             </table>

             </div>
         </div>
     </div>

 </div>

 <script>

     $(function () {

         // Initialize Example 1
         $('#example1').dataTable( {
             "ajax": 'api/datatables.json'
         });

         // Initialize Example 2
         $('#example2').dataTable();

     });

 </script>
