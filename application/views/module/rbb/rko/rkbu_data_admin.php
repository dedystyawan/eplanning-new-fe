<style>
  table {
    font-size: 11px;
  }
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="hpanel">
      
      <div class="panel-body">
        <div class="table-responsive">
          <table id="example" class="table  table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th style="text-align:center; vertical-align:middle;">Kelompok</th>
                <th style="text-align:center; vertical-align:middle;">Nama Barang </th>
                <th style="text-align:center; vertical-align:middle;">Divisi</th>
                <th style="text-align:center; vertical-align:middle;">Jumlah</th>
                <th style="text-align:center; vertical-align:middle;">Harga</th>
                <th style="text-align:center; vertical-align:middle;">Total</th>
                <th style="text-align:center; vertical-align:middle;">Tahun</th>
                <th style="text-align:center; vertical-align:middle;">Bulan</th>
                <!-- <th style="text-align:center; vertical-align:middle;">Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $dt) { ?>
                <tr>
                  <td style="text-align:center">
                      <?php echo $dt->rkbu_barang_kelompok; ?>
                  </td>
                  <td >
                  <?php echo $dt->rkbu_barang_nama; ?>
                  </td>
                  <td >
                  <b><?php echo $dt->rkbu_divisi; ?></b>
                  </td>
                  <td><?php echo $dt->rkbu_jumlah; ?></td>
                  <td><?php echo number_format($dt->rkbu_estimasi_harga); ?></td>
                  <td>
                    <?php 
                      $total = $dt->rkbu_jumlah*$dt->rkbu_estimasi_harga;
                      echo number_format($total); ?>
                      
                    </td>
                  <td>
                  <?php echo $dt->rkbu_tahun; ?>
                  </td>   
                  <td>
                  <?php echo parse_bulan_short($dt->rkbu_jadwal_bulan); ?>
                  </td>   
                  <!-- <td>
                    <a class="btn btn-info" href="<?=base_url() ?>rbb/rko/rkbu/edit/<?=$dt->rkbu_id ?>">EDIT</a>
                    <a class="btn btn-danger" href="<?=base_url() ?>rbb/rko/rkbu/delete/<?=$dt->rkbu_id ?>">Hapus</a>
                  </td> -->
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