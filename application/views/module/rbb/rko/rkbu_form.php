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
                    <i class="fa fa-plus" aria-hidden="true"></i> FORM USULAN RENCANA KEBUTUHAN BARANG UNIT (RKBU)
                    <span >      <?php if(!empty($this->session->flashdata('pesan'))){ ?>
                    <p style="text-align: justify; font-weight:bold; color:tomato">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                  <?php } ?></span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"> Inventaris Kelompok 1</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2">Inventaris Kelompok 2</a></li>
                    
                </ul>
                <div class="tab-content">
                    <!-- untuk kelompok 1 -->
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class=" col-md-12">
                                <form method="post" action="<?= base_url() ?>rbb/rko/rkbu/insert" class="form-horizontal" autocomplete="off">
                                    <div class="input_fields_wrap_kelompok1">
                                        <div class="bapak-kelompok1">
                                            <input type="text" class="form-control" name="kelompok[]" style="display:none" value="1">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Nama Barang</label>
                                                        <select class="form-control select-barang reset-kel1"   name="kode[]" style=" max-width: 90%;" >
                                                        <option value="">Pilih Barang</option>
                                                            <?php
                                                            if (!empty($dataBarangKel1)) {
                                                                foreach ($dataBarangKel1 as $dt) { ?>
                                                                    <option value="<?= $dt->barang_id; ?>"><?= $dt->barang_nama; ?></option>;
                                                            <?php }
                                                            } ?>
                                                        <option value="0">Lain-lain</option>
                                                        </select>
                                                        <!-- data nama displaynya none -->
                                                        <input type="text" class="form-control input-nama reset-kel1" name="nama[]" style="display:none" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group" >
                                                    <label class="control-label" style="text-align:left; opacity:0">Nama Barang</label>
                                                        <input type="text" class="form-control input-lain reset-kel1" name="" placeholder="Isi Disini Jika Data Barang Tidak Ada" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 text-right">
                                                    <div class="form-group ini_button">
                                                        <!-- <label class="control-label " style="opacity:0">button</label> -->
                                                        <a class="btn btn-info glyphicon glyphicon-plus add_field_button_kelompok1 ubah_icon" style="margin-top:23px"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Status</label>
                                                        <select class="form-control" name="status[]" style="max-width: 90%;" >
                                                            <option value="">Pilih</option>
                                                            <option value="1">Baru</option>
                                                            <option value="2">Carry Over</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Jumlah</label>
                                                        <input type="number" class="form-control input-jumlah reset-kel1" name="jumlah[]" style="max-width: 90%;" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Estimasi Harga (Rp)</label>
                                                        <input type="text" class="form-control input-estimasi masker reset-kel1" name="estimasi[]" style="max-width: 90%;" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Estimasi Total Harga (Rp)</label>
                                                        <input type="text"  class="form-control masker input-total reset-kel1" name="" style="max-width: 90%;" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Rencana Jadwal Pemenuhan</label>
                                                        <select class="form-control reset-kel1" name="jadwal[]" style=" max-width: 100%;" required>
                                                        <option value="">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <?php $number = $i;
                                                                    $number = str_pad($number, 2, '0', STR_PAD_LEFT); ?>
                                                                <option value="<?php echo (date("Y") + 1) ?>|<?php echo $number; ?>"><?php echo parse_bulan_short($i);
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





                    <!-- untuk kelompok 2 -->
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <div class=" col-md-12 ">
                                <div class="row" style="margin-bottom:10px">
                                <form method="post" action="<?= base_url() ?>rbb/rko/rkbu/insert" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                    
                                <div class="input_fields_wrap_kelompok2">
                                        <div class="bapak-kelompok2">
                                            <input type="text" class="form-control" name="kelompok[]" style="display:none" value="2">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Nama Barang</label>
                                                        <select class="form-control select-barang2 reset-kel2"   name="kode[]" style=" max-width: 90%;" >
                                                        <option value="">Pilih Barang</option>
                                                            <?php
                                                            if (!empty($dataBarangKel2)) {
                                                                foreach ($dataBarangKel2 as $dt) { ?>
                                                                    <option value="<?= $dt->barang_id; ?>"><?= $dt->barang_nama; ?></option>;
                                                            <?php }
                                                            } ?>
                                                        <option value="0">Lain-lain</option>
                                                        </select>
                                                        <!-- data nama displaynya none -->
                                                        <input type="text" class="form-control input-nama2 reset-kel2" name="nama[]" style="display:none" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group" >
                                                    <label class="control-label" style="text-align:left; opacity:0">Nama Barang</label>
                                                        <input type="text" class="form-control input-lain2 reset-kel2" name="" placeholder="Isi Disini Jika Data Barang Tidak Ada" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 text-right">
                                                    <div class="form-group ini_button">
                                                        <!-- <label class="control-label " style="opacity:0">button</label> -->
                                                        <a class="btn btn-info glyphicon glyphicon-plus add_field_button_kelompok2 ubah_icon" style="margin-top:23px"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Status</label>
                                                        <select class="form-control" name="status[]" style="max-width: 90%;" >
                                                            <option value="">Pilih</option>
                                                            <option value="1">Baru</option>
                                                            <option value="2">Carry Over</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Jumlah</label>
                                                        <input type="number" class="form-control input-jumlah2 reset-kel2" name="jumlah[]" style="max-width: 90%;" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Estimasi Harga (Rp)</label>
                                                        <input type="text" class="form-control input-estimasi2 masker  reset-kel2" name="estimasi[]" style="max-width: 90%;" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Estimasi Total Harga (Rp)</label>
                                                        <input type="text" class="form-control input-total2 masker  reset-kel2" name="" style="max-width: 90%;">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Rencana Jadwal Pemenuhan</label>
                                                        <select class="form-control reset-kel2" name="jadwal[]" style=" max-width: 100%;"  required>
                                                        <option value="">--</option>
                                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                                <option value="<?php echo (date("Y") + 1) ?>|<?php echo $i; ?>"><?php echo parse_bulan_short($i);
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
    </div>
</div>

<script>

    var data = <?php echo json_encode($dataBarangKel1); ?>;
    // console.log(data);
   
    $(document).on('change','.select-barang', function(){
        var barangId = $(this).val();
            if(barangId == 0){
                $(this).parents('.bapak-kelompok1').find('.input-lain').prop('disabled',false).prop('name', 'kode[]').prop('required',true).end()
                .find('.input-estimasi').val('').end()
                .find('.input-nama').val('').end()
                .find('.input-total').val('').end()
                .find('.input-jumlah').val('').end();
                $(this).prop('name', '');
            }else{
                let estimasi = data.filter(datanya => datanya.barang_id == barangId);
                $(this).parents('.bapak-kelompok1').find('.input-lain').val('').prop('disabled',true).prop('name', '').prop('required',false).end()
                .find('.input-nama').val(estimasi[0].barang_nama).end()
                .find('.input-estimasi').val(estimasi[0].barang_harga);
                $(this).prop('name', 'kode[]');
                $('.input-estimasi').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
            }
    });


    $(document).on('keyup', '.input-jumlah', function(){
        var angka = $(this).val();
        var estimasi = $(this).parents('.bapak-kelompok1').find('.input-estimasi').val().split(',').join("").split('_').join("");
        var total = (angka * estimasi);
        console.log(estimasi);
        // $('.input-total').inputmask({mask: "999.999.999.999.999.999"});
        $('.input-total').inputmask({'alias': 'numeric', 'groupSeparator': ',',  'placeholder': '0'});
        $(this).parents('.bapak-kelompok1').find('.input-total').val(total);
        // $(this).parents('.bapak-kelompok1').find('.input-total');
        // $('.masker').mask('000.000.000.000.000', {reverse: true});
        // console.log($(this).parents('.bapak-kelompok1').find('.input-total').val());
        // $('.masker').trigger('input')
        // $('.input-total').maskMoney();
        
    });

    $(document).on('change', '.input-estimasi', function(){
        var estimasi = $(this).val().split(',').join("").split('_').join("");
        var angka = $(this).parents('.bapak-kelompok1').find('.input-jumlah').val();
        var total = (angka * estimasi);
        // $('.masker').mask('000.000.000.000.000', {reverse: true,watchDataMask: true});
        $('.input-total').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $('.input-estimasi').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $(this).parents('.bapak-kelompok1').find('.input-total').val(total);
        // $('.masker').trigger('input')
        // $('.input-total').maskMoney();
        
    });

    $(document).on('keyup', '.input-lain', function(){
        var value = $(this).val();
        $(this).parents('.bapak-kelompok1').find('.input-nama').val(value);        
    });
</script>

<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_kelompok1"); //Fields wrapper
        var add_button = $(".add_field_button_kelompok1"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".bapak-kelompok1:first").clone().appendTo(".input_fields_wrap_kelompok1")
                .find('.select-barang').prop('name', 'kode[]').end()
                .find('.input-lain').prop('name', '').prop('disabled', true).end()
                .find(".reset-kel1").val('').end()
                .find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_kelompok1");
            }
            // $('.input-total').inputmask({mask: "999.999.999.999.999.999"});

     
        });
        $(wrapper).on("click", ".remove_field_kelompok1", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.bapak-kelompok1').remove();
            x--;
        })
    });
</script>
<!-- ======================================================================================= -->
<!-- ======================================================================================= -->
<!-- ======================================================================================= -->
<!-- ======================================================================================= -->
<!-- ======================================================================================= -->


<script>
    var data2 = <?php echo json_encode($dataBarangKel2); ?>;
    // console.log(data2);
   
    $(document).on('change','.select-barang2', function(){
        var barangId = $(this).val();
            if(barangId == 0){
                $(this).parents('.bapak-kelompok2').find('.input-lain2').prop('disabled',false).prop('name', 'kode[]').prop('required',true).end()
                .find('.input-estimasi2').val('').end()
                .find('.input-nama2').val('').end()
                .find('.input-total2').val('').end()
                .find('.input-jumlah2').val('').end();
                $(this).prop('name', '');

            }else{
                let estimasi = data2.filter(datanya => datanya.barang_id == barangId);
                console.log(estimasi[0].barang_harga);
                $(this).parents('.bapak-kelompok2').find('.input-lain2').val('').prop('disabled',true).prop('name', '').prop('required',false).end()
                .find('.input-nama2').val(estimasi[0].barang_nama).end()
                .find('.input-estimasi2').val(estimasi[0].barang_harga);
                $(this).prop('name', 'kode[]');
                $('.input-estimasi2').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
            }
    });

    $(document).on('keyup', '.input-jumlah2', function(){
        var angka = $(this).val();
        var estimasi = $(this).parents('.bapak-kelompok2').find('.input-estimasi2').val().split(',').join("").split('_').join("");
        var total = (angka * estimasi);
        $('.input-total2').inputmask({'alias': 'numeric', 'groupSeparator': ',',  'placeholder': '0'});
        $(this).parents('.bapak-kelompok2').find('.input-total2').val(total);
        // $('.masker').mask('000.000.000.000.000', {reverse: true,watchDataMask: true});

    });

    $(document).on('change', '.input-estimasi2', function(){
        var estimasi = $(this).val().split(',').join("").split('_').join("");
        var angka = $(this).parents('.bapak-kelompok2').find('.input-jumlah2').val();
        var total = (angka * estimasi);
        $('.input-estimasi2').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $('.input-total2').inputmask({'alias': 'numeric', 'groupSeparator': ',', 'placeholder': '0'});
        $(this).parents('.bapak-kelompok2').find('.input-total2').val(total);
        // $('.masker').mask('000.000.000.000.000', {reverse: true,watchDataMask: true});

    });

    $(document).on('keyup', '.input-lain2', function(){
        var value = $(this).val();
        $(this).parents('.bapak-kelompok2').find('.input-nama2').val(value);        
    });
</script>

<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_kelompok2"); //Fields wrapper
        var add_button = $(".add_field_button_kelompok2"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(".bapak-kelompok2:first").clone().appendTo(".input_fields_wrap_kelompok2")
                .find('.select-barang2').prop('name', 'kode[]').end()
                .find('.input-lain2').prop('name', '').prop('disabled', true).end()
                .find(".reset-kel2").val('').end()
                .find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_kelompok2");
            }
        });
        $(wrapper).on("click", ".remove_field_kelompok2", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.bapak-kelompok2').remove();
            x--;
        })
    });
</script>