 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
             <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"></i> Tambah Dokumen</a>
             <br />
             <br />
             <div class="panel-body">
             <table id="example2" class="table  table-bordered table-hover">
             <thead>
                  <tr>
                      <th style="text-align:center">Action</th>
                      <th style="text-align:center">Tahun</th>
                      <th style="text-align:center">Nama Dokumen</th>
                      <th style="text-align:center">Link</th>
                  </tr>
             </thead>
             <tbody>
                  <?php foreach ($data as $dt){ if($dt['upload_dokumen_jenis']==$type_dec){
                       $id=  encrypt_decrypt("encrypt",$dt['upload_dokumen_id']);
                       ?>
                   <tr>
                     <td width="20%" style="text-align:center">
                         <button class="btn btn-warning btn-xs" onclick="$('#resign_view .modal-body object').attr('data','<?=base_url().'assets/file/'.$dt['upload_dokumen_link'];?>');$('#resign_view').modal('show');"><i class="fa fa-eye"></i>Lihat</button>
                         <a onclick="edit(event)" doc-id="<?=$id?>" class="btn btn-xs btn-info"><i doc-id="<?=$id?>" class="fa fa-edit"> Edit</i></a>
                         <a href="<?=base_url()?>admin/ddoc/<?=$type?>/<?= encrypt_decrypt("encrypt",$dt['upload_dokumen_id'])?>/<?= encrypt_decrypt("encrypt",$dt['upload_dokumen_link'])?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda yakin menghapus dokumen ini?');"><i class="fa fa-trash"> Hapus</i></a>
                     </td>
                     <td class="ref" style="text-align:center" doc-id='thn<?=$id?>'><?php echo $dt['upload_dokument_tahun']; ?></td>
                     <td class="ref"  doc-id='nama<?=$id?>'><?php echo $dt['upload_dokumen_nama']; ?></td>
                     <td  class="ref" doc-id='link<?=$id?>' style="text-align:center"><?php echo $dt['upload_dokumen_link']; ?></td>
                   </tr>
               <?php }} ?>
             </tbody>
             </table>
             </div>
         </div>
     </div>

 </div>

 <!-- modals tambah data -->
  <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog"  aria-hidden="true" >
      <div class="modal-dialog modal-lg" style="width:500px;">
          <div class="modal-content">
              <div class="color-line"></div>
              <div class="modal-header">
                  <h4 class="modal-title" style="text-align:center;">TAMBAH DOKUMEN</h4>
              </div>
              <form method="post" action="<?=base_url()?>admin/fdoc/<?=$type;?>" class="form-horizontal" enctype="multipart/form-data">
                   <div class="modal-body">
                     <div class="panel-body">
                       <div class="form-group"><label class="col-sm-4 control-label">Tahun</label>
                           <div class="col-sm-8"><input type="text" class="form-control" name="tahun" required></div>
                       </div>
                       <div class="form-group"><label class="col-sm-4 control-label">Nama Dokumen</label>
                           <div class="col-sm-8"><input type="text" class="form-control" name="nama" required> </div>
                       </div>
                       <div class="form-group"><label class="col-sm-4 control-label" required>Nama File</label>
                           <div class="col-sm-8"><input type="file" class="form-control" name="link"> </div>
                       </div>
                     </div>
                    </div>
                    <div class="modal-footer" style="text-align:center;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
               </form>
      </div>
  </div>
  <!-- modals tambah data end-->

   <!-- modals edit data -->
   <div class="modal fade in" id="medit" tabindex="-1" role="dialog">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="color-line"></div>
                 <div class="modal-header text-center">
                     <h4 class="modal-title">EDIT</h4>
                 </div>
                 <form method="post" action="<?=base_url()?>admin/edoc/<?=$type;?>/" class="form-horizontal">
                      <div class="modal-body">
                           <div class="form-group"><label class="col-sm-4 control-label">Tahun</label>
                               <div class="col-sm-8"><input type="text" class="form-control" name="tahun"></div>
                           </div>
                           <div class="form-group"><label class="col-sm-4 control-label">Nama Dokumen</label>
                               <div class="col-sm-8"><input type="text" class="form-control" name="nama"> </div>
                           </div>
                           <div class="form-group"><label class="col-sm-4 control-label">Nama File</label>
                               <div class="col-sm-8"><input type="text" class="form-control" readonly="readonly" name="link"> </div>
                           </div>
                      </div>
                      <div class="modal-footer" style="text-align:center;">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button  type="submit" class="btn btn-success">Simpan Perubahan</button>
                      </div>
               </form>
             </div>
         </div>
   </div>
   <!-- modals edit data end -->

 <script>
     $(function () {

         // Initialize Example 1
         $('#example1').dataTable( {
             "ajax": 'api/datatables.json'
         });

         // Initialize Example 2
         $('#example2').dataTable();

     });
     function edit(e){
          var doc_id=$(e.target).attr('doc-id');
          $("#medit .modal-body input[name='tahun']").val($("td[doc-id='thn"+doc_id+"']").html());
          $("#medit .modal-body input[name='nama']").val($("td[doc-id='nama"+doc_id+"']").html());
          $("#medit .modal-body input[name='link']").val($("td[doc-id='link"+doc_id+"']").html());
          $("#medit form").attr('action',$("#medit form").attr('action')+doc_id);
          $("#medit").modal("show");
     }
 </script>

 <div class="modal fade in" id="resign_view" tabindex="-1" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="color-line"></div>
             <div class="modal-body">
               <object data="" type="application/pdf" width="100%" style="min-height: 500px;">
                 <p>Browser tidak support</p>
               </object>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
