<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 8/2/2019
 * Time: 1:01 AM
 */

class Subkriteria extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_subkriteria_all(){
        $this->db->select('*');
        $this->db->from('subkriteria a');
        $this->db->join('kriteria b', 'a.id_kriteria=b.id_kriteria', 'left');
        return $this->db->get();
    }

    public function get_data_subkriteria_per_kriteria($id_kriteria){
        $this->db->select('*')
            ->from('subkriteria')
            ->where('id_kriteria', $id_kriteria);
        return $this->db->get();
    }

    public function tambah_subkriteria($data){
        return $this->db->insert('subkriteria', $data);
    }

    public function ubah_subkriteria($data, $id_subkriteria){
        $this->db->where('id_subkriteria', $id_subkriteria);
        return $this->db->update('subkriteria', $data);
    }

    public function hapus_subkriteria($id_subkriteria){
        $this->db->where('id_subkriteria', $id_subkriteria);
        return $this->db->delete('subkriteria');
    }

    public function get_id_subkriteria_nilai($id_kriteria, $nilai_subkriteria){
        $data = $this->db->select('*')
            ->from('subkriteria')
            ->where('id_kriteria', $id_kriteria)
            ->where('nilai_subkriteria', $nilai_subkriteria)
            ->get();
        return $data->row()->id_subkriteria;
    }
}