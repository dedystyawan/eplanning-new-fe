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
                    <i class="fa fa-plus" aria-hidden="true"></i> EDIT USULAN RENCANA KEBUTUHAN BARANG UNIT (RKBU)
                    <span >      <?php if(!empty($this->session->flashdata('pesan'))){ ?>
                    <p style="text-align: justify; font-weight:bold; color:tomato">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                    <?php } ?></span>
                </div>
                <div class="panel-body">
                    <div class=" col-md-12">
                        <form method="post" action="<?= base_url() ?>rbb/rko/rkbu/update/<?=$dataEdit->rkbu_id?>" class="form-horizontal" autocomplete="off">
                            <div class="input_fields_wrap_kelompok1">
                                <div class="bapak-kelompok1">
                                    <input type="text" class="form-control" name="kelompok" style="display:none" value="<?=$dataEdit->rkbu_barang_kelompok?>">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Nama Barang</label>
                                                <select class="form-control select-barang "   name="kode" style=" max-width: 90%;" >
                                                <option value="">Pilih Barang</option>
                                                    <?php
                                                    if (!empty($dataBarang)) {
                                                        foreach ($dataBarang as $dt) { ?>
                                                            <option value="<?= $dt->barang_id; ?>" <?=($dataEdit->rkbu_barang_kode == $dt->barang_id)? 'selected':''; ?>><?= $dt->barang_nama; ?></option>;
                                                    <?php }
                                                    } ?>
                                                <option value="0" <?=($dataEdit->rkbu_barang_kode == 0)?'selected':''; ?>>Lain-lain</option>
                                                </select>
                                                <!-- data nama displaynya none -->
                                                <input type="text" class="form-control input-nama " name="nama" value="<?=$dataEdit->rkbu_barang_nama; ?>" style="display:none" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" >
                                            <label class="control-label" style="text-align:left; opacity:0">Nama Barang</label>
                                                <input type="text" class="form-control input-lain " name="" placeholder="Isi Disini Jika Data Barang Tidak Ada"
                                                    value="<?=($dataEdit->rkbu_barang_kode == 0)? $dataEdit->rkbu_barang_nama:''; ?>"
                                                    <?=($dataEdit->rkbu_barang_kode == 0)? '':'disabled'; ?>
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Status</label>
                                                <select class="form-control" name="status" style="max-width: 90%;" >
                                                    <option value="">Pilih</option>
                                                    <option value="1" <?=($dataEdit->rkbu_status == 1)? 'selected':''; ?> >Baru</option>
                                                    <option value="2" <?=($dataEdit->rkbu_status == 2)? 'selected':''; ?>>Carry Over</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Jumlah</label>
                                                <input type="number" class="form-control input-jumlah " name="jumlah" style="max-width: 90%;" value="<?=$dataEdit->rkbu_jumlah ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Estimasi Harga (Rp)</label>
                                                <input type="text" class="form-control input-estimasi " name="estimasi" style="max-width: 90%;" value="<?=$dataEdit->rkbu_estimasi_harga ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Estimasi Total Harga (Rp)</label>
                                                <input type="text" class="form-control input-total " name="total" style="max-width: 90%;" value="<?=$dataEdit->rkbu_jumlah*$dataEdit->rkbu_estimasi_harga ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label" style="text-align:left;">Rencana Jadwal Pemenuhan</label>
                                                <select class="form-control " name="jadwal" style=" max-width: 100%;" required>
                                                <option value="">--</option>
                                                    <?php for ($i = 1; $i <= 12; $i++) { 
                                                        $value=(date("Y") + 1)."|".$i;
                                                        ?>
                                                        <option value="<?php echo $value ?>" <?=($dataEdit->jadwal == $value )? 'selected':''; ?>><?php echo parse_bulan_short($i);
                                                                echo "-" . (date("y") + 1);  ?></option>
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
    // $('.input-estimasi').mask('000.000.000.000.000', {reverse: true});
</script>

<script>
$('.input-total').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
$('.input-estimasi').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'}); 

    var data = <?php echo json_encode($dataBarang); ?>;
    console.log(data);
   
    $(document).on('change','.select-barang', function(){
        var barangId = $(this).val();
            if(barangId == 0){
                $(this).parents('.bapak-kelompok1').find('.input-lain').prop('disabled',false).prop('name', 'kode').prop('required',true).end()
                .find('.input-estimasi').val('').end()
                .find('.input-nama').val('').end()
                .find('.input-total').val('').end()
                .find('.input-jumlah').val('').end();
                $(this).prop('name', '');

            }else{
                let estimasi = data.filter(datanya => datanya.barang_id == barangId);
                console.log(estimasi[0].barang_harga);
                $(this).parents('.bapak-kelompok1').find('.input-lain').val('').prop('disabled',true).prop('name', '').prop('required',false).end()
                .find('.input-nama').val(estimasi[0].barang_nama).end()
                .find('.input-estimasi').val(estimasi[0].barang_harga);
                $(this).prop('name', 'kode');
                $('.input-estimasi').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
            }
    });

    $(document).on('keyup', '.input-jumlah', function(){
        var angka = $(this).val();
        var estimasi = $(this).parents('.bapak-kelompok1').find('.input-estimasi').val().split(',').join("").split('_').join("");
        var total = (angka * estimasi);
        $('.input-total').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $(this).parents('.bapak-kelompok1').find('.input-total').val(total);
    });

    $(document).on('change', '.input-estimasi', function(){
        var estimasi = $(this).val().split(',').join("").split('_').join("");
        var angka = $(this).parents('.bapak-kelompok1').find('.input-jumlah').val();
        var total = (angka * estimasi);
        $('.input-total').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $('.input-estimasi').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $(this).parents('.bapak-kelompok1').find('.input-total').val(total);
    });

    $(document).on('keyup', '.input-lain', function(){
        var value = $(this).val();
        $(this).parents('.bapak-kelompok1').find('.input-nama').val(value);        
    });
</script>



