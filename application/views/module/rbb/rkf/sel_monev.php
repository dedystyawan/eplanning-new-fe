<?php $this->load->view('module/rbb/rkf/detail_rkf'); ?>
<!-- ///// section MONEV ///// -->
<section id="monev">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="hpanel hgreen">
                <div class="panel-heading">
                    <h3><strong>Bulan Laporan Monev</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">
                            <select id="bulanSelect" class="form-control m-b" name="bulan">
                                <option value=" ">-- Pilih Bulan --</option>
                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                    <option value="<?= $i; ?>"><?= parse_bulan($i); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-4">
                            <a id="a_link" onclick="openLink()" class="btn btn-info" style="width:100%">Ok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function openLink() {
        var bulan = document.getElementById('bulanSelect').value;
        if (bulan == " ") {
            alert('pilih bulan dahulu');
        } else {
            window.open('<?= base_url() ?>rbb/rkf/monev/show/<?= $data->rkf_id; ?>/' + bulan, '_self');
        }
    }
</script>