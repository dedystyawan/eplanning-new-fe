<style>
@media screen and (min-width: 1500px) {
  div.content {
    max-width: 1500px;
    margin:auto;
  }
}


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

<div class="content" >
    <div class="row">
        <div class="col-sm-12">
            <div class="hpanel hblue">
                <div class="panel-heading">
                    <i class="fa fa-plus" aria-hidden="true"></i> Rencana Kerja Fungsional [Input]
                </div>
                <!-- isi content dari input rencana kerja fungsional -->
                <div class="panel-body">
                    <div class=" col-md-12 ">
                        <!-- form rkf -->
                        <form method="post" action="<?= base_url() ?>rbb/rkf/rkf/insert_rkf" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                            <!-- baris input program kerja -->
                            <div class="row">
                                <!-- input program kerja -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Program Kerja</label>
                                        <!-- <input type="text" class="form-control" name="rkf_proker"> -->
                                        <textarea rows="6"  class="col-md-12" style="max-width: 100%;resize:none" name="rkf_proker"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- input visi -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Mendukung Visi</label>
                                        <select class="form-control" id="visi" multiple="multiple" name="rkf_visi[]" style=" max-width: 100%;">
                                            <?php
                                            if (!empty($all->allVisi)) {
                                                foreach ($all->allVisi as $dt) { ?>
                                                    <option value="<?= $dt->visi_id; ?>|<?= $dt->visi_nama; ?>"><?= $dt->visi_nama; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- input Misi -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Mendukung Misi</label>
                                        <select class="form-control" id="misi" multiple="multiple" name="rkf_misi[]" style=" max-width: 100%;">
                                            <?php
                                            if (!empty($all->allMisi)) {
                                                foreach ($all->allMisi as $dt) { ?>
                                                    <option value="<?= $dt->misi_id; ?>|<?= $dt->misi_nama; ?>"><?= $dt->misi_nama; ?></option>;
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- input corplan -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Mendukung Corporate Plan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_corplan">
                                <div class="cor-bapak ">
                                    <div class="row  border-bottom cor-kakek">
                                        <div class="col-sm-11 ">
                                            <div class="row">
                                                <!-- tahun -->
                                                <div class="col-sm-2 ">
                                                    <div class="form-group cor-anak-tahun">
                                                        <label class="control-label" style="text-align:left; margin-bottom:0px;padding-bottom:0px;">Tahun</label>
                                                        <select class="form-control cor-select-thn" name="" style="max-width: 90%;">
                                                            <option value="">Pilih Tahun</option>
                                                            <?php foreach ($tahun_inisiatif as $dt) { ?>
                                                                <option value="<?= $dt->is_tahun ?>"><?= $dt->is_tahun ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- corplan -->
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Inisiatif Strategis</label>
                                                        <select class="form-control cor-select-cp" data-tahun="" name="rkf_corplan_id[]" style=" max-width: 100%;">
                                                            <option value="">-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Target -->
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-10 ">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>Target</td>
                                                            <td class="cor-target-td">
                                                                <input type="text" readonly class="form-control cor-target cor-inputan" name="" value="" style=" max-width: 100%;background:transparent; border:none">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sasaran</td>
                                                            <td class="cor-sasaran-td">
                                                                <textarea readonly onkeyup="textAreaAdjust(this)" class="form-control cor-sasaran cor-inputan" name="" id="" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>KPI</td>
                                                            <td class="cor-kpi-td">
                                                                <textarea readonly onkeyup="textAreaAdjust(this)" class="form-control cor-kpi cor-inputan" name="" id="" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Target KPI</td>
                                                            <td class="cor-kpi-target-td"> <input type="text" readonly class="form-control cor-kpi-target  cor-inputan" style="resize:none; width:100%;background: transparent; border: none;word-break: break-all;" name="" value=""></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <label class="control-label " style="opacity:0">button</label>
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_corplan ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Mendukung Kebijakan Umum Direksi</label>
                                        <select class="form-control " id="kud" multiple="multiple" name="rkf_kud[]" style=" max-width: 100%;">
                                            <?php
                                            if (!empty($kud)) {
                                                foreach ($kud as $dt) { ?>
                                                    <option value="<?= $dt->kud_id; ?>"><?= $dt->kud_nama; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Menjawab Isu Strategis</label>
                                        <select class="form-control isuStrategis"  multiple="multiple"  name="isuStrategis[]" style=" max-width: 100%;">
                                            <option value="">Pilih</option>
                                            <?php foreach($isuStrategis as $dt){ ?>
                                                <option value="<?=$dt->isu_strategis_id ?>"><?=$dt->isu_strategis_nama   ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <!-- baris input status kerja, skala proker, kat proker, perspektif, kerjasama konsultan  -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Mendukung Program Transformasi BPD</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- input status proker -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Ya/Tidak</label>
                                        <select class="form-control select-prog-trans" style="max-width: 90%;">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- input skala proker -->
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Workstream</label>
                                        <select class="form-control select-workstream" name="rkf_transformasi_bpd" style="max-width: 90%;" disabled>
                                            <option value="0">Pilih</option>
                                            <?php foreach ($transformasi as $dt) { ?>
                                                <option value="<?= $dt->transformasi_bpd_id ?>"><?= $dt->transformasi_bpd_nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr />




                            <!-- baris input status kerja, skala proker, kat proker, perspektif, kerjasama konsultan  -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Mendukung Rencana Aksi Keuangan Berkelanjutan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- input status proker -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Ya/Tidak</label>
                                        <select class="form-control select-rakb" style="max-width: 90%;">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- input skala proker -->
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Strategi Bidang</label>
                                        <select class="form-control select-stratbid" name="rkf_rakb" style="max-width: 90%;" disabled>
                                            <option value="0">Pilih</option>
                                            <?php foreach ($datarakb as $dt) { ?>
                                                <option value="<?= $dt->rakb_id ?>"><?= $dt->rakb_nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr />
                            <div class="row">
                                <!-- input status proker -->
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Status Program Kerja</label>
                                        <select class="form-control" name="rkf_status_proker" style="max-width: 90%;" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            if (!empty($all->allStsProker)) {
                                                foreach ($all->allStsProker as $dt) { ?>
                                                    <option value="<?= $dt->sts_proker_id; ?>"><?= $dt->sts_proker_nama; ?></option>;
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- input skala proker -->
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Skala Program Kerja</label>
                                        <select class="form-control" name="rkf_skala_proker" style="max-width: 90%;" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            if (!empty($all->allSkalaProker)) {
                                                foreach ($all->allSkalaProker as $dt) { ?>
                                                    <option value="<?= $dt->skala_proker_id; ?>"><?= $dt->skala_proker_nama; ?></option>;
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- input kat proker -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Kategori Program Kerja</label>
                                        <select class="form-control select-katproker" name="rkf_kat_proker" style=" max-width: 90%;" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            if (!empty($all->allKatProker)) {
                                                foreach ($all->allKatProker as $dt) { ?>
                                                    <option value="<?= $dt->kat_proker_id; ?>"><?= $dt->kat_proker_nama; ?></option>;
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- input perpektif bsc -->
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Prespektif BSC</label>
                                        <select class="form-control" name="rkf_bsc" style=" max-width: 90%;" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            if (!empty($all->allBSC)) {
                                                foreach ($all->allBSC as $dt) { ?>
                                                    <option value="<?= $dt->bsc_id; ?>"><?= $dt->bsc_nama; ?></option>;
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- input kerjasama dengan konsultan -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Kerjasama dengan Konsultan</label>
                                        <select class="form-control" name="rkf_konsultan" style=" max-width: 100%;" required>
                                            <option value="">Pilih</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <!-- baris input tindak lanjut audit -->
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-9" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Tindak Lanjut Audit (Pilih jika 'Ya')</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Tahun</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_tlaudit">
                                <div class="tl-bapak">
                                    <div class="row" style="">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <select class="form-control input-tlauditnya" name="tlaudit[]" style=" max-width: 95%;">
                                                    <option value="">Pilih tindak Lanjut</option>;
                                                    <?php
                                                    if (!empty($all->allTLAudit)) {
                                                        foreach ($all->allTLAudit as $dt) { ?>
                                                            <option value="<?= $dt->tindak_lanjut_id; ?>"><?= $dt->tindak_lanjut_nama; ?></option>;
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <select class="form-control input-tahunauditnya" name="tahunaudit[]" style=" max-width: 100%;">
                                                    <option value="">Pilih Tahun</option>;
                                                    <?php $n = 6;
                                                    for ($x = date("Y"); $n > 0; --$x) { ?>
                                                        <option value="<?= $x ?>"><?= $x ?></option>
                                                    <?php --$n;
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_tlaudit ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- baris input tujuan program kerja -->
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-9" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Tujuan Program Kerja</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_tujuan">
                                <div class="tujuan-bapak">
                                    <div class="row" style="">
                                        <div class="col-sm-11">
                                            <div class="form-group">
                                                <input type="text" name='rkf_tujuan_proker[]' placeholder='Tujuan Program Kerja' class="form-control input-tujuannya" />
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_tujuan ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- baris input indikator keberhasilan -->
                            <!-- <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-9" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Indikator Keberhasilan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_indikator">
                                <div class="indikator-bapak">
                                    <div class="row" style="">
                                        <div class="col-sm-11">
                                            <div class="form-group">
                                                <input type="text" name='rkf_indikator[]' placeholder='Indikator Keberhasilan' class="form-control input-indikatornya" />
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_indikator ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                            <!-- baris input indikator keberhasilan -->
                            <div class="tooltip-demo ">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label class="control-label" style="text-align:left;font-size:1.4em">Indikator Keberhasilan</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Output -->
                                <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-10" style="">
                                        <div class="form-group">
                                            <label class="control-label" style="text-align:left;">Output (Keluaran)</label>
                                            <u>
                                                <i class="fa fa-question-circle tippy-output" >

                                                </i></u>
                                        </div>
                                    </div>
                                </div>
                                <div class="input_fields_wrap_output">
                                    <div class="output-bapak">
                                        <div class="row" style="">
                                            <div class="col-sm-1">
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text"  name='rkf_indikator_output[]' placeholder='Uraian' class="form-control input-outputnya" style="max-width:100%" />
                                                </div>
                                            </div>
                                            <div class="col-sm-1 text-right">
                                                <div class="form-group ini_button">
                                                    <a class="btn btn-info glyphicon glyphicon-plus add_field_button_output ubah_icon"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- outcome -->
                                <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label class="control-label" style="text-align:left;">Outcome (Hasil)</label>
                                            <u>
                                                <i class="fa fa-question-circle tippy-outcome">
                                                </i></u>
                                        </div>
                                    </div>
                                </div>
                                <div class="input_fields_wrap_outcome">
                                    <div class="outcome-bapak">
                                        <div class="row" style="">
                                            <div class="col-sm-1">
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text"  name='rkf_indikator_outcome[]' placeholder='Uraian' class="form-control input-outcomenya" style="max-width:100%" />
                                                </div>
                                            </div>
                                            <div class="col-sm-1 text-right">
                                                <div class="form-group ini_button">
                                                    <a class="btn btn-info glyphicon glyphicon-plus add_field_button_outcome ubah_icon"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- impact -->
                                <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="control-label" style="text-align:left;">Impact (Dampak)</label>
                                            <u>
                                                <i class="fa fa-question-circle tippy-impact">
                                                </i></u>
                                        </div>
                                    </div>
                                </div>
                                <div class="input_fields_wrap_impact">
                                    <div class="impact-bapak">
                                        <div class="row" style="">
                                            <div class="col-sm-1">
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text"  name='rkf_indikator_impact[]' placeholder='Uraian' class="form-control input-impactnya" style="max-width:100%" />
                                                </div>
                                            </div>
                                            <div class="col-sm-1 text-right">
                                                <div class="form-group ini_button">
                                                    <a class="btn btn-info glyphicon glyphicon-plus add_field_button_impact ubah_icon"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- baris input target finansial -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Target Finansial</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-6" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Uraian</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Target Kuantitatif</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Satuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_target">
                                <div class="target-bapak">
                                    <div class="row" style="">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name='target_finansial[]' placeholder='Uraian' class="form-control input-targetfin" style="max-width:95%" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <input type="number" name='target_kuantitatif[]' placeholder='Target Kuantitatif' class="form-control input-targetkuan" style="max-width:95%" />
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <select class="form-control input-targettahun" name="satuan[]" style="width: 90%; max-width: 90%; ">
                                                    <option value=""> Pilih Satuan</option>
                                                    <?php foreach ($all->allSatuan as $dtSatuan) { ?>
                                                        <option value="<?= $dtSatuan->satuan_nama ?>"><?= $dtSatuan->satuan_nama ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_target ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- baris input Jadwal-->
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-9" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Jadwal Pelaksanaan / Target Penyelesaian</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="1" class="i-checks"> Jan</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="2" class="i-checks"> Feb</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="3" class="i-checks"> Mar</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="4" class="i-checks"> Apr</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="5" class="i-checks"> Mei</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="6" class="i-checks"> Jun</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="7" class="i-checks"> Jul</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="8" class="i-checks"> Ags</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="9" class="i-checks"> Sep</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="10" class="i-checks"> Okt</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="11" class="i-checks"> Nov</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="rkf_jadwal[]" value="12" class="i-checks"> Des</label>
                                    </div>
                                </div>
                            </div>
                            <!-- baris input Anggaran -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Anggaran</label>
                                        <p>Diisi Anggaran Dalam Bulan Laporan (Rupiah Penuh)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-2" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Jenis</label>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">COA</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_coa">
                                <div class="coa-bapak">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <select class="form-control coa-select-jenis " name="" style="max-width: 90%;display:inline-block">
                                                    <option value="">Pilih</option>
                                                    <?php
                                                    if (!empty($coa_jenis)) {
                                                        foreach ($coa_jenis as $dt) { ?>
                                                            <option style="text-transform:capitalize" value="<?= $dt; ?>"><?= $dt; ?></option>;
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-9" style="background-color:">
                                            <div class="form-group">
                                                <select class="form-control coa-select-nama hapus-coanya" name="rkf_coa_id[]" style=" max-width: 100%;">
                                                    <option value="">--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_coa ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-9" style="text-align:left;margin-left:0px; padding-left:0px">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jan</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[0][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Feb</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[1][]" id="" style="font-size:10px;text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Mar</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[2][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Apr</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[3][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Mei</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[4][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jun</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[5][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Jul</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[6][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Ags</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[7][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Sep</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[8][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Okt</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[9][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Nov</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[10][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" style="text-align:left;font-weight:normal">Des</label>
                                                    <input type="text" class="form-control hapus-coanya numbernya" name="rkf_coa_bulan[11][]" id="" style="font-size:10px; text-align:right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom" style="margin:10px 10px"></div>
                                </div>
                            </div>
                            <!-- baris Unit Pelaksana -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Unit Pelaksana</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-6" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Unit Kerja Setingkat Sub Divisi</label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Person In Charge</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_pic">
                                <div class="pic-bapak">
                                    <div class="row" style="">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control selectsubdiv reset-pic" name="subdivisi[]" style=" max-width: 98%;">
                                                    <option value="">Pilih Sub Divisi</option>;
                                                    <?php
                                                    if (!empty($subdiv->result)) {
                                                        foreach ($subdiv->result[0] as $dt) { ?>
                                                            <option value="<?= $dt->id; ?>"><?= $dt->nama; ?></option>;
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <select class="form-control selectpic reset-pic" name="pic[]" style=" max-width: 98%;">
                                                    <option value="">Pilih Subdivisi Dahulu</option>;
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_pic ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- baris support fungsi lain -->
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Support Fungsi Lain</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom:8px ">
                                <div class="col-sm-6" style="">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Unit Kerja</label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Notes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input_fields_wrap_support">
                                <div class="support-bapak">
                                    <div class="row" style="">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control reset-support" name="divisi[]" style="width: 98%; max-width: 98%;">
                                                    <option value="">Pilih Divisi</option>;
                                                    <?php
                                                    if (!empty($all->divisi)) {
                                                        foreach ($all->divisi as $dt) { ?>
                                                            <option value="<?= $dt->unit_kerja_id; ?>"><?= $dt->unit_kerja_nama; ?></option>;
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input type="text" name='notes[]' placeholder='Sampaikan support yang diperlukan...' class="form-control reset-support" />

                                            </div>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <div class="form-group ini_button">
                                                <a class="btn btn-info glyphicon glyphicon-plus add_field_button_support ubah_icon"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- UNTUK PAB JIKA KATEGORI YANG DIISI PAB NYA -->
                            <div class= "pabnya" style="display:none">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;font-size:1.4em">Rencana Penerbitan Produk dan/atau Pelaksanaan Aktivitas Baru (PAB)</label>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row" style="">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label class="control-label" style="text-align:left;">Jenis</label>
                                        <select class="form-control reset-support select-jenis-pab" name="pab_jenis" style="max-width: 98%;">
                                            <option value="">Pilih Jenis</option>
                                            <option value="1">Produk Baru</option>
                                            <option value="2">Aktivitas Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label class="control-label" style="text-align:left;">Nama Produk/Aktivitas Baru</label>
                                        <input type="text" name='pab_nama' placeholder='' class="form-control reset-support" />

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Tujuan/Manfaat Bagi Bank</label>
                                        <input type="text" name='pab_tujuan_bank' placeholder='' class="form-control reset-support" style="max-width: 98%;" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label class="control-label" style="text-align:left;">Tujuan/Manfaat Bagi Nasabah</label>
                                        <input type="text" name='pab_tujuan_nasabah' placeholder='' class="form-control reset-support" />

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Keterkaitan Produk/Aktivitas Baru dengan Strategi Bank</label>
                                        <input type="text" name='pab_keterkaitan' placeholder='' class="form-control reset-support" style="max-width: 98%;" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label class="control-label " style="text-align:left;">Jadwal</label>
                                        <select class="form-control " name="pab_jadwal">
                                                <?php for($i=1; $i<=12;$i++){ ?>
                                                <option value="<?=$i?>"><?=parse_bulan_short($i); ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" style="text-align:left;">Risiko yang Mungkin Timbul</label>
                                        <input type="text" name='pab_resiko' placeholder='' class="form-control reset-support" style="max-width: 98%;" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                <label class="control-label" style="text-align:left;">Mitigasi Risiko atas Penerbitan Produk dan/Atau Aktivitas Baru</label>
                                        <input type="text" name='pab_mitigasi' placeholder='' class="form-control reset-support" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="form-group">
                                <label class="control-label" style="text-align:left;">Deskripsi Umum</label>
                                        <input type="text" name='pab_deskripsi' placeholder='' class="form-control reset-support"/>

                                    </div>
                                </div>
                            </div>
                            </div>
               

                            <!--//////BUTTON ADD DATANYA ///// -->
                            <div class="row" style="text-align: center;">
                                <button  type="submit" name="submit" class="btn btn-success btn-md pull-center"><i class="fa fa-floppy-o pull-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


tippy('.tippy-outcome', {
  content: "Keadaaan yang ingin dicapai atau dipertahankan pada penerima manfaat dalam periode waktu tertentu yang mencerminkan berfungsinya keluaran (output) dari beberapa kegiatan dalam suatu program",
});

tippy('.tippy-impact', {
  content: "Kondisi yang ingin diubah berupa hasil pelayanan yang diperoleh dari pencapaian hasil satu atau beberapa program kerja",
});

tippy('.tippy-output', {
  content: "Produk akhir berupa barang atau jasa dari serangkaian proses atas sumber daya agar hasil (outcome) dapat terwujud",
});
</script>

<script>

    $(document).ready(function(){
        $('.select-katproker').change(function(){
            var value = $(this).val();
            if(value == 4){
                $(".pabnya").show();
                $('.select-jenis-pab').prop('required', true);
            }else{
                $(".pabnya").hide(); 
                $('.select-jenis-pab').prop('required', false);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.select-prog-trans').change(function() {
            var posisi = $(this);
            // alert(posisi.val());
            if (posisi.val() == 1) {
                $(".select-workstream").prop("disabled", false);
            } else {
                $(".select-workstream").prop("disabled", "disabled");
                $(".select-workstream").val("0");

            }
        });

        $('.select-rakb').change(function() {
            var posisi = $(this);
            // alert(posisi.val());
            if (posisi.val() == 1) {
                $(".select-stratbid").prop("disabled", false);
            } else {
                $(".select-stratbid").prop("disabled", "disabled");
                $(".select-stratbid").val("0");
            }
        });
    });
</script>

<script type="text/javascript">
    $("#visi").select2();
    $("#misi").select2();
    $("#kud").select2();
    $('.isuStrategis').select2();
</script>

<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN CORPLAN-->
<!-- tambah input corplan -->
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_corplan"); //Fields wrapper
        var add_button = $(".add_field_button_corplan"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".cor-bapak:first").clone().appendTo(".input_fields_wrap_corplan").find(".cor-inputan").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_corplan");
            }
        });
        $(wrapper).on("click", ".remove_field_corplan", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.cor-bapak').remove();
            x--;
        })
    });
</script>


<!-- untuk corplan ketika tahun dipilih-->
<script>
    $(document).on('change', '.cor-select-thn', function() {
        var tahuncp = $(this).val();
        var tagnya = $(this);
        var tagCp = tagnya.parents('div.cor-bapak').find("select.cor-select-cp");
        var ip_api = '<?php echo IP_API ?>';
        if (tahuncp) {
            $.ajax({
                type: "GET",
                url: ip_api + "/master/coreplan/" + tahuncp,
                success: function(hasil) {
                    tagCp.empty();
                    tagCp.data('tahun', tahuncp);
                    tagCp.append('<option disabled selected>Pilih Inisiatif Strategis</option>');
                    $.each(hasil, function(key, value) {
                        tagCp.append('<option value="' + value.is_id + '">' + value.is_inisiatif_cp + '</option>');
                    });
                }
            });
        } else {
            tagCp.empty();
            // tagCp.append('<option ">Pilih Tahun Dahulu</option>');
        }
    });

    // untuk corplan ketika inisiatif strategis dipilih
    $(document).on('change', '.cor-select-cp', function() {
        var corplanId = $(this).val();
        var tahuncp = $(this).data('tahun');
        var tagnya = $(this);
        var tagtarget = tagnya.parents('div.cor-bapak').find(".cor-target");
        var tagsasaran = tagnya.parents('div.cor-bapak').find(".cor-sasaran");
        var tagkpi = tagnya.parents('div.cor-bapak').find(".cor-kpi");
        var tagkpitarget = tagnya.parents('div.cor-bapak').find(".cor-kpi-target");
        var ip_api = '<?php echo IP_API ?>';
        if (corplanId != 'Pilih cp') {
            $.ajax({
                type: "GET",
                url: ip_api + "/master/coreplan/" + tahuncp,
                success: function(hasil) {
                    var seleksi = hasil.filter(function(idnya) {
                        return idnya.is_id == corplanId;
                    });
                    tagtarget.val(seleksi[0].is_inisiatif_cp_target);
                    tagsasaran.val(seleksi[0].is_sasaran_cp);
                    tagkpi.val(seleksi[0].is_kpi);
                    tagkpitarget.val(seleksi[0].is_kpi_target);

                }
            });
        } else {
            tagtarget.val('');
            tagsasaran.val('');
            tagkpi.val('');
            tagkpitarget.val('');
        }
    });
</script>

<!-- untuk corplan auto resize text area corplan -->
<script>
    function textAreaAdjust(o) {
        o.style.height = "1px";
        o.style.height = (25 + o.scrollHeight) + "px";
    }
</script>

<!-- UNTUK KEBUTUHAN CORPLAN END-->

<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN TINDAK LANJUT AUDIT-->
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_tlaudit"); //Fields wrapper
        var add_button = $(".add_field_button_tlaudit"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".tl-bapak:first").clone().appendTo(".input_fields_wrap_tlaudit").find(".input-tlauditnya").val("").end().find(".input-tahunauditnya").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_tlaudit");
            }
        });
        $(wrapper).on("click", ".remove_field_tlaudit", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.tl-bapak').remove();
            x--;
        })
    });
</script>

<!-- UNTUK KEBUTUHAN TINDAK LANJUT AUDIT END-->
<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN TUJUAN PROGRAM KERJA -->
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_tujuan"); //Fields wrapper
        var add_button = $(".add_field_button_tujuan"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".tujuan-bapak:first").clone().appendTo(".input_fields_wrap_tujuan").find(".input-tujuannya").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_tujuan");
            }
        });
        $(wrapper).on("click", ".remove_field_tujuan", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.tujuan-bapak').remove();
            x--;
        })
    });
</script>

<!-- UNTUK KEBUTUHAN TUJUAN PROGRAM KERJA END-->
<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN INDIKATOR -->
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_indikator"); //Fields wrapper
        var add_button = $(".add_field_button_indikator"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".indikator-bapak:first").clone().appendTo(".input_fields_wrap_indikator").find(".input-indikatornya").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_indikator");
            }
        });
        $(wrapper).on("click", ".remove_field_indikator", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.indikator-bapak').remove();
            x--;
        })
    });
</script>

<!-- UNTUK KEBUTUHAN INDIKATOR END-->
<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN INDIKATOR versi 2-->
<script>
    
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_output"); //Fields wrapper
        var add_button = $(".add_field_button_output"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".output-bapak:first").clone().appendTo(".input_fields_wrap_output").find(".input-outputnya").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_output");
            }
        });
        $(wrapper).on("click", ".remove_field_output", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.output-bapak').remove();
            x--;
        })
    });
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_outcome"); //Fields wrapper
        var add_button = $(".add_field_button_outcome"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".outcome-bapak:first").clone().appendTo(".input_fields_wrap_outcome").find(".input-outcomenya").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_outcome");
            }
        });
        $(wrapper).on("click", ".remove_field_outcome", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.outcome-bapak').remove();
            x--;
        })
    });
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_impact"); //Fields wrapper
        var add_button = $(".add_field_button_impact"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".impact-bapak:first").clone().appendTo(".input_fields_wrap_impact").find(".input-impactnya").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_impact");
            }
        });
        $(wrapper).on("click", ".remove_field_impact", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.impact-bapak').remove();
            x--;
        })
    });
</script>

<!-- UNTUK KEBUTUHAN INDIKATOR versi 2-->
<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN TARGET FINANSIAL -->
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_target"); //Fields wrapper
        var add_button = $(".add_field_button_target"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".target-bapak:first").clone().appendTo(".input_fields_wrap_target").find(".input-targetfin").val("").end().find(".input-targetkuan").val("").end().find(".input-targettahun").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_target");
            }
        });
        $(wrapper).on("click", ".remove_field_target", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.target-bapak').remove();
            x--;
        })
    });
</script>

<!-- UNTUK KEBUTUHAN TARGET FINANSIAL END-->
<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN ANGGARAN -->
<script>
    // untuk tambah inputan
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_coa"); //Fields wrapper
        var add_button = $(".add_field_button_coa"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".coa-bapak:first").clone().appendTo(".input_fields_wrap_coa").find(".hapus-coanya").val('').end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_coa");
                // tambahan supaya numbernya ada titik titik ya gitulah coba aja sendiri hmmmmm 
                $('input.numbernya').keyup(function(event) {
                    // skip for arrow keys
                    if (event.which >= 37 && event.which <= 40) return;
                    // format number
                    $(this).val(function(index, value) {
                        return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                });
            }
        });
        $(wrapper).on("click", ".remove_field_coa", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.coa-bapak').remove();
            x--;
        })
    });

    // untuk perubahan saat select jenis coa
    var coa = <?php echo json_encode($coa); ?>;
    $(document).on('change', '.coa-select-jenis', function() {
        var coa_jenisId = $(this).val();
        // alert(coa_jenisId);
        var coa_jenisnya = coa.filter(function(jenis) {
            return jenis.pos_coa_jenis_nama == coa_jenisId;
        });
        var tagCoaNama = $(this).parents('div.coa-bapak').find('select.coa-select-nama');
        if (coa_jenisId) {
            tagCoaNama.empty();
            $.each(coa_jenisnya, function(key, value) {
                tagCoaNama.append('<option disabled style="" value="' + value.pos_coa_sub3_id + '">' + value.pos_coa_header_nama + '</option>');
                tagCoaNama.append('<option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;' + value.pos_coa_sub1_nama + '</option>');
                tagCoaNama.append('<option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + value.pos_coa_sub2_nama + '</option>');
                tagCoaNama.append('<option  style="font-style:italic" value="' + value.pos_coa_sub3_id + '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + value.pos_coa_sub3_id + ' - ' + value.pos_coa_sub3_nama + '</option>');
            });
        }
    });
</script>

<!-- UNTUK KEBUTUHAN TARGET ANGGARAN END-->
<!-- ################################################################################################## -->
<!-- UNTUK KEBUTUHAN UNIT PELAKSANA -->
<script>
    // untuk tambah inputan
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_pic"); //Fields wrapper
        var add_button = $(".add_field_button_pic"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".pic-bapak:first").clone().appendTo(".input_fields_wrap_pic").find(".reset-pic").val('').end().find(".reset-pic").val('').end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_pic");
                // tambahan supaya numbernya ada titik titik ya gitulah coba aja sendiri hmmmmm 
                $('input.numbernya').keyup(function(event) {
                    // skip for arrow keys
                    if (event.which >= 37 && event.which <= 40) return;
                    // format number
                    $(this).val(function(index, value) {
                        return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                });
            }
        });
        $(wrapper).on("click", ".remove_field_pic", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.pic-bapak').remove();
            x--;
        })
    });

    $(document).on('change', '.selectsubdiv ', function() {
        var subdivID = $(this).val();
        var tagnya = $(this);
        var tagPic = tagnya.parents(".pic-bapak").find(".selectpic");
        var sdm_api = '<?php echo SDM_API ?>';
        // console.log(subdivID);
        // if (subdivID) {
        //     $.ajax({
        //         type: "GET",
        //         url: sdm_api + "/api_v2/pegawai/prc_get_pegawai_per_subdiv/" + subdivID + "?api_key=prc",
        //         success: function(hasil) {
        //             tagPic.empty();
        //             tagPic.append('<option value="">Pilih PIC</option>');
        //             $.each(hasil.result[0], function(key, value) {
        //                 tagPic.append('<option value="' + value.pegawai_id + '">' + value.nama + '</option>');
        //             });
        //         }
        //     });
        // } else {
        //     tagPic.empty();
        //     tagPic.append('<option ">Pilih Subdivisi Dahulu</option>');
        // }
        if (subdivID) {
            if(subdivID == "B001PPE001"){
                $.ajax({
                type: "GET",
                url: sdm_api + "/api_v2/pegawai/prc_get_pegawai_per_divisi/" + "001PPE" + "?api_key=prc",
                success: function(hasil) {
                    tagPic.empty();
                    tagPic.append('<option value="">Pilih PIC</option>');
                    $.each(hasil.result[0], function(key, value) {
                        tagPic.append('<option value="' + value.pegawai_id + '">' + value.nama + '</option>');
                    });
                }
            });
            }else if(subdivID == "B001DPL001"){
                $.ajax({
                type: "GET",
                url: sdm_api + "/api_v2/pegawai/prc_get_pegawai_per_divisi/" + "001DPL" + "?api_key=prc",
                success: function(hasil) {
                    tagPic.empty();
                    tagPic.append('<option value="">Pilih PIC</option>');
                    $.each(hasil.result[0], function(key, value) {
                        tagPic.append('<option value="' + value.pegawai_id + '">' + value.nama + '</option>');
                    });
                }
            });
            }else{
                $.ajax({
                type: "GET",
                url: sdm_api + "/api_v2/pegawai/prc_get_pegawai_per_subdiv/" + subdivID + "?api_key=prc",
                success: function(hasil) {
                    tagPic.empty();
                    tagPic.append('<option value="">Pilih PIC</option>');
                    $.each(hasil.result[0], function(key, value) {
                        tagPic.append('<option value="' + value.pegawai_id + '">' + value.nama + '</option>');
                    });
                }
            });
            }
        } else {
            tagPic.empty();
            tagPic.append('<option ">Pilih Subdivisi Dahulu</option>');
        }
    });
</script>

<!-- UNTUK KEBUTUHAN TARGET UNIT PELAKSANA END-->
<!-- ################################################################################################## -->

<!-- UNTUK KEBUTUHAN TARGET FINANSIAL -->
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_support"); //Fields wrapper
        var add_button = $(".add_field_button_support"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".support-bapak:first").clone().appendTo(".input_fields_wrap_support").find(".reset-support").val("").end().find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_support");
            }
        });
        $(wrapper).on("click", ".remove_field_support", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.support-bapak').remove();
            x--;
        })
    });
</script>

<!-- UNTUK KEBUTUHAN TARGET FINANSIAL END-->
<!-- ################################################################################################## -->





<!-- untuk mencegah huruf keinput -->
<script>
    $('input.numbernya').keyup(function(event) {

        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
</script>
