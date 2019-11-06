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
                    <i class="fa fa-plus" aria-hidden="true"></i> FORM PEMBANGUNAN / RENOVASI
                    <span >      <?php if(!empty($this->session->flashdata('pesan'))){ ?>
                    <p style="text-align: justify; font-weight:bold; color:tomato">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                  <?php } ?></span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"> Pembangunan</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2">Renovasi</a></li>
                </ul>
                <div class="tab-content">
                    <!-- untuk kelompok 1 -->
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class=" col-md-12">
                                <form method="post" action="<?= base_url() ?>rbb/rko/bangren/insert" class="form-horizontal" autocomplete="off">
                                    <div class="input_fields_wrap_pembangunan">
                                        <div class="bapak-pembangunan">
                                            <input type="text" class="form-control" name="jenis[]" style="display:none" value="1">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group" >
                                                    <label class="control-label" style="text-align:left;">Uraian Proyek</label>
                                                        <input type="text" class="form-control input-uraian reset-pembangunan" name="uraian[]" placeholder="Isi Uraian Proyek" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 text-right">
                                                    <div class="form-group ini_button">
                                                        <a class="btn btn-info glyphicon glyphicon-plus add_field_button_pembangunan ubah_icon" style="margin-top:23px"></a>
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
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Kepemilikan Aset</label>
                                                        <select class="form-control" name="pemilik[]" style="width:90%" >
                                                            <option value="">Pilih</option>
                                                            <?php foreach($milikAset as $key => $dt){ ?>
                                                                <option value="<?=$key?>"><?=$dt;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Alamat Lokasi</label>
                                                        <input type="text" class="form-control input-alamat reset-pembangunan" name="alamat[]" style="max-width: 90%;" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Anggaran</label>
                                                <div class="input-group m-b"><span class="input-group-addon">Rp</span> <input type="text" name="anggaran[]" data-mask="000.000.000.000.000" class="form-control cleave1 input-anggaran reset-pembangunan" style="max-width: 90%;" > </div>
                                                        <!-- <input type="text" class="form-control input-anggaran reset-pembangunan" name="anggaran[]" style="max-width: 90%;"> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Jadwal</label>
                                                        <select class="form-control select-jadwal reset-pembangunan"  multiple="multiple" name="jadwal[0][]" style=" max-width: 100%;">
                                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                            <option value="<?=$i ?>"><?= parse_bulan_short($i);?></option>
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
                                <form method="post" action="<?= base_url() ?>rbb/rko/bangren/insert" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                <div class="input_fields_wrap_renovasi">
                                        <div class="bapak-renovasi">
                                            <input type="text" class="form-control" name="jenis[]" style="display:none" value="2">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group" >
                                                    <label class="control-label" style="text-align:left;">Uraian Proyek</label>
                                                        <input type="text" class="form-control input-uraian reset-renovasi" name="uraian[]" placeholder="Isi Uraian Proyek" reqiured>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 text-right">
                                                    <div class="form-group ini_button">
                                                        <a class="btn btn-info glyphicon glyphicon-plus add_field_button_renovasi ubah_icon" style="margin-top:23px"></a>
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
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Kepemilikan Aset</label>
                                                        <select class="form-control" name="pemilik[]" style="width:90%" >
                                                            <option value="">Pilih</option>
                                                            <?php foreach($milikAset as $key => $dt){ ?>
                                                                <option value="<?=$key?>"><?=$dt;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Alamat Lokasi</label>
                                                        <input type="text" class="form-control input-alamat reset-renovasi" name="alamat[]" style="max-width: 90%;" value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Anggaran</label>
                                                        <div class="input-group m-b"><span class="input-group-addon">Rp</span> <input type="text" name="anggaran[]" class="form-control input-anggaran reset-renovasi" style="max-width: 90%;" > </div>
                                                        <!-- <input type="number" class="form-control input-anggaran reset-renovasi" name="anggaran[]" style="max-width: 90%;"> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label" style="text-align:left;">Jadwal</label>
                                                        <select class="form-control select-jadwal2 reset-pembangunan"  multiple="multiple" name="jadwal[0][]" style=" max-width: 100%;">
                                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                            <option value="<?=$i ?>"><?= parse_bulan_short($i);?></option>
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

<script type="text/javascript">
    $(".select-jadwal").select2();
    $(".select-jadwal2").select2();
</script>

<script>
    // new Cleave('.cleave1', {
    //     numeral: true,
    // });
    // new Cleave('.cleave-2', {
    //     numeral: true,
    // });

    
</script>

<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_pembangunan"); //Fields wrapper
        var add_button = $(".add_field_button_pembangunan"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            $(".select-jadwal").select2("destroy");
            if (x < max_fields) { //max input box allowed
                $(".bapak-pembangunan:first").clone().appendTo(".input_fields_wrap_pembangunan")
                .find(".reset-pembangunan").val('').end()
                .find(".select-jadwal").prop('name','jadwal['+x+'][]').end()
                .find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_pembangunan");
                x++; //text box incrementß
            }
            $(".select-jadwal").select2();
            $(this).parents('.bapak-kelompok1').find(".select-jadwal").select2('val', '');
            $('.input-anggaran').mask('000.000.000.000.000', {reverse: true});
        });
        $(wrapper).on("click", ".remove_field_pembangunan", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.bapak-pembangunan').remove();
            x--;
        })

        $('.input-anggaran').mask('000.000.000.000.000', {reverse: true});
    });
</script>



<script>

    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_renovasi"); //Fields wrapper
        var add_button = $(".add_field_button_renovasi"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            $(".select-jadwal2").select2("destroy");
            if (x < max_fields) { //max input box allowed
                $(".bapak-renovasi:first").clone().appendTo(".input_fields_wrap_renovasi")
                .find(".reset-renovasi").val('').end()
                .find(".select-jadwal2").prop('name','jadwal['+x+'][]').end()
                .find(".ubah_icon").removeClass().addClass("btn btn-danger glyphicon glyphicon-remove remove_field_renovasi");
                x++; //text box increment
            }
            $('.input-anggaran').mask('000.000.000.000.000', {reverse: true});
            $(".select-jadwal2").select2();
            $(this).parents('.bapak-kelompok2').find(".select-jadwal2").select2('val', '');
        });
        $(wrapper).on("click", ".remove_field_renovasi", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.bapak-renovasi').remove();
            x--;
        })
        $('.input-anggaran').mask('000.000.000.000.000', {reverse: true});
    });
</script>



