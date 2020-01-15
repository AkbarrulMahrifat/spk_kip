<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 3/19/2019
 * Time: 11:20 PM
 */

class login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('User');

    }

    public function index()
    {
        if ($this->session->userdata('id') != NULL) {
            redirect('Admin/beranda');
        } else {
            $this->load->view('login.php');
        }
    }

    function aksi_login()
    {
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $b = $this->User->cek_login($u, $p);
//        var_dump($b);
        if ($b) {
            redirect('Admin/beranda');
        } else {
            $this->session->set_flashdata('error', 'username dan password salah');
            redirect('/');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('jabatan');
        $this->session->unset_userdata('penjualan');
        $this->session->unset_userdata('stok');
        $this->session->unset_userdata('keuangan');
        $this->session->unset_userdata('foto');

        session_destroy();

        redirect('Login/index');
    }
}