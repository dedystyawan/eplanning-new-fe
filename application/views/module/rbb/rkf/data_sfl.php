<style>
    .proker:hover {
        background-color: #7cb9c4;
        font-weight: bold;
        color: #fff;
        cursor: pointer;

    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <table id="example" class="table  table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align:center; vertical-align:middle;width:30%">Program Kerja</th>
                            <th style="text-align:center; vertical-align:middle;width:10%">Divisi</th>
                            <th style="text-align:center; vertical-align:middle;width:10%">Notes</th>
                            <th style="text-align:center; vertical-align:middle;width:25%">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_seleksi as $dt) { ?>
                            <tr>
                                <td class="proker" onclick="window.location.href='<?= base_url() ?>rbb/rkf/show-detail-sfl/<?= encrypt_decrypt('encrypt', $dt->rkfid) ?>'"><?php cetak($dt->rkfproker) ?></td>
                                <td><?php cetak($dt->rkfuserfromname) ?></td>
                                <td><?php cetak($dt->rkfnotes) ?></td>
                                <td><?php $lastElement = end($dt->rkfjadwal);
                                        foreach ($dt->rkfjadwal as $dtjadwal) {
                                            echo parse_bulan_short($dtjadwal);
                                            if ($dtjadwal == $lastElement) {
                                                echo '.';
                                            } else {
                                                echo ', ';
                                            }
                                        } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            'paging': false
        });
    });
</script>