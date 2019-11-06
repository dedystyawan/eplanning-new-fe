<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //view login
    public function index()
    {
        if (isset($_SESSION['user'])) {
            redirect(base_url('/rbb/rkf'));
        } else {
            $this->load->view('login/login3');
        }
    }


    // cek login function
    public  function cek_login()
    {
        $username = $_POST['user_name'];
        $password = md5($_POST['user_password']);

        $cekLogin = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_user_auth/" . $username . "/" . $password . "?api_key=prc"));
        if (empty($cekLogin)) {
            $this->session->set_flashdata('pesan', 'NIP atau Password salah');
            redirect('/login');
        } else {
            $cekUserrole = json_decode(file_get_contents(IP_API . "/login/" . $username));
            // print_r($cekUserrole); die;
            if (empty($cekUserrole)) {
                $this->session->set_flashdata('pesan', 'Anda Tidak Terdaftar ');
                redirect('/login');
            } else {
                $userrole = $cekUserrole[0];
                $_SESSION['pegawai']     = $cekLogin->result[0][0];
                $_SESSION['user'] = $userrole;

                //simpan periode ke session
                $periodeRkf = json_decode(file_get_contents(IP_API . "/master/perioderkf/" . date("Y")));
                $_SESSION['periodeRkf'] = $periodeRkf;

                //simpan data pegawai di divisi user untuk kamus ke session
                $pegawaiDivisi =  file_get_contents(SDM_API . '/api_v2/pegawai/prc_get_pegawai_per_divisi/' . $_SESSION['pegawai']->unit_kerja_id . '?api_key=prc');
                $pegawaiDivisi = json_decode($pegawaiDivisi, true);
                $pegawaiDivisi = $pegawaiDivisi['result'][0];
                $kamusPegawai = array_column($pegawaiDivisi, 'nama', 'pegawai_id');
                $_SESSION['kamusPegawai'] = $kamusPegawai;

                // simpan data nama-nama divisi
                $divisi = json_decode(file_get_contents(SDM_API . "/api_v2/pegawai/prc_get_all_divisi?api_key=prc"))->result[0];
                $kamusDivisi = array_column($divisi, 'nama', 'id');
                $_SESSION['kamusDivisi'] = $kamusDivisi;
                // echo "<pre>";
                // print_r($_SESSION);
                // echo "</pre>";
                // die;
                redirect('/rbb/rkf');
            }
        }
    }

    //logout function
    public function logout()
    {
        session_destroy();
        redirect(base_url() . 'login');
    }
}
