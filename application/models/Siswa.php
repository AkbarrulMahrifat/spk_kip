<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 8/2/2019
 * Time: 1:01 AM
 */

class Siswa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDataSiswaAll(){
        return $this->db->get('siswa');
    }

    public function tambah_siswa($data){
        return $this->db->insert('siswa', $data);
    }

    public function ubah_siswa($data, $id_siswa){
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->update('siswa', $data);
    }

    public function hapus_siswa($id_siswa){
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->delete('siswa');
    }
}