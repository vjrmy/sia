<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
        //cek nip dan password dosen
        function auth_dosen($username,$password){
                $result=$this->db->query("SELECT * FROM tbl_dosen WHERE nip='$username' AND pass=md5('$password') LIMIT 1");
                return $result;
        }
 
        //cek nim dan password mahasiswa
        function auth_mahasiswa($username,$password){
                $result=$this->db->query("SELECT * FROM tbl_mahasiswa INNER JOIN tbl_jurusan ON tbl_mahasiswa.jrs_id=tbl_jurusan.jrs_id WHERE nim='$username' AND pass=sha1('$password') LIMIT 1"); 
                return $result;
        }
 
}