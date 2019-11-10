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
  
    $data = json_decode(file_get_contents(IP_API."/rkbu/".$_SESSION['pegawai']->unit_kerja_id));
    $var = array();
    $var['data'] = $data;
    $var['var_title']       = "RKBU";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    // $var['var_module']      = "rbb/rko/rkbu_data";
    
    $var['var_module']      = "rbb/rko/rkbu_data";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  // ============================================================

  public function show_all(){
    // $data = json_decode(file_get_contents(IP_API."/rkbu/".$_SESSION['pegawai']->unit_kerja_id));
    $data = json_decode(file_get_contents(IP_API."/rkbu"));
    $var = array();
    $var['data'] = $data;
    $var['var_title']       = "RKBU";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
  // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    // $var['var_module']      = "rbb/rko/rkbu_data";
      $var['var_module']      = "rbb/rko/rkbu_data_admin";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  // ============================================================

  public function show_all_kelompok(){
    //data barang yang sudah diinput
    $data = json_decode(file_get_contents(IP_API."/rkbu"));
    //data master barang
    $dataBarang= json_decode(file_get_contents(IP_API."/master/barangall"));
    // echo "<pre>";
    //       print_r ($dataBarang);
    //       echo "</pre>";
    //       die;
   //kode barang yang ada di data inputan
    $kodeBarang = array_column($data, "rkbu_barang_kode");
    $kodeBarang = array_unique($kodeBarang);

    //cek kode barang di databarang, jika ada maka di push ke array baru barangExist
    $barangExist= [];
    foreach($kodeBarang as $key => $dt){
        if($dt != 0){
          $dataAda = array_filter($dataBarang, function($var) use($dt){
              return ($var->barang_id == $dt);
          });
          $dataAda = array_values($dataAda);
          $barangExist[] = $dataAda[0];
        }else{
          continue;
        }
    }

    //looping cek barang di data, jika ada maka sum jumlah pembeliannya
    foreach($barangExist as $key => $dt){
      //ambil id nya dulu
      $idBarang = $dt->barang_id;
        // filter barang yang id nya sama seperti idBarang sehingga inputan yang mempunyai id barang yang sama akan berkumpul hahahahaha
        $barangnya = array_filter($data, function($var) use($idBarang){
            return ($var->rkbu_barang_kode == $idBarang);
        });

        //looping barangnya yang sudah di filter untuk mendapatkan jumlah pembeliannya
        $sum = 0;
        foreach($barangnya as $keysum => $dtsum){
          $sum += $dtsum->rkbu_jumlah;
        }
        //push index baru ke barangexist untuk simpan jumlahnya
        $dt->barang_jumlah = $sum;
    }

    //get data inputan dengan kode 0
    $barangnyaLain = array_filter($data, function($var){
        return ($var->rkbu_barang_kode == 0);
    });

    //looping barang untuk dimasukkan ke barangExist
    foreach($barangnyaLain as $keylain => $dtlain){
      $temp= (object)[];
      $temp->barang_id = $dtlain->rkbu_barang_kode; 
      $temp->barang_kelompok = $dtlain->rkbu_barang_kelompok; 
      $temp->barang_nama =  $dtlain->rkbu_barang_nama; 
      $temp->barang_harga = $dtlain->rkbu_estimasi_harga; 
      $temp->barang_jumlah = $dtlain->rkbu_jumlah; 
        // echo "<pre>";
        // print_r($temp);
        // echo "</pre>";
      $barangExist[] = $temp;
    }


    // echo "<pre>";
    // echo "<br>======================================================================================<br>";
    // print_r($barangExist);
    // echo "<br>======================================================================================<br>";
    // print_r($barangnyaLain);
    // echo "<br>======================================================================================<br>";
    // echo "<br>======================================================================================<br>";
    // print_r($data);
    // echo "</pre>";
    // die;


    $var = array();
    $var['data'] = $barangExist;
    $var['var_title']       = "RKBU";
    $var['var_subtitle']    = "RKO";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    // $var['var_module']      = "rbb/rko/rkbu_data";
      $var['var_module']      = "rbb/rko/rkbu_data_admin_kelompok";
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
