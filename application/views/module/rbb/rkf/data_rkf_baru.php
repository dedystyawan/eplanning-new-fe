<style>
    .proker:hover {
        background-color: #7cb9c4;
        font-weight: bold;
        color: #fff;
        cursor: pointer;

    }

    table {
        font-size: 11px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="row" style="position:relative">
                <div class="col-lg-5 " style="">
                    <div class="hpanel" style="vertical-align:bottom">
                        <div class="panel-body">
                            <h5 style="text-align:center">Permintaan Support Dari Fungsi Lain</h5>
                            <?php if (!empty($datasupport)) { ?>
                                <table class="table table-striped table-rkf">
                                    <thead>
                                        <tr>
                                            <th>Divisi</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($datasupport as $dtsup) { ?>
                                            <tr>
                                                <td class="proker text-success" onclick="window.location.href='<?= base_url() ?>rbb/rkf/sfl/<?= $_SESSION['pegawai']->unit_kerja_id; ?>/<?= $dtsup->rkfuserfrom ?>'">
                                                    <?php echo $dtsup->rkfuserfromname; ?>
                                                </td>
                                                <td style="text-align:center"><?php echo $dtsup->jumlahsupport; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 " style=" position:absolute; bottom:0;right:0; margin-bottom:23px ">
                    <?php if ($_SESSION['user']->userrole == "3") { ?>
                        <a href="<?= base_url() ?>rbb/rkf/form" class='btn btn-success pull-right' style=''><i class='fa fa-plus'></i> Tambah Data RKF</a>
                    <?php  } ?>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example-skala" class="table  table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center; vertical-align:middle;width:10%">Status</th>
                                <th style="text-align:center; vertical-align:middle;width:30%">Program Kerja</th>
                                <th style="text-align:center; vertical-align:middle;width:10%">Skala Program Kerja</th>
                                <th style="text-align:center; vertical-align:middle;width:10%">Perspektif</th>
                                <th style="text-align:center; vertical-align:middle;width:25%">PIC</th>
                                <th style="text-align:center; vertical-align:middle;width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $keyrkf => $dt) { ?>
                                <tr>
                                    <td style="text-align:center">
                                        <?php
                                            switch ($dt->rkf_sts) {
                                                case '0':
                                                    echo  "<div style='color:#ff9933;'>Review</div>";
                                                    break;
                                                case '1':
                                                    echo  "<div style='color:#ff0000;'>Draft</div>";
                                                    break;
                                                default:
                                                    echo  "<div style='color: #62cb31;'>Approve</div>";
                                                    break;
                                            }
                                            ?>
                                    </td>
                                    <td class="proker" id="proker-<?= $dt->rkf_proker; ?>" onclick="window.location.href='<?= base_url() ?>rbb/rkf/show-detail/<?php echo encrypt_decrypt('encrypt', $dt->rkf_id); ?>';">
                                        <?php cetak($dt->rkf_proker); ?>
                                    </td>
                                    <td><b><?php echo cetakv2($dt->skala_proker_nama); ?></b></td>
                                    <td><?php cetak($dt->bsc_nama); ?></td>
                                    <td>
                                        <?php
                                            $array_key = array_keys($dt->rkf_unit_pelaksana);
                                            $last_key = end($array_key);
                                            foreach ($dt->rkf_unit_pelaksana as $keyPic => $dtPic) {

                                                $nama = $kamusPegawai[$dtPic->pegawaiUnitKerja] ?? null;
                                                // echo ($nama != null) ? $nama : $dtPic->pegawaiUnitKerja;
                                                if ($nama != null) {
                                                    cetak($nama);
                                                } else {
                                                    $nama = file_get_contents(SDM_API . '/api_v2/pegawai/prc_get_pegawai_detail/' . $dtPic->pegawaiUnitKerja . '?api_key=prc');
                                                    $nama = json_decode($nama, true);
                                                    cetak($nama['result'][0][0]['nama']);
                                                }
                                                echo ($keyPic == $last_key) ? "" : " | ";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php if ($_SESSION['user']->userrole == "1") { ?>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Otorisasi" href="<?= base_url() ?>rbb/rkf/otor/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="<?= base_url() ?>rbb/rkf/edit/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Breakdown Aktivitas" href="<?= base_url() ?>rbb/rkf/aktivitas/input/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-warning2"><i class="fa fa-sitemap"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Monev" href="<?= base_url() ?>rbb/rkf/monev/input/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-list-alt"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Print" href="<?= base_url() ?>rbb/rkf/cetak/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-print"> </i></a>
                                        <?php } ?>

                                        <?php if ($dt->rkf_sts <> 2) {
                                                if ($_SESSION['user']->userrole == "3") { ?>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="<?= base_url() ?>rbb/rkf/edit/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                            <?php } elseif ($_SESSION['user']->userrole == "2") {  ?>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Otorisasi" href="<?= base_url() ?>rbb/rkf/otor/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>
                                            <?php }
                                                } elseif ($dt->rkf_sts == 2) {
                                                    if ($_SESSION['user']->userrole == "3") { ?>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Breakdown Aktivitas" href="<?= base_url() ?>rbb/rkf/aktivitas/input/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-warning2"><i class="fa fa-sitemap"></i></a>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Monev" href="<?= base_url() ?>rbb/rkf/monev/input/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-list-alt"></i></a>
                                            <?php } ?>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Print" href="<?= base_url() ?>rbb/rkf/cetak/<?php echo encrypt_decrypt("encrypt", $dt->rkf_id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-print"> </i></a>
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
        var groupColumn = 2;
        var table = $('#example-skala').DataTable({
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
                            '<tr class="group"><td colspan="5">' + group + '</td></tr>'
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