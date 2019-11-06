<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Rkbu extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }

  // ============================================================
  public function index(){
    // $data = json_decode(file_get_contents(IP_API."/rkbu/".$_SESSION['pegawai']->unit_kerja_id));
     if($_SESSION['user']->userrole == 1){
    $data = json_decode(file_get_contents(IP_API."/rkbu"));
   }else{
    $data = json_decode(file_get_contents(IP_API."/rkbu/".$_SESSION['pegawai']->unit_kerja_id));
   }
    $var = array();
    $var['data'] = $data;
    $var['var_title']       = "RKBU";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    // $var['var_module']      = "rbb/rko/rkbu_data";
    if($_SESSION['user']->userrole == 1){
      $var['var_module']      = "rbb/rko/rkbu_data_admin";
     }else{
    $var['var_module']      = "rbb/rko/rkbu_data";
     }
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // ============================================================


  public function form_input(){
    $dataBarang = json_decode(file_get_contents(IP_API."/master/barangall"));
    $dataBarangKel1 = array_filter($dataBarang, function($var){
        return ($var->barang_kelompok == 1);
    });
    $dataBarangKel2 = array_filter($dataBarang, function($var){
        return ($var->barang_kelompok == 2);
    });
    $dataBarangKel1 = array_values($dataBarangKel1);
    $dataBarangKel2 = array_values($dataBarangKel2);

    // echo "<pre>";
    // print_r($dataBarangKel2);
    // echo "</pre>";
    // die;
    $var = array();
    $var['dataBarangKel1'] = $dataBarangKel1;
    $var['dataBarangKel2'] = $dataBarangKel2;
    $var['var_title']       = "RKBU";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rko/rkbu_form";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // ============================================================

  public function insert_rkbu(){
      // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";
      for($i = 0; $i < count($_POST['kelompok']); $i++){
        if (is_numeric($_POST['kode'][$i])) { 
          $kode = $_POST['kode'][$i]; 
          $nama = $_POST['nama'][$i]; 
        } 
        else {
          $kode = 0; 
          $nama = $_POST['nama'][$i]; 
          }
          
        $jadwal = explode('|', $_POST['jadwal'][$i]);
        $data['kelompok'] = $_POST['kelompok'][$i];
        $data['kode'] = $kode;
        $data['nama'] = $nama;
        $data['status'] = $_POST['status'][$i];
        $data['jumlah'] = $_POST['jumlah'][$i];
        $data['harga'] = str_replace(',', '', $_POST['estimasi'][$i]);
        $data['tahun'] = $jadwal[0];
        $data['jadwal'] = $jadwal[1];
        //tambahan
    $data['divisi'] = $_SESSION['pegawai']->unit_kerja_id;

        $payload = json_encode($data);
        $url = IP_API."/rkbu";
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $result = request_api("post", $url, $payload);
        // print_r($result);
        }
        // die;
        if($result == "created"){
          redirect(base_url() . 'rbb/rko/rkbu/');
        }else{
          $this->session->set_flashdata('pesan', 'Penyimpanan Gagal, Isian Belum Lengkap! ');
          redirect(base_url() . 'rbb/rko/rkbu/input');
      }
  }


  // ============================================================


  public function edit_rkbu($id){
    $dataEdit = json_decode(file_get_contents(IP_API."/rkbu"));
    $dataEdit = array_filter($dataEdit, function($var) use($id){
        return ($var->rkbu_id == $id);
    });
    $dataEdit = array_values($dataEdit)[0];

    $kelompok = $dataEdit->rkbu_barang_kelompok;
    $dataBarang = json_decode(file_get_contents(IP_API."/master/barangall"));
    $dataBarang = array_filter($dataBarang, function($var) use($kelompok){
        return ($var->barang_kelompok == $kelompok);
    });
    $dataEdit->jadwal = $dataEdit->rkbu_tahun."|".$dataEdit->rkbu_jadwal_bulan;
    $dataBarang = array_values($dataBarang);
    // echo "<pre>";
    // print_r($dataEdit);
    // echo "</pre>";
    // die;
    $var = array();
    $var['dataEdit'] = $dataEdit;
    $var['dataBarang'] = $dataBarang;
    $var['var_title']       = "RKBU";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rko/rkbu_edit";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  // ============================================================
  public function update_rkbu($id){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    if (is_numeric($_POST['kode'])) { 
      $kode = $_POST['kode']; 
      $nama = $_POST['nama']; 
    } 
    else {
      $kode = 0; 
      $nama = $_POST['nama']; 
      }
    

    $jadwal = explode('|', $_POST['jadwal']);
    $data['kelompok'] = $_POST['kelompok'];
    $data['kode'] = $kode;
    $data['nama'] = $nama;
    $data['status'] = $_POST['status'];
    $data['jumlah'] = $_POST['jumlah'];
    $data['harga'] = str_replace(',', '', $_POST['estimasi']);
    $data['tahun'] = $jadwal[0];
    $data['jadwal'] = $jadwal[1];
    //tambahan
    $data['divisi'] = $_SESSION['pegawai']->unit_kerja_id;
    
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    $payload = json_encode($data);
    $url = IP_API."/rkbu/".$id;

    $result = request_api("put", $url, $payload);
    // print_r($result);
    if($result == "updated"){
        redirect(base_url() . 'rbb/rko/rkbu/');
      }else{
        $this->session->set_flashdata('pesan', 'Penyimpanan Gagal, Isian Belum Lengkap! ');
        redirect(base_url() . 'rbb/rko/rkbu/edit/'.$id);
    }
}
  // ============================================================


  public function delete_rkbu($id){
      $url = IP_API."/rkbu/".$id;
      $result = request_api("delete", $url);
        redirect(base_url() . 'rbb/rko/rkbu/');
    }

}
