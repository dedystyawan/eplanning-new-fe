<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Monev extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }


  // =================================================================================================
  public function v_monev($prokerId = null, $bulan = null)
  {
    $proker = json_decode(file_get_contents(IP_API . '/rkf/rkfdetail/?rkfId=' . $prokerId));

    $fileDokumenAktivitas = json_decode(file_get_contents(IP_API . '/aktivitas/docupload/all'));
    $fileDokumenAktivitas = array_column($fileDokumenAktivitas, 'doc_aktivitas_nama', 'doc_aktivitas_id');

    $dataMonev = json_decode(file_get_contents(IP_API . '/aktivitas/' . $prokerId));
    usort($dataMonev, function ($a, $b) {
      return $a->aktivitas_bulan - $b->aktivitas_bulan;
    });

    $dataChart['belumDilaksanakan'] = 0;
    $dataChart['dalamProses'] = 0;
    $dataChart['selesai'] = 0;
    $dataBar = array_fill(0, 12, 0);  //function bawaan untuk create array dengan value

    foreach ($dataMonev as $dt) {
      if (isset($dt->aktivitas_status)) {
        $dataStatus = $dt->aktivitas_status;
        if ($dataStatus == 1) {
          $dataChart['belumDilaksanakan'] = $dataChart['belumDilaksanakan'] + 1;
        } elseif ($dataStatus == 2) {
          $dataChart['dalamProses'] = $dataChart['dalamProses'] + 1;
        } elseif ($dataStatus == 3 || $dataStatus == 4 || $dataStatus == 5) {
          $dataChart['selesai'] = $dataChart['selesai'] + 1;
        }
      }

      // get rekap aktivitas
      if ($dt->aktivitas_bulan == "1") {
        $dataBar[0] += 1;
      } elseif ($dt->aktivitas_bulan == "2") {
        $dataBar[1] += 1;
      } elseif ($dt->aktivitas_bulan == "3") {
        $dataBar[2] += 1;
      } elseif ($dt->aktivitas_bulan == "4") {
        $dataBar[3] += 1;
      } elseif ($dt->aktivitas_bulan == "5") {
        $dataBar[4] += 1;
      } elseif ($dt->aktivitas_bulan == "6") {
        $dataBar[5] += 1;
      } elseif ($dt->aktivitas_bulan == "7") {
        $dataBar[6] += 1;
      } elseif ($dt->aktivitas_bulan == "8") {
        $dataBar[7] += 1;
      } elseif ($dt->aktivitas_bulan == "9") {
        $dataBar[8] += 1;
      } elseif ($dt->aktivitas_bulan == "10") {
        $dataBar[9] += 1;
      } elseif ($dt->aktivitas_bulan == "11") {
        $dataBar[10] += 1;
      } elseif ($dt->aktivitas_bulan == "12") {
        $dataBar[11] += 1;
      }
    }

    $var = array();
    $var['bulan']          = $bulan;
    $var['dataChart']       = $dataChart;
    $var['dataBar']         = $dataBar;
    $var['prokerId']        = $prokerId;
    $var['proker']        = $proker;
    $var['fileDokumenAktivitas']        = $fileDokumenAktivitas;
    $var['dataMonev']       = $dataMonev;
    $var['kamusPegawai']    = $_SESSION['kamusPegawai'];
    $var['var_title']       = "Monitoring Pelaksanaan Aktivitas";
    $var['var_subtitle']    = "";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/det_aktivitas";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // =================================================================================================


  public function monev_rkf($id)
  {
    $id = encrypt_decrypt("decrypt", $id);

    $data       = json_decode(file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id))[0];
    $all            = json_decode(file_get_contents(IP_API . "/master/all"));
    $data_anggaran = json_decode(file_get_contents(IP_API . "/master/poscoa"));

    $var = array();
    $var['data_anggaran'] = $data_anggaran;
    $var['all'] = $all;
    $var['data'] = $data;
    $var['showMonev'] = 1;
    $var['var_title']       = "INPUT – MONITORING DAN EVALUASI";
    $var['var_subtitle']    = "";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/sel_monev";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  // =============================================================================================




  public function laporAktivitasAjax2()
  {
    if (isset($_POST)) {

      $dataMonev = file_get_contents(IP_API . '/aktivitas/' . $_POST['lapor-prokerid'], false);
      $dataMonev = json_decode($dataMonev);

      foreach ($dataMonev as $key => $dt) {
        if ($dt->aktivitas_id == $_POST['lapor-aktid']) {
          $dataBanding = $dataMonev[$key];
          break;
        }
      }

      $dataBulanAktivitas = $dataBanding->aktivitas_bulan;

      $payload = [];
      $payload['aktivitasPenjelasan'] = ltrim($_POST['lapor-ket']);
      //untuk aktivitas status
      if ($_POST['lapor-stat'] == 1) {
        $payload['aktivitasStatus'] = 1;
      } elseif ($_POST['lapor-stat'] == 2) {
        $payload['aktivitasStatus'] = 2;
      } elseif ($_POST['lapor-stat'] == 3) {
        if ($_POST['lapor-bulan'] < $dataBulanAktivitas) {
          $payload['aktivitasStatus'] = 3;
        } elseif ($_POST['lapor-bulan'] == $dataBulanAktivitas) {
          $payload['aktivitasStatus'] = 4;
        } elseif ($_POST['lapor-bulan'] >= $dataBulanAktivitas) {
          $payload['aktivitasStatus'] = 5;
        }
      }

      $payload = json_encode($payload);

      $url = IP_API . '/aktivitas/lapor/' . $_POST['lapor-aktid'];

      $result = request_api("put", $url, $payload);


      $config['upload_path'] = './assets/file/aktivitas/';
      $config['allowed_types'] = 'pdf';
      $config['file_ext_tolower'] = TRUE;

      $cekdata = json_decode(file_get_contents(IP_API . '/aktivitas/docupload/' . $_POST['lapor-aktid']));
      if (empty($cekdata)) {
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('lapor-file')) {
          $data = array('upload_data' => $this->upload->data());

          $payload2['aktivitasId'] = $_POST['lapor-aktid'];
          $payload2['namaDokumen'] = $data['upload_data']['file_name'];

          $payload2 = json_encode($payload2);
          $url2 = IP_API . '/aktivitas/docupload';
          $result2 = request_api("post", $url2, $payload2);

          echo json_encode($result2);
        }
      } else {
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('lapor-file')) {
          $data = array('upload_data' => $this->upload->data());

          // $payload2['aktivitasId'] = $_POST['lapor-aktid'];
          $payload2['namaDokumen'] = $data['upload_data']['file_name'];

          $payload2 = json_encode($payload2);
          $url2 = IP_API . '/aktivitas/docupload/' . $_POST['lapor-aktid'];
          $result2 = request_api("put", $url2, $payload2);



          echo json_encode($result2);
        }
      }
    }
  }


  function otor_monev2()
  {
    $data = array();
    $data['detailAction'] = $_POST['detailAction'];
    $data['detailUser'] = $_POST['detailUser'];
    $data = json_encode($data);

    $url = IP_API . "/aktivitas/otor/" . $_POST['prokerid'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
    ));

    $result = curl_exec($ch);
    //echo $result;
    curl_close($ch);
    echo json_encode($result);
  }
}
