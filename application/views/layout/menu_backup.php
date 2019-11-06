<aside id="menu" class="hidden-print" >
    <div id="navigation">
        <div class="profile-picture">
          <img src="<?=base_url(); ?>assets/images/e-planning.jpeg" style="width :130px" class="img-cycle m-b" alt="logo" style="height: 100px;" />
          <div class="stats-label text-color"><br/>
              <span class="font-extra-bold font-uppercase">
                  <?=(!empty($_SESSION['pegawai']->nama)) ? $_SESSION['pegawai']->nama:' ' ; ?>
              </span>
              <hr/>
              <span class="font-extra-bold">
                  <?php
                       if ($_SESSION['user']->userrole == 1) {
                            echo "ADMIN";
                        }elseif ($_SESSION['user']->userrole == 2) {
                            echo "OTORISATOR";
                        }else {
                            echo "STAFF PERENCANA";
                                                }


                  ?>
              </span>
              <br/>
              <span class="font-extra-bold">
                <?=(!empty($_SESSION['pegawai']->unit_kerja)) ? $_SESSION['pegawai']->unit_kerja:' ' ; ?>
              </span>
          </div>
        </div>
		    <ul class="nav" id="side-menu">
            <li >
                <a href="<?=base_url(); ?>main">
                    <i class="pe pe-7s-home fa-fw"></i>
                    <span class="nav-label">HOME</span>
                </a>
            </li>

  <!-- ############################################################################################################## -->
  <!-- ############################################################################################################## -->

        <!-- admin -->
            <?php if ($_SESSION['user']->userrole == 1) {?>
            <li >
                <a href="#">
                    <i class="fa fa fa-university" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Korporasi</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li >
                        <a href="#">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            <span class="nav-label">Penyusunan</span>
                        </a>
                    </li>
                    <li >
                        <?php $type= $this->gmodel->encrypt_decrypt("encrypt",1); ?>
                        <a href="<?=base_url()?>admin/vdoc/<?=$type;?>">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="nav-label">Dokumen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="#">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Bisnis Bank</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-third-level">
                    <li >
                        <a href="#">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            <span class="nav-label">RKF</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li >
                                <a href="<?=base_url(); ?>admin/rkfgrid">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    <span class="nav-label">Data</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?=base_url(); ?>admin/report">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                    <span class="nav-label">Laporan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="#">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <span class="nav-label">RKO</span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li >
                               <a href="#">
                                  <i class="fa fa-list-ul" aria-hidden="true"></i>
                                  <span class="nav-label">Data</span>
                               </a>
                            </li>
                            <li >
                                <a href="#">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                    <span class="nav-label">Laporan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <?php $type= $this->gmodel->encrypt_decrypt("encrypt",2); ?>
                        <a href="<?=base_url()?>admin/vdoc/<?=$type;?>">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="nav-label">Dokumen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="<?=base_url(); ?>rakb/user/dashboardrakb">
                    <i class="fa fa-money fa-fw"></i>
                    <span class="nav-label">RAKB</span>
                </a>
            </li>
            <li >
                <a href="#">
                  <i class="fa fa-cogs"></i>
                  <span class="nav-label">Master</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url()?>admin/vcp">
                            <i class="fa fa-codepen" aria-hidden="true"></i>
                            <span class="nav-label">Core Plan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vkud">
                          <i class="fa fa-user-plus" aria-hidden="true"></i>
                          Kebijakan Umum Direksi
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vstp">
                          <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                          Status Program Kerja
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vsp">
                          <i class="fa fa-pie-chart" aria-hidden="true"></i>
                          Skala Program Kerja
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vkp">
                          <i class="fa fa-file" aria-hidden="true"></i>
                          Kategori Program Kerja
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vbsc">
                          <i class="fa fa-money" aria-hidden="true"></i>
                          BSC
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vtla">
                          <i class="fa fa-arrows" aria-hidden="true"></i>
                          Tindak Lanjut Audit
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vs">
                          <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                          Satuan
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vpb">
                          <i class="fa fa-dollar" aria-hidden="true"></i>
                          <span class="nav-label">Pos Biaya</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/vpjr">
                          <i class="fa fa-th-list" aria-hidden="true"></i>
                          <span class="nav-label">Jenis RKF</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/changeproker">
                          <i class="fa fa-th-list" aria-hidden="true"></i>
                          <span class="nav-label">Ganti Periode Proker</span>
                        </a>
                    </li>
                </ul>
            </li>

            <?php } ?>
        <!-- admin end -->

  <!-- ############################################################################################################## -->
  <!-- ############################################################################################################## -->

        <!-- User -->
            <?php if($_SESSION['user']->userrole == 3){ ?>
            <li >
                <a href="#">
                    <i class="fa fa fa-university" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Korporasi</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li >
                        <a href="#">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            <span class="nav-label">Penyusunan</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>rbb/user/vdoc/<?=$this->gmodel->encrypt_decrypt("encrypt",1);?>">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="nav-label">Dokumen</span>
                        </a>
                   </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Bisnis Bank</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-third-level">
                  <li >
                      <a href="#">
                          &emsp;&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i>
                          <span class="nav-label" style=" color:tomato;">RKAP</span><span ></span>
                      </a>
                  </li>
                    <li >
                        <a href="<?=base_url()?>rbb/rkf">
                            &emsp;&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i>
                            <span class="nav-label" style="color:tomato;">RKF</span><span ></span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url() ?>rbb/rko">
                            &emsp;&nbsp;<i class="fa fa-area-chart" aria-hidden="true"></i>
                            <span class="nav-label" style=" color:tomato;">RKO</span><span ></span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>rbb/user/vdoc/<?=$this->gmodel->encrypt_decrypt("encrypt",2);?>">
                          &emsp;&nbsp;  <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <span class="nav-label" style=" color:tomato;">Dokumen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="<?=base_url(); ?>rakb/user/dashboardrakb">
                    <i class="fa fa-money fa-fw"></i>
                    <span class="nav-label">Rencana Aksi Keuangan Berkelanjutan</span>
                </a>
            </li>
            <?php } ?>


  <!-- ############################################################################################################## -->
  <!-- ############################################################################################################## -->

        <!-- Kadiv -->
            <?php if($_SESSION['user']->userrole == 2){ ?>
            <li >
                <a href="#">
                    <i class="fa fa fa-university" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Korporasi</span><span ></span>
                </a>
            </li>
            <li >
                <a href="#">
                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                    <span class="nav-label">Rencana Bisnis Bank</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-third-level">
                    <li >
                        <a href="<?=base_url();?>rbb/user/dashboardRkf">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            <span class="nav-label">RKF</span><span ></span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <span class="nav-label">RKO</span><span ></span>
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>rbb/user/vdoc/<?=$this->gmodel->encrypt_decrypt("encrypt",2);?>">
                           <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                           <span class="nav-label">Dokumen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="<?=base_url(); ?>rakb/user/dashboardrakb">
                    <i class="fa fa-money fa-fw"></i>
                    <span class="nav-label">RAKB</span>
                </a>
            </li>
          <?php } ?>

  <!-- ############################################################################################################## -->
  <!-- ############################################################################################################## -->


            <li><a href="<?=base_url()."login/logout"?>"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</aside>
