<style>
  table {
    font-size: 11px;
  }
</style>

<?php 
// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>

<div class="row">
  <div class="col-lg-12">
    <div class="hpanel">
      <div class="row">
        <div class="col-sm-1">
          <select class="form-control filter" >
            <option value="1" >Divisi</option>
            <option value="2" selected>Kelompok</option>
          </select>
        </div>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="example" class="table  table-bordered table-hover" >
            <thead>
              <tr>
                <th style="text-align:center; vertical-align:middle; width:40%">Nama </th>
                <th style="text-align:center; vertical-align:middle;">Jumlah</th>
                <th style="text-align:center; vertical-align:middle;">Kelompok</th>
                <th style="text-align:center; vertical-align:middle;">Estimasi Harga</th>
                <th style="text-align:center; vertical-align:middle;">Total</th>
                <!-- <th style="text-align:center; vertical-align:middle;">Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $dt) { ?>
                <tr>
                  
                  <td >
                  <?php echo $dt->barang_nama; ?>
                  </td>
                  <td >
                  <b><?php echo $dt->barang_jumlah; ?></b>
                  </td>
                  <td style="text-align:center">
                     <b>
                     <?php echo ($dt->barang_kelompok == 1)? 'KELOMPOK 1': 'KELOMPOK 2';?>
                     </b>
                  </td>
                  <td><?php echo number_format($dt->barang_harga); ?></td>
                  <td>
                    <?php 
                      $total = $dt->barang_jumlah*$dt->barang_harga;
                      echo number_format($total); ?>
                      
                    </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
$('.filter').change(function(){
  let filterId = $(this).val();
  let base_url = '<?=base_url()?>';
  if(filterId == 2){
    window.open(base_url+'/rbb/rko/rkbu/show_all_kelompok', '_self');
  }else if(filterId == 1){
    window.open(base_url+'/rbb/rko/rkbu/show_all', '_self');
  }
});
</script>


 <script>
    $(document).ready(function() {
        var groupColumn = 2;
        var table = $('#example').DataTable({
            "paging": false,
            "columnDefs": [{
                "visible": false,
                "targets": groupColumn
            }],
            "order": [
                [groupColumn, 'asc']
            ],
            // "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;

                api.column(groupColumn, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="7">' + group + '</td></tr>'
                        );

                        last = group;
                    }
                });
            }
        });

        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                table.order([groupColumn, 'desc']).draw();
            } else {
                table.order([groupColumn, 'asc']).draw();
            }
        });
    });
</script>