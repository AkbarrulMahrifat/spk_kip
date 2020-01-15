<?php


class Profile_matching extends CI_Controller
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

    public function index(){
        $data['kriteria_core'] = $this->Kriteria->get_data_kriteria_core()->result();
        $data['kriteria_secondary'] = $this->Kriteria->get_data_kriteria_secondary()->result();
        $data['kriteria'] = $this->Kriteria->get_data_kriteria_all()->result();
        $data['siswa'] = $this->Siswa->getDataSiswaAll()->result();
        foreach ($data['kriteria'] as $k){
            $data['subkriteria'][$k->id_kriteria] = $this->Subkriteria->get_data_subkriteria_per_kriteria($k->id_kriteria)->result();
        }
        $profil = $this->Model_profile->get_data_profil_siswa()->result();
        foreach ($profil as $p){
            $data['profil'][$p->id_siswa][$p->id_kriteria] = $p->id_subkriteria;
        }

        $this->load->view('Admin/header.php', $data);
        $this->load->view('Admin/input_profile.php');
        $this->load->view('Admin/footer.php');
    }

    public function hasil_perhitungan(){
        $post = $this->input->post();
        $siswa = $this->Siswa->getDataSiswaAll()->result();
        $kriteria_core = $this->Kriteria->get_data_kriteria_core()->result();
        $kriteria_secondary = $this->Kriteria->get_data_kriteria_secondary()->result();
        $kriteria = $this->Kriteria->get_data_kriteria_all()->result();

        //Data profil siswa
        $profile = $post['kriteria'];

        //cek data profil sudah ada atau tidak di database
        foreach ($siswa as $s) {
            foreach ($kriteria as $k) {
                $id_subkriteria = $this->Subkriteria->get_id_subkriteria_nilai($k->id_kriteria, $profile[$s->id_siswa][$k->id_kriteria]);
                $cek = $this->Model_profile->cek_profil($s->id_siswa,$k->id_kriteria, $id_subkriteria);

                if ($cek->num_rows() > 0){
                    $this->Model_profile->update_profil($s->id_siswa, $k->id_kriteria, $id_subkriteria, $cek->row()->id_nilai_profil);
                }else{
                    $this->Model_profile->insert_profil($s->id_siswa, $k->id_kriteria, $id_subkriteria);
                }
            }
        }

        //Bobot Nilai GAP
        $selisih_gap = array(0, 1, -1, 2, -2, 3, -3, 4, -4);
        $bobot_gap = array(5, 4.5, 4, 3.5, 3, 2.5, 2, 1.5, 1 );

        //hitung kriteria core
        foreach ($siswa as $s){
            //Hitung Core Factor per alternatif
            foreach ($kriteria_core as $k){
                $gap = $profile[$s->id_siswa][$k->id_kriteria] - $k->nilai_target;
                $key_gap = array_search($gap, $selisih_gap);
                $nilai_gap = $bobot_gap[$key_gap];

                $perhitungan[$s->id_siswa]['core']['profil'][$k->id_kriteria] = $profile[$s->id_siswa][$k->id_kriteria];
                $perhitungan[$s->id_siswa]['core']['gap'][$k->id_kriteria] = $gap;
                $perhitungan[$s->id_siswa]['core']['nilai_gap'][$k->id_kriteria] = $nilai_gap;
            }
            //hitung rata" GAP Core Factor
            $avg_gap_core = array_sum($perhitungan[$s->id_siswa]['core']['nilai_gap'])/count($perhitungan[$s->id_siswa]['core']['nilai_gap']);
            $perhitungan[$s->id_siswa]['core']['average'] = (float) number_format($avg_gap_core, 2);

            //Hitung Secondary Factor per alternatif
            foreach ($kriteria_secondary as $ks){
                $gap = $profile[$s->id_siswa][$ks->id_kriteria] - $ks->nilai_target;
                $key_gap = array_search($gap, $selisih_gap);
                $nilai_gap = $bobot_gap[$key_gap];

                $perhitungan[$s->id_siswa]['secondary']['profil'][$ks->id_kriteria] = $profile[$s->id_siswa][$ks->id_kriteria];
                $perhitungan[$s->id_siswa]['secondary']['gap'][$ks->id_kriteria] = $gap;
                $perhitungan[$s->id_siswa]['secondary']['nilai_gap'][$ks->id_kriteria] = $nilai_gap;
            }

            //hitung rata" GAP Secondary Factor
            $avg_gap_secondary = array_sum($perhitungan[$s->id_siswa]['secondary']['nilai_gap'])/count($perhitungan[$s->id_siswa]['secondary']['nilai_gap']);
            $perhitungan[$s->id_siswa]['secondary']['average'] = (float) number_format($avg_gap_secondary, 2);

            //Hitung Total Nilai (rata2 core factor x bobot 60%)+(rata2 secondary factor x bobot 40%)
            $avg_core = $perhitungan[$s->id_siswa]['core']['average'];
            $avg_secondary = $perhitungan[$s->id_siswa]['secondary']['average'];
            $total_nilai = (0.6 * $avg_core) + (0.4 * $avg_secondary);
            $perhitungan[$s->id_siswa]['total_nilai'] = (float) number_format($total_nilai, 2);

            if ($perhitungan[$s->id_siswa]['total_nilai'] >= 4.00){
                $perhitungan[$s->id_siswa]['keterangan'] = "Layak";
            } else {
                $perhitungan[$s->id_siswa]['keterangan'] = "Tidak Layak";
            }
        }

        $data = array(
            'siswa' => $siswa,
            'kriteria_core' => $kriteria_core,
            'kriteria_secondary' => $kriteria_secondary,
            'hasil' => $perhitungan,
        );

        $this->load->view('Admin/header.php', $data);
        $this->load->view('Admin/hasil_perhitungan.php');
        $this->load->view('Admin/footer.php');
    }
}