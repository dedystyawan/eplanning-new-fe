<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

    public function __construct(){
        //session_start();
        parent::__construct();
        $this->load->model('Admin_model');
        if(!isset($_SESSION['user'])){
          redirect(base_url('login'));
      }
    }



    //Dokumen
    //View Dokumen
    public function vdoc($type){
      $type_dec=  encrypt_decrypt("decrypt",$type);
      $data = file_get_contents(IP_API.'/master/docupload/', false);
      $data= json_decode($data, true);
      $var = array();
      $var['var_title'] = "Dokumen";
      if($type==1){
           $var['var_subtitle'] = "Rencana Korporasi";
           $var['var_breadcrumb'] = array(array(
                                               "url" => "#",
                                               "title" => "<strong>Dokumen Rencana Korporasi</strong>"
                                           ));
     }else{
          $var['var_subtitle'] = "Rencana Bisnis Bank";
          $var['var_breadcrumb'] = array(array(
                                              "url" => "#",
                                              "title" => "<strong>Dokumen Rencana Bisnis Bank</strong>"
                                          ));
     }
      $var['module'] = "";

      // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
      $var['var_module'] = "admin/dokumen";
      // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
      $var['var_other'] = array('data'=>$data,"type"=>$type,"type_dec"=>$type_dec);
      $this->load->view('main',$var);
    }


    //Form Dokumen
    public function fdoc($type)
    {
     $type_dec=  encrypt_decrypt("decrypt",$type);
      if(isset($_POST)){
        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = '1000'; //on KB
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload("link")) {
             $_POST['link']=$this->upload->data('file_name');
             $_POST['jenis']= $type_dec;
             $payload= json_encode($_POST);
             // Prepare new cURL resource
             $ch = curl_init(IP_API.'/master/docupload');
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLINFO_HEADER_OUT, true);
             curl_setopt($ch, CURLOPT_POST, true);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

             // Set HTTP Header for POST request
             curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                 'Content-Type: application/json',
                 'Content-Length: ' . strlen($payload))
             );

             //Submit the POST request
             $result = curl_exec($ch);
             curl_close($ch);
             redirect(base_url().'admin/vdoc/'.$type);
        }else{
              echo "<script>alert('".$this->upload->display_errors()."');window.history.go(-1);</script>";
        }
      }else{
        redirect(base_url().'admin/vdoc/'.$type);
      }
    }

    //Edit Dokumen
    public function edoc($type,$id){
      $id=  encrypt_decrypt("decrypt",$id);
      $type_dec=  encrypt_decrypt("decrypt",$type);
      if(isset($_POST['nama'])){
        $_POST['jenis']= $type_dec;
        $payload= json_encode($_POST);
        // Prepare new cURL resource
        $ch = curl_init(IP_API.'/master/docupload/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set HTTP Header for POST request
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );

        // Submit the POST request
        $result = curl_exec($ch);
         redirect(base_url().'admin/vdoc/'.$type);
        // Close cURL session handle
        curl_close($ch);
      }
    }

    //Delete Dokumen
    public function ddoc($type,$id,$file){
        $id=  encrypt_decrypt("decrypt",$id);
        $file=  encrypt_decrypt("decrypt",$file);
        unlink(base_url()."assets/file/".$file);
        $ch = curl_init(IP_API.'/master/docupload/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        //curl_setopt($ch, CURLOPT_POST, true);

        $result = curl_exec($ch);
        redirect(base_url().'admin/vdoc/'.$type);
        curl_close($ch);
    }

    //master core plan
      //View Core Plan
      public function vcp(){
        $data = file_get_contents(IP_API.'/master/coreplan', false);
        $data= json_decode($data, true);
        $var = array();
        $var['var_title'] = "Data";
        $var['var_subtitle'] = "Corporate Plan";
        $var['var_breadcrumb'] = array(array(
                                           "url" => "#",
                                           "title" => "<strong>Corporate Plan</strong>"
                                        ));
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/core_plan";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);
      }

      //Form Core Plan
      public function fcp()
      {
        if(isset($_POST['submit'])){
          //print_r($_POST);
          $cp_kode = $_POST['cp_kode'];
          $cp_nama = $_POST['cp_nama'];
          $data['cpKode'] = $cp_kode;
          $data['cpNama'] = $cp_nama;
          //print_r($data);
          //print_r(json_encode($data));
          $payload= json_encode($data);
          //
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/coreplan');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
           redirect(base_url().'admin/vcp');

          //Close cURL session handle
          curl_close($ch);

        }
      }

      //Edit Core Plan
      public function ecp($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $cp_kode = $_POST['cp_kode'];
          $cp_nama = $_POST['cp_nama'];
          $data['cpKode'] = $cp_kode;
          $data['cpNama'] = $cp_nama;
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/coreplan/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vcp');
          // Close cURL session handle
          curl_close($ch);
        }
      }

      //Delete Core Plan
      public function dcp($id){
          $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/coreplan/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vcp');
          curl_close($ch);
      }



      //master Kebijakan umum direksi
      //View Kebijakan Umum Direksi
      public function vkud(){
        $data = file_get_contents(IP_API.'/master/kud', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Kebijakan Umum Direksi";
        $var['var_subtitle'] = "data Kebijakan Umum Direksi";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/kud";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);


      }

      //Form Kebijakan Umum Direksi
      public function fkud()
      {
        if(isset($_POST['submit'])){
          $kud_tahun        = $_POST['kud_tahun'];
          $kud_nama         = $_POST['kud_nama'];
          $data['kudTahun'] = $kud_tahun;
          $data['kudNama']  = $kud_nama;
          $payload= json_encode($data);

          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/kud');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vkud');

          //Close cURL session handle
          curl_close($ch);

        }else{
          $var = array();
          $var['var_title']       = "Rkf";
          $var['var_subtitle']    = "Input";
          $var['var_breadcrumb']  = array();
          $var['gcrud']           = 0;
          $var['module']          = "";

          // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
          $var['var_module']      = "admin/kud_tambah";
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array();
          $this->load->view('main',$var);
        }
      }

      //Edit Kebijakan Umum Direksi
      public function ekud($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['kudTahun'] = $_POST['kud_tahun'];
          $data['kudNama'] = $_POST['kud_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/kud/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vkud');
          // Close cURL session handle
          curl_close($ch);
        }else{
          $data_kud        = file_get_contents(IP_API."/master/kud", false);
          $data_kud            = json_decode($data_kud, true);
          $data = [];
          foreach ($data_kud  as $dt) {
            if ($dt['kud_id'] == $id) {
              $data['kud_id'] = $dt['kud_id'];
              $data['kud_tahun'] = $dt['kud_tahun'];
              $data['kud_nama'] = $dt['kud_nama'];
              break;
            }
          }

          $var = array();
          $var['id'] =  encrypt_decrypt('encrypt',$id);
          $var['data'] = $data;
          $this->load->view('module/admin/kud_edit',$var);
        }
      }

      //Delete Kebijakan Umum Direksi
      public function dkud($id){
        $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/kud/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vkud');
          curl_close($ch);
      }


      //master status proker
      //View Status Proker
      public function vstp(){
        $data = file_get_contents(IP_API.'/master/stsprokerall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Status Program Kerja";
        $var['var_subtitle'] = "Data Status Program Kerja";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/status_proker";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);
      }

      //Form Status Proker
      public function fstp()
      {
        if(isset($_POST['submit'])){
          $spNama = $_POST['status_proker_nama'];
          $data['spNama'] = $spNama;
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/stsproker');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vstp');
          //Close cURL session handle
          curl_close($ch);

        }else{
          $var = array();
          $var['var_title']       = "Rkf";
          $var['var_subtitle']    = "Input";
          $var['var_breadcrumb']  = array();
          $var['gcrud']           = 0;
          $var['module']          = "";

          // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
          $var['var_module']      = "admin/status_proker_tambah";
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array();
          $this->load->view('main',$var);
        }
      }

      public function estp($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['spSts'] = $_POST['status_proker_sts'];
          $data['spNama'] = $_POST['status_proker_nama'];
          $payload= json_encode($data);
          echo $payload;
          //Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/stsproker/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vstp');
          // Close cURL session handle
          curl_close($ch);
        }
      }

      //Delete Status Proker
      public function dstp($id){
          $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/stsproker/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vstp');
          curl_close($ch);
      }



      //master skala proker
      //View Skala Proker
      public function vsp(){
        $data = file_get_contents(IP_API.'/master/skalaprokerall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Skala Program Kerja";
        $var['var_subtitle'] = "Data";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/skala_proker";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);
      }

      //Form Skala Proker
      public function fsp()
      {
        if(isset($_POST['submit'])){
          $data['spNama'] = $_POST['skala_proker_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/skalaproker');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vsp');
          //Close cURL session handle
          curl_close($ch);

        }
      }

      //Edit Skala Proker
      public function esp($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['spSts'] = $_POST['skala_proker_sts'];
          $data['spNama'] = $_POST['skala_proker_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/skalaproker/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vsp');
          // Close cURL session handle
          curl_close($ch);
        }
      }

      //Delete Skala Proker
      public function dsp($id){
        $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/skalaproker/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vsp');
          curl_close($ch);
      }





      //master kategori proker
      //View Kategori Proker
      public function vkp(){
        $data = file_get_contents(IP_API.'/master/katprokerall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Kategori Program Kerja";
        $var['var_subtitle'] = "Data";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/kat_proker";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);
      }

      //Form Kategori Proker
      public function fkp()
      {
        if(isset($_POST['submit'])){
          //print_r($_POST);
          $data['kpNama'] = $_POST['kat_proker_nama'];
          // print_r($data);
          // print_r(json_encode($data));
          $payload= json_encode($data);
          //
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/katproker');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vkp');
          //echo $result;
          //Close cURL session handle
          curl_close($ch);

        }else{
          $var = array();
          $var['var_title']       = "Rkf";
          $var['var_subtitle']    = "Input";
          $var['var_breadcrumb']  = array();
          $var['gcrud']           = 0;
          $var['module']          = "";

          // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
          $var['var_module']      = "admin/kat_proker_tambah";
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array();
          $this->load->view('main',$var);
        }
      }

      //Edit Kategori Proker
      public function ekp($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['kpSts'] = $_POST['kat_proker_sts'];
          $data['kpNama'] = $_POST['kat_proker_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/katproker/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vkp');
          // Close cURL session handle
          curl_close($ch);
        }
      }

      //Delete Kategori Proker
      public function dkp($id){
        $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/katproker/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vkp');
          curl_close($ch);
      }







      //master bsc

      public function vbsc(){
        $data = file_get_contents(IP_API.'/master/bscall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "BSC";
        $var['var_subtitle'] = "Data";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/bsc";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data' => $data);
        $this->load->view('main',$var);
      }


      public function fbsc()
      {
        if(isset($_POST['submit'])){
          //print_r($_POST);
          $data['bscNama'] = $_POST['bsc_nama'];
          // print_r($data);
          // print_r(json_encode($data));
          $payload= json_encode($data);
          //
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/bsc');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect('admin/vbsc');
          //echo $result;
          //Close cURL session handle
          curl_close($ch);

        }
      }

      public function ebsc($id){
          $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['bscSts'] = $_POST['bsc_sts'];
          $data['bscNama'] = $_POST['bsc_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/bsc/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect('admin/vbsc');
          //echo $result;
          // Close cURL session handle
          curl_close($ch);
        }
      }

      public function dbsc($id){
          $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/bsc/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect('admin/vbsc');
          curl_close($ch);
      }










      //master tlaudit
      //View TL Audit
      public function vtla(){
        $data = file_get_contents(IP_API.'/master/tlauditall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Tindak Lanjut Audit";
        $var['var_subtitle'] = "Data";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/tlaudit";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);


      }

      //Form TL Audit
      public function ftla()
      {
        if(isset($_POST['submit'])){
          $data['tlaNama'] = $_POST['tindak_lanjut_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/tlaudit');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vtla');
          //echo $result;
          //Close cURL session handle
          curl_close($ch);

        }else{
          $var = array();
          $var['var_title']       = "Rkf";
          $var['var_subtitle']    = "Input";
          $var['var_breadcrumb']  = array();
          $var['gcrud']           = 0;
          $var['module']          = "";

          // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
          $var['var_module']      = "admin/tlaudit_tambah";
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array();
          $this->load->view('main',$var);
        }
      }

      //Edit TL Audit
      public function etla($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['tlaSts'] = $_POST['tindak_lanjut_sts'];
          $data['tlaNama'] = $_POST['tindak_lanjut_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/tlaudit/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          $result = curl_exec($ch);
          redirect(base_url().'admin/vtla');
          // Close cURL session handle
          curl_close($ch);
        }else{
          $data_tlaudit        = file_get_contents(IP_API."/master/tlauditall", false);
          $data_tlaudit            = json_decode($data_tlaudit, true);
          $data = [];
          foreach ($data_tlaudit  as $dt) {
            if ($dt['tindak_lanjut_id'] == $id) {
              $data['tindak_lanjut_id'] = $dt['tindak_lanjut_id'];
              $data['tindak_lanjut_nama'] = $dt['tindak_lanjut_nama'];
              $data['tindak_lanjut_sts'] = $dt['tindak_lanjut_sts'];
              break;
            }
          }

          $var = array();
          $var['id']          =  encrypt_decrypt('encrypt',$id);
          $var['data'] = $data;
          $this->load->view('module/admin/tlaudit_edit',$var);
        }
      }

      //Delete TL Audit
      public function dtla($id){
        $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/tlaudit/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vtla');
          curl_close($ch);
      }


      //master satuan
      //View Satuan
      public function vs(){
        $data = file_get_contents(IP_API.'/master/satuanall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Satuan";
        $var['var_subtitle'] = "Data";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/satuan";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);


      }

      //Form Satuan
      public function fs()
      {
        if(isset($_POST['submit'])){
          $data['satNama'] = $_POST['satuan_nama'];
          $payload= json_encode($data);

          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/satuan');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vs');
          //Close cURL session handle
          curl_close($ch);

        }else{
          $var = array();
          $var['var_title']       = "Satuan";
          $var['var_subtitle']    = "Input";
          $var['var_breadcrumb']  = array();
          $var['gcrud']           = 0;
          $var['module']          = "";

          // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
          $var['var_module']      = "admin/satuan_tambah";
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array();
          $this->load->view('main',$var);
        }
      }

      //Edit Satuan
      public function es($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['satSts'] = $_POST['satuan_sts'];
          $data['satNama'] = $_POST['satuan_nama'];
          $payload= json_encode($data);
          print_r($payload);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/satuan/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vs');
          //echo $result;
          // Close cURL session handle
          curl_close($ch);
        }else{
          $data_satuan        = file_get_contents(IP_API."/master/satuanall", false);
          $data_satuan            = json_decode($data_satuan, true);
          $data = [];
          foreach ($data_satuan  as $dt) {
            if ($dt['satuan_id'] == $id) {
              $data['satuan_id'] = $dt['satuan_id'];
              $data['satuan_nama'] = $dt['satuan_nama'];
              $data['satuan_sts'] = $dt['satuan_sts'];
              break;
            }
          }

          $var = array();
          $var['id'] =  encrypt_decrypt('encrypt', $id);
          $var['data'] = $data;
          $this->load->view('module/admin/satuan_edit',$var);
        }
      }

      //Delete Satuan
      public function ds($id){
          $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/satuan/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vs');
          curl_close($ch);
      }




      //master Pos Biaya
      //View Pos Biaya
      public function vpb(){
        $data = file_get_contents(IP_API.'/master/posbiayaall', false);
        $data = json_decode($data, true);
        $var = array();
        $var['var_title'] = "Pos Biaya";
        $var['var_subtitle'] = "Data";
        $var['var_breadcrumb'] = array();
        $var['module'] = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module'] = "admin/posbiaya";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other'] = array('data'=>$data);
        $this->load->view('main',$var);


      }

      //Form Pos Biaya
      public function fpb()
      {
        if(isset($_POST['submit'])){
          $data['posNama'] = $_POST['posbiaya_nama'];
          $payload= json_encode($data);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/posbiaya');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          //Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vpb');
          //Close cURL session handle
          curl_close($ch);

        }else{
          $var = array();
          $var['var_title']       = "Pos Biaya";
          $var['var_subtitle']    = "Input";
          $var['var_breadcrumb']  = array();
          $var['gcrud']           = 0;
          $var['module']          = "";

          // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
          $var['var_module']      = "admin/posbiaya_tambah";
          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
          $var['var_other']       = array();
          $this->load->view('main',$var);
        }
      }

      //Edit Pos Biaya
      public function epb($id){
        $id=  encrypt_decrypt("decrypt",$id);
        if(isset($_POST['submit'])){
          $data['posSts'] = $_POST['posbiaya_sts'];
          $data['posNama'] = $_POST['posbiaya_nama'];
          $payload= json_encode($data);
          print_r($payload);
          // Prepare new cURL resource
          $ch = curl_init(IP_API.'/master/posbiaya/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
          //curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

          // Set HTTP Header for POST request
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Content-Length: ' . strlen($payload))
          );

          // Submit the POST request
          $result = curl_exec($ch);
          redirect(base_url().'admin/vpb');
          // Close cURL session handle
          curl_close($ch);
        }else{
          $data_satuan        = file_get_contents(IP_API."/master/posbiayaall", false);
          $data_satuan            = json_decode($data_satuan, true);
          $data = [];
          foreach ($data_satuan  as $dt) {
            if ($dt['posbiaya_id'] == $id) {
              $data['posbiaya_id'] = $dt['posbiaya_id'];
              $data['posbiaya_nama'] = $dt['posbiaya_nama'];
              $data['posbiaya_sts'] = $dt['posbiaya_sts'];
              break;
            }
          }

          $var = array();
          $var['var_module']      = "admin/posbiaya_edit";
          $var['id'] =  encrypt_decrypt('encrypt',$id);
          $var['data'] = $data;
          $this->load->view('module/admin/posbiaya_edit',$var);
        }
      }

      //Delete Pos Biaya
      public function dpb($id){
        $id=  encrypt_decrypt("decrypt",$id);
          $ch = curl_init(IP_API.'/master/posbiaya/'.$id);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          //curl_setopt($ch, CURLOPT_POST, true);

          $result = curl_exec($ch);
          redirect(base_url().'admin/vpb');
          curl_close($ch);
      }

      //master Jenis Rkf
      //View Rkf
      public function vpjr(){
       $data = file_get_contents(IP_API.'/master/jenisrkf', false);
       $data = json_decode($data, true);
       $var = array();
       $var['var_title'] = "Jenis RKF";
       $var['var_subtitle'] = "Data";
       $var['var_breadcrumb'] = array();
       $var['module'] = "";

       // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
       $var['var_module'] = "admin/jenisrkf";
       // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
       $var['var_other'] = array('data'=>$data);
       $this->load->view('main',$var);
      }

      // //Report
      // public function report(){
      //      $var = array();
      //      $var['var_title']       = "Laporan Rencana Kerja Fungsional";
      //      $var['var_subtitle']    = "Download";
      //      $var['var_breadcrumb']  = array();
      //      $var['gcrud']           = 0;
      //      $var['module']          = "";
      //
      //      // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
      //      $var['var_module']      = "report/formproker";
      //
      //     if(!empty($_POST)){
      //          $divisi= explode("*",$_POST['divisi']);
      //          $data = $this->rmodel->bentuk_report_proker($divisi[0],$_POST['jenis_rkf'],$_POST['tahun_rkf']);
      //          if(!empty($data)){
      //               $this->load->view('module/report/proker',array("data"=>$data,"divisi"=>$divisi[1]));
      //          }else{
      //               $notif="Data tidak ditemukan!";
      //               $var['var_other']       = array("notif"=>$notif);
      //               $this->load->view('main',$var);
      //          }
      //     }else{
      //          // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
      //          $var['var_other']       = array("notif"=>"");
      //          $this->load->view('main',$var);
      //     }
      //
      // }


     //Report
    public function report(){
         $var = array();
         $var['var_title']       = "Laporan Rencana Kerja Fungsional";
         $var['var_subtitle']    = "Download";
         $var['var_breadcrumb']  = array();
         $var['gcrud']           = 0;
         $var['module']          = "";

         // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
         $var['var_module']      = "report/formproker";

         if(!empty($_POST)){
              $divisi= explode("*",$_POST['divisi']);
              $jenis_rkf= explode("*",$_POST['jenis_rkf']);
              $data = $this->rmodel->bentuk_report_proker($divisi[0],$jenis_rkf[0],$_POST['tahun_rkf']);
              if(!empty($data)){
                   $var['var_module']      = "report/proker";
                   $var['var_other']       = array("download"=>0,
                                                   "data"=>$data,
                                                   "divisi"=>$divisi[1],
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

      //RKF Grid
      public function rkfgrid(){
        $periode    = json_decode(file_get_contents(IP_API."/master/perioderkf/".date("Y"),false));
        $alljson    = file_get_contents(IP_API."/rkf/report/".date("Y")."/".$periode->periode_jenis, false);
        $data       = json_decode($alljson);

        $var = array();
        $var['data']            = $data;
        $var['periode']         = $periode;
        $var['var_title']       = "Rencana Kerja Fungsional";
        $var['var_subtitle']    = "Data";
        $var['var_breadcrumb']  = array();
        $var['gcrud']           = 0;
        $var['module']          = "";

        // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
        $var['var_module']      = "admin/data_rkf";
        // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
        $var['var_other']       = array();
        $this->load->view('main',$var);
      }

      //PUSH Proker
      public function changeproker($status=Null){
           if(isset($_POST['submit'])){
             $data['rkfTahun']          = $_POST['tahun_rkf'];
             $data['rkfJenisBefore']    = $_POST['jenis_rkf_awal'];
             $data['rkfJenisAfter']     = $_POST['jenis_rkf_tujuan'];
             $payload= json_encode($data);
             // Prepare new cURL resource
             $ch = curl_init(IP_API.'/rkf/gantijenis');
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLINFO_HEADER_OUT, true);
             curl_setopt($ch, CURLOPT_POST, true);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

             // Set HTTP Header for POST request
             curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                 'Content-Type: application/json',
                 'Content-Length: ' . strlen($payload))
             );

             //Submit the POST request
             $result = curl_exec($ch);
             $hasil= json_decode($result);
             if($hasil->message=="fail"){
                  $status=  encrypt_decrypt("encrypt","Data sudah ada!");
             }else{
                  $status=  encrypt_decrypt("encrypt","Sukses!");
             }
             redirect(base_url().'admin/changeproker/'.$status);

             //Close cURL session handle
             curl_close($ch);

           }else{
             if($status != Null){
                  $status=  encrypt_decrypt("decrypt",$status);
             }

             $var = array();
             $var['var_title']       = "Ganti Status RKF";
             $var['var_subtitle']    = "Change";
             $var['var_breadcrumb']  = array();
             $var['gcrud']           = 0;
             $var['module']          = "";

             // var module adalah isi dari tampilan konten tengah yg berada di view/module/ nama module nya
             $var['var_module']      = "admin/formpushproker";
             // var other adalah variabel yang dikirimkan dari kontroller ke view var_module
             $var['var_other']       = array("status"=>$status);
             $this->load->view('main',$var);
           }
      }
      public function tes(){
           $this->rmodel->bentuk_data_master();
      }
}
