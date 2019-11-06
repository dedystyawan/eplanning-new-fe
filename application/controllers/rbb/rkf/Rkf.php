<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Rkf extends CI_Controller
{

  public function __construct()
  {
    // session_start();
    parent::__construct();

    if (!isset($_SESSION['user'])) {
      redirect(base_url('/login'));
    }
  }

  //functionnya


  public function index()
  {
    $periode_next = json_decode(file_get_contents(IP_API . "/master/perioderkf/" . (date("Y") + 1)));
    $jenis = (empty($periode_next)) ? 'RBB AWAL' : $periode_next->rkf_jenis_nama;
    $jenisrkf = json_decode(file_get_contents(IP_API . "/master/jenisrkf"));
    $rekapPegawai = $this->getRekapPegawai();
    $grafikbar = $this->getPersebaran();

    if($_SESSION['user']->userrole == 1){
      $totalRkf = json_decode(file_get_contents(IP_API . "/admin/totalrkf/" . Date("Y")));
      $totalQuickWin = json_decode(file_get_contents(IP_API . "/admin/quickwin/" . Date("Y")));
      $totalAktivitas = json_decode(file_get_contents(IP_API . "/admin/totalaktivitas/"  . Date("Y")))[0];
      $progresRkf = json_decode(file_get_contents(IP_API . "/admin/penyelesaianrkf/" . Date("Y")))[0];
      $progresAktivitas = json_decode(file_get_contents(IP_API . "/admin/penyelesaianaktivitas/". Date("Y")))[0];
    }else{
      $totalRkf = json_decode(file_get_contents(IP_API . "/dashboard/totalrkf/" . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")))[0];
      $totalQuickWin = json_decode(file_get_contents(IP_API . "/dashboard/quickwin/" . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")))[0];
      $totalAktivitas = json_decode(file_get_contents(IP_API . "/dashboard/totalaktivitas/" . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")))[0];
      $progresRkf = json_decode(file_get_contents(IP_API . "/dashboard/penyelesaianrkf/" . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")))[0];
      $progresAktivitas = json_decode(file_get_contents(IP_API . "/dashboard/penyelesaianaktivitas/" . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")))[0];
    }

    // echo "<pre>";
    // print_r($jenisrkf);
    // echo "</pre>";die;


    

    $var = array();
    $var['var_title'] = "RENCANA KERJA FUNGSI – DASHBOARD";
    $var['jenis'] = $jenis;
    $var['var_subtitle'] = "";
    $var['module'] = "";
    $var['var_module'] = "rbb/rkf/dashboard_rkf";
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['periode'] =  $_SESSION['periodeRkf'];
    $var['jenisrkf'] = $jenisrkf;
    $var['grafikbar'] = $grafikbar;
    $var['progresRkf'] = $progresRkf;
    $var['rekapPegawai'] = $rekapPegawai;
    $var['var_other'] = array();



    if($_SESSION['user']->userrole == 1){
      $rkf_total = (object)[
          "jml_rkf" =>0,
          "jml_selesai" => 0,
          "jml_jt" => 0,
          "jml_terlambat" => 0,
      ];
      $quickwin_total = (object)[
        "jml_rkf" =>0,
        "jml_selesai" => 0,
        "jml_jt" => 0,
        "jml_terlambat" => 0,
      ];
      $aktivitas_total = (object)[
        "jml_rkf" =>0,
        "jml_selesai" => 0,
        "jml_jt" => 0,
        "jml_terlambat" => 0,
      ];
      
      foreach($totalRkf as $dt){
        $rkf_total->jml_rkf += $dt->jmlrkf; 
        $rkf_total->jml_selesai += $dt->jmlselesai; 
        $rkf_total->jml_jt += $dt->jmljt; 
        $rkf_total->jml_terlambat += $dt->jmlterlambat; 
      }
      foreach($totalQuickWin as $dt){
        $quickwin_total->jml_rkf += $dt->jmlrkf; 
        $quickwin_total->jml_selesai += $dt->jmlselesai; 
        $quickwin_total->jml_jt += $dt->jmljt; 
        $quickwin_total->jml_terlambat += $dt->jmlterlambat; 
      }

      $var['totalRkf'] = $rkf_total;
      $var['totalQuickWin'] = $quickwin_total;
      $var['totalAktivitas'] = $totalAktivitas;
      $var['progresAktivitas'] = $progresAktivitas;

      // $var['rekapPegawai'] = $rekapPegawai;
     

    }else{
    
    $var['totalRkf'] = $totalRkf;
    $var['totalQuickWin'] = $totalQuickWin;
    $var['totalAktivitas'] = $totalAktivitas;
    $var['progresAktivitas'] = $progresAktivitas;
   
    
  }
    $this->load->view('main', $var);
  }


  // =======================================================================================


  public function show_rkf()
  {
    $periode = $_SESSION['periodeRkf'];
    $data    = json_decode(file_get_contents(IP_API . "/rkf/" . $_SESSION['pegawai']->unit_kerja_id . "/" . date("Y") . "/" . $periode->periode_jenis));
    $kamusPegawai = $_SESSION['kamusPegawai'];
    $var = array();
    $var['data'] = $data;
    $var['periode'] = $periode;
    $var['kamusPegawai'] = $kamusPegawai;
    $var['var_title']       = "RENCANA KERJA FUNGSI – AKTIF";
    $var['var_subtitle']    = "rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/data_rkf";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  // =======================================================================================


  public function show_rkf_filter($filter)
  {
    $periode = $_SESSION['periodeRkf'];
    $data    = json_decode(file_get_contents(IP_API . "/rkf/" . $_SESSION['pegawai']->unit_kerja_id . "/" . date("Y") . "/" . $periode->periode_jenis));
    $kamusPegawai = $_SESSION['kamusPegawai'];

    $var['data'] = $data;
    $var['periode'] = $periode;
    $var['kamusPegawai'] = $kamusPegawai;
    $var['var_title']       = "RENCANA KERJA FUNGSI – AKTIF";
    $var['var_subtitle']    = "rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    if ($filter == "1") {                         //if skala
      $var['var_module']      = "rbb/rkf/data_rkf";
    } elseif ($filter == "2") {                         //if perspektif
      $var['var_module']      = "rbb/rkf/data_rkf_bsc";
    } elseif ($filter == "3") {                         //if subdiv
      $subdiv         = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_unit_kerja/" . $_SESSION['pegawai']->unit_kerja_id . "?api_key=prc", false))->result[0];
      $var['kamusSubdiv'] = array_column($subdiv, 'nama', 'id');
      $var['var_module']      = "rbb/rkf/data_rkf_pic";
    }
    $var['filter']      = $filter;
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  // ============================================================================================


  public function show_rkf_next()
  {
    $periode_next = json_decode(file_get_contents(IP_API . "/master/perioderkf/" . (date("Y") + 1), false));
    if (empty($periode_next)) {
      $jenis = "RBB Awal";
    } else {
      $jenis = $periode_next->rkf_jenis_nama;
    }

    $data    = json_decode(file_get_contents(IP_API . "/rkf/" . $_SESSION['pegawai']->unit_kerja_id . "/" . (date("Y") + 1) . "/1", false));
    // $datasupport = json_decode(file_get_contents(IP_API . "/rkf/sumnotif/" . $_SESSION['pegawai']->unit_kerja_id));
    $datasupport = json_decode(file_get_contents(IP_API . "/notif/sum/" . $_SESSION['pegawai']->unit_kerja_id . "/" . (date("Y")+1)));
    // print_r($datasupport); die;
    $var = array();

    $var['data'] = $data;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['datasupport'] = $datasupport;
    $var['var_title']       = "RENCANA KERJA FUNGSI";
    $var['var_subtitle']    = "rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    $var['jenis']   = $jenis;
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/data_rkf_baru";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  //=============================================================================================


  public function show_detail_rkf($id)
  {
    $id         = encrypt_decrypt("decrypt", $id);
    $data       = json_decode(file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id))[0];
    $all            = json_decode(file_get_contents(IP_API . "/master/all"));
    $data_anggaran = json_decode(file_get_contents(IP_API . "/master/poscoa"));

    $var = array();
    $var['data_anggaran'] = $data_anggaran;
    $var['all'] = $all;
    $var['kamusDivisi'] = $_SESSION['kamusDivisi'];
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['data'] = $data;
    $var['var_title']       = "RENCANA KERJA FUNGSI – AKTIF";
    $var['var_subtitle']    = "Rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/detail_rkf";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }


  //================================================================================================= 


  public function form_rkf()
  {
    $isuStrategis = json_decode(file_get_contents(IP_API.'/master/isustrategis/2020'));
    $transformasi = json_decode(file_get_contents(IP_API . '/master/transformasibpdall'));
    $datarakb = json_decode(file_get_contents(IP_API . '/master/rakball'));
    $periode_next = json_decode(file_get_contents(IP_API . "/master/perioderkf/" . (date("Y") + 1), false));
    if (empty($periode_next)) {
      $jenis = "RBB Awal";
    } else {
      $jenis = $periode_next->rkf_jenis_nama;
    }
    $all            = json_decode(file_get_contents(IP_API . "/master/all", false));
   
    $subdiv         = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_unit_kerja/" . $_SESSION['pegawai']->unit_kerja_id . "?api_key=prc"));
    //corplan
    $tahun_inisiatif = json_decode(file_get_contents(IP_API . '/master/coreplan/tahun'));
    $kud = json_decode(file_get_contents(IP_API."/master/kud"));
    $kud = array_filter($kud, function($var) {
                return ($var->kud_tahun == (date("Y")+1));
          });


    // echo "<pre>";
    // print_r($kud);
    // echo "</pre>";
    // die;

    $coa = json_decode(file_get_contents(IP_API . '/master/poscoa'));
    $coa_jenis = array_values(array_unique(array_column($coa, 'pos_coa_jenis_nama')));
    $coa_header = array_column($coa, 'pos_coa_header_nama', 'pos_coa_header_id');
    $coa_sub_header1 = array_column($coa, 'pos_coa_sub1_nama', 'pos_coa_sub1_id');
    $coa_sub_header2 = array_column($coa, 'pos_coa_sub2_nama', 'pos_coa_sub2_id');
    $coa_sub_header3 = array_column($coa, 'pos_coa_sub3_nama', 'pos_coa_sub3_id');

    $var = array();
    $var['var_title']       = "Create Rkf";
    $var['all']       = $all;
    $var['isuStrategis']       = $isuStrategis;
    $var['kud'] = $kud;
    $var['subdiv']       = $subdiv;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['tahun_inisiatif']       = $tahun_inisiatif;
    $var['transformasi'] = $transformasi;
    $var['datarakb'] = $datarakb;
    $var['coa']       = $coa;
    $var['coa_jenis']       = $coa_jenis;
    $var['coa_header']       = $coa_header;
    $var['coa_sub_header1']       = $coa_sub_header1;
    $var['coa_sub_header2']       = $coa_sub_header2;
    $var['coa_sub_header3']       = $coa_sub_header3;
    $var['var_subtitle']    = $jenis . ' - ' . (date("Y") + 1);
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/form_rkf";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // ===================================================================================================

  
  public function insert_rkf()
  {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // if(!empty($_POST['pab_jenis'])){
    //   echo "isi";
    // }else{
    //   echo "kosong";
    // }
    // die;


    // INSERT RKF
      foreach ($_POST['rkf_coa_bulan'] as $key => $dt) {
        $_POST['rkf_coa_bulan'][$key] = str_replace(',', '', $_POST['rkf_coa_bulan'][$key]);
      }
      $hasil = $this->umodel->bentuk_json($_POST, '0', 'Insert');
      $payload = json_encode($hasil);
      // print_r($hasil);die;
      // Prepare new cURL resource
      $url = IP_API . '/rkf';
      $result = request_api("post", $url, $payload);
      // $result = json_decode($result)[0]->rkf_id;

      // echo "<pre>";
      // print_r($hasil);
      // print_r($payload);
      // echo "</pre>";
      // print_r($result);die;

      if(!empty($_POST['pab_jenis'])){
        $data['rkfId'] = $result;
        $data['jenis'] = $_POST['pab_jenis'];
        $data['nama'] = $_POST['pab_nama'];
        $data['jadwal'] = $_POST['pab_jadwal'];
        $data['tujuanBank'] = $_POST['pab_tujuan_bank'];
        $data['tujuanNasabah'] = $_POST['pab_tujuan_nasabah'];
        $data['keterkaitan'] = $_POST['pab_keterkaitan'];
        $data['deskripsi'] = $_POST['pab_deskripsi'];
        $data['resiko'] = $_POST['pab_resiko'];
        $data['mitigasiResiko'] = $_POST['pab_mitigasi'];
        $payload2 = json_encode($data);
        $url2 = IP_API."/pab";
        echo "<pre>";
        print_r($payload2);
        echo "</pre>";
        $result2 = request_api("put", $url2, $payload2);
        print_r($result2);
      }
  
    // print_r($result);
    // die;
      if ($result !== '"pass"') {
        redirect(base_url() . 'rbb/rkf/show-new');
      } else {
        redirect(base_url() . 'rbb/rkf/form');
      }
  }

  // ==================================================================================================


  public function form_edit_rkf($id)
  {
    // $alljson        = file_get_contents(IP_API . "/master/all", false);
    // $all            = json_decode($alljson);
    
    // $var = array();
    // $var['var_title']       = "Rkf";
    // $var['var_subtitle']    = "Edit";
    // $var['var_breadcrumb']  = array();
    // $var['module']          = "";
    
    // $var['var_module']      = "rbb/rkf/formedit";
    // $var['var_other']       = array('all' => $all, 'rkf' => $rkf);
    // $this->load->view('main', $var);
    $id = encrypt_decrypt("decrypt", $id);
    $rkf  = $this->umodel->bentuk_array($id);
    // echo "<pre>";
    // print_r($rkf);
    // echo "</pre>";
    // die;
    $dataPab = json_decode(file_get_contents(IP_API.'/pab/'.$id));
    $isuStrategis = json_decode(file_get_contents(IP_API.'/master/isustrategis/2020'));
    $transformasi = json_decode(file_get_contents(IP_API . '/master/transformasibpdall'));
    $datarakb = json_decode(file_get_contents(IP_API . '/master/rakball'));
    $periode_next = json_decode(file_get_contents(IP_API . "/master/perioderkf/" . (date("Y") + 1), false));
    if (empty($periode_next)) {
      $jenis = "RBB Awal";
    } else {
      $jenis = $periode_next->rkf_jenis_nama;
    }
    $all            = json_decode(file_get_contents(IP_API . "/master/all", false));
   
    $subdiv         = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_unit_kerja/" . $_SESSION['pegawai']->unit_kerja_id . "?api_key=prc"));
    //corplan
    $tahun_inisiatif = json_decode(file_get_contents(IP_API . '/master/coreplan/tahun'));
    // $kud = json_decode(file_get_contents(IP_API."/master/kud"));
    // $kud = array_filter($kud, function($var) {
    //             return ($var->kud_tahun == (date("Y")+1));
    //       });
    // $kud = array_values($kud);

$all->allKUD = array_filter($all->allKUD, function($var){
    return ($var->kud_tahun == (date("Y")+1));
});
    // echo "<pre>";
    // print_r($all->allKUD);
    // echo "</pre>";
    // die;

    $coa = json_decode(file_get_contents(IP_API . '/master/poscoa'));
    $coa_jenis = array_values(array_unique(array_column($coa, 'pos_coa_jenis_nama')));
    $coa_header = array_column($coa, 'pos_coa_header_nama', 'pos_coa_header_id');
    $coa_sub_header1 = array_column($coa, 'pos_coa_sub1_nama', 'pos_coa_sub1_id');
    $coa_sub_header2 = array_column($coa, 'pos_coa_sub2_nama', 'pos_coa_sub2_id');
    $coa_sub_header3 = array_column($coa, 'pos_coa_sub3_nama', 'pos_coa_sub3_id');

    $var = array();
    $var['var_title']       = "Edit Rkf";
    if(!empty($dataPab)){
    $var['dataPab']       = $dataPab[0];
    }
    $var['all']       = $all;
    $var['isuStrategis']  = $isuStrategis;
    $var['rkf']       = $rkf;
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    // $var['kud'] = $kud;
    $var['subdiv']       = $subdiv;
    $var['tahun_inisiatif']       = $tahun_inisiatif;
    $var['transformasi'] = $transformasi;
    $var['datarakb'] = $datarakb;
    $var['coa']       = $coa;
    $var['coa_jenis']       = $coa_jenis;
    $var['coa_header']       = $coa_header;
    $var['coa_sub_header1']       = $coa_sub_header1;
    $var['coa_sub_header2']       = $coa_sub_header2;
    $var['coa_sub_header3']       = $coa_sub_header3;
    $var['var_subtitle']    = $jenis . ' - ' . (date("Y") + 1);
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/formedit1";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // ==================================================================================================


  public function insert_edit_rkf($id)
  {
    $id = encrypt_decrypt("decrypt", $id);
    if (isset($_POST['submit'])) {
      foreach ($_POST['rkf_coa_bulan'] as $key => $dt) {
        $_POST['rkf_coa_bulan'][$key] = str_replace(',', '', $_POST['rkf_coa_bulan'][$key]);
      }
      $hasil = $this->umodel->bentuk_json($_POST, $id, 'Update');
      $payload = json_encode($hasil);
       
      // Prepare new cURL resource
      $url = IP_API . '/rkf/update';
      //$result = request_api("put", $url, $payload);
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

      // Set HTTP Header for POST request
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
      ));

      // Submit the POST request
      $result = curl_exec($ch);
      curl_close($ch);
      if(!empty($_POST['pab_jenis'])){
        $data['rkfId'] = $id;
        $data['jenis'] = $_POST['pab_jenis'];
        $data['nama'] = $_POST['pab_nama'];
        $data['jadwal'] = $_POST['pab_jadwal'];
        $data['tujuanBank'] = $_POST['pab_tujuan_bank'];
        $data['tujuanNasabah'] = $_POST['pab_tujuan_nasabah'];
        $data['keterkaitan'] = $_POST['pab_keterkaitan'];
        $data['deskripsi'] = $_POST['pab_deskripsi'];
        $data['resiko'] = $_POST['pab_resiko'];
        $data['mitigasiResiko'] = $_POST['pab_mitigasi'];
        $payload2 = json_encode($data);
        $url2 = IP_API."/pab";
        echo "<pre>";
        print_r($payload2);
        echo "</pre>";
        $result2 = request_api("post", $url2, $payload2);
        print_r($result2);
      }

      $id = encrypt_decrypt("encrypt", $id);
      if ($result == '"pass"') {
        redirect(base_url() . 'rbb/rkf/show-new');
      } else {
        redirect(base_url() . 'rbb/rkf/edit/'.$id);
      }
      // Close cURL session handle

    } 
  }

  // ==================================================================================================



  public function reportRkf($tahun, $periode)
  {
    $data = file_get_contents(IP_API . "/rkf/report/001PPB/" . $tahun . "/" . $periode);
    $data = json_decode($data);
    if (empty($data)) {
      $this->session->set_flashdata('pesanReportRkf', 'Data Tidak Ditemukan ');
      redirect(base_url() . "rbb/rkf");
    } else {

      $var = array();
      $var['data'] = $data;
      $var['var_title'] = "RENCANA KERJA FUNGSI – AKTIF";
      $var['var_subtitle'] = "";
      $var['var_breadcrumb'] = array();
      $var['module'] = "";
      $var['var_module'] = "rbb/rkf/report";
      $var['var_other'] = array(
        // 'dataChart' => $dataChart,
        // 'periode'   => $periode,
        // 'jenisrkf'  => $jenisrkf
      );
      $this->load->view('main', $var);
    }
  }

  public function cetak($id)
  {
    $id = encrypt_decrypt("decrypt", $id);
    $alljson    = file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id, false);
    $data       = json_decode($alljson);

    $var = array();
    $var['datas'] = $data;



    ob_start();
    $this->load->view('document/cetak_detail', $var);
    $html = ob_get_contents();
    // die;
    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'A4', 'en');
    $pdf->WriteHTML($html);
    ob_end_clean();
    $pdf->Output('cetak detail.pdf', 'D');
  }



  public function otor($id)
  {
    $id = encrypt_decrypt("decrypt", $id);
    if (isset($_POST['submit'])) {
      $payload = $this->umodel->bentuk_json_otor($_POST, $id, 'Update');

      // Prepare new cURL resource
      $ch = curl_init(IP_API . '/rkf/otorkf');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLINFO_HEADER_OUT, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

      // Set HTTP Header for POST request
      curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($payload)
        )
      );

      // Submit the POST request
      $result = curl_exec($ch);

      // echo "xx".$result."xx";
      // Close cURL session handle
      curl_close($ch);
      redirect(base_url('rbb/rkf/show-new'));
    } else {

    $data       = json_decode(file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id))[0];
    $all            = json_decode(file_get_contents(IP_API . "/master/all"));
    $data_anggaran = json_decode(file_get_contents(IP_API . "/master/poscoa"));

    $var = array();
    $var['data_anggaran'] = $data_anggaran;
    $var['all'] = $all;
    $var['kamusDivisi'] = $_SESSION['kamusDivisi'];
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['data'] = $data;
      $var['var_title']       = "Rkf";
      $var['var_subtitle']    = "Otor";
      $var['var_breadcrumb']  = array();
      $var['module']          = "";
      // $var['datas']           = $data;

      $var['var_module']      = "sup/formedit1";
      $var['var_other']       = array();
      $this->load->view('main', $var);
    }
  }

  // ==============================================================================
  public function v_support($id, $filter_id)
  {

    $datasup = json_decode(file_get_contents(IP_API . "/notif/" . $id.'/'.(Date("Y")+1)));
    $data_seleksi = array_filter($datasup, function ($var) use ($filter_id) {
      return ($var->rkfuserfrom == $filter_id);
    });
    $var = array();
    $var['var_title']       = "Rkf";
    $var['var_subtitle']    = "Data Rkf Yang Disupport";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    $var['data_seleksi']    = $data_seleksi;
    $var['var_module']      = "rbb/rkf/data_sfl";
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  // ===============================================================================

  public function v_support_detail($id)
  {
    $id         = encrypt_decrypt("decrypt", $id);
    $data       = json_decode(file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id))[0];
    $all            = json_decode(file_get_contents(IP_API . "/master/all"));
    $data_anggaran = json_decode(file_get_contents(IP_API . "/master/poscoa"));

    $var = array();
    $var['data_anggaran'] = $data_anggaran;
    $var['all'] = $all;
    $var['showApprove'] = 1;
    $var['kamusDivisi'] = $_SESSION['kamusDivisi'];
    $var['kamusPegawai'] = $_SESSION['kamusPegawai'];
    $var['data'] = $data;
    $var['var_title']       = "RENCANA KERJA FUNGSI – AKTIF";
    $var['var_subtitle']    = "Rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";
    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/detail_rkf";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  public function approve_support($id)
  {
    $alljson    = file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id, false);
    $data       = json_decode($alljson);
    $var = array();

    $var['datas'] = $data;
    $var['var_title']       = "RENCANA KERJA FUNGSI – AKTIF";
    $var['var_subtitle']    = "Rkf";
    $var['var_breadcrumb']  = array();
    $var['module']          = "";

    // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
    $var['var_module']      = "rbb/rkf/detail_rkf_sfl";
    // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
    $var['var_other']       = array();
    $this->load->view('main', $var);
  }

  

  // ===============================================================================

  //untuk perhitungan rekap pegawai di dashboard
  public function getHitungRekapPegawai($rekapPegawai){
    foreach ($rekapPegawai as $dt) {
      // hitung persenan rkf
      if ($dt->jml_rkf_total != 0) {
        $dt->persen_rkf_selesai = round(($dt->jml_rkf_selesai / $dt->jml_rkf_total) * 100, 1) . "%";
        $dt->persen_rkf_proses = round(($dt->jml_rkf_proses / $dt->jml_rkf_total) * 100, 1) . "%";
        $dt->persen_rkf_belum = round(($dt->jml_rkf_belum / $dt->jml_rkf_total) * 100, 1) . "%";
      } else {
        $dt->persen_rkf_selesai = "0%";
        $dt->persen_rkf_proses = "0%";
        $dt->persen_rkf_belum = "0%";
      }
      // hitung persenan aktivitas
      if ($dt->jml_aktivitas_total != 0) {
        $dt->persen_aktivitas_selesai = round(($dt->jml_aktivitas_selesai / $dt->jml_aktivitas_total) * 100, 1) . "%";
        $dt->persen_aktivitas_proses = round(($dt->jml_aktivitas_proses / $dt->jml_aktivitas_total) * 100, 1) . "%";
        $dt->persen_aktivitas_belum = round(($dt->jml_aktivitas_belum / $dt->jml_aktivitas_total) * 100, 1) . "%";
      } else {
        $dt->persen_aktivitas_selesai = "0%";
        $dt->persen_aktivitas_proses = "0%";
        $dt->persen_aktivitas_belum = "0%";
      }
    }
    return $rekapPegawai;
  }

  //untuk perhitungan persebaran di dashboard
  public function getRekapPegawai(){
    if($_SESSION['user']->userrole == 1 ){
      $rekapPegawai = json_decode(file_get_contents(IP_API . '/admin/monitoring/' . Date("Y")));
    }else{
      $rekapPegawai = json_decode(file_get_contents(IP_API . '/dashboard/monitoring/' . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")));
    }
    return $rekapPegawaiHitung = $this->getHitungRekapPegawai($rekapPegawai);
  }

  public function filterPersebaran($persebaran, $filter){
    $hasil = array_values(array_filter($persebaran, function ($var) use($filter) {
      return ($var->jenis ==$filter);
    }));
    return $hasil;
  }

  public function persebaranGrafikbar($sebarRkf, $sebarQuickWin, $sebarAktivitas){
    $grafikbar = [];
        for ($i = 0; $i < 12; $i++) {
          // kelompok rkf
          $keyRkf  =  array_search(($i + 1), array_column($sebarRkf, 'bulan'));
          if (in_array(($i + 1), array_column($sebarRkf, 'bulan')) == true) {
            $grafikbar[$i]['rkf'] = $sebarRkf[$keyRkf]->jumlah;
          } else {
            $grafikbar[$i]['rkf'] = 0;
          }
          // kelompok aktivitas
          $keyQuickWin  =  array_search(($i + 1), array_column($sebarQuickWin, 'bulan'));
          if (in_array(($i + 1), array_column($sebarQuickWin, 'bulan')) == true) {
            $grafikbar[$i]['quickwin'] = $sebarQuickWin[$keyQuickWin]->jumlah;
          } else {
            $grafikbar[$i]['quickwin'] = 0;
          }
          // kelompok aktivitas
          $keyAktivitas  =  array_search(($i + 1), array_column($sebarAktivitas, 'bulan'));
          if (in_array(($i + 1), array_column($sebarAktivitas, 'bulan')) == true) {
            $grafikbar[$i]['aktivitas'] = $sebarAktivitas[$keyAktivitas]->jumlah;
          } else {
            $grafikbar[$i]['aktivitas'] = 0;
          }
        }

    return $grafikbar;
  }

  public function getPersebaran(){
    if($_SESSION['user']->userrole == 1 ){
      $persebaran = json_decode(file_get_contents(IP_API . "/admin/persebaran/". Date("Y")));
    }else{
      $persebaran = json_decode(file_get_contents(IP_API . "/dashboard/persebaran/" . $_SESSION['pegawai']->unit_kerja_id . '/' . Date("Y")));
    }
    //urutkan berdasarkan bulan
    usort($persebaran, function ($a, $b) {
      return $a->bulan <=> $b->bulan;
    });

        // pisahkan rkf, quickwin, dan aktivitas
        $sebarRkf = $this->filterPersebaran($persebaran, "rkf");
        $sebarQuickWin = $this->filterPersebaran($persebaran, "quickwin");
        $sebarAktivitas = $this->filterPersebaran($persebaran, "aktivitas");
        $grafikbar = $this->persebaranGrafikbar($sebarRkf, $sebarQuickWin, $sebarAktivitas);
        return $grafikbar;
  }

}
