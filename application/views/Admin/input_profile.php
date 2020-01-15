<?php
/**
 * Created by PhpStorm.
 * User: Akbarrul Mahrifat
 * Date: 8/2/2019
 * Time: 12:44 AM
 */ ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profile Matching</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Input Profile</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form id="perhitungan_profile" method="post" action="<?=site_url('Profile_matching/hasil_perhitungan')?>">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <!--Kriteria Core Factor-->
                            <?php $i=1; foreach ($kriteria_core as $kc){ ?>
                                <th><?="CF".$i++?></th>
                            <?php } ?>
                            <!--Kriteria Secondary Factor-->
                            <?php $j=1; foreach ($kriteria_secondary as $ks){ ?>
                                <th><?="SF".$j++?></th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $s){
                            ?>
                            <tr>
                                <td><?=$s->nama_siswa?></td>
                                <?php
                                foreach ($kriteria_core as $kc){
                                    ?>
                                    <td width="110px">
                                        <select id="id_aspek"class="form-control small" aria-label="Search" aria-describedby="basic-addon2" name="kriteria[<?=$s->id_siswa?>][<?=$kc->id_kriteria?>]" required>
                                            <option value="">Nilai</option>
                                            <?php foreach ($subkriteria[$kc->id_kriteria] as $a){ ?>
                                                <option value="<?=$a->nilai_subkriteria?>" <?php if (isset($profil[$s->id_siswa][$kc->id_kriteria])){if ($profil[$s->id_siswa][$kc->id_kriteria]==$a->id_subkriteria){echo "selected";}} ?>><?=intval($a->nilai_subkriteria).". ".$a->nama_subkriteria?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                <?php } ?>
                                <?php
                                foreach ($kriteria_secondary as $ks){
                                    ?>
                                    <td width="110px">
                                        <select id="id_aspek"class="form-control small" aria-label="Search" aria-describedby="basic-addon2" name="kriteria[<?=$s->id_siswa?>][<?=$ks->id_kriteria?>]" required>
                                            <option value="">Nilai</option>
                                            <?php foreach ($subkriteria[$ks->id_kriteria] as $a){ ?>
                                                <option value="<?=$a->nilai_subkriteria?>" <?php if (isset($profil[$s->id_siswa][$ks->id_kriteria])){if ($profil[$s->id_siswa][$ks->id_kriteria]==$a->id_subkriteria){echo "selected";}}?>><?=intval($a->nilai_subkriteria).". ".$a->nama_subkriteria?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <button class="btn btn-sm btn-success text-white ml-auto w-auto" type="submit">Analisa</button>
                    <div style="float: right">
                        <p><strong>Keterangan Kriteria :</strong></p>
                        <ul>
                            <?php $i=1; foreach ($kriteria_core as $kc){ ?>
                                <li>CF<?=$i++?> - <?=$kc->nama_kriteria?> (Core Factor)</li>
                            <?php } ?>
                            <?php $j=1; foreach ($kriteria_secondary as $ks){ ?>
                                <li>SF<?=$j++?> - <?=$ks->nama_kriteria?> (Secondary Factor)</li>
                            <?php } ?>
                        </ul>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
