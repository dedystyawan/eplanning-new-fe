<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dokumen extends CI_Controller {

    public function __construct(){
        // session_start();
        parent::__construct();

        if(!isset($_SESSION['user'])){
          redirect(base_url('/login'));
      }

    }

  
  
  //View Dokumen
    public function vdoc($type){
      $type_dec= encrypt_decrypt("decrypt",$type);
      $data = file_get_contents(IP_API.'/master/docupload/', false);
      $data= json_decode($data, true);
      $var = array();
      $var['var_title'] = "Dokumen";
      if($type==1){
           $var['var_subtitle'] = "Rencana Korporasi";
     }else{
          $var['var_subtitle'] = "Rencana Bisnis Bank";
     }
      $var['var_breadcrumb'] = array();
      $var['module'] = "";

      // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
      $var['var_module'] = "dokumen";
      // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
      $var['var_other'] = array('data'=>$data,"type"=>$type,"type_dec"=>$type_dec);
      $this->load->view('main',$var);
    }


}