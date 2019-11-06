<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends CI_Controller {

    public function __construct(){
        // session_start();
        parent::__construct();
        $this->load->library('session');
        if(!isset($_SESSION['user'])){
          redirect(base_url('Login'));
      }
    }



    public function index(){
      $var = array();
      $var['var_title'] = "RENCANA KERJA FUNGSI – DASHBOARD";
      $var['var_subtitle'] = "";
      $var['var_breadcrumb'] = array();
      $var['module'] = "";
      $var['var_module'] = "dashboard";
      $var['var_other'] = array();
      $this->load->view('main',$var);
    }





}
