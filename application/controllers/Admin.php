<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 8/1/2019
 * Time: 1:11 PM
 */

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id') == NULL){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu !');
            redirect('/');
        }

        $this->load->model('User');
        $this->load->model('Siswa');
        $this->load->model('Kriteria');
        $this->load->model('Subkriteria');
        $this->load->model('Model_profile');
    }

    public function beranda(){
        $this->load->view('Admin/header.php');
        $this->load->view('Admin/beranda.php');
        $this->load->view('Admin/footer.php');
    }

    public function daftar_siswa(){
        $data['siswa'] = $this->Siswa->getDataSiswaAll()->result();
        $this->load->view('Admin/header.php', $data);
        $this->load->view('Admin/daftar_siswa.php');
        $this->load->view('Admin/footer.php');
    }

    public function tambah_siswa(){
        $data = array(
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nis' => $this->input->post('nis_siswa'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        );

        $insert = $this->Siswa->tambah_siswa($data);

        if ($insert == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_siswa');
    }

    public function ubah_siswa(){
        $data = array(
            'nama_siswa' => $this->input->post('nama_siswa'),
            'nis' => $this->input->post('nis_siswa'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        );

        $update = $this->Siswa->ubah_siswa($data, $this->input->post('id_siswa'));

        if ($update == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_siswa');
    }

    public function hapus_siswa($id_siswa){
        $delete = $this->Siswa->hapus_siswa($id_siswa);

        if ($delete == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_siswa');
    }

    //Kriteria
    public function daftar_kriteria(){
        $data['kriteria'] = $this->Kriteria->get_data_kriteria_all()->result();
        $this->load->view('Admin/header.php', $data);
        $this->load->view('Admin/daftar_kriteria.php');
        $this->load->view('Admin/footer.php');
    }

    public function tambah_kriteria(){
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'nilai_target' => $this->input->post('nilai_kriteria'),
            'factor' => $this->input->post('factor'),
        );

        $insert = $this->Kriteria->tambah_kriteria($data);

        if ($insert == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_kriteria');
    }

    public function ubah_kriteria(){
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'nilai_target' => $this->input->post('nilai_kriteria'),
            'factor' => $this->input->post('factor'),
        );

        $update = $this->Kriteria->ubah_kriteria($data, $this->input->post('id_kriteria'));

        if ($update == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_kriteria');
    }

    public function hapus_kriteria($id_kriteria){
        $delete = $this->Kriteria->hapus_kriteria($id_kriteria);

        if ($delete == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_kriteria');
    }

    //Subkriteria
    public function daftar_subkriteria(){
        $data['kriteria'] = $this->Kriteria->get_data_kriteria_all()->result();
        $data['subkriteria'] = $this->Subkriteria->get_data_subkriteria_all()->result();
        $this->load->view('Admin/header.php', $data);
        $this->load->view('Admin/daftar_subkriteria.php');
        $this->load->view('Admin/footer.php');
    }

    public function tambah_subkriteria(){
        $data = array(
            'nama_subkriteria' => $this->input->post('nama_subkriteria'),
            'nilai_subkriteria' => $this->input->post('nilai_subkriteria'),
            'id_kriteria' => $this->input->post('id_kriteria'),
        );

        $insert = $this->Subkriteria->tambah_subkriteria($data);

        if ($insert == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_subkriteria');
    }

    public function ubah_subkriteria(){
        $data = array(
            'nama_subkriteria' => $this->input->post('nama_subkriteria'),
            'nilai_subkriteria' => $this->input->post('nilai_subkriteria'),
            'id_kriteria' => $this->input->post('id_kriteria'),
        );

        $update = $this->Subkriteria->ubah_subkriteria($data, $this->input->post('id_subkriteria'));

        if ($update == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_subkriteria');
    }

    public function hapus_subkriteria($id_subkriteria){
        $delete = $this->Subkriteria->hapus_subkriteria($id_subkriteria);

        if ($delete == TRUE){
            $this->session->set_flashdata('success', 'Berhasil menambah data.');
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data.');
        }
        redirect('Admin/daftar_subkriteria');
    }
}