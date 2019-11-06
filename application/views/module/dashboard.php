<?php
$dataChart     = $this->rmodel->bentuk_data_grafik_pie();
$periode       = json_decode(file_get_contents(IP_API . "/master/perioderkf/" . date("Y"), false));
?>

<!-- Main Wrapper -->
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Selamat Datang di Aplikasi e-Planning Bank Jateng
            </h2>
            <p>
                Aplikasi <strong>e-Planning</strong> merupakan organizer dokumen perencanaan strategis Bank Jateng.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    DASHBOARD
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>