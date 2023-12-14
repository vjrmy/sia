<?php
// class M_dosen extends CI_Model{
 
//   function get_jrs(){ //ambil data jurusan
//     $hsl=$this->db->get('tbl_jurusan');
//     return $hsl;
//   }
//   function get_mhs() { //ambil data mahasiswa yang akan di generate ke datatable
//         $this->datatables->select('id,nim,nama,jurusan,sks,angkatan');
//         $this->datatables->from('tbl_mahasiswa');
//         $this->datatables->join('tbl_jurusan', 'id=jurusan');
//         $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
//         return $this->datatables->generate();
//   }
// }