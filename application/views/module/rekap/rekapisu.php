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

<?php 
// echo "<pre>";
//     print_r($data);
//     echo "</pre>";
    // die;
?> 
<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="row">
                <div class="col-sm-2 pull-left " style="padding-bottom:0px">
                    <select id="filter-select"  class="form-control " name="bulan">
                        <!-- <option value="1" selected>Skala</option> -->
                        <!-- <option value="2">Perspektif</option>
                        <option value="3">PIC</option> -->
                        <option value="4" selected>Isu Strategis</option>
                        <option value="5">KUD</option>
                        <option value="6" >Transformasi</option>
                    </select>
                </div>
                <div class="col-sm-3 pull-right">
                    <?php if ($_SESSION['user']->userrole == "3") { ?>
                        <a href="<?= base_url() ?>rbb/rkf/form" class='btn btn-success pull-right' style=''><i class='fa fa-plus'></i> Tambah Data RKF</a>
                    <?php  } ?>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive filterin">
                    <table id="example" class="table  table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center; vertical-align:middle;width:10%">Status</th>
                                <th style="text-align:center; vertical-align:middle;width:30%">Program Kerja</th>
                                <th style="text-align:center; vertical-align:middle;width:10%">Isu Strategis</th>
                                <th style="text-align:center; vertical-align:middle;width:10%">Perspektif</th>
                                <th style="text-align:center; vertical-align:middle;width:10%">Fungsi</th>
                                <th style="text-align:center; vertical-align:middle;width:25%">PIC</th>
                                <!-- <th style="text-align:center; vertical-align:middle;width:10%">Action</th> -->
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
                                    <td><b><?php echo (!empty($dt->isu_strategis))? $dataIsu[$dt->isu_strategis]: "-"; ?></b></td>
                                    <td><?php cetak($dt->bsc_nama); ?></td>
                                    <td><?=$dt->rkf_user_from; ?></td>
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
                                                    // $nama = file_get_contents(SDM_API . '/api_v2/pegawai/prc_get_pegawai_detail/' . $dtPic->pegawaiUnitKerja . '?api_key=prc');
                                                    // $nama = json_decode($nama, true);
                                                    // cetak($nama['result'][0][0]['nama']);
                                                    echo $dtPic->pegawaiUnitKerja;
                                                }
                                                echo ($keyPic == $last_key) ? "" : ", ";
                                            }
                                            ?>
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


<script>
$('#filter-select').change(function(){
    let filter = $(this).val();
    if(filter == 4){
        window.open('<?= base_url(); ?>rekap/rekapisu', '_self');
    }else if(filter == 5){
       window.open('<?= base_url(); ?>rekap/rekapkud', '_self'); 
    }else if(filter == 6){
        window.open('<?= base_url(); ?>rekap/rekaptransformasi', '_self'); 
    }
})
</script>