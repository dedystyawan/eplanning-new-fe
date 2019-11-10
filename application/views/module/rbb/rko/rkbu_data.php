<style>
  table {
    font-size: 11px;
  }
</style>

<div class="row">
  <div class="col-sm-12">
   <?php if($_SESSION['user']->userrole == 1 || $_SESSION['pegawai']->unit_kerja_id =="001UMM") { ?>
    <a class="btn btn-success pull-left" href="<?=base_url()?>rbb/rko/rkbu/show_all" >Rekap</a>
   <?php } ?>
   <a class="btn btn-success pull-right" href="<?=base_url()?>rbb/rko/rkbu/input" >Tambah</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="hpanel">
      
      <div class="panel-body">
        <div class="table-responsive">
          <table id="example-skala" class="table  table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th style="text-align:center; vertical-align:middle;">Kelompok</th>
                <th style="text-align:center; vertical-align:middle;">Nama Barang </th>
                <th style="text-align:center; vertical-align:middle;">Jumlah</th>
                <th style="text-align:center; vertical-align:middle;">Harga</th>
                <th style="text-align:center; vertical-align:middle;">Total</th>
                <th style="text-align:center; vertical-align:middle;">Tahun</th>
                <th style="text-align:center; vertical-align:middle;">Bulan</th>
                <th style="text-align:center; vertical-align:middle;">Action</th>
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
                  <td><?php echo $dt->rkbu_jumlah; ?></td>
                  <td><?php echo number_format($dt->rkbu_estimasi_harga); ?></td>
                  <td><?php echo number_format($dt->rkbu_estimasi_harga * $dt->rkbu_jumlah); ?></td>
                  <td>
                  <?php echo $dt->rkbu_tahun; ?>
                  </td>   
                  <td>
                  <?php echo parse_bulan($dt->rkbu_jadwal_bulan); ?>
                  </td>   
                  <td>
                    <a class="btn btn-info" href="<?=base_url() ?>rbb/rko/rkbu/edit/<?=$dt->rkbu_id ?>">EDIT</a>
                    <a class="btn btn-danger" href="<?=base_url() ?>rbb/rko/rkbu/delete/<?=$dt->rkbu_id ?>">Hapus</a>
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
    var table = $('#example-skala').DataTable({
    });
  });
</script>