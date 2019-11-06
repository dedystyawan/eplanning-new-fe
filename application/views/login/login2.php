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

<!-- style untuk background -->
    <style>
    .highlight {
      display: block;
      position: relative;
      background-position: center;
      height: 100%;
      border: 1px solid gren;
      overflow: hidden;
      position: relative;
    }



    .animatedBackground{
      width: 100%;
      height: 100%;
      transform: scale(1.3);
      animation: zoomin 20s ;
      background-size: cover;
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
    }

    @keyframes zoomin {
        0% {
          opacity: 1;
          background-size: cover;
          transform: scale(1);
        }
        5% {
          opacity: 1;
        }
        98% {
            opacity: 1;
        }
        100% {
            opacity: 1;
            transform: scale(1.3);
        }
    }
    </style>



<!-- style untuk floating label input -->
    <style>


    /****  floating-Lable style start ****/
    .floating-label {
      position:relative;
      margin-bottom:20px;
    }
    .floating-input , .floating-select {
      font-size:14px;
      padding:4px 4px;
      display:block;
      width:100%;
      height:50px;
      background-color: ;
      border: 1px solid #CCF381;
      border-radius: 8px;
      /* border-bottom:1px solid #757575; */
    }

    .floating-input:focus , .floating-select:focus {
         outline:none;
         border-bottom:2px solid #11bd20;
    }

    label {
      color:#999;
      font-size:18px;
      font-weight:normal;
      position:absolute;
      pointer-events:none;
      left:5px;
      top:5px;
      transition:0.2s ease all;
      -moz-transition:0.2s ease all;
      -webkit-transition:0.2s ease all;
    }

    .floating-input:focus ~ label, .floating-input:not(:placeholder-shown) ~ label {
      top:-18px;
      font-size:14px;
      color:#11bd20;
    }

    .floating-select:focus ~ label , .floating-select:not([value=""]):valid ~ label {
      top:-18px;
      font-size:14px;
      color:#11bd20;
    }

    /* active state */
    .floating-input:focus ~ .bar:before, .floating-input:focus ~ .bar:after, .floating-select:focus ~ .bar:before, .floating-select:focus ~ .bar:after {
      width:50%;
    }

    *, *:before, *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .floating-textarea {
       min-height: 30px;
       max-height: 260px;
       overflow:hidden;
      overflow-x: hidden;
    }

    /* highlighter */
    .highlightinput {
      position:absolute;
      height:50%;
      width:100%;
      top:15%;
      left:0;
      pointer-events:none;
      opacity:0.5;
    }

    /* active state */
    .floating-input:focus ~ .highlightinput , .floating-select:focus ~ .highlightinput {
      -webkit-animation:inputHighlighter 0.3s ease;
      -moz-animation:inputHighlighter 0.3s ease;
      animation:inputHighlighter 0.3s ease;
    }

    /* animation */
    @-webkit-keyframes inputHighlighter {
    	from { background:#11bd20; }
      to 	{ width:0; background:transparent; }
    }
    @-moz-keyframes inputHighlighter {
    	from { background:#11bd20; }
      to 	{ width:0; background:transparent; }
    }
    @keyframes inputHighlighter {
    	from { background:#11bd20; }
      to 	{ width:0; background:transparent; }
    }

    /****  floating-Lable style end ****/

    </style>



</head>
<body class="blank" >
 <?php $this->load->view("layout/splash"); ?>




<div class="highlight">
  <div class="animatedBackground" style="background-image:url(<?=base_url(); ?>assets/images/lawangsewu2.jpg);"></div>

  <div class="mylogin" style="position:absolute;bottom:20%; right:10%; ">
      <div class="col-md-6">
          <div class="hpanel hgreen" style="width:343px; height:400px; ">
            <div class="panel-heading" >
            </div>
            <div class="panel-body" style="border-top-width:3px; ; background-color:#f7f7f7">


              <div >
                <form autocomplete="off" class="" action="index.html" method="post">

                  <div class="floating-label">
                    <input class="floating-input" required="" value="" name="user_name" type="text" placeholder=" ">
                    <span class="highlightinput"></span>
                    <label>Text</label>
                  </div>




                  <div class="floating-label">
                    <input class="floating-input" required="" value="" name="user_password" type="password" placeholder=" ">
                    <span class="highlightinput"></span>
                    <label>Password</label>
                  </div>

                  <div class="" >
                    <button type="submit" class="btn btn-success btn-block" name="submit" style="border-radius:8px">Login</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
      </div>

  </div>


</div>


<script src="<?=base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/iCheck/icheck.min.js"></script>
<script src="<?=base_url(); ?>assets/vendor/sparkline/index.js"></script>

<script src="<?=base_url(); ?>assets/scripts/homer.js"></script>



</body>
</html>
