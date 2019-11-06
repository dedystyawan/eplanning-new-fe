<?php $this->load->view('module/rbb/rkf/detail_rkf'); ?>
<!-- //////////  section BD AKTIVITAS ////////// -->
<section id="bd-aktivitas">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="hpanel hgreen">
                <div class="panel-heading">
                    <h3><strong>Input Breakdown Aktivitas</strong></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?= base_url() ?>rbb/rkf/aktivitas/insert" method="post" autocomplete="off">
                        <input type="text" name="prokerId" value="<?= $data->rkf_id; ?>" style="display:none;">
                        <div class="input_fields_wrap" id="input">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="control-label">Bulan</label>
                                    <select class="form-control m-b" name="bulan[]">
                                        <?php
                                        $end = end($data->rkf_jadwal);
                                        for ($i = 1; $i <= $end; $i++) { ?>
                                            <option value="<?= $i ?>"><?php echo parse_bulan_short($i); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label">Aktivitas</label>
                                    <input type='text' class='form-control' name='aktivitas[]'>
                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label">Target Pencapaian</label>
                                    <input type="text" class="form-control" name="target[]" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label">PIC</label>
                                    <div class="row">
                                        <select class="form-control selectdua" multiple="multiple" name="pic[0][]" style="width:100%">
                                            <?php
                                            if (!empty($kamusPegawai)) {
                                                foreach ($kamusPegawai as $keyPeg => $dtPeg) { ?>
                                                    <option value="<?= $keyPeg; ?>"><?= $dtPeg; ?></option>;
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 " style="text-align:center; padding-top:4px">
                                    <label for="" style="opacity:0">label</label>
                                    <button type="button" name="button" class="btn btn-info add_field_button" style="font-size:10px"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="text-align:center">
                                <button type="submit" class="btn btn-success button_simpan" name="submit">SIMPAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="hpanel hgreen">
            <div class="panel-heading">
                <h3><strong>Data Breakdown Aktivitas</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10%; text-align:center">Bulan</th>
                                <th style="width:25%; text-align:center">Aktivitas</th>
                                <th style="width:25%; text-align:center">Target</th>
                                <th style="width:25%; text-align:center">PIC</th>
                                <th style="width:10%; text-align:center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataBD = json_decode(file_get_contents(IP_API . '/aktivitas/' . $data->rkf_id));
                            usort($dataBD, function ($a, $b) {
                                return $a->aktivitas_bulan - $b->aktivitas_bulan;
                            });
                            ?>
                            <?php foreach ($dataBD as $dtbd) { ?>
                                <tr class="trnya" data-aktid="<?= $dtbd->aktivitas_id ?>">
                                    <td class="tdbulan" style="text-align:center">
                                        <span class="span-bulan caption"><?php cetak(parse_bulan_short($dtbd->aktivitas_bulan)); ?></span>
                                        <select class="form-control m-b field-bulan editor" name="bulan" style="display:none">
                                            <?php
                                                $end = end($data->rkf_jadwal);
                                                for ($i = 1; $i <= $end; $i++) { ?>
                                                <option value="<?= $i ?>" data-namabulan="" <?php echo ($i == $dtbd->aktivitas_bulan) ? "selected" : "" ?>><?= parse_bulan_short($i); ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td class="tdnama"><span class="span-nama caption"><?php cetak($dtbd->aktivitas_nama) ?></span>
                                        <input type="text" name="aktivitas" class="form-control field-nama editor" value="<?= $dtbd->aktivitas_nama; ?>" style="display:none">
                                    </td>
                                    <td class="tdtarget">
                                        <span class="span-target caption"><?php cetak($dtbd->aktivitas_target); ?></span>
                                        <input type="text" name="target" class="form-control field-target editor" value="<?= $dtbd->aktivitas_target; ?>" style="display:none">
                                    </td>
                                    <td class="tdpic" style="text-align:left">
                                        <ul class="ul-target caption" style="list-style:none; padding:0">
                                            <?php if (!empty($dtbd->aktivitas_pic)) {
                                                    foreach ($dtbd->aktivitas_pic as $dtPic) { ?>
                                                    <li>
                                                        <?php
                                                                    $nama = $kamusPegawai[$dtPic->pic] ?? null;
                                                                    cetak($nama);
                                                                    ?>
                                                    </li>
                                            <?php }
                                                } ?>
                                        </ul>
                                        <div class="editor" style="display:none">
                                            <select class="form-control selectdua editor" multiple="multiple" name="pic[]">
                                                <?php
                                                    if (!empty($kamusPegawai)) {
                                                        foreach ($kamusPegawai as $keyPeg => $dtPeg) { ?>
                                                        <option value="<?= $keyPeg; ?>" <?php if (array_search($keyPeg, array_column($dtbd->aktivitas_pic, 'pic')) !== false) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?= $dtPeg; ?></option>;
                                                <?php }
                                                    } ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info button_edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger button_delete " data-aktid="<?= $dtbd->aktivitas_id ?>" data-aktnama="<?= $dtbd->aktivitas_nama ?>" name="button"><i class="fa fa-trash"></i></button>
                                        <button type="button" class="btn btn-success button_update" data-aktid="<?= $dtbd->aktivitas_id ?>" style="display:none"><i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-warning button_batal" style="display:none"><i class="fa fa-times"></i></button>
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
    $(document).on("click", ".button_delete", function() {
        var aktId = $(this).data("aktid");
        var aktNama = $(this).data("aktnama")
        var urlnya = "<?= base_url() ?>rbb/rkf/aktivitas/delete";
        console.log(aktId);
        console.log(aktNama);
        console.log(urlnya);
        swal({
                title: "Hapus data aktivitas?",
                text: 'Data yang dihapus: "' + aktNama + '"',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus data!"
            },
            function() {
               
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: aktId
                    },
                    url: urlnya,
                    success: function(data) {
                        if (data == "deleted") {
                            $("tr[data-aktid='" + aktId + "']").fadeOut("slow", 'linear', function() {
                                $(this).remove();
                            });
                            // alert("haha");
                        }
                    }
                });
            });


    });

    $(document).on("click", ".button_edit", function(e) {

        e.preventDefault();
        $(this).parents(".trnya").find("td.tdbulan").find("span.caption").hide();
        $(this).parents(".trnya").find("td.tdnama").find("span.caption").hide();
        $(this).parents(".trnya").find("td.tdtarget").find("span.caption").hide();
        $(this).parents(".trnya").find("td.tdpic").find("ul.caption").hide();
        $(this).parents(".trnya").find("td.tdbulan").find("select.editor").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdnama").find("input.editor").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdtarget").find("input.editor").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdpic").find("div.editor").fadeIn("fast");

        $(this).hide();
        $(this).siblings("button.button_batal").fadeIn();
        $(this).siblings("button.button_update").fadeIn();
        $(this).siblings("button.button_delete").hide();
        $(this).parents(".trnya").css({
            "background-color": "#fbfbfb",
            "box-shadow": "0px 2px 18px 0px rgba(0, 0, 0, 0.5)"
        });


    });

    $(document).on("click", ".button_batal", function() {
        $(this).parents(".trnya").find("td.tdbulan").find("span.caption").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdnama").find("span.caption").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdtarget").find("span.caption").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdpic").find("ul.caption").fadeIn("fast");
        $(this).parents(".trnya").find("td.tdbulan").find("select.editor").hide();
        $(this).parents(".trnya").find("td.tdnama").find("input.editor").hide();
        $(this).parents(".trnya").find("td.tdtarget").find("input.editor").hide();
        $(this).parents(".trnya").find("td.tdpic").find("div.editor").hide();

        $(this).hide();
        $(this).siblings("button.button_update").hide();
        $(this).siblings("button.button_delete").fadeIn();
        $(this).siblings("button.button_edit").fadeIn();
        $(this).parents(".trnya").css({
            "background-color": "",
            "box-shadow": ""
        });

    });

    $(document).on("click", "button.button_update", function() {
        var thisnya = $(this);
        var aktId = $(this).data("aktid");
        var bulan = $(this).parents(".trnya").find("td.tdbulan").find("select.editor").val();
        var aktivitas = $(this).parents(".trnya").find("td.tdnama").find("input.editor").val();
        var target = $(this).parents(".trnya").find("td.tdtarget").find("input.editor").val();
        var pic = $(this).parents(".trnya").find("td.tdpic").find("div.editor").find("select.editor").val();
        var urlnya = "<?= base_url() ?>rbb/rkf/aktivitas/edit";
        var bulanNama = $(this).parents(".trnya").find("td.tdbulan").find("select.editor").children("option:selected").text();
        var picNama = $(this).parents(".trnya").find("td.tdpic").find("div.editor").find("select.editor :selected");


        // var picNamaSusun = "<ul style='list-style-type: disc;text-align:left'>";
        var picNamaSusun = "";
        picNama.each(function(index, value) {
            var o = $(this);
            console.log(o.text());
            picNamaSusun += "<li>";
            picNamaSusun += o.text();
            picNamaSusun += "</li>";
        });
        // picNamaSusun += "</ul>";


        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: {
                id: aktId,
                bulan: bulan,
                aktivitas: aktivitas,
                target: target,
                pic: pic
            },
            url: urlnya,
            success: function(data) {
                if (data = "updated") {
                    thisnya.parents(".trnya").find("td.tdbulan").find("span.caption").fadeIn("fast").html(bulanNama);
                    thisnya.parents(".trnya").find("td.tdnama").find("span.caption").fadeIn("fast").html(aktivitas);
                    thisnya.parents(".trnya").find("td.tdtarget").find("span.caption").fadeIn("fast").html(target);
                    thisnya.parents(".trnya").find("td.tdpic").find("ul.caption").fadeIn("fast").html(picNamaSusun);
                    thisnya.parents(".trnya").find("td.tdbulan").find("select.editor").hide();
                    thisnya.parents(".trnya").find("td.tdnama").find("input.editor").hide();
                    thisnya.parents(".trnya").find("td.tdtarget").find("input.editor").hide();
                    thisnya.parents(".trnya").find("td.tdpic").find("div.editor").hide();

                    thisnya.hide();
                    thisnya.siblings("button.button_batal").hide();
                    thisnya.siblings("button.button_delete").fadeIn();
                    thisnya.siblings("button.button_edit").fadeIn();
                    thisnya.parents(".trnya").css({
                        "background-color": "",
                        "box-shadow": ""
                    });

                }
            }
        });
    });
</script>




<script>
    $(".selectdua").select2({
        width: "element"
    });
    $(document).ready(function() {

        var index_pic = 1;
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $("#input"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            $(".selectdua").select2("destroy");
            if (x < max_fields) { //max input box allowed
                var content = '<div class="row">';
                content += '<div class="col-lg-2">';
                content += '<label class="control-label">Bulan</label>';
                content += '<select class="form-control m-b" name="bulan[]">';
                content += '<?php $end = end($data->rkf_jadwal);
                            for ($i = 1; $i <= $end; $i++) { ?>';
                content += '<option value="<?= $i ?>"><?= parse_bulan_short($i); ?></option>';
                content += '<?php } ?>';
                content += '</select>';
                content += '</div>';
                content += '<div class="col-lg-3" >';
                content += '<label class="control-label">Aktivitas</label>';
                content += '<input type="text" class="form-control" name="aktivitas[]">';
                content += '</div>';
                content += '<div class="col-lg-3">';
                content += '<label class="control-label">Target</label>';
                content += '<input type="text" class="form-control" name="target[]" value="">';
                content += '</div>';
                content += '<div class="col-lg-3"  >';
                content += '<label class="control-label" >PIC</label>';
                content += '<div class="row">';
                content += "<select class='form-control selectdua' multiple='multiple' name='pic[" + index_pic + "][]'  style='width:100%'>";
                content += "<?php if (!empty($kamusPegawai)) {
                                foreach ($kamusPegawai as $keyPeg => $dtPeg) { ?>";
                content += "<option value='<?= $keyPeg; ?>'><?= $dtPeg; ?></option>;";
                content += "<?php }
                            } ?>";
                content += "</select>";
                content += "</div>";

                content += '</div>';

                content += '<div class="col-lg-1"><label class="control-label " style="opacity:0">PIC</label><br><button type="button" class="remove_field btn btn-danger"><i class="fa fa-trash"></i></button></div>';
                content += '</div>';

                index_pic++;
                x++; //text box increment
                console.log(x);
                $(wrapper).append(content); //add input box
            }
            $(".selectdua").select2();
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });
</script>