<style>
  table {
    font-size: 11px;
  }
</style>

<div class="row">
  <div class="col-sm-12">
    <a class="btn btn-success pull-right" href="<?=base_url()?>rbb/rko/bangren/input" >Tambah</a>
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
                <th style="text-align:center; vertical-align:middle;">Jenis</th>
                <th style="text-align:center; vertical-align:middle;">Uraian</th>
                <th style="text-align:center; vertical-align:middle;">Status</th>
                <th style="text-align:center; vertical-align:middle;">Kepemilikan Aset</th>
                <th style="text-align:center; vertical-align:middle;">Alamat</th>
                <th style="text-align:center; vertical-align:middle;">Anggaran</th>
                <th style="text-align:center; vertical-align:middle;">Bulan</th>
                <th style="text-align:center; vertical-align:middle;">Action</th>
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
                  <td>
                    <a class="btn btn-info" href="<?=base_url() ?>rbb/rko/bangren/edit/<?=$dt->bangun_renovasi_id ?>">Edit</a>
                    <a class="btn btn-danger" href="<?=base_url() ?>rbb/rko/bangren/delete/<?=$dt->bangun_renovasi_id ?>">Hapus</a>
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
  function openMonev() {
    var bulan = document.getElementById('bulanSelect').value;
    if (bulan == " ") {
      alert('pilih bulan dahulu');
    } else {
      window.open('<?= base_url() ?>rbb/rkf/aktivitas/show-report/' + bulan, '_self');
    }
  }
</script>

<script>
  function gantiLabel() {
    var filter = document.getElementById('filterSelect').value;
    window.open('<?= base_url() ?>rbb/rkf/show/' + filter, '_self');
  }
</script>

<script>
  $(document).ready(function() {
    var table = $('#example-skala').DataTable({
    });
  });
</script>