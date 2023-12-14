<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matkul extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_matkul'); //load model M_matkul
  }
  public function index()
  {
    $data = array(
      'nama' => $this->session->userdata('ses_nama'),
      'hari'     => $this->M_matkul->get_hari(),
      'jrs'     => $this->M_matkul->get_jurus(),
      'periode'    => $this->M_matkul->get_peri(),
      'akses' => $this->session->userdata('akses')
    );
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/navbar', $data);
    $this->load->view('v_dosen/v_matkul', $data);
    $this->load->view('template_admin/footer');
  }

  public function getData()
  {
    $results = $this->M_matkul->getDataTables();
    $data =[];
    $no = $_POST['start'];
    foreach ($results as $result){
      $row = array();
      $row[] = ++$no;
      $row[] = $result->per_id;
      $row[] = $result->jrs_id;
      $row[] = $result->matkul;
    }
  }
}

//   function simpan()
//   { //function simpan data
//     $data = array(
//       // 'id' => $this->input->post('id'),
//       'periode' => $this->input->post('periode'),
//       'jrs' => $this->input->post('jrs'),
//       'matkul' => $this->input->post('matkul'),
//       'semester' => $this->input->post('semester'),
//       'ruang' => $this->input->post('ruang'),
//       'hari' => $this->input->post('hari'),
//       'waktu' => $this->input->post('waktu'),
//     );
//     $this->db->insert('tbl_matkul', $data);
//     redirect('Matkul');
//   }

//   function update()
//   { //function update data
//     $kode = $this->input->post('id');
//     $data = array(
//       'periode' => $this->input->post('periode'),
//       'jrs' => $this->input->post('jrs'),
//       'matkul' => $this->input->post('matkul'),
//       'semester' => $this->input->post('semester'),
//       'ruang' => $this->input->post('ruang'),
//       'hari' => $this->input->post('hari'),
//       'waktu' => $this->input->post('waktu'),
//     );
//     $this->db->where('id', $kode);
//     $this->db->update('tbl_matkul', $data);
//     redirect('Matkul');
//   }

//   function delete()
//   { //function hapus data
//     $kode = $this->input->post('mk_id');
//     $this->db->where('mk_id', $kode);
//     $this->db->delete('tbl_matkul');
//     redirect('Matkul');
//   }
// }
