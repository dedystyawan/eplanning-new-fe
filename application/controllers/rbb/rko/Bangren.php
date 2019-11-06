<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bangren extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }

  public function index(){
    // $data = json_decode(file_get_contents(IP_API."/bangren/".$_SESSION['pegawai']->unit_kerja_id));
     if($_SESSION['user']->userrole == 1){
    $data = json_decode(file_get_contents(IP_API."/bangren"));
   }else{
    $data = json_decode(file_get_contents(IP_API."/bangren/".$_SESSION['pegawai']->unit_kerja_id));
   }
    $jenis = json_decode(file_get_contents(IP_API."/master/jenisbangunrenovasi"));
    $jenis = array_column($jenis, 'jenis_bangun_renovasi_nama', 'jenis_bangun_renovasi_id');
    $milikAset = json_decode(file_get_contents(IP_API."/master/kepemilikanaset"));
    $milikAset = array_column($milikAset, 'kepemilikan_aset_nama', 'kepemilikan_aset_id');
    $var = array();
    $var['data'] = $data;
    $var['jenis'] = $jenis;
    $var['milikAset'] = $milikAset;
    $var['var_title']       = "Pembangunan / Renovasi";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    // $var['var_module']      = "rbb/rko/bangren_data";
    if($_SESSION['user']->userrole == 1){
      $var['var_module']      = "rbb/rko/bangren_data_admin";
     }else{
      $var['var_module']      = "rbb/rko/bangren_data";
     }
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  public function form_input(){
    $milikAset = json_decode(file_get_contents(IP_API."/master/kepemilikanaset"));
    $milikAset = array_column($milikAset, 'kepemilikan_aset_nama', 'kepemilikan_aset_id');

    // echo "<pre>";
    // print_r($milikAset);
    // echo "</pre>";
    // die;
    $var = array();
    $var['milikAset'] = $milikAset;
    $var['var_title']       = "PEMBANGUNAN / RENOVASI";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rko/bangren_form";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  public function insert_bangren(){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die;
    for($i = 0; $i < count($_POST['jenis']); $i++){
        $_POST['anggaran'][$i] = str_replace('.', '', $_POST['anggaran'][$i]);
        $data['jenis'] = $_POST['jenis'][$i];
        $data['uraian'] = $_POST['uraian'][$i];
        $data['status'] = $_POST['status'][$i];
        $data['pemilik'] = $_POST['pemilik'][$i];
        $data['alamat'] = $_POST['alamat'][$i];
        $data['anggaran'] = $_POST['anggaran'][$i];
        $data['jadwal'] = $_POST['jadwal'][$i];
        //tambahan
    $data['divisi'] = $_SESSION['pegawai']->unit_kerja_id;
        $payload = json_encode($data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    // die;
        $url = IP_API."/bangren";
        $result = request_api("post", $url, $payload);
        // print_r($result);
      }
      // die;
        if($result == "created"){
          redirect(base_url() . 'rbb/rko/bangren/');
        }else{
          $this->session->set_flashdata('pesan', 'Penyimpanan Gagal, Isian Belum Lengkap! ');
          redirect(base_url() . 'rbb/rko/bangren/input');
      }
  }

  public function edit_bangren($id){
    
    $milikAset = json_decode(file_get_contents(IP_API."/master/kepemilikanaset"));
    $milikAset = array_column($milikAset, 'kepemilikan_aset_nama', 'kepemilikan_aset_id');

    $dataBangren = json_decode(file_get_contents(IP_API."/bangren"));
    $dataEdit = array_filter($dataBangren, function($var) use($id){
        return ($var->bangun_renovasi_id == $id);
    });
    $dataEdit = array_values($dataEdit);

    // echo "<pre>";
    // print_r($milikAset);
    // echo "</pre>";
    // die;
    $var = array();
    $var['milikAset'] = $milikAset;
    $var['dataEdit'] = $dataEdit[0];
    $var['var_title']       = "PEMBANGUNAN / RENOVASI";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rko/bangren_edit";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  public function update_bangren($id){
      // echo "<pre>";
      // print_r($_POST);
      // echo $id;
      // echo "</pre>";
        $data['jenis'] = $_POST['jenis'];
        $data['uraian'] = $_POST['uraian'];
        $data['status'] = $_POST['status'];
        $data['pemilik'] = $_POST['pemilik'];
        $data['alamat'] = $_POST['alamat'];
        $data['anggaran'] = str_replace('.', '', $_POST['anggaran']);;
        $data['jadwal'] = $_POST['jadwal'];
        //tambahan
    $data['divisi'] = $_SESSION['pegawai']->unit_kerja_id;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        $payload = json_encode($data);
        $url = IP_API."/bangren/".$id;
        $result = request_api("put", $url, $payload);
        // print_r($result);
        // die;
        if($result == "updated"){
          redirect(base_url() . 'rbb/rko/bangren/');
        }else{
          $this->session->set_flashdata('pesan', 'Penyimpanan Gagal, Isian Belum Lengkap! ');
          redirect(base_url() . 'rbb/rko/bangren/edit/'.$id);
      }
  }



  public function delete_bangren($id){
      $url = IP_API."/bangren/".$id;
      $result = request_api("delete", $url);
        redirect(base_url() . 'rbb/rko/bangren/');
    }

}
