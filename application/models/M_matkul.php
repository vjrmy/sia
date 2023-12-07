<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model{
  var $table= 'tbl_matkul';
  var $column_order= array('id', 'periode', 'jrs', 'matkul', 'semester', 'ruang', 'hari', 'waktu',);
  var $order =array('id', 'periode', 'jrs', 'matkul', 'semester', 'ruang', 'hari', 'waktu',);

  public function get_hari(){
    $hari = $this->db->get('tbl_hari');
    return $hari;
  }
  public function get_jurus(){
    $jrs = $this->db->get('tbl_jurusan');
    return $jrs;
  }
  public function get_peri(){
    $per = $this->db->get('tbl_periode');
    return $per;
  } 
  private function _get_data_query(){
    $this->gb->from($this->table);
    if (isset($_POST['search']['value'])){
      $this->db->like('periode', $_POST['search']['value']);
      $this->db->or_like('jrs', $_POST['search']['value']);
      $this->db->or_like('matkul', $_POST['search']['value']);
      $this->db->or_like('semester', $_POST['search']['value']);
      $this->db->or_like('ruang', $_POST['search']['value']);
      $this->db->or_like('hari', $_POST['search']['value']);
      $this->db->or_like('waktu', $_POST['search']['value']);
    }
    if (isset($_POST['order'])){
        $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }else{
      $this->db->order_by('matkul', 'ASC');
    }
  }
  public function getDataTables(){

    $query = $this->db->get();
  }
  

  function get_matkul() { 
    $this->datatables->select('*');
    $this->datatables->from('tbl_matkul');
    $this->datatables->join('tbl_periode', 'periode=per_id');
    $this->datatables->join('tbl_jurusan', 'jrs=jrs_id');
    $this->datatables->join('tbl_hari', 'hari=hari_id'); 
    $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
    return $this->datatables->generate();
  }
}