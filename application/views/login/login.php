<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?=APP_NAME; ?> | Login</title>

    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.css" />

    <link rel="stylesheet" href="<?=base_url(); ?>assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>assets/styles/style.css">

    <style>
        body {
            background-image: url(<?=base_url();
            ?>assets/images/pattern2.png);
        }
    </style>

</head>
<body class="blank" >
<?php $this->load->view("layout/splash"); ?>
<div class="color-line"></div>

<div class="login-container" >
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3><strong><?=APP_NAME; ?></strong></h3>
                <small>Silakan masukkan Username dan password untuk login.</small>
            </div>
            <div class="hpanel" >
                <div class="panel-body">
                  <?php if(!empty($this->session->flashdata('pesan'))){ ?>
                    <p style="text-align: justify;" class="alert alert-danger">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                  <?php } ?>
             
                    <form action="<?=base_url()?>main/login" id="loginForm" method="post" autocomplete="off">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" required="" placeholder="Masukkan username anda"  value="" name="user_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" required=""  placeholder="Masukkan kata sandi anda"  value="" name="user_password" class="form-control" autocomplete="off" />
                        </div>

                        <button class="btn btn-success btn-block" name="login" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong><?=APP_NAME; ?></strong><br/> Copyright <?=date("Y"); ?> | <a href="http://bankjateng.co.id" target="_blank">Bank Jateng</a>
        </div>
    </div>
</div>





<script src="<?=base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/sparkline/index.js"></script>

<script src="<?=base_url(); ?>assets/scripts/homer.js"></script>



</body>
</html>
