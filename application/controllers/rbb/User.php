<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

    public function __construct(){
        // session_start();
        parent::__construct();

        if(!isset($_SESSION['user'])){
          redirect(base_url('login'));
      }

    }

    public function lapor(){
      $alljson    = file_get_contents(IP_API."/rkf/?unitKerjaId=".$_SESSION['pegawai']->unit_kerja_id, false);
      $data       = json_decode($alljson);
      $var = array();
      $var['datas'] = $data;

       ob_start();
      $this->load->view('report.php',$var);
       $html = ob_get_contents();

      require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A3','en');
      $pdf->WriteHTML($html);
      ob_end_clean();
      $pdf->Output('surat.pdf', 'D');
    }






    public function downloadreport(){
      if(!empty($_SESSION['report_rkf'])){
           $this->load->view('module/report/proker',array(
                                                          "download"=>1,
                                                          "data"=>$_SESSION['report_rkf']['data'],
                                                          "divisi"=>$_SESSION['pegawai']->unit_kerja,
                                                          "tahun"=>$_SESSION['report_rkf']['tahun'],
                                                          "jenisrkf"=>$_SESSION['report_rkf']['jenisrkf']));
      }else{
           redirect(base_url().'user/report');
      }
  }



    public function report(){
      $var = array();
      $var['var_title']       = "Laporan Rencana Kerja Fungsional";
      $var['var_subtitle']    = "Download";
      $var['var_breadcrumb']  = array();
      $var['gcrud']           = 0;
      $var['module']          = "";

      // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
      $var['var_module']      = "report/formprokeruser";

     if(!empty($_POST)){
          $jenis_rkf= explode("*",$_POST['jenis_rkf']);
          $data = $this->rmodel->bentuk_report_proker($_SESSION['pegawai']->unit_kerja_id,$jenis_rkf[0],$_POST['tahun_rkf']);

          if(!empty($data)){
               $var['var_module']      = "report/proker";
               $var['var_other']       = array("download"=>0,
                                               "data"=>$data,
                                               "divisi"=>$_SESSION['pegawai']->unit_kerja,
                                               "tahun"=>$_POST['tahun_rkf'],
                                               "jenisrkf"=>$jenis_rkf[1]);
               $_SESSION['report_rkf']["data"]      = $data;
               $_SESSION['report_rkf']["tahun"]     = $_POST['tahun_rkf'];
               $_SESSION['report_rkf']["jenisrkf"]  = $jenis_rkf[1];
               $this->load->view('main',$var);
          }else{
               $notif                ="Data tidak ditemukan!";
               $var['var_other']     = array("notif"=>$notif);
               $this->load->view('main',$var);
          }
     }else{
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array("notif"=>"");
          $this->load->view('main',$var);
     }

 }

    
  
}
