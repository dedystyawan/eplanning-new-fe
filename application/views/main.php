<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="<?=base_url(); ?>assets/images/e-planning4.png" sizes="50x50"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?=APP_NAME; ?> | <?=$var_title; ?></title>
<!-- load css dan js -->
    <?php $this->load->view("layout/cssdanjs"); ?>



</head>
<?php if (isset($var_hide_side_bar)) {
  if($var_hide_side_bar == 1) {?>
  <body class="fixed-navbar fixed-sidebar hide-sidebar " style="width:100%;">
<?php }}else{ ?>
  <body class="fixed-navbar fixed-sidebar " style="width:100%;">
<?php } ?>

<?php $this->load->view("layout/splash"); ?>

<!-- header -->
      <div id="header" class="hidden-print">
          <div class="color-line"></div>
          <div id="logo" class="light-version">
              <span><?=APP_NAME; ?></span>
          </div>
          <nav role="navigation">
              <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
              <div class="small-logo">
                  <span class="text-primary"><?=APP_NAME; ?></span>
              </div>
              <div class="navbar-center"></div>
              <div class="navbar-right">
                  <ul class="nav navbar-nav no-borders">
                      <li class="dropdown">
                          <a href="<?=base_url(); ?>login/logout" >
                              <i class="pe-7s-upload pe-rotate-90"></i>
                          </a>
                      </li>
                  </ul>
              </div>
          </nav>
      </div>


<!-- menu -->
      <?php $this->load->view("layout/menu"); ?>

<!-- content/section-->
      <!-- wraper yg ada background image -->
      <!-- <div id="wrapper" style="background-image: url(<?=base_url(); ?>assets/images/pattern.png)"> -->
      <!-- wraper yang tidak ada background image -->
      <div id="wrapper">
          <div class="normalheader transition animated fadeIn small-header hidden-print">
              <div class="hpanel">
                  <div class="panel-body">
                      <h2 class="font-light m-b-xs">
                          <?=$var_title; ?>
                      </h2>
                      <small><?=$var_subtitle; ?></small>
                  </div>
              </div>
          </div>
<!-- content utama -->
          <div class="content ">
              <div class="row">
                  <div class="col-lg-12">
                      <?php $this->load->view("module/".$var_module,isset($var_other)?$var_other:array());?>
                  </div>
              </div>
          </div>

<!-- footer -->
          <?php $this->load->view("layout/footer"); ?>

      </div>
  </body>

<script type="text/javascript">
$('.datapicker2').datepicker();

$('#range').datepicker();
$("#range").on("changeDate", function(event) {

    $("#my_hidden_input").val(
        $("#range").datepicker('getFormattedDate')
    )
});
</script>




</html>

