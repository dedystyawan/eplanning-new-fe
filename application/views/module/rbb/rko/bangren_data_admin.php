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
                <th style="text-align:center; vertical-align:middle;">Jenis</th>
                <th style="text-align:center; vertical-align:middle;">Uraian</th>
                <th style="text-align:center; vertical-align:middle;">Divisi</th>
                <th style="text-align:center; vertical-align:middle;">Status</th>
                <th style="text-align:center; vertical-align:middle;">Kepemilikan Aset</th>
                <th style="text-align:center; vertical-align:middle;">Alamat</th>
                <th style="text-align:center; vertical-align:middle;">Anggaran</th>
                <th style="text-align:center; vertical-align:middle;">Bulan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $dt) { ?>
                <tr>
                  <td style="text-align:center">
                      <?php 
                        
                      echo $jenis[$dt->bangun_renovasi_jenis]; 
                      ?>
                  </td>
                  <td >
                  <?php echo $dt->bangun_renovasi_uraian; ?>
                  </td>
                  <td >
                  <b><?php echo $dt->bangun_renovasi_divisi; ?></b>
                  </td>
                  <td><?php echo ($dt->bangun_renovasi_status == 1)? 'Baru': 'Carry Over';  ?></td>
                  <td><?php echo $milikAset[$dt->bangun_renovasi_kepemilikan_aset]; ?></td>
                  <td><?php echo $dt->bangun_renovasi_alamat; ?></td>
                  <td>
                  <?php echo "Rp ".number_format($dt->bangun_renovasi_anggaran); ?>
                  </td>   
                  <td>
                  <?php foreach($dt->bangun_renovasi_jadwal_bulan as $dtJadwal){ ?>
                      <ul>
                        <li><?=parse_bulan($dtJadwal); ?></li>
                      </ul>
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