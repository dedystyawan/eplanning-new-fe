 <style>
    .nama-doc:hover{
        cursor:pointer;
        color: white;
        font-weight:bold;
        background-color:grey;
    }
 </style>
 
 
 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
             <div class="panel-body">
             <table id="tbl-dokumen" class="table  table-bordered table-hover">
             <thead>
                  <tr>
                      <th style="text-align:center">Tahun</th>
                      <th style="text-align:center">Nama Dokumen</th>
                      <th style="text-align:center">Link</th>
                  </tr>
             </thead>
             <tbody>
                  <?php foreach ($data as $dt){ if($dt['upload_dokumen_jenis']==$type_dec){
                       $id= encrypt_decrypt("encrypt",$dt['upload_dokumen_id']);
                       ?>
                   <tr>
                     <td class="ref" style="text-align:center" ><?php echo $dt['upload_dokument_tahun']; ?></td>
                     <td class="ref nama-doc" onclick="window.open('<?=base_url().'assets/file/'.$dt['upload_dokumen_link'];?>', '_blank')"><?php echo $dt['upload_dokumen_nama']; ?></td>
                     <td  class="ref"  style="text-align:center"><?php echo $dt['upload_dokumen_link']; ?></td>
                   </tr>
               <?php }} ?>
             </tbody>
             </table>

             </div>
         </div>
     </div>

 </div>


 <script>
     $(function () {
         // Initialize Example 2
         $('#tbl-dokumen').dataTable();

     });
      </script>
