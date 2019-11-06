<?php
$dataPembukaan = json_decode(file_get_contents(IP_API . "/jaringan/dashboard/pembukaan/" . (date("Y") + 1)));
if (!empty($dataPembukaan)) {
    $jumlahPembukaan = count($dataPembukaan);
} else {
    $jumlahPembukaan = 0;
}


$dataPerubahan = json_decode(file_get_contents(IP_API . "/jaringan/dashboard/perubahan/" . (date("Y") + 1)));
if (!empty($dataPerubahan)) {
    $jumlahPerubahan = count($dataPerubahan);
} else {
    $jumlahPerubahan = 0;
}


$dataRelokasi = json_decode(file_get_contents(IP_API . "/jaringan/dashboard/relokasi/" . (date("Y") + 1)));
if (!empty($dataRelokasi)) {
    $jumlahRelokasi = count($dataRelokasi);
} else {
    $jumlahRelokasi = 0;
}


// $dataPenutupan = json_decode(file_get_contents(IP_API . "/jaringan/dashboard/penutupan/" . (date("Y") + 1)));
$dataPenutupan = json_decode(file_get_contents("http://10.64.6.60:8008/jaringan/dashboard/penutupan/2020"));
if (!empty($dataPenutupan)) {
    $jumlahPenutupan = count($dataPenutupan);
} else {
    $jumlahPenutupan = 0;
}


// echo "<pre>";
// print_r($dataPembukaan);
// print_r($jumlahPembukaan);
// echo "</pre>";
?>


<style>
    .proker:hover {
        background-color: #7cb9c4;
        font-weight: bold;
        color: #fff;
        cursor: pointer;

    }

    #table-rkf {
        font-size: 11px;
    }
</style>

<div class="row">

    <div class="col-lg-12">
        <a href="<?= base_url(); ?>rbb/rko/jarkan/input" class='btn btn-primary pull-right'>LIHAT DATA</a>
    </div>
</div>





<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="alert alert-info" style="text-align:center;">
                Dashboard Jaringan Kantor
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Aktivitas</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pembukaan</td>
                            <td><?= $jumlahPembukaan; ?></td>
                        </tr>
                        <tr>
                            <td>Perubahan</td>
                            <td><?= $jumlahPerubahan; ?></td>
                        </tr>
                        <tr>
                            <td>Relokasi</td>
                            <td><?= $jumlahRelokasi; ?></td>
                        </tr>
                        <tr>
                            <td>Penutupan</td>
                            <td><?= $jumlahPenutupan; ?></td>
                        </tr>
                    </tbody>
                </table>
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
    $(document).ready(function() {
        var groupColumn = 2;
        var table = $('#example').DataTable({

        });


    });
</script>


<!-- 
<table id="example" class="table  table-bordered table-hover" style="width:100%" >
                    <thead>
                        <tr>
                            <th style="text-align:center; vertical-align:middle;width:10%">Aktivitas</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Jan</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Feb</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Mar</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Apr</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Mei</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Jun</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Jul</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Ags</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Sep</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Okt</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Nov</th>
                            <th style="text-align:center; vertical-align:middle;width:5%">Des</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pembukaan</td>
                            <td>20</td>
                            <td>42</td>
                            <td>25</td>
                            <td>82</td>
                            <td>29</td>
                            <td>52</td>
                            <td>32</td>
                            <td>22</td>
                            <td>125</td>
                            <td>25</td>
                            <td>25</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>Perubahan Status</td>
                            <td>20</td>
                            <td>42</td>
                            <td>25</td>
                            <td>82</td>
                            <td>29</td>
                            <td>52</td>
                            <td>32</td>
                            <td>22</td>
                            <td>125</td>
                            <td>25</td>
                            <td>25</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>Relokasi</td>
                            <td>20</td>
                            <td>42</td>
                            <td>25</td>
                            <td>82</td>
                            <td>29</td>
                            <td>52</td>
                            <td>32</td>
                            <td>22</td>
                            <td>125</td>
                            <td>25</td>
                            <td>25</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>Penutupan</td>
                            <td>20</td>
                            <td>42</td>
                            <td>25</td>
                            <td>82</td>
                            <td>29</td>
                            <td>52</td>
                            <td>32</td>
                            <td>22</td>
                            <td>125</td>
                            <td>25</td>
                            <td>25</td>
                            <td>24</td>
                        </tr>
                    </tbody>
                </table> -->