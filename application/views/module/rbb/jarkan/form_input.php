<?php
$dataBuka = json_decode(file_get_contents(IP_API . '/jaringan/pembukaan/tahun/' . (date("Y") + 1)));
$dataUbah = json_decode(file_get_contents(IP_API . '/jaringan/perubahan/tahun/' . (date("Y") + 1)));
$dataRelokasi = json_decode(file_get_contents(IP_API . '/jaringan/relokasi/tahun/' . (date("Y") + 1)));
$dataTutup = json_decode(file_get_contents(IP_API . '/jaringan/penutupan/tahun/' . (date("Y") + 1)));

// echo "<pre>";
// print_r($dataBuka);
// echo "</pre>";

?>


<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    textarea.cor-cor {
        /* box-sizing: padding-box; */
        overflow: hidden;
        /* demo only: */
        padding: 10px;
        width: 250px;
        font-size: 14px;
        margin: 50px auto;
        display: block;
        border-radius: 10px;
        border: 6px solid #556677;
        resize: none
    }
</style>


<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <a class="btn btn-info pull-right" href="<?= base_url() ?>rbb/rko/jarkan">Kembali

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content ">


<div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"> Pembukaan</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2">Perubahan Status</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-3">Relokasi</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-4">Penutupan</a></li>
                </ul>
                <div class="tab-content">

                    <!-- untuk pembukaan -->
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class=" col-md-12 bapak-buka">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col-md-12 mailbox-pagination m-b-md animated-panel zoomIn" style="animation-delay: 0.3s;">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm buka-kiri"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-default btn-sm indexnya" type="button">0</button>
                                            <button class="btn btn-default btn-sm buka-kanan"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- form rkf -->
                                <form method="post" action="<?= base_url() ?>rbb/rko/jarkan/insert-pembukaan" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                    <!-- baris input visi dan misi -->

                                    <div class="row mt-3">
                                        <!-- input visi -->
                                        <div class="form-group">

                                            <input type="text" class="form-control input-id " style="opacity:0" name="buka_id" value="">

                                            <label class="col-sm-2 control-label" style="text-align:left;">Jenis Kantor</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-jenis_kantor" name="jenis_kantor" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($jenis_kantor as $dt) { ?>
                                                        <option value="<?= $dt->jenis_kantor_id ?>"><?= $dt->jenis_kantor_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                           <!-- input Misi -->
                                           <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Pengusul</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-pengusul" name="pengusul" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($pengusul as $dt) { ?>
                                                        <option value="<?= $dt->pengusul_id ?>"><?= $dt->pengusul_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                             
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Status Proker</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-status" name="status" id="">
                                                    <option value="0">--</option>
                                                    <?php foreach ($status_proker as $dt) { ?>
                                                        <option value="<?= $dt->sts_proker_id ?>"><?= $dt->sts_proker_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Tahun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-tahun" name="tahun">
                                                    <option value="0">--</option>
                                                    <?php for ($i = 0; $i < 4; $i++) { ?>
                                                        <option><?= date("Y") + $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />


                                    <div class="row">
                                        <h5>Lokasi</h5>
                                    </div>
                                    <div class="row  lokasi-bapak">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Provinsi</label>
                                                <select class="form-control propinsi select-propinsi" name="propinsi" style=" max-width: 98%;">
                                                    <option value="0">Pilih propinsi</option>
                                                    <?php foreach ($propinsi as $dt) { ?>
                                                        <option value="<?= $dt->propinsi_id ?>"><?= $dt->propinsi_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kabupaten/Kota</label>
                                                <select class="form-control kota select-kota" name="kota" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kecamatan</label>
                                                <select class="form-control kecamatan select-kecamatan" name="kecamatan" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <hr />


                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:20%"></th>
                                                        <th style="width:40%">Tanah</th>
                                                        <th style="width:40%">Bangunan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><label clas="control-label">Ketersediaan</label></td>
                                                        <td>
                                                            <select class="form-control select-tanah" name="tanah" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($jenis_tanah_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->jenis_tanah_bangunan_id ?>"><?= $dt->jenis_tanah_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select-bangunan" name="bangunan" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($jenis_tanah_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->jenis_tanah_bangunan_id ?>"><?= $dt->jenis_tanah_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Rencana Pengadaan</label></td>
                                                        <td>
                                                            <select class="form-control select-pengadaan_tanah" name="rencana_pengadaan_tanah" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($pengadaan_tanah as $dt) { ?>
                                                                    <option value="<?= $dt->rencana_pengadaan_tanah_id ?>"><?= $dt->rencana_pengadaan_tanah_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select-pengadaan_bangunan" name="rencana_pengadaan_bangunan" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($pengadaan_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->rencana_pengadaan_bangunan_id ?>"><?= $dt->rencana_pengadaan_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Anggaran Pengadaan</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span><input class="form-control input-anggaran_pengadaan_tanah" type="text" name="anggaran_pengadaan_tanah">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span><input class="form-control input-anggaran_pengadaan_bangunan" type="text" name="anggaran_pengadaan_bangunan">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <hr />

                                    <!-- -------------------------- jadwal ------------------------ -->
                                    <div class="row">
                                        <h5>Jadwal</h5>
                                    </div>

                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Aktivitas</th>
                                                    <th>Bulan Mulai</th>
                                                    <th>Bulan Selesai</th>
                                                    <th>PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- kajian kelayakan bisnis -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Bisnis</label></td>
                                                    <td>
                                                        <Select class="form-control select-kkb_start" name="kajian_kelayakan_bisnis_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kkb_finish" name="kajian_kelayakan_bisnis_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_bisnis_divisi" value="<?= $pic_kkb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kkb->nama; ?></label></td>
                                                </tr>
                                                <!-- kajian kelayakan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-kktb_start" name="kajian_kelayakan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kktb_finish" name="kajian_kelayakan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_tanah_bangunan_divisi" value="<?= $pic_kktb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kktb->nama; ?></label></td>
                                                </tr>
                                                <!-- pengadaan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pengadaan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-ptb_start" name="pengadaan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-ptb_finish" name="pengadaan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pengadaan_tanah_bangunan_divisi" value="<?= $pic_ptb->id; ?>" style="display:none"> <label class=control-label><?= $pic_ptb->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-petb_start" name="penyiapan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-petb_finish" name="penyiapan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_tanah_bangunan_divisi" value="<?= $pic_petb->id; ?>" style="display:none"> <label class=control-label><?= $pic_petb->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan infrastruktur pendukung -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Infrastruktur Pendukung</label></td>
                                                    <td>
                                                        <Select class="form-control select-pip_start" name="penyiapan_infrastruktur_pendukung_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pip_finish" name="penyiapan_infrastruktur_pendukung_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_infrastruktur_pendukung_divisi" value="<?= $pic_pip->id; ?>" style="display:none"> <label class=control-label><?= $pic_pip->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan infrastruktur IT -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Infrastruktur IT</label></td>
                                                    <td>
                                                        <Select class="form-control select-pit_start" name="penyiapan_infrastruktur_it_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pit_finish" name="penyiapan_infrastruktur_it_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_infrastruktur_it_divisi" value="<?= $pic_pit->id; ?>" style="display:none"> <label class=control-label><?= $pic_pit->nama; ?></label></td>
                                                </tr>
                                                <!-- pengadaan sdm -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pengadaan SDM</label></td>
                                                    <td>
                                                        <Select class="form-control select-psdm_start" name="pengadaan_sdm_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-psdm_finish" name="pengadaan_sdm_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pengadaan_sdm_divisi" value="<?= $pic_psdm->id; ?>" style="display:none"> <label class=control-label><?= $pic_psdm->nama; ?></label></td>
                                                </tr>
                                                <!-- perizinan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Perizinan</label></td>
                                                    <td>
                                                        <Select class="form-control select-pizin_start" name="perijinan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pizin_finish" name="perijinan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="perijinan_divisi" value="<?= $pic_pizin->id; ?>" style="display:none"> <label class=control-label><?= $pic_pizin->nama; ?></label></td>
                                                </tr>
                                                <!-- pembukaan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pembukaan</label></td>
                                                    <td>
                                                        <Select class="form-control select-pbuka_start" name="pembukaan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pbuka_finish" name="pembukaan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pembukaan_divisi" value="<?= $pic_pbuka->id; ?>" style="display:none"> <label class=control-label><?= $pic_pbuka->nama; ?></label></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>




                                    <!--//////BUTTON ADD DATANYA ///// -->
                                    <div class="row" style="text-align: center;">
                                        <button type="submit" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                          <!-- untuk perubahan status -->
                          <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <div class=" col-md-12 bapak-ubah">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col-md-12 mailbox-pagination m-b-md animated-panel zoomIn" style="animation-delay: 0.3s;">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm ubah-kiri"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-default btn-sm indexnya" type="button">0</button>
                                            <button class="btn btn-default btn-sm ubah-kanan"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- form rkf -->
                                <form method="post" action="<?= base_url() ?>rbb/rko/jarkan/insert-perubahan" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                    <!-- baris input visi dan misi -->
                                    <div class="row">
                                        <input type="text" class="form-control input-id" style="opacity:0" name="ubah_id" value="">
                                        <!-- input visi -->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Nama Kantor</label>
                                            <div class="col-sm-10">
                                                <input class="form-control input-nama" type="text" name="nama_semula">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- input Misi -->
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Jenis Kantor Semula</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-jenis_kantor_semula" name="jenis_kantor_semula" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($jenis_kantor as $dt) { ?>
                                                        <option value="<?= $dt->jenis_kantor_id ?>"><?= $dt->jenis_kantor_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Perubahan Status Mjd </label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-jenis_kantor_menjadi" name="jenis_kantor_menjadi" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($jenis_kantor as $dt) { ?>
                                                        <option value="<?= $dt->jenis_kantor_id ?>"><?= $dt->jenis_kantor_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Status Proker</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-status" name="status" id="">
                                                    <option value="0">--</option>
                                                    <?php foreach ($status_proker as $dt) { ?>
                                                        <option value="<?= $dt->sts_proker_id ?>"><?= $dt->sts_proker_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Tahun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-tahun" name="tahun">
                                                    <option value="0">--</option>
                                                    <?php for ($i = 0; $i < 4; $i++) { ?>
                                                        <option><?= date("Y") + $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="row">
                                        <h5>Lokasi</h5>
                                    </div>
                                    <div class="row  lokasi-bapak">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Provinsi</label>
                                                <select class="form-control propinsi select-propinsi" name="propinsi" style=" max-width: 98%;">
                                                    <option value="0">Pilih propinsi</option>
                                                    <?php foreach ($propinsi as $dt) { ?>
                                                        <option value="<?= $dt->propinsi_id ?>"><?= $dt->propinsi_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kabupaten/Kota</label>
                                                <select class="form-control kota select-kota" name="kota" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kecamatan</label>
                                                <select class="form-control kecamatan select-kecamatan" name="kecamatan" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <hr />

                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:20%"></th>
                                                        <th style="width:40%">Tanah</th>
                                                        <th style="width:40%">Bangunan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><label clas="control-label">Ketersediaan</label></td>
                                                        <td>
                                                            <select class="form-control select-tanah" name="tanah" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($jenis_tanah_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->jenis_tanah_bangunan_id ?>"><?= $dt->jenis_tanah_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select-bangunan" name="bangunan" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($jenis_tanah_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->jenis_tanah_bangunan_id ?>"><?= $dt->jenis_tanah_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Rencana Pengadaan</label></td>
                                                        <td>
                                                            <select class="form-control select-rencana_pengadaan_tanah" name="rencana_pengadaan_tanah" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($pengadaan_tanah as $dt) { ?>
                                                                    <option value="<?= $dt->rencana_pengadaan_tanah_id ?>"><?= $dt->rencana_pengadaan_tanah_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select-rencana_pengadaan_bangunan" name="rencana_pengadaan_bangunan" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($pengadaan_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->rencana_pengadaan_bangunan_id ?>"><?= $dt->rencana_pengadaan_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Anggaran Pengadaan</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">Rp</span><input class="form-control input-anggaran_pengadaan_tanah" type="text" name="anggaran_pengadaan_tanah">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon ">Rp</span><input class="form-control input-anggaran_pengadaan_bangunan" type="text" name="anggaran_pengadaan_bangunan">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr />



                                    <!-- -------------------------- jadwal ------------------------ -->
                                    <div class="row">
                                        <h5>Jadwal</h5>
                                    </div>

                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Aktivitas</th>
                                                    <th>Bulan Mulai</th>
                                                    <th>Bulan Selesai</th>
                                                    <th>PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- kajian kelayakan bisnis -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Bisnis</label></td>
                                                    <td>
                                                        <Select class="form-control select-kkb_start" name="kajian_kelayakan_bisnis_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kkb_finish" name="kajian_kelayakan_bisnis_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_bisnis_divisi" value="<?= $pic_kkb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kkb->nama; ?></label></td>
                                                </tr>
                                                <!-- kajian kelayakan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-kktb_start" name="kajian_kelayakan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kktb_finish" name="kajian_kelayakan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_tanah_bangunan_divisi" value="<?= $pic_kktb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kktb->nama; ?></label></td>
                                                </tr>
                                                <!-- pengadaan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pengadaan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-ptb_start" name="pengadaan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-ptb_finish" name="pengadaan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pengadaan_tanah_bangunan_divisi" value="<?= $pic_ptb->id; ?>" style="display:none"> <label class=control-label><?= $pic_ptb->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-petb_start" name="penyiapan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-petb_finish" name="penyiapan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_tanah_bangunan_divisi" value="<?= $pic_petb->id; ?>" style="display:none"> <label class=control-label><?= $pic_petb->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan infrastruktur pendukung -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Infrastruktur Pendukung</label></td>
                                                    <td>
                                                        <Select class="form-control select-pip_start" name="penyiapan_infrastruktur_pendukung_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pip_finish" name="penyiapan_infrastruktur_pendukung_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_infrastruktur_pendukung_divisi" value="<?= $pic_pip->id; ?>" style="display:none"> <label class=control-label><?= $pic_pip->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan infrastruktur IT -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Infrastruktur IT</label></td>
                                                    <td>
                                                        <Select class="form-control seletct-pit_start" name="penyiapan_infrastruktur_it_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control seletct-pit_finish" name="penyiapan_infrastruktur_it_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_infrastruktur_it_divisi" value="<?= $pic_pit->id; ?>" style="display:none"> <label class=control-label><?= $pic_pit->nama; ?></label></td>
                                                </tr>
                                                <!-- pengadaan sdm -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pengadaan SDM</label></td>
                                                    <td>
                                                        <Select class="form-control select-psdm_start" name="pengadaan_sdm_start" style="max-width:90%">
                                                            <option value="0">- </option> <?php for ($i = 1; $i <= 12; $i++) { ?> <?php $number = $i;
                                                                                                                                        $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?> <option value="<?php echo (date("Y") + 1) . $number ?>"><?php parse_bulan_short($i);
                                                                                                                                                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                        <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-psdm_finish" name="pengadaan_sdm_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pengadaan_sdm_divisi" value="<?= $pic_psdm->id; ?>" style="display:none"> <label class=control-label><?= $pic_psdm->nama; ?></label></td>
                                                </tr>
                                                <!-- perizinan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Perizinan</label></td>
                                                    <td>
                                                        <Select class="form-control select-pizin_start" name="perijinan_start" style="max-width:90%">
                                                            <option valu="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pizin_finish" name="perijinan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="perijinan_divisi" value="<?= $pic_pizin->id; ?>" style="display:none"> <label class=control-label><?= $pic_pizin->nama; ?></label></td>
                                                </tr>
                                                <!-- pembukaan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Perubahan Status</label></td>
                                                    <td>
                                                        <Select class="form-control select-pubah_start" name="perubahan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pubah_finish" name="perubahan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="perubahan_divisi" value="<?= $pic_pbuka->id; ?>" style="display:none"> <label class=control-label><?= $pic_pbuka->nama; ?></label></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>





                                    <!--//////BUTTON ADD DATANYA ///// -->
                                    <div class="row" style="text-align: center;">
                                        <button type="submit" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>


                             <!-- untuk Relokasi -->
                             <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            <div class=" col-md-12 bapak-relokasi">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col-md-12 mailbox-pagination m-b-md animated-panel zoomIn" style="animation-delay: 0.3s;">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm relokasi-kiri"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-default btn-sm indexnya" type="button">0</button>
                                            <button class="btn btn-default btn-sm relokasi-kanan"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- form rkf -->
                                <form method="post" action="<?= base_url() ?>rbb/rko/jarkan/insert-relokasi" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                    <!-- baris input visi dan misi -->
                                    <!-- <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" style="text-align:left;">Nama Kantor</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nama_kantor">
                                                </div>
                                            </div>
                                    </div> -->
                                    <!-- input Misi -->
                                    <div class="row">
                                        <input type="text" class="form-control input-id" style="opacity:0" name="relokasi_id" value="">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Jenis Kantor</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-jenis_kantor" name="jenis_kantor" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($jenis_kantor as $dt) { ?>
                                                        <option value="<?= $dt->jenis_kantor_id ?>"><?= $dt->jenis_kantor_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Pengusul</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-pengusul" name="pengusul" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($pengusul as $dt) { ?>
                                                        <option value="<?= $dt->pengusul_id ?>"><?= $dt->pengusul_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label " style="text-align:left">Status Proker</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-status" name="status" id="">
                                                    <option value="0">--</option>
                                                    <?php foreach ($status_proker as $dt) { ?>
                                                        <option value="<?= $dt->sts_proker_id ?>"><?= $dt->sts_proker_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Tahun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-tahun" name="tahun">
                                                    <option value="0">--</option>
                                                    <?php for ($i = 0; $i < 4; $i++) { ?>
                                                        <option><?= date("Y") + $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />





                                    <div class="row">
                                        <h5>Lokasi</h5>
                                    </div>

                                    <div class="row">
                                        <h5>Semula</h5>
                                    </div>
                                    <div class="row  lokasi-bapak">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Provinsi</label>
                                                <select class="form-control propinsi select-propinsi_semula" name="propinsi_semula" style=" max-width: 98%;">
                                                    <option value="0">Pilih propinsi</option>
                                                    <?php foreach ($propinsi as $dt) { ?>
                                                        <option value="<?= $dt->propinsi_id ?>"><?= $dt->propinsi_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kabupaten/Kota</label>
                                                <select class="form-control kota select-kota_semula" name="kota_semula" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kecamatan</label>
                                                <select class="form-control kecamatan select-kecamatan_semula" name="kecamatan_semula" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="row">
                                        <h5>Menjadi</h5>
                                    </div>
                                    <div class="row  lokasi-bapak">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Provinsi</label>
                                                <select class="form-control propinsi select-propinsi_menjadi" name="propinsi_menjadi" style=" max-width: 98%;">
                                                    <option value="0">Pilih propinsi</option>
                                                    <?php foreach ($propinsi as $dt) { ?>
                                                        <option value="<?= $dt->propinsi_id ?>"><?= $dt->propinsi_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kabupaten/Kota</label>
                                                <select class="form-control kota select-kota_menjadi" name="kota_menjadi" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kecamatan</label>
                                                <select class="form-control kecamatan select-kecamatan_menjadi" name="kecamatan_menjadi" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <h5>Alamat</h5>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Semula</label>
                                                <input type="text" class="form-control input-alamat_semula" name="alamat_semula" style="max-width:90%">
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Menjadi</label>
                                                <input type="text" class="form-control input-alamat_menjadi" name="alamat_menjadi" style="max-width:90%">
                                            </div>

                                        </div>

                                    </div>

                                    <hr />



                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width:20%"></th>
                                                        <th style="width:40%">Tanah</th>
                                                        <th style="width:40%">Bangunan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><label clas="control-label">Ketersediaan</label></td>
                                                        <td>
                                                            <select class="form-control select-tanah" name="tanah" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($jenis_tanah_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->jenis_tanah_bangunan_id ?>"><?= $dt->jenis_tanah_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select-bangunan" name="bangunan" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($jenis_tanah_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->jenis_tanah_bangunan_id ?>"><?= $dt->jenis_tanah_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Rencana Pengadaan</label></td>
                                                        <td>
                                                            <select class="form-control select-rencana_pengadaan_tanah" name="rencana_pengadaan_tanah" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($pengadaan_tanah as $dt) { ?>
                                                                    <option value="<?= $dt->rencana_pengadaan_tanah_id ?>"><?= $dt->rencana_pengadaan_tanah_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select-rencana_pengadaan_bangunan" name="rencana_pengadaan_bangunan" id="">
                                                                <option value="0">--</option>
                                                                <?php foreach ($pengadaan_bangunan as $dt) { ?>
                                                                    <option value="<?= $dt->rencana_pengadaan_bangunan_id ?>"><?= $dt->rencana_pengadaan_bangunan_nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Anggaran Pengadaan</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span><input class="form-control input-anggaran_pengadaan_tanah" type="text" name="anggaran_pengadaan_tanah">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span><input class="form-control input-anggaran_pengadaan_bangunan" type="text" name="anggaran_pengadaan_bangunan">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr />


                                    <!-- -------------------------- jadwal ------------------------ -->
                                    <div class="row">
                                        <h5>Jadwal</h5>
                                    </div>

                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Aktivitas</th>
                                                    <th>Bulan Mulai</th>
                                                    <th>Bulan Selesai</th>
                                                    <th>PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- kajian kelayakan bisnis -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Bisnis</label></td>
                                                    <td>
                                                        <Select class="form-control select-kkb_start" name="kajian_kelayakan_bisnis_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kkb_finish" name="kajian_kelayakan_bisnis_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_bisnis_divisi" value="<?= $pic_kkb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kkb->nama; ?></label></td>
                                                </tr>
                                                <!-- kajian kelayakan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-kktb_start" name="kajian_kelayakan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kktb_finish" name="kajian_kelayakan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_tanah_bangunan_divisi" value="<?= $pic_kktb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kktb->nama; ?></label></td>
                                                </tr>
                                                <!-- pengadaan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pengadaan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-ptb_start" name="pengadaan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-ptb_finish" name="pengadaan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pengadaan_tanah_bangunan_divisi" value="<?= $pic_ptb->id; ?>" style="display:none"> <label class=control-label><?= $pic_ptb->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan tanah dan bangunan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Tanah & Bangunan</label></td>
                                                    <td>
                                                        <Select class="form-control select-petb_start" name="penyiapan_tanah_bangunan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-petb_finish" name="penyiapan_tanah_bangunan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_tanah_bangunan_divisi" value="<?= $pic_petb->id; ?>" style="display:none"> <label class=control-label><?= $pic_petb->nama; ?></label></td>
                                                </tr>


                                                <!-- penyiapan infrastruktur pendukung -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Infrastruktur Pendukung</label></td>
                                                    <td>
                                                        <Select class="form-control select-pip_start" name="penyiapan_infrastruktur_pendukung_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pip_finish" name="penyiapan_infrastruktur_pendukung_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_infrastruktur_pendukung_divisi" value="<?= $pic_pip->id; ?>" style="display:none"> <label class=control-label><?= $pic_pip->nama; ?></label></td>
                                                </tr>
                                                <!-- penyiapan infrastruktur IT -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penyiapan Infrastruktur IT</label></td>
                                                    <td>
                                                        <Select class="form-control select-pit_start" name="penyiapan_infrastruktur_it_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pit_finish" name="penyiapan_infrastruktur_it_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penyiapan_infrastruktur_it_divisi" value="<?= $pic_pit->id; ?>" style="display:none"> <label class=control-label><?= $pic_pit->nama; ?></label></td>
                                                </tr>
                                                <!-- pengadaan sdm -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Pengadaan SDM</label></td>
                                                    <td>
                                                        <Select class="form-control select-psdm_start" name="pengadaan_sdm_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>

                                                    <td>
                                                        <Select class="form-control select-psdm_finish" name="pengadaan_sdm_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="pengadaan_sdm_divisi" value="<?= $pic_psdm->id; ?>" style="display:none"> <label class=control-label><?= $pic_psdm->nama; ?></label></td>
                                                </tr>
                                                
                                                       
                                                <!-- perizinan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Perizinan</label></td>
                                                    <td>
                                                        <Select class="form-control select-pizin_start" name="perijinan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pizin_finish" name="perijinan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="perijinan_divisi" value="<?= $pic_pizin->id; ?>" style="display:none"> <label class="control-label"><?= $pic_pizin->nama; ?></label></td>
                                                </tr>

                                                   
                                                <!-- pembukaan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Relokasi</label></td>
                                                    <td>
                                                        <Select class="form-control select-relo_start" name="relokasi_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-relo_start" name="relokasi_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="relokasi_divisi" value="<?= $pic_pbuka->id; ?>" style="display:none"> <label class=control-label><?= $pic_pbuka->nama; ?></label></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>  


                                    <!--//////BUTTON ADD DATANYA ///// -->
                                    <div class="row" style="text-align: center;">
                                        <button type="submit" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- untuk penutupan -->
                    <div id="tab-4" class="tab-pane">
                        <div class="panel-body">
                            <div class=" col-md-12 bapak-penutupan">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col-md-12 mailbox-pagination m-b-md animated-panel zoomIn" style="animation-delay: 0.3s;">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm tutup-kiri"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-default btn-sm indexnya" type="button">0</button>
                                            <button class="btn btn-default btn-sm tutup-kanan"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- form rkf -->
                                <form method="post" action="<?= base_url() ?>rbb/rko/jarkan/insert-penutupan" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                    <!-- baris input visi dan misi -->
                                    <!-- <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" style="text-align:left;">Nama Kantor</label>
                                                <div class="col-sm-10">
                                                <input class="form-control" type="text" name="nama_kantor">
                                                </div>
                                            </div>
                                    </div> -->
                                    <!-- input Misi -->
                                    <div class="row">
                                        <input type="text" class="form-control input-id" style="opacity:0" name="tutup_id" value="">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Jenis Kantor</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-jenis_kantor" name="jenis_kantor" style=" max-width: 100%;">
                                                    <option value="0">--</option>
                                                    <?php foreach ($jenis_kantor as $dt) { ?>
                                                        <option value="<?= $dt->jenis_kantor_id ?>"><?= $dt->jenis_kantor_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left;">Pengusul</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-pengusul" name="pengusul" style=" max-width: 100%;">
                                                    <option>--</option>
                                                    <?php foreach ($pengusul as $dt) { ?>
                                                        <option value="<?= $dt->pengusul_id ?>"><?= $dt->pengusul_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Status Proker</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-status" name="status" id="">
                                                    <option>--</option>
                                                    <?php foreach ($status_proker as $dt) { ?>
                                                        <option value="<?= $dt->sts_proker_id ?>"><?= $dt->sts_proker_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" style="text-align:left">Tahun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select-tahun" name="tahun">
                                                    <option>--</option>
                                                    <?php for ($i = 0; $i < 4; $i++) { ?>
                                                        <option><?= date("Y") + $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr />

                                    <div class="row">
                                        <h5>Lokasi</h5>
                                    </div>

                                    <div class="row  lokasi-bapak">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Provinsi</label>
                                                <select class="form-control propinsi select-propinsi" name="propinsi" style=" max-width: 98%;">
                                                    <option value="0">Pilih propinsi</option>
                                                    <?php foreach ($propinsi as $dt) { ?>
                                                        <option value="<?= $dt->propinsi_id ?>"><?= $dt->propinsi_nama ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kabupaten/Kota</label>
                                                <select class="form-control kota select-kota" name="kota" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kecamatan</label>
                                                <select class="form-control kecamatan select-kecamatan" name="kecamatan" style=" max-width: 98%;">
                                                    <option value="0">--</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                    <hr />


                                    <!-- -------------------------- jadwal ------------------------ -->
                                    <div class="row">
                                        <h5>Jadwal</h5>
                                    </div>

                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Aktivitas</th>
                                                    <th>Bulan Mulai</th>
                                                    <th>Bulan Selesai</th>
                                                    <th>PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- kajian kelayakan bisnis -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Kajian Kelayakan Bisnis</label></td>
                                                    <td>
                                                        <Select class="form-control select-kkb_start" name="kajian_kelayakan_bisnis_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-kkb_finish" name="kajian_kelayakan_bisnis_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="kajian_kelayakan_bisnis_divisi" value="<?= $pic_kkb->id; ?>" style="display:none"> <label class=control-label><?= $pic_kkb->nama; ?></label></td>
                                                </tr>

                                                <!-- perizinan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Perizinan</label></td>
                                                    <td>
                                                        <Select class="form-control select-pizin_start" name="perijinan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-pizin_finish" name="perijinan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="perijinan_divisi" value="<?= $pic_pizin->id; ?>" style="display:none"> <label class=control-label><?= $pic_pizin->nama; ?></label></td>
                                                </tr>
                                                <!-- Penutupan -->
                                                <tr>
                                                    <td><label class="control-label" style="text-align:left;">Penutupan</label></td>
                                                    <td>
                                                        <Select class="form-control select-ptutup_start" name="penutupan_start" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td>
                                                        <Select class="form-control select-ptutup_finish" name="penutupan_finish" style="max-width:90%">
                                                            <option value="0">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) . $number ?>"><?php echo parse_bulan_short($i);
                                                                                                                            echo "-" . (date("y") + 1);  ?></option>
                                                            <?php } ?>
                                                        </Select>
                                                    </td>
                                                    <td><input type="text" name="penutupan_divisi" value="<?= $pic_ptutup->id; ?>" style="display:none"> <label class=control-label><?= $pic_ptutup->nama; ?></label></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>





                                    <!--//////BUTTON ADD DATANYA ///// -->
                                    <div class="row" style="text-align: center;">
                                        <button type="submit" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
















<script>
    $(document).ready(function() {
        $("select.propinsi").change(function() {
            var tagnya = $(this);
            var id = $(this).val();
            $.get("<?= IP_API ?>/jaringan/kota/" + id, function(data) {
                console.log(data);
                tagnya.parents(".lokasi-bapak").find("select.kota").empty().append("<option>Pilih kota</option>").end();
                tagnya.parents(".lokasi-bapak").find("select.kecamatan").empty().append("<option>--</option>");
                $.each(data, function(key, value) {
                    tagnya.parents(".lokasi-bapak").find("select.kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>");
                });
            });
        });

        $("select.kota").change(function() {
            var tagnya = $(this);
            var id = $(this).val();
            $.get("<?= IP_API ?>/jaringan/kecamatan/" + id, function(data) {
                console.log(data);
                tagnya.parents(".lokasi-bapak").find("select.kecamatan").empty().append("<option>Pilih Kecamatan</option>");
                $.each(data, function(key, value) {
                    tagnya.parents(".lokasi-bapak").find("select.kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                });
            });
        });

    });
</script>

<script>
    var dataBuka = '<?php echo json_encode($dataBuka); ?>';
    dataBuka = JSON.parse(dataBuka);
    var panjangBuka = '<?php echo count($dataBuka); ?>';
    var dataUbah = '<?php echo json_encode($dataUbah); ?>';
    dataUbah = JSON.parse(dataUbah);
    var panjangUbah = '<?php echo count($dataUbah); ?>';
    var dataRelokasi = '<?php echo json_encode($dataRelokasi); ?>';
    dataRelokasi = JSON.parse(dataRelokasi);
    var panjangRelokasi = '<?php echo count($dataRelokasi); ?>';
    var dataTutup = '<?php echo json_encode($dataTutup); ?>';
    dataTutup = JSON.parse(dataTutup);
    var panjangTutup = '<?php echo count($dataTutup); ?>';
    // console.log(dataBuka);
    // console.log(dataUbah);
    // console.log(dataRelokasi);
    // console.log(dataTutup);
    // console.log(panjangBuka);
    // console.log(panjangUbah);
    // console.log(panjangRelokasi);
    // console.log(panjangTutup);

    $(document).ready(function() {
        // UNTUK DATA BUKA
        $(".buka-kiri").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmin = parseInt(indexnya) - 1;
            if (indexmin == -1) {
                return;
            } else {
                indexnya--;
                // untuk reset inputan saat indexnya 0
                if (indexnya == 0) {
                    tagnya.parents('.bapak-buka').find('.input-id').val('');

                    tagnya.parents('.bapak-buka').find('.select-jenis_kantor').val('0');
                    tagnya.parents('.bapak-buka').find('.select-pengusul').val("0");
                    tagnya.parents('.bapak-buka').find('.select-status').val("0");
                    tagnya.parents('.bapak-buka').find('.select-tahun').val("0");
                    tagnya.parents('.bapak-buka').find('.select-propinsi').val("0");
                    tagnya.parents('.bapak-buka').find('.select-kota').val("0");
                    tagnya.parents('.bapak-buka').find('.select-kecamatan').val("0");

                    tagnya.parents('.bapak-buka').find('.select-tanah').val("0");
                    tagnya.parents('.bapak-buka').find('.select-bangunan').val("0");
                    tagnya.parents('.bapak-buka').find('.select-pengadaan_tanah').val("0");
                    tagnya.parents('.bapak-buka').find('.select-pengadaan_bangunan').val("0");
                    tagnya.parents('.bapak-buka').find('.input-anggaran_pengadaan_tanah').val("");
                    tagnya.parents('.bapak-buka').find('.input-anggaran_pengadaan_bangunan').val("");

                    tagnya.parents('.bapak-buka').find('.select-kkb_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-kkb_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-kktb_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-kktb_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-ptb_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-ptb_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-petb_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-petb_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-pip_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-pip_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-pit_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-pit_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-psdm_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-psdm_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-pizin_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-pizin_finish').val("0");

                    tagnya.parents('.bapak-buka').find('.select-pbuka_start').val("0");
                    tagnya.parents('.bapak-buka').find('.select-pbuka_finish').val("0");
                } else {
                    var datanya = dataBuka[indexnya - 1];
                    console.log(datanya);
                    tagnya.parents('.bapak-buka').find('.input-id').val(datanya.pembukaan_id);
                    tagnya.parents('.bapak-buka').find('.select-jenis_kantor').val(datanya.pembukaan_jenis_kantor);
                    tagnya.parents('.bapak-buka').find('.select-pengusul').val(datanya.pembukaan_pengusul);
                    tagnya.parents('.bapak-buka').find('.select-status').val(datanya.pembukaan_status);
                    tagnya.parents('.bapak-buka').find('.select-tahun').val(datanya.pembukaan_tahun);
                    tagnya.parents('.bapak-buka').find('.select-propinsi').val(datanya.pembukaan_propinsi);
                    $.get("<?= IP_API ?>/jaringan/kota/" + datanya.pembukaan_propinsi, function(data) {
                        tagnya.parents(".bapak-buka").find("select.kota").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-buka").find("select.kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                        });
                        tagnya.parents('.bapak-buka').find('.select-kota').val(datanya.pembukaan_kota);
                    });
                    $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.pembukaan_kota, function(data) {
                        tagnya.parents(".bapak-buka").find(".select-kecamatan").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-buka").find(".select-kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                        });
                        tagnya.parents('.bapak-buka').find('.select-kecamatan').val(datanya.pembukaan_kecamatan);
                    });
                    tagnya.parents('.bapak-buka').find('.select-tanah').val(datanya.pembukaan_tanah);
                    tagnya.parents('.bapak-buka').find('.select-bangunan').val(datanya.pembukaan_bangunan);
                    tagnya.parents('.bapak-buka').find('.select-pengadaan_tanah').val(datanya.pembukaan_rencana_pengadaan_tanah);
                    tagnya.parents('.bapak-buka').find('.select-pengadaan_bangunan').val(datanya.pembukaan_rencana_pengadaan_bangunan);
                    tagnya.parents('.bapak-buka').find('.input-anggaran_pengadaan_tanah').val(datanya.pembukaan_anggaran_pengadaan_tanah);
                    tagnya.parents('.bapak-buka').find('.input-anggaran_pengadaan_bangunan').val(datanya.pembukaan_anggaran_pengadaan_bangunan);

                    tagnya.parents('.bapak-buka').find('.select-kkb_start').val(datanya.pembukaan_kajian_kelayakan_bisnis_start);
                    tagnya.parents('.bapak-buka').find('.select-kkb_finish').val(datanya.pembukaan_kajian_kelayakan_bisnis_finish);

                    tagnya.parents('.bapak-buka').find('.select-kktb_start').val(datanya.pembukaan_kajian_kelayakan_tanah_bangunan_start);
                    tagnya.parents('.bapak-buka').find('.select-kktb_finish').val(datanya.pembukaan_kajian_kelayakan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-buka').find('.select-ptb_start').val(datanya.pembukaan_pengadaan_tanah_bangunan_start);
                    tagnya.parents('.bapak-buka').find('.select-ptb_finish').val(datanya.pembukaan_pengadaan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-buka').find('.select-petb_start').val(datanya.pembukaan_penyiapan_tanah_bangunan_start);
                    tagnya.parents('.bapak-buka').find('.select-petb_finish').val(datanya.pembukaan_penyiapan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-buka').find('.select-pip_start').val(datanya.pembukaan_penyiapan_infrastruktur_pendukung_start);
                    tagnya.parents('.bapak-buka').find('.select-pip_finish').val(datanya.pembukaan_penyiapan_infrastruktur_pendukung_finish);

                    tagnya.parents('.bapak-buka').find('.select-pit_start').val(datanya.pembukaan_penyiapan_infrastruktur_it_start);
                    tagnya.parents('.bapak-buka').find('.select-pit_finish').val(datanya.pembukaan_penyiapan_infrastruktur_it_finish);

                    tagnya.parents('.bapak-buka').find('.select-psdm_start').val(datanya.pembukaan_pengadaan_sdm_start);
                    tagnya.parents('.bapak-buka').find('.select-psdm_finish').val(datanya.pembukaan_pengadaan_sdm_finish);

                    tagnya.parents('.bapak-buka').find('.select-pizin_start').val(datanya.pembukaan_perijinan_start);
                    tagnya.parents('.bapak-buka').find('.select-pizin_finish').val(datanya.pembukaan_perijinan_finish);

                    tagnya.parents('.bapak-buka').find('.select-pbuka_start').val(datanya.pembukaan_pembukaan_start);
                    tagnya.parents('.bapak-buka').find('.select-pbuka_finish').val(datanya.pembukaan_pembukaan_finish);
                }
                tagIndex.text(indexnya);
            }

        });

        $(".buka-kanan").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmax = parseInt(indexnya) + 1;
            if (indexnya == panjangBuka) {
                return;
            } else {
                indexnya++;
                var datanya = dataBuka[indexnya - 1];
                console.log(datanya);
                tagnya.parents('.bapak-buka').find('.input-id').val(datanya.pembukaan_id);
                tagnya.parents('.bapak-buka').find('.select-jenis_kantor').val(datanya.pembukaan_jenis_kantor);
                tagnya.parents('.bapak-buka').find('.select-pengusul').val(datanya.pembukaan_pengusul);
                tagnya.parents('.bapak-buka').find('.select-status').val(datanya.pembukaan_status);
                tagnya.parents('.bapak-buka').find('.select-tahun').val(datanya.pembukaan_tahun);
                tagnya.parents('.bapak-buka').find('.select-propinsi').val(datanya.pembukaan_propinsi);
                $.get("<?= IP_API ?>/jaringan/kota/" + datanya.pembukaan_propinsi, function(data) {
                    tagnya.parents(".bapak-buka").find("select.kota").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-buka").find("select.kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                    });
                    tagnya.parents('.bapak-buka').find('.select-kota').val(datanya.pembukaan_kota);
                });
                $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.pembukaan_kota, function(data) {
                    tagnya.parents(".bapak-buka").find(".select-kecamatan").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-buka").find(".select-kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                    });
                    tagnya.parents('.bapak-buka').find('.select-kecamatan').val(datanya.pembukaan_kecamatan);
                });
                tagnya.parents('.bapak-buka').find('.select-tanah').val(datanya.pembukaan_tanah);
                tagnya.parents('.bapak-buka').find('.select-bangunan').val(datanya.pembukaan_bangunan);
                tagnya.parents('.bapak-buka').find('.select-pengadaan_tanah').val(datanya.pembukaan_rencana_pengadaan_tanah);
                tagnya.parents('.bapak-buka').find('.select-pengadaan_bangunan').val(datanya.pembukaan_rencana_pengadaan_bangunan);
                tagnya.parents('.bapak-buka').find('.input-anggaran_pengadaan_tanah').val(datanya.pembukaan_anggaran_pengadaan_tanah);
                tagnya.parents('.bapak-buka').find('.input-anggaran_pengadaan_bangunan').val(datanya.pembukaan_anggaran_pengadaan_bangunan);

                tagnya.parents('.bapak-buka').find('.select-kkb_start').val(datanya.pembukaan_kajian_kelayakan_bisnis_start);
                tagnya.parents('.bapak-buka').find('.select-kkb_finish').val(datanya.pembukaan_kajian_kelayakan_bisnis_finish);

                tagnya.parents('.bapak-buka').find('.select-kktb_start').val(datanya.pembukaan_kajian_kelayakan_tanah_bangunan_start);
                tagnya.parents('.bapak-buka').find('.select-kktb_finish').val(datanya.pembukaan_kajian_kelayakan_tanah_bangunan_finish);

                tagnya.parents('.bapak-buka').find('.select-ptb_start').val(datanya.pembukaan_pengadaan_tanah_bangunan_start);
                tagnya.parents('.bapak-buka').find('.select-ptb_finish').val(datanya.pembukaan_pengadaan_tanah_bangunan_finish);

                tagnya.parents('.bapak-buka').find('.select-petb_start').val(datanya.pembukaan_penyiapan_tanah_bangunan_start);
                tagnya.parents('.bapak-buka').find('.select-petb_finish').val(datanya.pembukaan_penyiapan_tanah_bangunan_finish);

                tagnya.parents('.bapak-buka').find('.select-pip_start').val(datanya.pembukaan_penyiapan_infrastruktur_pendukung_start);
                tagnya.parents('.bapak-buka').find('.select-pip_finish').val(datanya.pembukaan_penyiapan_infrastruktur_pendukung_finish);

                tagnya.parents('.bapak-buka').find('.select-pit_start').val(datanya.pembukaan_penyiapan_infrastruktur_it_start);
                tagnya.parents('.bapak-buka').find('.select-pit_finish').val(datanya.pembukaan_penyiapan_infrastruktur_it_finish);

                tagnya.parents('.bapak-buka').find('.select-psdm_start').val(datanya.pembukaan_pengadaan_sdm_start);
                tagnya.parents('.bapak-buka').find('.select-psdm_finish').val(datanya.pembukaan_pengadaan_sdm_finish);

                tagnya.parents('.bapak-buka').find('.select-pizin_start').val(datanya.pembukaan_perijinan_start);
                tagnya.parents('.bapak-buka').find('.select-pizin_finish').val(datanya.pembukaan_perijinan_finish);

                tagnya.parents('.bapak-buka').find('.select-pbuka_start').val(datanya.pembukaan_pembukaan_start);
                tagnya.parents('.bapak-buka').find('.select-pbuka_finish').val(datanya.pembukaan_pembukaan_finish);



                tagIndex.text(indexnya);
            }

        });

        // UNTUK DATA UBAH
        $(".ubah-kiri").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmin = parseInt(indexnya) - 1;
            if (indexmin == -1) {
                return;
            } else {
                indexnya--;
                // untuk reset inputan saat indexnya 0
                if (indexnya == 0) {
                    tagnya.parents('.bapak-ubah').find('.input-id').val("");
                    tagnya.parents('.bapak-ubah').find('.input-nama').val("");
                    tagnya.parents('.bapak-ubah').find('.select-jenis_kantor_semula').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-jenis_kantor_menjadi').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-status').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-tahun').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-propinsi').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-kota').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-kecamatan').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-tanah').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-bangunan').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-rencana_pengadaan_tanah').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-rencana_pengadaan_bangunan').val("0");
                    tagnya.parents('.bapak-ubah').find('.input-anggaran_pengadaan_tanah').val("");
                    tagnya.parents('.bapak-ubah').find('.input-anggaran_pengadaan_bangunan').val("");

                    tagnya.parents('.bapak-ubah').find('.select-kkb_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-kkb_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-kktb_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-kktb_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-ptb_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-ptb_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-petb_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-petb_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-pip_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-pip_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-pit_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-pit_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-psdm_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-psdm_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-pizin_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-pizin_finish').val("0");

                    tagnya.parents('.bapak-ubah').find('.select-pubah_start').val("0");
                    tagnya.parents('.bapak-ubah').find('.select-pubah_finish').val("0");


                } else {
                    var datanya = dataUbah[indexnya - 1];
                    console.log(datanya);
                    tagnya.parents('.bapak-ubah').find('.input-id').val(datanya.perubahan_id);
                    tagnya.parents('.bapak-ubah').find('.input-nama').val(datanya.perubahan_nama_semula);
                    tagnya.parents('.bapak-ubah').find('.select-jenis_kantor_semula').val(datanya.perubahan_jenis_kantor_semula);
                    tagnya.parents('.bapak-ubah').find('.select-jenis_kantor_menjadi').val(datanya.perubahan_jenis_kantor_menjadi);
                    tagnya.parents('.bapak-ubah').find('.select-status').val(datanya.perubahan_status);
                    tagnya.parents('.bapak-ubah').find('.select-tahun').val(datanya.perubahan_tahun);

                    tagnya.parents('.bapak-ubah').find('.select-propinsi').val(datanya.perubahan_propinsi);
                    $.get("<?= IP_API ?>/jaringan/kota/" + datanya.perubahan_propinsi, function(data) {
                        tagnya.parents(".bapak-ubah").find("select.kota").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-ubah").find("select.kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                        });
                        tagnya.parents('.bapak-ubah').find('.select-kota').val(datanya.perubahan_kota);
                    });
                    $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.perubahan_kota, function(data) {
                        tagnya.parents(".bapak-ubah").find(".select-kecamatan").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-ubah").find(".select-kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                        });
                        tagnya.parents('.bapak-ubah').find('.select-kecamatan').val(datanya.perubahan_kecamatan);
                    });

                    tagnya.parents('.bapak-ubah').find('.select-tanah').val(datanya.perubahan_tanah);
                    tagnya.parents('.bapak-ubah').find('.select-bangunan').val(datanya.perubahan_bangunan);
                    tagnya.parents('.bapak-ubah').find('.select-rencana_pengadaan_tanah').val(datanya.perubahan_rencana_pengadaan_tanah);
                    tagnya.parents('.bapak-ubah').find('.select-rencana_pengadaan_bangunan').val(datanya.perubahan_rencana_pengadaan_bangunan);
                    tagnya.parents('.bapak-ubah').find('.input-anggaran_pengadaan_tanah').val(datanya.perubahan_anggaran_pengadaan_tanah);
                    tagnya.parents('.bapak-ubah').find('.input-anggaran_pengadaan_bangunan').val(datanya.perubahan_anggaran_pengadaan_bangunan);

                    tagnya.parents('.bapak-ubah').find('.select-kkb_start').val(datanya.perubahan_kajian_kelayakan_bisnis_start);
                    tagnya.parents('.bapak-ubah').find('.select-kkb_finish').val(datanya.perubahan_kajian_kelayakan_bisnis_finish);

                    tagnya.parents('.bapak-ubah').find('.select-kktb_start').val(datanya.perubahan_kajian_kelayakan_tanah_bangunan_start);
                    tagnya.parents('.bapak-ubah').find('.select-kktb_finish').val(datanya.perubahan_kajian_kelayakan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-ubah').find('.select-ptb_start').val(datanya.perubahan_pengadaan_tanah_bangunan_start);
                    tagnya.parents('.bapak-ubah').find('.select-ptb_finish').val(datanya.perubahan_pengadaan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-ubah').find('.select-petb_start').val(datanya.perubahan_penyiapan_tanah_bangunan_start);
                    tagnya.parents('.bapak-ubah').find('.select-petb_finish').val(datanya.perubahan_penyiapan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-ubah').find('.select-pip_start').val(datanya.perubahan_penyiapan_infrastruktur_pendukung_start);
                    tagnya.parents('.bapak-ubah').find('.select-pip_finish').val(datanya.perubahan_penyiapan_infrastruktur_pendukung_finish);

                    tagnya.parents('.bapak-ubah').find('.select-pit_start').val(datanya.perubahan_penyiapan_infrastruktur_it_start);
                    tagnya.parents('.bapak-ubah').find('.select-pit_finish').val(datanya.perubahan_penyiapan_infrastruktur_it_finish);

                    tagnya.parents('.bapak-ubah').find('.select-psdm_start').val(datanya.perubahan_pengadaan_sdm_start);
                    tagnya.parents('.bapak-ubah').find('.select-psdm_finish').val(datanya.perubahan_pengadaan_sdm_finish);

                    tagnya.parents('.bapak-ubah').find('.select-pizin_start').val(datanya.perubahan_perijinan_start);
                    tagnya.parents('.bapak-ubah').find('.select-pizin_finish').val(datanya.perubahan_perijinan_finish);

                    tagnya.parents('.bapak-ubah').find('.select-pubah_start').val(datanya.perubahan_perubahan_start);
                    tagnya.parents('.bapak-ubah').find('.select-pubah_finish').val(datanya.perubahan_perubahan_finish);

                }
                tagIndex.text(indexnya);
            }

        });

        $(".ubah-kanan").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmax = parseInt(indexnya) + 1;
            if (indexnya == panjangUbah) {
                return;
            } else {
                indexnya++;
                var datanya = dataUbah[indexnya - 1];
                console.log(datanya);
                tagnya.parents('.bapak-ubah').find('.input-id').val(datanya.perubahan_id);
                tagnya.parents('.bapak-ubah').find('.input-nama').val(datanya.perubahan_nama_semula);
                tagnya.parents('.bapak-ubah').find('.select-jenis_kantor_semula').val(datanya.perubahan_jenis_kantor_semula);
                tagnya.parents('.bapak-ubah').find('.select-jenis_kantor_menjadi').val(datanya.perubahan_jenis_kantor_menjadi);
                tagnya.parents('.bapak-ubah').find('.select-status').val(datanya.perubahan_status);
                tagnya.parents('.bapak-ubah').find('.select-tahun').val(datanya.perubahan_tahun);

                tagnya.parents('.bapak-ubah').find('.select-propinsi').val(datanya.perubahan_propinsi);
                $.get("<?= IP_API ?>/jaringan/kota/" + datanya.perubahan_propinsi, function(data) {
                    tagnya.parents(".bapak-ubah").find("select.kota").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-ubah").find("select.kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                    });
                    tagnya.parents('.bapak-ubah').find('.select-kota').val(datanya.perubahan_kota);
                });
                $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.perubahan_kota, function(data) {
                    tagnya.parents(".bapak-ubah").find(".select-kecamatan").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-ubah").find(".select-kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                    });
                    tagnya.parents('.bapak-ubah').find('.select-kecamatan').val(datanya.perubahan_kecamatan);
                });

                tagnya.parents('.bapak-ubah').find('.select-tanah').val(datanya.perubahan_tanah);
                tagnya.parents('.bapak-ubah').find('.select-bangunan').val(datanya.perubahan_bangunan);
                tagnya.parents('.bapak-ubah').find('.select-rencana_pengadaan_tanah').val(datanya.perubahan_rencana_pengadaan_tanah);
                tagnya.parents('.bapak-ubah').find('.select-rencana_pengadaan_bangunan').val(datanya.perubahan_rencana_pengadaan_bangunan);
                tagnya.parents('.bapak-ubah').find('.input-anggaran_pengadaan_tanah').val(datanya.perubahan_anggaran_pengadaan_tanah);
                tagnya.parents('.bapak-ubah').find('.input-anggaran_pengadaan_bangunan').val(datanya.perubahan_anggaran_pengadaan_bangunan);

                tagnya.parents('.bapak-ubah').find('.select-kkb_start').val(datanya.perubahan_kajian_kelayakan_bisnis_start);
                tagnya.parents('.bapak-ubah').find('.select-kkb_finish').val(datanya.perubahan_kajian_kelayakan_bisnis_finish);

                tagnya.parents('.bapak-ubah').find('.select-kktb_start').val(datanya.perubahan_kajian_kelayakan_tanah_bangunan_start);
                tagnya.parents('.bapak-ubah').find('.select-kktb_finish').val(datanya.perubahan_kajian_kelayakan_tanah_bangunan_finish);

                tagnya.parents('.bapak-ubah').find('.select-ptb_start').val(datanya.perubahan_pengadaan_tanah_bangunan_start);
                tagnya.parents('.bapak-ubah').find('.select-ptb_finish').val(datanya.perubahan_pengadaan_tanah_bangunan_finish);

                tagnya.parents('.bapak-ubah').find('.select-petb_start').val(datanya.perubahan_penyiapan_tanah_bangunan_start);
                tagnya.parents('.bapak-ubah').find('.select-petb_finish').val(datanya.perubahan_penyiapan_tanah_bangunan_finish);

                tagnya.parents('.bapak-ubah').find('.select-pip_start').val(datanya.perubahan_penyiapan_infrastruktur_pendukung_start);
                tagnya.parents('.bapak-ubah').find('.select-pip_finish').val(datanya.perubahan_penyiapan_infrastruktur_pendukung_finish);

                tagnya.parents('.bapak-ubah').find('.select-pit_start').val(datanya.perubahan_penyiapan_infrastruktur_it_start);
                tagnya.parents('.bapak-ubah').find('.select-pit_finish').val(datanya.perubahan_penyiapan_infrastruktur_it_finish);

                tagnya.parents('.bapak-ubah').find('.select-psdm_start').val(datanya.perubahan_pengadaan_sdm_start);
                tagnya.parents('.bapak-ubah').find('.select-psdm_finish').val(datanya.perubahan_pengadaan_sdm_finish);

                tagnya.parents('.bapak-ubah').find('.select-pizin_start').val(datanya.perubahan_perijinan_start);
                tagnya.parents('.bapak-ubah').find('.select-pizin_finish').val(datanya.perubahan_perijinan_finish);

                tagnya.parents('.bapak-ubah').find('.select-pubah_start').val(datanya.perubahan_perubahan_start);
                tagnya.parents('.bapak-ubah').find('.select-pubah_finish').val(datanya.perubahan_perubahan_finish);

                tagIndex.text(indexnya);
            }

        });

        // UNTUK DATA RELOKASI
        $(".relokasi-kiri").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmin = parseInt(indexnya) - 1;
            if (indexmin == -1) {
                return;
            } else {
                indexnya--;
                // untuk reset inputan saat indexnya 0
                if (indexnya == 0) {
                    tagnya.parents('.bapak-relokasi').find('.input-id').val("");
                    tagnya.parents('.bapak-relokasi').find('.select-jenis_kantor').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-pengusul').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-status').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-tahun').val("0");


                    // ########################################################################
                    tagnya.parents('.bapak-relokasi').find('.select-propinsi_semula').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-kota_semula').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-kecamatan_semula').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-propinsi_menjadi').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-kota_menjadi').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-kecamatan_menjadi').val("0");
                    // ########################################################################

                    tagnya.parents('.bapak-relokasi').find('.input-alamat_semula').val("");
                    tagnya.parents('.bapak-relokasi').find('.input-alamat_menjadi').val("");

                    tagnya.parents('.bapak-relokasi').find('.select-tanah').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-bangunan').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-rencana_pengadaan_tanah').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-rencana_pengadaan_bangunan').val("0");
                    tagnya.parents('.bapak-relokasi').find('.input-anggaran_pengadaan_tanah').val("");
                    tagnya.parents('.bapak-relokasi').find('.input-anggaran_pengadaan_bangunan').val("");

                    tagnya.parents('.bapak-relokasi').find('.select-kkb_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-kkb_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-kktb_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-kktb_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-ptb_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-ptb_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-petb_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-petb_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-pip_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-pip_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-pit_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-pit_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-psdm_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-psdm_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-pizin_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-pizin_finish').val("0");

                    tagnya.parents('.bapak-relokasi').find('.select-relo_start').val("0");
                    tagnya.parents('.bapak-relokasi').find('.select-relo_finish').val("0");
                } else {
                    var datanya = dataRelokasi[indexnya - 1];
                    console.log(datanya);
                    tagnya.parents('.bapak-relokasi').find('.input-id').val(datanya.relokasi_id);
                    tagnya.parents('.bapak-relokasi').find('.select-jenis_kantor').val(datanya.relokasi_jenis_kantor);
                    tagnya.parents('.bapak-relokasi').find('.select-pengusul').val(datanya.relokasi_pengusul);
                    tagnya.parents('.bapak-relokasi').find('.select-status').val(datanya.relokasi_status);
                    tagnya.parents('.bapak-relokasi').find('.select-tahun').val(datanya.relokasi_tahun);


                    // ########################################################################
                    tagnya.parents('.bapak-relokasi').find('.select-propinsi_semula').val(datanya.relokasi_propinsi_semula);
                    $.get("<?= IP_API ?>/jaringan/kota/" + datanya.relokasi_propinsi_semula, function(data) {
                        tagnya.parents(".bapak-relokasi").find(".select-kota_semula").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-relokasi").find(".select-kota_semula").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                        });
                        tagnya.parents('.bapak-relokasi').find('.select-kota_semula').val(datanya.relokasi_kota_semula);
                    });
                    $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.relokasi_kota_semula, function(data) {
                        tagnya.parents(".bapak-relokasi").find(".select-kecamatan_semula").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-relokasi").find(".select-kecamatan_semula").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                        });
                        tagnya.parents('.bapak-relokasi').find('.select-kecamatan_semula').val(datanya.relokasi_kecamatan_semula);
                    });


                    tagnya.parents('.bapak-relokasi').find('.select-propinsi_menjadi').val(datanya.relokasi_propinsi_menjadi);
                    $.get("<?= IP_API ?>/jaringan/kota/" + datanya.relokasi_propinsi_menjadi, function(data) {
                        tagnya.parents(".bapak-relokasi").find(".select-kota_menjadi").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-relokasi").find(".select-kota_menjadi").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                        });
                        tagnya.parents('.bapak-relokasi').find('.select-kota_menjadi').val(datanya.relokasi_kota_menjadi);
                    });
                    $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.relokasi_kota_menjadi, function(data) {
                        tagnya.parents(".bapak-relokasi").find(".select-kecamatan_menjadi").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-relokasi").find(".select-kecamatan_menjadi").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                        });
                        tagnya.parents('.bapak-relokasi').find('.select-kecamatan_menjadi').val(datanya.relokasi_kecamatan_menjadi);
                    });
                    // ########################################################################

                    tagnya.parents('.bapak-relokasi').find('.input-alamat_semula').val(datanya.relokasi_alamat_semula);
                    tagnya.parents('.bapak-relokasi').find('.input-alamat_menjadi').val(datanya.relokasi_alamat_menjadi);

                    tagnya.parents('.bapak-relokasi').find('.select-tanah').val(datanya.relokasi_tanah);
                    tagnya.parents('.bapak-relokasi').find('.select-bangunan').val(datanya.relokasi_bangunan);
                    tagnya.parents('.bapak-relokasi').find('.select-rencana_pengadaan_tanah').val(datanya.relokasi_rencana_pengadaan_tanah);
                    tagnya.parents('.bapak-relokasi').find('.select-rencana_pengadaan_bangunan').val(datanya.relokasi_rencana_pengadaan_bangunan);
                    tagnya.parents('.bapak-relokasi').find('.input-anggaran_pengadaan_tanah').val(datanya.relokasi_anggaran_pengadaan_tanah);
                    tagnya.parents('.bapak-relokasi').find('.input-anggaran_pengadaan_bangunan').val(datanya.relokasi_anggaran_pengadaan_bangunan);

                    tagnya.parents('.bapak-relokasi').find('.select-kkb_start').val(datanya.relokasi_kajian_kelayakan_bisnis_start);
                    tagnya.parents('.bapak-relokasi').find('.select-kkb_finish').val(datanya.relokasi_kajian_kelayakan_bisnis_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-kktb_start').val(datanya.relokasi_kajian_kelayakan_tanah_bangunan_start);
                    tagnya.parents('.bapak-relokasi').find('.select-kktb_finish').val(datanya.relokasi_kajian_kelayakan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-ptb_start').val(datanya.relokasi_pengadaan_tanah_bangunan_start);
                    tagnya.parents('.bapak-relokasi').find('.select-ptb_finish').val(datanya.relokasi_pengadaan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-petb_start').val(datanya.relokasi_penyiapan_tanah_bangunan_start);
                    tagnya.parents('.bapak-relokasi').find('.select-petb_finish').val(datanya.relokasi_penyiapan_tanah_bangunan_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-pip_start').val(datanya.relokasi_penyiapan_infrastruktur_pendukung_start);
                    tagnya.parents('.bapak-relokasi').find('.select-pip_finish').val(datanya.relokasi_penyiapan_infrastruktur_pendukung_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-pit_start').val(datanya.relokasi_penyiapan_infrastruktur_it_start);
                    tagnya.parents('.bapak-relokasi').find('.select-pit_finish').val(datanya.relokasi_penyiapan_infrastruktur_it_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-psdm_start').val(datanya.relokasi_pengadaan_sdm_start);
                    tagnya.parents('.bapak-relokasi').find('.select-psdm_finish').val(datanya.relokasi_pengadaan_sdm_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-pizin_start').val(datanya.relokasi_perijinan_start);
                    tagnya.parents('.bapak-relokasi').find('.select-pizin_finish').val(datanya.relokasi_perijinan_finish);

                    tagnya.parents('.bapak-relokasi').find('.select-relo_start').val(datanya.relokasi_relokasi_start);
                    tagnya.parents('.bapak-relokasi').find('.select-relo_finish').val(datanya.relokasi_relokasi_finish);
                }
                tagIndex.text(indexnya);
            }

        });

        $(".relokasi-kanan").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmax = parseInt(indexnya) + 1;
            if (indexnya == panjangRelokasi) {
                return;
            } else {
                indexnya++;
                var datanya = dataRelokasi[indexnya - 1];
                console.log(datanya);
                tagnya.parents('.bapak-relokasi').find('.input-id').val(datanya.relokasi_id);
                tagnya.parents('.bapak-relokasi').find('.select-jenis_kantor').val(datanya.relokasi_jenis_kantor);
                tagnya.parents('.bapak-relokasi').find('.select-pengusul').val(datanya.relokasi_pengusul);
                tagnya.parents('.bapak-relokasi').find('.select-status').val(datanya.relokasi_status);
                tagnya.parents('.bapak-relokasi').find('.select-tahun').val(datanya.relokasi_tahun);


                // ########################################################################
                tagnya.parents('.bapak-relokasi').find('.select-propinsi_semula').val(datanya.relokasi_propinsi_semula);
                $.get("<?= IP_API ?>/jaringan/kota/" + datanya.relokasi_propinsi_semula, function(data) {
                    tagnya.parents(".bapak-relokasi").find(".select-kota_semula").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-relokasi").find(".select-kota_semula").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                    });
                    tagnya.parents('.bapak-relokasi').find('.select-kota_semula').val(datanya.relokasi_kota_semula);
                });
                $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.relokasi_kota_semula, function(data) {
                    tagnya.parents(".bapak-relokasi").find(".select-kecamatan_semula").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-relokasi").find(".select-kecamatan_semula").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                    });
                    tagnya.parents('.bapak-relokasi').find('.select-kecamatan_semula').val(datanya.relokasi_kecamatan_semula);
                });


                tagnya.parents('.bapak-relokasi').find('.select-propinsi_menjadi').val(datanya.relokasi_propinsi_menjadi);
                $.get("<?= IP_API ?>/jaringan/kota/" + datanya.relokasi_propinsi_menjadi, function(data) {
                    tagnya.parents(".bapak-relokasi").find(".select-kota_menjadi").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-relokasi").find(".select-kota_menjadi").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                    });
                    tagnya.parents('.bapak-relokasi').find('.select-kota_menjadi').val(datanya.relokasi_kota_menjadi);
                });
                $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.relokasi_kota_menjadi, function(data) {
                    tagnya.parents(".bapak-relokasi").find(".select-kecamatan_menjadi").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-relokasi").find(".select-kecamatan_menjadi").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                    });
                    tagnya.parents('.bapak-relokasi').find('.select-kecamatan_menjadi').val(datanya.relokasi_kecamatan_menjadi);
                });
                // ########################################################################

                tagnya.parents('.bapak-relokasi').find('.input-alamat_semula').val(datanya.relokasi_alamat_semula);
                tagnya.parents('.bapak-relokasi').find('.input-alamat_menjadi').val(datanya.relokasi_alamat_menjadi);

                tagnya.parents('.bapak-relokasi').find('.select-tanah').val(datanya.relokasi_tanah);
                tagnya.parents('.bapak-relokasi').find('.select-bangunan').val(datanya.relokasi_bangunan);
                tagnya.parents('.bapak-relokasi').find('.select-rencana_pengadaan_tanah').val(datanya.relokasi_rencana_pengadaan_tanah);
                tagnya.parents('.bapak-relokasi').find('.select-rencana_pengadaan_bangunan').val(datanya.relokasi_rencana_pengadaan_bangunan);
                tagnya.parents('.bapak-relokasi').find('.input-anggaran_pengadaan_tanah').val(datanya.relokasi_anggaran_pengadaan_tanah);
                tagnya.parents('.bapak-relokasi').find('.input-anggaran_pengadaan_bangunan').val(datanya.relokasi_anggaran_pengadaan_bangunan);

                tagnya.parents('.bapak-relokasi').find('.select-kkb_start').val(datanya.relokasi_kajian_kelayakan_bisnis_start);
                tagnya.parents('.bapak-relokasi').find('.select-kkb_finish').val(datanya.relokasi_kajian_kelayakan_bisnis_finish);

                tagnya.parents('.bapak-relokasi').find('.select-kktb_start').val(datanya.relokasi_kajian_kelayakan_tanah_bangunan_start);
                tagnya.parents('.bapak-relokasi').find('.select-kktb_finish').val(datanya.relokasi_kajian_kelayakan_tanah_bangunan_finish);

                tagnya.parents('.bapak-relokasi').find('.select-ptb_start').val(datanya.relokasi_pengadaan_tanah_bangunan_start);
                tagnya.parents('.bapak-relokasi').find('.select-ptb_finish').val(datanya.relokasi_pengadaan_tanah_bangunan_finish);

                tagnya.parents('.bapak-relokasi').find('.select-petb_start').val(datanya.relokasi_penyiapan_tanah_bangunan_start);
                tagnya.parents('.bapak-relokasi').find('.select-petb_finish').val(datanya.relokasi_penyiapan_tanah_bangunan_finish);

                tagnya.parents('.bapak-relokasi').find('.select-pip_start').val(datanya.relokasi_penyiapan_infrastruktur_pendukung_start);
                tagnya.parents('.bapak-relokasi').find('.select-pip_finish').val(datanya.relokasi_penyiapan_infrastruktur_pendukung_finish);

                tagnya.parents('.bapak-relokasi').find('.select-pit_start').val(datanya.relokasi_penyiapan_infrastruktur_it_start);
                tagnya.parents('.bapak-relokasi').find('.select-pit_finish').val(datanya.relokasi_penyiapan_infrastruktur_it_finish);

                tagnya.parents('.bapak-relokasi').find('.select-psdm_start').val(datanya.relokasi_pengadaan_sdm_start);
                tagnya.parents('.bapak-relokasi').find('.select-psdm_finish').val(datanya.relokasi_pengadaan_sdm_finish);

                tagnya.parents('.bapak-relokasi').find('.select-pizin_start').val(datanya.relokasi_perijinan_start);
                tagnya.parents('.bapak-relokasi').find('.select-pizin_finish').val(datanya.relokasi_perijinan_finish);

                tagnya.parents('.bapak-relokasi').find('.select-relo_start').val(datanya.relokasi_relokasi_start);
                tagnya.parents('.bapak-relokasi').find('.select-relo_finish').val(datanya.relokasi_relokasi_finish);
            }
            tagIndex.text(indexnya);

        });
        // UNTUK DATA TUTUP
        $(".tutup-kiri").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmin = parseInt(indexnya) - 1;
            if (indexmin == -1) {
                return;
            } else {
                indexnya--;
                // untuk reset inputan saat indexnya 0
                if (indexnya == 0) {
                    tagnya.parents('.bapak-penutupan').find('.input-id').val("");
                    tagnya.parents('.bapak-penutupan').find('.select-jenis_kantor').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-pengusul').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-status').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-tahun').val("0");


                    // ########################################################################
                    tagnya.parents('.bapak-penutupan').find('.select-propinsi').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-kota').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-kecamatan').val("0");

                    // ########################################################################

                    tagnya.parents('.bapak-penutupan').find('.select-kkb_start').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-kkb_finish').val("0");

                    tagnya.parents('.bapak-penutupan').find('.select-pizin_start').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-pizin_finish').val("0");

                    tagnya.parents('.bapak-penutupan').find('.select-ptutup_start').val("0");
                    tagnya.parents('.bapak-penutupan').find('.select-ptutup_finish').val("0");
                } else {
                    var datanya = dataTutup[indexnya - 1];
                    console.log(datanya);
                    tagnya.parents('.bapak-penutupan').find('.input-id').val(datanya.penutupan_id);
                    tagnya.parents('.bapak-penutupan').find('.select-jenis_kantor').val(datanya.penutupan_jenis_kantor);
                    tagnya.parents('.bapak-penutupan').find('.select-pengusul').val(datanya.penutupan_pengusul);
                    tagnya.parents('.bapak-penutupan').find('.select-status').val(datanya.penutupan_status);
                    tagnya.parents('.bapak-penutupan').find('.select-tahun').val(datanya.penutupan_tahun);


                    // ########################################################################
                    tagnya.parents('.bapak-penutupan').find('.select-propinsi').val(datanya.penutupan_propinsi);
                    $.get("<?= IP_API ?>/jaringan/kota/" + datanya.penutupan_propinsi, function(data) {
                        tagnya.parents(".bapak-penutupan").find(".select-kota").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-penutupan").find(".select-kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                        });
                        tagnya.parents('.bapak-penutupan').find('.select-kota').val(datanya.penutupan_kota);
                    });
                    $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.penutupan_kota, function(data) {
                        tagnya.parents(".bapak-penutupan").find(".select-kecamatan").empty();
                        $.each(data, function(key, value) {
                            tagnya.parents(".bapak-penutupan").find(".select-kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                        });
                        tagnya.parents('.bapak-penutupan').find('.select-kecamatan').val(datanya.penutupan_kecamatan);
                    });

                    // ########################################################################

                    tagnya.parents('.bapak-penutupan').find('.select-kkb_start').val(datanya.penutupan_kajian_kelayakan_bisnis_start);
                    tagnya.parents('.bapak-penutupan').find('.select-kkb_finish').val(datanya.penutupan_kajian_kelayakan_bisnis_finish);

                    tagnya.parents('.bapak-penutupan').find('.select-pizin_start').val(datanya.penutupan_perijinan_start);
                    tagnya.parents('.bapak-penutupan').find('.select-pizin_finish').val(datanya.penutupan_perijinan_finish);

                    tagnya.parents('.bapak-penutupan').find('.select-ptutup_start').val(datanya.penutupan_penutupan_start);
                    tagnya.parents('.bapak-penutupan').find('.select-ptutup_finish').val(datanya.penutupan_penutupan_finish);

                }
                tagIndex.text(indexnya);
            }

        });

        $(".tutup-kanan").click(function(e) {
            var tagnya = $(this);
            var tagParent = tagnya.parent('.btn-group');
            var tagIndex = tagParent.children(".indexnya");
            var indexnya = tagIndex.text();
            var indexmax = parseInt(indexnya) + 1;
            if (indexnya == panjangTutup) {
                return;
            } else {
                indexnya++;
                var datanya = dataTutup[indexnya - 1];
                console.log(datanya);
                tagnya.parents('.bapak-penutupan').find('.input-id').val(datanya.penutupan_id);
                tagnya.parents('.bapak-penutupan').find('.select-jenis_kantor').val(datanya.penutupan_jenis_kantor);
                tagnya.parents('.bapak-penutupan').find('.select-pengusul').val(datanya.penutupan_pengusul);
                tagnya.parents('.bapak-penutupan').find('.select-status').val(datanya.penutupan_status);
                tagnya.parents('.bapak-penutupan').find('.select-tahun').val(datanya.penutupan_tahun);


                // ########################################################################
                tagnya.parents('.bapak-penutupan').find('.select-propinsi').val(datanya.penutupan_propinsi);
                $.get("<?= IP_API ?>/jaringan/kota/" + datanya.penutupan_propinsi, function(data) {
                    tagnya.parents(".bapak-penutupan").find(".select-kota").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-penutupan").find(".select-kota").append("<option value='" + value.kota_id + "'>" + value.kota_nama + "</option>").end();
                    });
                    tagnya.parents('.bapak-penutupan').find('.select-kota').val(datanya.penutupan_kota);
                });
                $.get("<?= IP_API ?>/jaringan/kecamatan/" + datanya.penutupan_kota, function(data) {
                    tagnya.parents(".bapak-penutupan").find(".select-kecamatan").empty();
                    $.each(data, function(key, value) {
                        tagnya.parents(".bapak-penutupan").find(".select-kecamatan").append("<option value='" + value.kecamatan_id + "'>" + value.kecamatan_nama + "</option>");
                    });
                    tagnya.parents('.bapak-penutupan').find('.select-kecamatan').val(datanya.penutupan_kecamatan);
                });

                // ########################################################################

                tagnya.parents('.bapak-penutupan').find('.select-kkb_start').val(datanya.penutupan_kajian_kelayakan_bisnis_start);
                tagnya.parents('.bapak-penutupan').find('.select-kkb_finish').val(datanya.penutupan_kajian_kelayakan_bisnis_finish);

                tagnya.parents('.bapak-penutupan').find('.select-pizin_start').val(datanya.penutupan_perijinan_start);
                tagnya.parents('.bapak-penutupan').find('.select-pizin_finish').val(datanya.penutupan_perijinan_finish);

                tagnya.parents('.bapak-penutupan').find('.select-ptutup_start').val(datanya.penutupan_penutupan_start);
                tagnya.parents('.bapak-penutupan').find('.select-ptutup_finish').val(datanya.penutupan_penutupan_finish);
            }
            tagIndex.text(indexnya);

        });

    });
</script>