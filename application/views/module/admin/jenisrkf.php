 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
             <div class="panel-body">
             <table id="example2" class="table  table-bordered table-hover">
             <thead>
             <tr>
               <!-- <th style="text-align:center; vertical-align:middle;">No</th> !-->
               <th style="text-align:center; vertical-align:middle;">ID</th>
               <th style="text-align:center; vertical-align:middle;">Jenis RKF</th>
             </tr>
             </thead>
             <tbody>
                   <?php $n=1; foreach ($data as $dt){ ?>
                    <tr>
                      <!-- <td width="15%" style="text-align:center;">
                        <?=$n;?>
                      </td> -->
                      <td style="text-align:center;"><?= $dt['rkf_jenis_id']; ?></td>
                      <td style="text-align:justify;"><?= $dt['rkf_jenis_nama']; ?></td>
                    </tr>
                  <?php $n++; } ?>
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
