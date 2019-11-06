<style>
@media screen and (min-width: 1500px) {
  div.content {
    max-width: 1500px;
  }
}
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<div class="content ">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <i class="fa fa-plus" aria-hidden="true"></i> EDIT PEMBANGUNAN / RENOVASI
                    <span >      <?php if(!empty($this->session->flashdata('pesan'))){ ?>
                    <p style="text-align: justify; font-weight:bold; color:tomato">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                    <?php } ?></span>
                </div>
                <div class="panel-body">
                    <div class=" col-md-12">
                        <form method="post" action="<?= base_url() ?>rbb/rko/bangren/update/<?=$dataEdit->bangun_renovasi_id; ?>" class="form-horizontal" autocomplete="off">
                            <div class="input_fields_wrap_pembangunan">
                                <div class="bapak-pembangunan">
                                    <input type="text" class="form-control" name="jenis" style="display:none" value="<?=$dataEdit->bangun_renovasi_jenis ?>">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <div class="form-group" >
                                            <label class="control-label" style="text-align:left;">Uraian Proyek</label>
                                                <input type="text" class="form-control input-uraian reset-pembangunan" name="uraian" placeholder="Isi Uraian Proyek" value="<?=$dataEdit->bangun_renovasi_uraian ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Status</label>
                                                <select class="form-control" name="status" style="max-width: 90%;" >
                                                    <option value="" >Pilih</option>
                                                    <option value="1" <?=($dataEdit->bangun_renovasi_status == 1)? 'selected':''; ?>>Baru</option>
                                                    <option value="2" <?=($dataEdit->bangun_renovasi_status == 2)? 'selected':''; ?>>Carry Over</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Kepemilikan Aset</label>
                                                <select class="form-control" name="pemilik" style="width:90%" >
                                                    <option value="">Pilih</option>
                                                    <?php foreach($milikAset as $key => $dt){ ?>
                                                        <option value="<?=$key?>" <?=($dataEdit->bangun_renovasi_kepemilikan_aset == $key)? 'selected':''; ?>><?=$dt;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Alamat Lokasi</label>
                                                <input type="text" class="form-control input-alamat reset-pembangunan" name="alamat" style="max-width: 90%;" value="<?=$dataEdit->bangun_renovasi_alamat ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Anggaran</label>
                                                <div class="input-group m-b"><span class="input-group-addon">Rp</span> <input type="text" name="anggaran" class="form-control input-anggaran reset-pembangunan" style="max-width: 90%;" value="<?=$dataEdit->bangun_renovasi_anggaran ?>"> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Jadwal</label>
                                                <select class="form-control select-jadwal reset-pembangunan"  multiple="multiple" name="jadwal[]" style=" max-width: 100%;">
                                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                    <option value="<?=$i ?>" 
                                                    <?php if(in_array($i, $dataEdit->bangun_renovasi_jadwal_bulan)) { echo 'selected'; } ?>
                                                    ><?= parse_bulan_short($i);?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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


<script>
    $('.input-anggaran').mask('000.000.000.000.000', {reverse: true});
</script>

<script>
$('.select-jadwal').select2();
</script>