<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('M_login');
    }
    
	function index(){
        // $this->load->view('v_login');
        if($this->session->userdata('masuk') == TRUE){ 
             $url=base_url('Home');
                redirect($url);
        }else{
            $this->load->view('v_login');
        };
    }
    
    function autentikasi(){
        $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_dosen=$this->M_login->auth_dosen($username,$password);
 
        if($cek_dosen->num_rows() > 0){ //jika login sebagai dosen
            $data=$cek_dosen->row_array();
            if($data['status']=='1'){ //cek aktif akun
                $this->session->set_userdata('masuk',TRUE);
                if($data['level']=='1'){ //Akses admin
                    $this->session->set_userdata('ses_nip',$data['nip']);
                    $this->session->set_userdata('ses_pass',$data['pass']);
                    $this->session->set_userdata('akses','Administrator');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    echo "admin";
                }else if($data['level']=='2'){ //akses dosen
                    $this->session->set_userdata('akses','Dosen');
                    $this->session->set_userdata('ses_nip',$data['nip']);
                    $this->session->set_userdata('ses_pass',$data['pass']);
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    echo "dosen";
                }else{ //akses keuangan
                    $this->session->set_userdata('akses','Keuangan');
                    $this->session->set_userdata('ses_nip',$data['nip']);
                    $this->session->set_userdata('ses_pass',$data['pass']);
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    echo "keuangan";
                }
            }else{
                echo "block";
            }
        }else{ //jika login sebagai mahasiswa
            $cek_mahasiswa=$this->M_login->auth_mahasiswa($username,$password);
            if($cek_mahasiswa->num_rows() > 0){
                $data=$cek_mahasiswa->row_array();
                if($data['status']=='1'){ //cek aktif akun
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','Mahasiswa');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nim',$data['nim']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_pass',$data['pass']);
                    $this->session->set_userdata('ses_jrs',$data['nama_jrs']);
                    $this->session->set_userdata('ses_fakul',$data['fakultas']);
                    $this->session->set_userdata('ses_smt',$data['smt']);
                    $this->session->set_userdata('ses_sks',$data['sks']);
                    $this->session->set_userdata('ses_akt',$data['angkatan']);
                    echo "mahasiswa";
                }else{
                    echo "block";
                }
            }else{  // jika username dan password tidak ditemukan atau salah
                echo "akun";
            }
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }

}