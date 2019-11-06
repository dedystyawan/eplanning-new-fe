<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Rakb extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user'])){
          redirect(base_url('/login'));
        }
    }

    public function index(){
      $var = array();
      $var['var_title'] = "Dashboard";
      $var['var_subtitle'] = "Selamat Datang di ".APP_NAME;
      $var['var_breadcrumb'] = array();
      $var['gcrud'] = 0;
      $var['module'] = "";

      // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
      $var['var_module'] = "rakb/dashboard";
      // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
      $var['var_other'] = array();
      $this->load->view('main',$var);
    }




}
