<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jarkan2 extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }

  public function dashboard()
  {
    $var = array();
    $var['var_title']       = "Jarkan";
    $var['var_subtitle']    = "";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/jarkan/dashboard";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  public function form()
  {

    $var = array();
    $var['var_title']       = "Jarkan";
    $var['var_subtitle']    = "Input";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/jarkan/form_input";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $var['jenis_kantor']    = json_decode(file_get_contents(IP_API . "/jaringan/jeniskantor"));
    $var['pengusul']        = json_decode(file_get_contents(IP_API . "/jaringan/pengusul"));
    $var['propinsi']        = json_decode(file_get_contents(IP_API . "/jaringan/propinsi"));
    $var['jenis_tanah_bangunan']     =  json_decode(file_get_contents(IP_API . "/jaringan/jenistanahbangunan"));
    $var['pengadaan_tanah']     =  json_decode(file_get_contents(IP_API . "/jaringan/rencanapengadaantanah"));
    $var['pengadaan_bangunan']     =  json_decode(file_get_contents(IP_API . "/jaringan/rencanapengadaanbangunan"));
    $var['kamus_divisi']    = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_all_divisi?api_key=prc"))->result[0];
    $var['status_proker']   = json_decode(file_get_contents(IP_API . "/master/stsproker"));
    //pic kajian kelayakan bisnis
    $var['pic_kkb'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001JJL');
    });
    $var['pic_kkb'] = array_values($var['pic_kkb'])[0];
    //pic kajian kelayakan tanah dan bangunan
    $var['pic_kktb'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001UMM');
    });
    $var['pic_kktb'] = array_values($var['pic_kktb'])[0];
    //pic pengadaan tanah dan bangunan
    $var['pic_ptb'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001UMM');
    });
    $var['pic_ptb'] = array_values($var['pic_ptb'])[0];
    //pic penyiapan tanah dan bangunan
    $var['pic_petb'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001UMM');
    });
    $var['pic_petb'] = array_values($var['pic_petb'])[0];
    //pic penyiapan infrastruktur pendukung
    $var['pic_pip'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001UMM');
    });
    $var['pic_pip'] = array_values($var['pic_pip'])[0];
    //pic penyiapan infrastruktur IT
    $var['pic_pit'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001TSI');
    });
    $var['pic_pit'] = array_values($var['pic_pit'])[0];
    //pic pengadaan SDM
    $var['pic_psdm'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001SDM');
    });
    $var['pic_psdm'] = array_values($var['pic_psdm'])[0];
    //pic perizinan
    $var['pic_pizin'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001JJL');
    });
    $var['pic_pizin'] = array_values($var['pic_pizin'])[0];
    //pic Pembukaan
    $var['pic_pbuka'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001JJL');
    });
    $var['pic_pbuka'] = array_values($var['pic_pbuka'])[0];
    //pic Perubahan
    $var['pic_pubah'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001JJL');
    });
    $var['pic_pubah'] = array_values($var['pic_pubah'])[0];
    //pic relokasi
    $var['pic_prelo'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001JJL');
    });
    $var['pic_prelo'] = array_values($var['pic_prelo'])[0];
    //pic Penutupan
    $var['pic_ptutup'] = array_filter($var['kamus_divisi'], function ($var) {
      return ($var->id == '001JJL');
    });
    $var['pic_ptutup'] = array_values($var['pic_ptutup'])[0];

    $this->load->view('main', $var);
  }

  public function insert_pembukaan()
  {

    if (isset($_POST)) {
      if (empty($_POST['buka_id'])) {
        unset($_POST['buka_id']);
      } else {
        $url = IP_API . "/jaringan/pembukaan/" . $_POST["buka_id"];
        $result = request_api("delete", $url);
        unset($_POST['buka_id']);
      }
      $_POST['jenis_kantor'] = (int) $_POST['jenis_kantor'];
      // $_POST['pengusul'] = (int)$_POST['pengusul'];
      $_POST['status'] = (int) $_POST['status'];
      $_POST['tahun'] = (int) $_POST['tahun'];
      $_POST['propinsi'] = (int) $_POST['propinsi'];
      $_POST['kota'] = (int) $_POST['kota'];
      $_POST['kecamatan'] = (int) $_POST['kecamatan'];
      $_POST['tanah'] = (int) $_POST['tanah'];
      $_POST['bangunan'] = (int) $_POST['bangunan'];
      $_POST['rencana_pengadaan_tanah'] = (int) $_POST['rencana_pengadaan_tanah'];
      $_POST['rencana_pengadaan_bangunan'] = (int) $_POST['rencana_pengadaan_bangunan'];
      $_POST['anggaran_pengadaan_tanah'] = (int) $_POST['anggaran_pengadaan_tanah'];
      $_POST['anggaran_pengadaan_bangunan'] = (int) $_POST['anggaran_pengadaan_bangunan'];
      $_POST['kajian_kelayakan_bisnis_start'] = (int) $_POST['kajian_kelayakan_bisnis_start'];
      $_POST['kajian_kelayakan_bisnis_finish'] = (int) $_POST['kajian_kelayakan_bisnis_finish'];
      $_POST['kajian_kelayakan_tanah_bangunan_start'] = (int) $_POST['kajian_kelayakan_tanah_bangunan_start'];
      $_POST['kajian_kelayakan_tanah_bangunan_finish'] = (int) $_POST['kajian_kelayakan_tanah_bangunan_finish'];
      $_POST['pengadaan_tanah_bangunan_start'] = (int) $_POST['pengadaan_tanah_bangunan_start'];
      $_POST['pengadaan_tanah_bangunan_finish'] = (int) $_POST['pengadaan_tanah_bangunan_finish'];
      $_POST['penyiapan_tanah_bangunan_start'] = (int) $_POST['penyiapan_tanah_bangunan_start'];
      $_POST['penyiapan_tanah_bangunan_finish'] = (int) $_POST['penyiapan_tanah_bangunan_finish'];
      $_POST['penyiapan_infrastruktur_it_start'] = (int) $_POST['penyiapan_infrastruktur_it_start'];
      $_POST['penyiapan_infrastruktur_it_finish'] = (int) $_POST['penyiapan_infrastruktur_it_finish'];
      $_POST['pengadaan_sdm_start'] = (int) $_POST['pengadaan_sdm_start'];
      $_POST['pengadaan_sdm_finish'] = (int) $_POST['pengadaan_sdm_finish'];
      $_POST['perijinan_start'] = (int) $_POST['perijinan_start'];
      $_POST['perijinan_finish'] = (int) $_POST['perijinan_finish'];
      $_POST['pembukaan_start'] = (int) $_POST['pembukaan_start'];
      $_POST['pembukaan_finish'] = (int) $_POST['pembukaan_finish'];
      $payload = json_encode($_POST);
      $url = IP_API . "/jaringan/pembukaan";
      // echo "<pre>";
      // print_r($_POST);
      // echo "============================== <br/>";
      // print_r($payload);
      // echo "</pre>";
      // echo "<br/>";
      $result = request_api("post", $url, $payload);
      // echo $result;
      redirect(base_url() . "rbb/rko/jarkan/input");
    }
  }

  public function insert_perubahan()
  {

    if (isset($_POST)) {
      if (empty($_POST['ubah_id'])) {
        unset($_POST['ubah_id']);
      } else {
        $url = IP_API . "/jaringan/perubahan/" . $_POST["ubah_id"];
        $result = request_api("delete", $url);
        unset($_POST['ubah_id']);
      }
      $_POST['nama_menjadi'] =  $_POST['nama_semula'];
      $_POST['jenis_kantor_semula'] = (int) $_POST['jenis_kantor_semula'];
      $_POST['jenis_kantor_menjadi'] = (int) $_POST['jenis_kantor_menjadi'];
      $_POST['status'] = (int) $_POST['status'];
      $_POST['tahun'] = (int) $_POST['tahun'];
      $_POST['propinsi'] = (int) $_POST['propinsi'];
      $_POST['kota'] = (int) $_POST['kota'];
      $_POST['kecamatan'] = (int) $_POST['kecamatan'];
      $_POST['tanah'] = (int) $_POST['tanah'];
      $_POST['bangunan'] = (int) $_POST['bangunan'];
      $_POST['rencana_pengadaan_tanah'] = (int) $_POST['rencana_pengadaan_tanah'];
      $_POST['rencana_pengadaan_bangunan'] = (int) $_POST['rencana_pengadaan_bangunan'];
      $_POST['anggaran_pengadaan_tanah'] = (int) $_POST['anggaran_pengadaan_tanah'];
      $_POST['anggaran_pengadaan_bangunan'] = (int) $_POST['anggaran_pengadaan_bangunan'];
      $_POST['kajian_kelayakan_bisnis_start'] = (int) $_POST['kajian_kelayakan_bisnis_start'];
      $_POST['kajian_kelayakan_bisnis_finish'] = (int) $_POST['kajian_kelayakan_bisnis_finish'];
      $_POST['kajian_kelayakan_tanah_bangunan_start'] = (int) $_POST['kajian_kelayakan_tanah_bangunan_start'];
      $_POST['kajian_kelayakan_tanah_bangunan_finish'] = (int) $_POST['kajian_kelayakan_tanah_bangunan_finish'];
      $_POST['pengadaan_tanah_bangunan_start'] = (int) $_POST['pengadaan_tanah_bangunan_start'];
      $_POST['pengadaan_tanah_bangunan_finish'] = (int) $_POST['pengadaan_tanah_bangunan_finish'];
      $_POST['penyiapan_tanah_bangunan_start'] = (int) $_POST['penyiapan_tanah_bangunan_start'];
      $_POST['penyiapan_tanah_bangunan_finish'] = (int) $_POST['penyiapan_tanah_bangunan_finish'];
      $_POST['penyiapan_infrastruktur_it_start'] = (int) $_POST['penyiapan_infrastruktur_it_start'];
      $_POST['penyiapan_infrastruktur_it_finish'] = (int) $_POST['penyiapan_infrastruktur_it_finish'];
      $_POST['pengadaan_sdm_start'] = (int) $_POST['pengadaan_sdm_start'];
      $_POST['pengadaan_sdm_finish'] = (int) $_POST['pengadaan_sdm_finish'];
      $_POST['perijinan_start'] = (int) $_POST['perijinan_start'];
      $_POST['perijinan_finish'] = (int) $_POST['perijinan_finish'];
      $_POST['perubahan_start'] = (int) $_POST['perubahan_start'];
      $_POST['perubahan_finish'] = (int) $_POST['perubahan_finish'];
      $payload = json_encode($_POST);
      $url = IP_API . "/jaringan/perubahan";
      // echo "<pre>";
      // print_r($_POST);
      // echo "============================== <br/>";
      // print_r($payload);
      // echo "</pre>";
      // echo "<br/>";
      $result = request_api("post", $url, $payload);
      // echo $result;
      redirect(base_url() . "rbb/rko/jarkan/input");
    }
  }

  public function insert_relokasi()
  {
    $url = IP_API . "/jaringan/relokasi";
    if (isset($_POST)) {
      if (empty($_POST['relokasi_id'])) {
        unset($_POST['relokasi_id']);
      } else {
        $url = IP_API . "/jaringan/relokasi/" . $_POST["relokasi_id"];
        $result = request_api("delete", $url);
        unset($_POST['relokasi_id']);
      }
      $_POST['jenis_kantor'] = (int) $_POST['jenis_kantor'];
      // $_POST['pengusul'] = (int)$_POST['pengusul'];
      $_POST['status'] = (int) $_POST['status'];
      $_POST['tahun'] = (int) $_POST['tahun'];
      $_POST['propinsi_semula'] = (int) $_POST['propinsi_semula'];
      $_POST['propinsi_menjadi'] = (int) $_POST['propinsi_menjadi'];
      $_POST['kota_semula'] = (int) $_POST['kota_semula'];
      $_POST['kota_menjadi'] = (int) $_POST['kota_menjadi'];
      $_POST['kecamatan_semula'] = (int) $_POST['kecamatan_semula'];
      $_POST['kecamatan_menjadi'] = (int) $_POST['kecamatan_menjadi'];
      // $_POST['alamat_semula'] = (int)$_POST['alamat_semula'];
      // $_POST['alamat_menjadi'] = (int)$_POST['alamat_menjadi'];
      $_POST['tanah'] = (int) $_POST['tanah'];
      $_POST['bangunan'] = (int) $_POST['bangunan'];
      $_POST['rencana_pengadaan_tanah'] = (int) $_POST['rencana_pengadaan_tanah'];
      $_POST['rencana_pengadaan_bangunan'] = (int) $_POST['rencana_pengadaan_bangunan'];
      $_POST['anggaran_pengadaan_tanah'] = (int) $_POST['anggaran_pengadaan_tanah'];
      $_POST['anggaran_pengadaan_bangunan'] = (int) $_POST['anggaran_pengadaan_bangunan'];
      $_POST['kajian_kelayakan_bisnis_start'] = (int) $_POST['kajian_kelayakan_bisnis_start'];
      $_POST['kajian_kelayakan_bisnis_finish'] = (int) $_POST['kajian_kelayakan_bisnis_finish'];
      $_POST['kajian_kelayakan_tanah_bangunan_start'] = (int) $_POST['kajian_kelayakan_tanah_bangunan_start'];
      $_POST['kajian_kelayakan_tanah_bangunan_finish'] = (int) $_POST['kajian_kelayakan_tanah_bangunan_finish'];
      $_POST['pengadaan_tanah_bangunan_start'] = (int) $_POST['pengadaan_tanah_bangunan_start'];
      $_POST['pengadaan_tanah_bangunan_finish'] = (int) $_POST['pengadaan_tanah_bangunan_finish'];
      $_POST['penyiapan_tanah_bangunan_start'] = (int) $_POST['penyiapan_tanah_bangunan_start'];
      $_POST['penyiapan_tanah_bangunan_finish'] = (int) $_POST['penyiapan_tanah_bangunan_finish'];
      $_POST['penyiapan_infrastruktur_it_start'] = (int) $_POST['penyiapan_infrastruktur_it_start'];
      $_POST['penyiapan_infrastruktur_it_finish'] = (int) $_POST['penyiapan_infrastruktur_it_finish'];
      $_POST['pengadaan_sdm_start'] = (int) $_POST['pengadaan_sdm_start'];
      $_POST['pengadaan_sdm_finish'] = (int) $_POST['pengadaan_sdm_finish'];
      $_POST['perijinan_start'] = (int) $_POST['perijinan_start'];
      $_POST['perijinan_finish'] = (int) $_POST['perijinan_finish'];
      $_POST['relokasi_start'] = (int) $_POST['relokasi_start'];
      $_POST['relokasi_finish'] = (int) $_POST['relokasi_finish'];
      $payload = json_encode($_POST);
      $url = IP_API . "/jaringan/relokasi";
      // echo "<pre>";
      // print_r($_POST);
      // echo "============================== <br/>";
      // print_r($payload);
      // echo "</pre>";
      // echo "<br/>";
      $result = request_api("post", $url, $payload);
      // echo $result;
      redirect(base_url() . "rbb/rko/jarkan/input");
    }
  }

  public function insert_penutupan()
  {

    if (isset($_POST)) {
      if (empty($_POST['tutup_id'])) {
        unset($_POST['tutup_id']);
      } else {
        $url = IP_API . "/jaringan/penutupan/" . $_POST["tutup_id"];
        $result = request_api("delete", $url);
        unset($_POST['tutup_id']);
      }
      $_POST['jenis_kantor'] = (int) $_POST['jenis_kantor'];
      // $_POST['pengusul'] = (int)$_POST['pengusul'];
      $_POST['status'] = (int) $_POST['status'];
      $_POST['tahun'] = (int) $_POST['tahun'];
      $_POST['propinsi'] = (int) $_POST['propinsi'];
      $_POST['kota'] = (int) $_POST['kota'];
      $_POST['kecamatan'] = (int) $_POST['kecamatan'];
      // $_POST['alamat_semula'] = (int)$_POST['alamat_semula'];
      // $_POST['alamat_menjadi'] = (int)$_POST['alamat_menjadi'];
      // $_POST['tanah'] = (int)$_POST['tanah'];
      // $_POST['bangunan'] = (int)$_POST['bangunan'];
      // $_POST['rencana_pengadaan_tanah'] = (int)$_POST['rencana_pengadaan_tanah'];
      // $_POST['rencana_pengadaan_bangunan'] = (int)$_POST['rencana_pengadaan_bangunan'];
      // $_POST['anggaran_pengadaan_tanah'] = (int)$_POST['anggaran_pengadaan_tanah'];
      // $_POST['anggaran_pengadaan_bangunan'] = (int)$_POST['anggaran_pengadaan_bangunan'];
      $_POST['kajian_kelayakan_bisnis_start'] = (int) $_POST['kajian_kelayakan_bisnis_start'];
      $_POST['kajian_kelayakan_bisnis_finish'] = (int) $_POST['kajian_kelayakan_bisnis_finish'];
      $_POST['perijinan_start'] = (int) $_POST['perijinan_start'];
      $_POST['perijinan_finish'] = (int) $_POST['perijinan_finish'];
      $_POST['penutupan_start'] = (int) $_POST['penutupan_start'];
      $_POST['penutupan_finish'] = (int) $_POST['penutupan_finish'];
      $payload = json_encode($_POST);
      $url = IP_API . "/jaringan/penutupan/";
      // echo "<pre>";
      // print_r($_POST);
      // echo "============================== <br/>";
      // print_r($payload);
      // echo "</pre>";
      // echo "<br/>";
      $result = request_api("post", $url, $payload);
      // echo $result;
      redirect(base_url() . "rbb/rko/jarkan/input");
    }
  }
}
