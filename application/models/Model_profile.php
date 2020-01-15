<?php


class Model_profile extends CI_Model
{
    Public function get_data_profil_siswa(){
        $data = $this->db->select('*, a.id_siswa as id_siswa')
            ->from('siswa a')
            ->join('nilai_profil b', 'a.id_siswa=b.id_siswa', 'left')
            ->get();
        return $data;
    }

    public function cek_profil($id_siswa, $id_kriteria, $id_subkriteria){
        $data = $this->db->select('*')
            ->from('nilai_profil')
            ->where('id_siswa', $id_siswa)
            ->where('id_kriteria', $id_kriteria)
            ->where('id_subkriteria', $id_subkriteria)
            ->get();
        return $data;
    }

    public function insert_profil($id_siswa, $id_kriteria, $id_subkriteria){
        $data = array(
            'id_siswa'=>$id_siswa,
            'id_kriteria'=>$id_kriteria,
            'id_subkriteria'=>$id_subkriteria,
        );

        $this->db->insert('nilai_profil', $data);
    }

    public function update_profil($id_siswa, $id_kriteria, $id_subkriteria, $id_nilai_profile){
        $data = array(
            'id_siswa'=>$id_siswa,
            'id_kriteria'=>$id_kriteria,
            'id_subkriteria'=>$id_subkriteria,
        );

        $this->db->where('id_nilai_profil', $id_nilai_profile);
        $this->db->update('nilai_profil', $data);
    }
}