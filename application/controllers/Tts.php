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
    public function soal()
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
        $this->load->view('v_tts1',$data);
        $this->load->view('template_admin/footer');
    }
    public function nilai()
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
            'akses' => $this->session->userdata('akses'),
            'stress' => $this->session->flashdata('tingkat_stres'),
            'persen' => $this->session->flashdata('persen_format'),
        );
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/navbar',$data);
        $this->load->view('v_tts2',$data);
        $this->load->view('template_admin/footer');
    }
public function proses() {
    $data = $this->input->post();

$skorTotal = 0;
$bobot = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

// Mengalikan setiap nilai dengan bobotnya
foreach ($data as $kunci => $nilai) {
    if (isset($bobot[$nilai])) {
        $skorTotal += $bobot[$nilai];
    }
}

// Membagi skor total dengan jumlah poin
// $jumlahPoin = count($data) * 5;
$persenSkor = $skorTotal * 2;
$persenFormat = number_format($persenSkor, 2) . '%';



// Menentukan tingkat stres
if ($persenSkor > 80 ) {
    $tingkatStres = 'Sangat Tinggi';
} elseif ($persenSkor > 60) {
    $tingkatStres = 'Tinggi';
} elseif ($persenSkor > 40) {
    $tingkatStres = 'Sedang';
} elseif($persenSkor > 20)  {
    $tingkatStres = 'Rendah';
} else {
    $tingkatStres = 'Tidak Stress';
}
    

$this->session->set_flashdata('tingkat_stres', $tingkatStres);
$this->session->set_flashdata('persen_format', $persenFormat);
    redirect('tts/nilai');
    }
}