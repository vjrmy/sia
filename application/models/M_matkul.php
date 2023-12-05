<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model{

  var $hari=$this->db->get('tbl_hari');
  var $jrs=$this->db->get('tbl_jurusan');
  var $per=$this->db->get('tbl_periode');
  var $column_order= array('id', 'periode', 'jrs', 'matkul', 'semester', 'ruang', 'hari', 'waktu',);
  var $order
  public function getDataTables(){

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