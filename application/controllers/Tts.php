<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tts extends CI_Controller {
    public function index()
	{
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
        $this->load->view('v_tts',$data);
        $this->load->view('template_admin/footer');
    }
public function proses() {
    $data = $this->input->post();

    $skorTotal = 0;
    $bobot = ['sering' => 3, 'kadang' => 2, 'tidak pernah' => 1];
    $jumlahJawaban = count($data) - 1; // Mengurangi 1 untuk mengesampingkan data non-jawaban

    foreach ($data as $key => $value) {
        if (strpos($key, 'jawaban') !== false) {
            $skorTotal += $bobot[$value];
        }
    }

    $rataRataSkor = $skorTotal / $jumlahJawaban;
    
    if ($rataRataSkor >= 2.5) {
        $tingkatStres = 'Tinggi';
    } elseif ($rataRataSkor >= 1.5) {
        $tingkatStres = 'Sedang';
    } else {
        $tingkatStres = 'Tidak Stress';
    }

    $this->session->set_flashdata('tingkat_stres', $tingkatStres);
    redirect('tes');
    }
}