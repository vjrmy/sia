<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            redirect('login');
		};
	}
	
	public function index()
	{
		if ($this->session->userdata('akses')=='Administrator') {
			$data = array(
				'nip' => $this->session->userdata('ses_nip'),
				'pass' => $this->session->userdata('ses_pass'),
				'id' => $this->session->userdata('ses_id'),
				'nama' => $this->session->userdata('ses_nama'),
				'akses' => $this->session->userdata('akses'));
			$this->load->view('template_admin/header');
			$this->load->view('template_admin/navbar',$data);
			$this->load->view('v_admin/v_home',$data);
			$this->load->view('template_admin/footer');
		}else if ($this->session->userdata('akses')=='Dosen'){
			$data = array(
				'nip' => $this->session->userdata('ses_nip'),
				'pass' => $this->session->userdata('ses_pass'),
				'id' => $this->session->userdata('ses_id'),
				'nama' => $this->session->userdata('ses_nama'),
				'akses' => $this->session->userdata('akses'));
			$this->load->view('template_admin/header');
			$this->load->view('template_admin/navbar',$data);
			$this->load->view('v_dosen/v_home',$data);
			$this->load->view('template_admin/footer');
		}else if ($this->session->userdata('akses')=='Keuangan'){
			$data = array(
				'nip' => $this->session->userdata('ses_nip'),
				'pass' => $this->session->userdata('ses_pass'),
				'id' => $this->session->userdata('ses_id'),
				'nama' => $this->session->userdata('ses_nama'),
				'akses' => $this->session->userdata('akses'));
			$this->load->view('template_admin/header');
			$this->load->view('template_admin/navbar',$data);
			$this->load->view('v_dosen/v_home',$data);
			$this->load->view('template_admin/footer');
		}else{ //mahasiswa
			$data = array(
				'nim' => $this->session->userdata('ses_nim'),
				'pass' => $this->session->userdata('ses_pass'),
				'id' => $this->session->userdata('ses_id'),
				'nama' => $this->session->userdata('ses_nama'),
				'jrs' => $this->session->userdata('ses_jrs'),
				'fakul' => $this->session->userdata('ses_fakul'),
				'smt' => $this->session->userdata('ses_smt'),
				'sks' => $this->session->userdata('ses_sks'),
				'akt' => $this->session->userdata('ses_akt'),
				'akses' => $this->session->userdata('akses'));
			$this->load->view('template_admin/header');
			$this->load->view('template_admin/navbar',$data);
			$this->load->view('v_mahasiswa/v_home',$data);
			$this->load->view('template_admin/footer');
		}
		
		
	}
}