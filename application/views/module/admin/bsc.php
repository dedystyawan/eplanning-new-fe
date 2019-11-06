 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalTambah">
               <i class="fa fa-plus"></i> Tambah Data BSC
           </button>
             <br />
             <br />
             <div class="panel-body">
             <table id="example2" class="table  table-bordered table-hover">
             <thead>
             <tr>
                 <th style="text-align:center">Action</th>
                 <th style="text-align:center">Nama</th>
                 <th style="text-align:center">Status</th>
             </tr>
             </thead>
             <tbody>
                   <?php foreach ($data as $dt){
                        $id=  encrypt_decrypt("encrypt",$dt['bsc_id']);
                   ?>
                    <tr>
                      <td width="20%" style="text-align:center">
                           <a onclick="edit(event)" doc-id="<?=$id?>" class="btn btn-sm btn-info"><i doc-id="<?=$id?>" class="fa fa-edit"> Edit</i></a>
                           <a href="<?=base_url()?>admin/dbsc/<?= encrypt_decrypt("encrypt",$dt['bsc_id'])?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin menghapus data ini?');"><i class="fa fa-trash"> Hapus</i></a>
                      </td>
                      <td doc-id="nama<?=$id?>"><?php echo $dt['bsc_nama']; ?></td>
                      <td doc-id="status<?=$id?>" style="text-align:center"><?php echo $dt['bsc_sts']==1 ? "Aktif":"Tidak Aktif"; ?></td>
                    </tr>
                  <?php } ?>
             </tbody>
             </table>
             </div>
         </div>
     </div>

 </div>

 <!--  -->

<!-- modals tambah data -->
 <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog"  aria-hidden="true" >
     <div class="modal-dialog modal-lg" style="width:500px;">
         <div class="modal-content">
             <div class="color-line"></div>
             <div class="modal-header">
                 <h4 class="modal-title" style="text-align:center;">TAMBAH DATA BSC</h4>
             </div>
                <form method="post" action="<?=base_url()?>admin/fbsc" class="form-horizontal">
                       <div class="modal-body">
                         <div class="panel-body">
                         <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                             <div class="col-sm-10"><input type="text" class="form-control" name="bsc_nama"> </div>
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

 <!-- modals tambah data end -->

 <!-- modals edit data -->
 <div class="modal fade in" id="medit" tabindex="-1" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="color-line"></div>
               <div class="modal-header text-center">
                   <h4 class="modal-title">EDIT</h4>
               </div>
               <form method="post" action="<?=base_url()?>admin/ebsc/" class="form-horizontal">
                     <div class="modal-body">
                        <div class="panel-body">
                        <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="bsc_nama"> </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                 <select name="bsc_sts" class="form-control">
                                      <option value=1>Aktif</option>
                                      <option value=0>Tidak Aktif</option>
                                 </select>
                            </div>
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
function edit(e){
    var doc_id=$(e.target).attr('doc-id');
    $("#medit .modal-body input[name='bsc_nama']").val($("td[doc-id='nama"+doc_id+"']").html());
   //  if (val($("td[doc-id='nama"+doc_id+"']") < "Tidak Aktif") {
   //      $("#medit .modal-body select[name='bsc_sts']").val($("td[doc-id='nama"+doc_id+"']").html());
   // }else{
   //      $("#medit .modal-body select[name='bsc_sts']").val($("td[doc-id='nama"+doc_id+"']").html());
   // }

    $("#medit form").attr('action',$("#medit form").attr('action')+doc_id);
    $("#medit").modal("show");
}
</script>
 <script>
     $(function () {

         // Initialize Example 1
         $('#example1').dataTable( {
             "ajax": 'api/datatables.json'
         });

         // Initialize Example 2
         $('#example2').dataTable();



     });

     function deleteItem() {
    if (confirm("Are you sure?")) {
        <?=base_url()?>admin/dbsc/<?= encrypt_decrypt("encrypt",$dt['bsc_id'])?>
    }
    return false;
    }

 </script>
