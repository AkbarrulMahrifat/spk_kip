<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 8/2/2019
 * Time: 1:01 AM
 */

class Kriteria extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_kriteria_all(){
        $this->db->select('*');
        $this->db->from('kriteria');
        return $this->db->get();
    }

    public function get_data_kriteria_core(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('factor', 1);
        return $this->db->get();
    }

    public function get_data_kriteria_secondary(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('factor', 2);
        return $this->db->get();
    }

    public function tambah_kriteria($data){
        return $this->db->insert('kriteria', $data);
    }

    public function ubah_kriteria($data, $id_kriteria){
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->update('kriteria', $data);
    }

    public function hapus_kriteria($id_kriteria){
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->delete('kriteria');
    }
}