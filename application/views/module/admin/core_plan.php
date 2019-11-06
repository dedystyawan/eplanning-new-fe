
 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
             <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"></i> Tambah Data Core Plan</a>
             <br />
             <br />
             <div class="panel-body">
             <table id="example2" class="table  table-bordered table-hover">
             <thead>
             <tr>
                 <th style="text-align:center; vertical-align:middle;">Action</th>
                 <th style="text-align:center; vertical-align:middle;">Kode</th>
                 <th style="text-align:center; vertical-align:middle;">Nama</th>
             </tr>
             </thead>
             <tbody>
                   <?php foreach ($data['allCorePlan'] as $dt){
                        $id=  encrypt_decrypt("encrypt",$dt['cp_id']);
                        ?>
                    <tr>
                      <td width="20%" style="text-align:center;">
                          <a onclick="edit(event)" doc-id="<?=$id?>" class="btn btn-sm btn-info"><i doc-id="<?=$id?>" class="fa fa-edit"> Edit</i></a>
                          <a href="<?=base_url()?>admin/dcp/<?= encrypt_decrypt("encrypt",$dt['cp_id'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin menghapus data ini?');"><i class="fa fa-trash"> Hapus</i></a>
                      </td>
                      <td style="text-align:center;" doc-id="kode<?=$id?>"><?php echo $dt['cp_kode']; ?></td>
                      <td doc-id="nama<?=$id?>"><?php echo $dt['cp_nama']; ?></td>
                    </tr>
                  <?php } ?>
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
                  <h4 class="modal-title" style="text-align:center;">TAMBAH DATA CORE PLAN</h4>
              </div>
              <form method="post" action="<?=base_url()?>admin/fcp" class="form-horizontal">
               <div class="modal-body">
                   <div class="panel-body">
                       <div class="form-group"><label class="col-sm-2 control-label">Kode</label>
                       <div class="col-sm-10"><input type="text" required class="form-control" name="cp_kode"></div>
                       </div>
                       <div class="hr-line-dashed"></div>
                       <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                           <div class="col-sm-10"><input type="text" required class="form-control" name="cp_nama"> </div>
                       </div>
                       <div class="hr-line-dashed"></div>

                    </div>
               </div>
               <div class="modal-footer" style="text-align:center;">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <button  type="submit" name="submit" class="btn btn-success">Simpan Data</button>
               </div>
              </form>
      </div>
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
                 <form method="post" action="<?=base_url()?>admin/ecp/" class="form-horizontal">
                  <div class="modal-body">
                      <div class="panel-body">
                          <div class="form-group"><label class="col-sm-2 control-label">Kode</label>
                          <div class="col-sm-10"><input type="text" required class="form-control" name="cp_kode"></div>
                          </div>
                          <div class="hr-line-dashed"></div>
                          <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10"><input type="text" required class="form-control" name="cp_nama"> </div>
                          </div>
                          <div class="hr-line-dashed"></div>

                       </div>
                  </div>
                  <div class="modal-footer" style="text-align:center;">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button  type="submit" name="submit" class="btn btn-success">Simpan Data</button>
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
         $("#medit .modal-body input[name='cp_kode']").val($("td[doc-id='kode"+doc_id+"']").html());
         $("#medit .modal-body input[name='cp_nama']").val($("td[doc-id='nama"+doc_id+"']").html());
         $("#medit form").attr('action',$("#medit form").attr('action')+doc_id);
         $("#medit").modal("show");
     }
 </script>
