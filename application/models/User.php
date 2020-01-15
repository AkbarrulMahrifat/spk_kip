<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 3/20/2019
 * Time: 8:55 PM
 */

class user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function cek_login($u,$p){
        $this->db->from('user');
        $this->db->where('username',$u);
        $this->db->where('password',$p);
        $a = $this->db->get();
        if($a->num_rows() == 1){
            $data = $a->result_array();
            $this->session->set_userdata('id', $data[0]['id']);
            $this->session->set_userdata('username', $data[0]['username']);
            $this->session->set_userdata('nama', $data[0]['nama']);
            return true;
        }
        else{
            return false;
        }
    }

    public function getDataPegawaiAll(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('jabatan', 2);
        return $this->db->get();
    }

    public function tambahUser($data){
        $insert = $this->db->insert('user', $data);
        return $insert;
    }

    public function ubahUser($data, $id){
        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        return $update;
    }

    public function getUserPerId($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $get = $this->db->get();
        return $get;
    }
}