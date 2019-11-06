<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Rekap extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }


  public function rekapIsu(){
    $data = json_decode(file_get_contents(IP_API."/report/isu/2020/1"));
    $dataIsu = json_decode(file_get_contents(IP_API."/master/isustrategis/2020"));
    $dataIsu = array_column($dataIsu, "isu_strategis_nama", "isu_strategis_id");
    // print_r($dataRkfIsu);
    $var = array();
    $var['data'] = $data;
    $var['dataIsu'] = $dataIsu;
    // $var['dataKud'] = $dataKud;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    // $var['datasupport'] = $datasupport;
    $var['var_title']       = "RENCANA KERJA FUNGSI";
    $var['var_subtitle']    = "rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // $var['jenis']   = $jenis;
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rekap/rekapisu";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    // print_r($var['kamusPegawai']);
    $this->load->view('main', $var);
  }

  public function rekapKud(){
    $data = json_decode(file_get_contents(IP_API."/report/kud/2020/1"));
    // $dataIsu = json_decode(file_get_contents(IP_API."/master/isustrategis/2020"));
    // $dataIsu = array_column($dataIsu, "isu_strategis_nama", "isu_strategis_id");

    $dataKud = json_decode(file_get_contents(IP_API."/master/kud"));
    $dataKud = array_column($dataKud,"kud_nama", "kud_id" );
    // print_r($dataRkfIsu);
    $var = array();
    $var['data'] = $data;
    // $var['dataIsu'] = $dataIsu;
    $var['dataKud'] = $dataKud;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    // $var['datasupport'] = $datasupport;
    $var['var_title']       = "RENCANA KERJA FUNGSI";
    $var['var_subtitle']    = "rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // $var['jenis']   = $jenis;
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rekap/rekapkud";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    // print_r($var['kamusPegawai']);
    $this->load->view('main', $var);
  }

  public function rekapTransformasi(){
    $data = json_decode(file_get_contents(IP_API."/report/transformasi/2020/1"));
    // $dataIsu = json_decode(file_get_contents(IP_API."/master/isustrategis/2020"));
    // $dataIsu = array_column($dataIsu, "isu_strategis_nama", "isu_strategis_id");

    // $dataKud = json_decode(file_get_contents(IP_API."/master/kud"));
    // $dataKud = array_column($dataKud,"kud_nama", "kud_id" );
    // print_r($dataRkfIsu);
    $var = array();
    $var['data'] = $data;
    // $var['dataIsu'] = $dataIsu;
    // $var['dataKud'] = $dataKud;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    // $var['datasupport'] = $datasupport;
    $var['var_title']       = "RENCANA KERJA FUNGSI";
    $var['var_subtitle']    = "rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // $var['jenis']   = $jenis;
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rekap/rekaptransformasi";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    // print_r($var['kamusPegawai']);
    $this->load->view('main', $var);
  }


}