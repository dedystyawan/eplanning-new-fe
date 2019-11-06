<style>
    ul.nav-second-level span.nav-label {
        color: tomato;
    }

    ul.nav-second-level li.active span.nav-label {
        font-weight: bold;
        color: #34495E;
    }

    ul.nav-second-level li.active {
        /* background-color:red !important; */
    }

    ul.nav-third-level span.nav-label {
        color: tomato;
    }

    ul.nav-third-level li.active span.nav-label {
        font-weight: bold;
        color: #34495E;
        background-color: white;
    }
</style>

<aside id="menu" class="hidden-print">
    <div id="navigation">
        <div class="profile-picture">
            <img src="<?= base_url(); ?>assets/images/e-planning4.png" style="width :160px; " class="img-cycle m-b" alt="logo" />
            <div class="stats-label text-color"><br />
                <span class="font-extra-bold font-uppercase">
                    <?= (!empty($_SESSION['pegawai']->nama)) ? $_SESSION['pegawai']->nama : ' '; ?>
                </span>
                <hr />
                <span class="font-extra-bold">
                    <?php
                    if ($_SESSION['user']->userrole == 1) {
                        echo "ADMIN";
                    } elseif ($_SESSION['user']->userrole == 2) {
                        echo "OTORISATOR";
                    } else {
                        echo "STAF PERENCANA";
                    }


                    ?>
                </span>
                <br />
                <span class="font-extra-bold">
                    <?= (!empty($_SESSION['pegawai']->unit_kerja)) ? $_SESSION['pegawai']->unit_kerja : ' '; ?>

                </span>
            </div>
        </div>




        <!-- ############################################################################################################## -->
        <!-- MENU -->
        <!-- ############################################################################################################## -->

        <ul class="nav" id="side-menu">
            <li <?php if ($this->uri->segment('1') == 'main' || $this->uri->segment('1') == '') {
                    echo 'class="active"';
                } ?>>
                <a href="<?= base_url(); ?>main">
                    <i class="pe pe-7s-home fa-fw"></i>
                    <span class="nav-label">HOME</span>
                </a>
            </li>
            <li <?php echo ($this->uri->segment('1') == 'rk') ? 'class="active"' : ''; ?>>
                <a href="#">
                    <i class="fa fa fa-university" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Korporasi</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li <?php echo ($this->uri->segment('2') == 'penyusunan') ? 'class="active"' : ''; ?>>
                        <a href="#">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            <span class="nav-label">Penyusunan</span>
                        </a>
                    </li>
                    <li <?php echo ($this->uri->segment('2') == 'dokumen-rk') ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url() ?>rk/dokumen-rk/<?= encrypt_decrypt("encrypt", 1); ?>">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="nav-label">Dokumen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($this->uri->segment('1') == 'rbb') ? 'class="active"' : ''; ?>>
                <a href="#">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Bisnis Bank</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">


                    <!-- <li <?php echo ($this->uri->segment('2') == 'rkf') ? 'class="active"' : ''; ?>> -->
                    <li>
                        <a href="<?= base_url() ?>rbb/rkf">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            <span class="nav-label">RKF</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-third-level" style="background-color:red">
                            <li>
                                <a href="<?= base_url() ?>rbb/rkf">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>rbb/rkf/show">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;RKF Aktif</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>rbb/rkf/aktivitas/show-report/<?= Date('m'); ?>">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;Monitoring</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>rbb/rkf/show-new">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;Create RKF</span>
                                </a>
                            </li>
                            <?php if($_SESSION['user']->userrole == 1){?>
                       		 <li>
                           		 <a href="<?= base_url(); ?>rekap/rekapisu">
                           		 <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                           		 <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;Rekap Rkf 2020</span>
                          		  </a>
                       		 </li>
                   			 <?php } ?>
                        </ul>
                    </li>
					

                    <li <?php echo ($this->uri->segment('2') == 'rkap') ? 'class="active"' : ''; ?>>
                        <a href="#">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            <span class="nav-label">RKAP</span><span></span>
                        </a>
                    </li>


                    <li <?php echo ($this->uri->segment('2') == 'rko') ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url() ?>rbb/rko">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <span class="nav-label" onclick="">RKO</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-third-level" style="background-color:red">
                            <li <?php echo ($this->uri->segment('3') == 'jarkan') ? 'class="active"' : ''; ?> style="background-color:red">
                                <a href="<?= base_url() ?>rbb/rko/jarkan">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;Jaringan Kantor</span>
                                </a>
                            </li>
                            <li  style="background-color:red">
                                <a href="<?= base_url() ?>rbb/rko/rkbu/">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;RKBU</span>
                                </a>
                            </li>
                            <li  style="background-color:red">
                                <a href="<?= base_url() ?>rbb/rko/bangren">
                                    <!-- <i class="fa fa-area-chart" aria-hidden="true"></i> -->
                                    <span class="nav-label">&nbsp;&nbsp;&nbsp;&nbsp;Pembangunan / Renovasi</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li <?php echo ($this->uri->segment('2') == 'dokumen-rbb') ? 'class="active"' : ''; ?>>
                        <a href="<?= base_url() ?>rbb/dokumen-rbb/<?= encrypt_decrypt("encrypt", 2); ?>">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="nav-label">Dokumen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($this->uri->segment('1') == 'rakb') ? 'class="active"' : ''; ?>>
                <a href="<?= base_url(); ?>rakb">
                    <i class="fa fa-money fa-fw"></i>
                    <span class="nav-label">Rencana Aksi Keuangan Berkelanjutan</span>
                </a>
            </li>


            <!-- ################################## -->

            <?php if ($_SESSION['user']->userrole == 1) { ?>
                <li <?php echo ($this->uri->segment('1') == 'admin') ? 'class="active"' : ''; ?>>
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span class="nav-label">Master</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li <?php echo ($this->uri->segment('2') == 'vcp') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vcp">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Core Plan</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vkud') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vkud">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Kebijakan Umum Direksi</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vstp') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vstp">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Status Program Kerja</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vsp') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vsp">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Skala Program Kerja</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vkp') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vkp">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Kategori Program Kerja</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vbsc') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vbsc">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">BSC</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vtla') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vtla">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Tindak Lanjut Audit</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vs') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vs">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Satuan</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vpb') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vpb">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Pos Biaya</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'vpjr') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/vpjr">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Jenis RKF</span>
                            </a>
                        </li>
                        <li <?php echo ($this->uri->segment('2') == 'changeproker') ? 'class="active"' : ''; ?>>
                            <a href="<?= base_url() ?>admin/changeproker">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="nav-label">Ganti Periode Proker</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>


            <!-- ############################################################################################################## -->
            <!-- ############################################################################################################## -->


            <li><a href="<?= base_url() . "login/logout" ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</aside>