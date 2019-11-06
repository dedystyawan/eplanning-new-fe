<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Aktivitas extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }

  function laporanMonev($bulan = null)
  {

    $dataPegawaiDivisi =  file_get_contents(SDM_API . '/api_v2/pegawai/prc_get_pegawai_per_divisi/' . $_SESSION['pegawai']->unit_kerja_id . '?api_key=prc');
    $dataPegawaiDivisi = json_decode($dataPegawaiDivisi, true);
    $dataPegawaiDivisi = $dataPegawaiDivisi['result'][0];
    $kamusPegawai = array_column($dataPegawaiDivisi, 'nama', 'pegawai_id');

    $var = array();
    $var['bulan']          = $bulan;
    // $var['prokerId']        = $prokerId;
    // $var['dataMonev']       = $dataMonev;
    $var['kamusPegawai']    = $kamusPegawai;
    $var['var_title']       = "Monitoring Pelaksanaan Aktivitas";
    $var['var_subtitle']    = "";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/v_laporan_monev";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // =============================================================================================
  public function inputBreakdownRkf($id = null)
  {
    $id = encrypt_decrypt("decrypt", $id);
    $pegawaiUnitKerja      = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_pegawai_per_divisi/" . $_SESSION['pegawai']->unit_kerja_id . "?api_key=prc"))->result[0];
    $all            = json_decode(file_get_contents(IP_API . "/master/all"));
    $var = array();
    $var['data'] = json_decode(file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id))[0];
    $var['pegawaiUnitKerja'] = $pegawaiUnitKerja;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['showBdAktivitas'] = 1;
    $var['all'] = $all;
    $var['var_title']       = "INPUT – BREAKDOWN AKTIVITAS PROGRAM KERJA";
    $var['var_subtitle']    = "";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    // $var['var_module']      = "rbb/rkf/detail_rkf";
    $var['var_module']      = "rbb/rkf/form_input_aktivitas";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // =============================================================================================

  public function addBreakdownRkf()
  {
    $len = count($_POST['bulan']);
    for ($i = 0; $i < $len; $i++) {
      $payload = array();
      $payload['aktivitasProker'] = $_POST['prokerId']; //$_POST['prokerId'];
      $payload['aktivitasNama'] = $_POST['aktivitas'][$i];
      $payload['aktivitasBulan'] = $_POST['bulan'][$i];
      $payload['aktivitasTarget'] = $_POST['target'][$i];
      if (!empty($_POST['pic'][$i])) {
        foreach ($_POST['pic'][$i] as  $dt) {
          $payload['aktivitasPic'][] = array('pic' => $dt);
        }
      } else {
        $payload['aktivitasPic'] = array();
      }
      $payload = json_encode($payload);
      $url = IP_API . '/aktivitas?';
      $result = request_api("post", $url, $payload);
    }
    $proker = encrypt_decrypt("encrypt", $_POST['prokerId']);
    redirect('rbb/rkf/aktivitas/input/' . $proker);
  }


  public function editBdAjax()
  {
    $id = $_POST['id'];
    if (isset($_POST)) {
      $payload = array();
      $payload['aktivitasBulan'] = $_POST['bulan'];
      $payload['aktivitasNama'] = $_POST['aktivitas'];
      foreach ($_POST['pic'] as $dt) {
        $payload['aktivitasPic'][] = array('pic' => $dt);
      }
      $payload['aktivitasTarget'] = $_POST['target'];
      $payload['aktivitasStatus'] = 1;
      $payload = json_encode($payload);

      $ch = curl_init();
      $url = IP_API . "/aktivitas/" . $id . "?";
      $result = request_api("put", $url, $payload);

      echo json_encode($result);
    }
  }


  public function deleteBdAjax()
  {
    if (isset($_POST)) {
      $id = $_POST['id'];
      $url = IP_API . '/aktivitas/' . $id;
      $result2 = request_api("delete", $url);
      echo json_encode($result2);
    }
  }
}
