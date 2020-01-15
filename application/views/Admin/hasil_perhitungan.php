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
            <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><strong>Keterangan Kriteria :</strong></p>
                <ul>
                    <?php $i=1; foreach ($kriteria_core as $kc){ ?>
                        <li>CF<?=$i++?> - <?=$kc->nama_kriteria?> (Core Factor)</li>
                    <?php } ?>
                    <?php $j=1; foreach ($kriteria_secondary as $ks){ ?>
                        <li>SF<?=$j++?> - <?=$ks->nama_kriteria?> (Secondary Factor)</li>
                    <?php } ?>
                </ul>
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
                    <?php foreach ($siswa as $s){ ?>
                        <tr>
                            <td><?=$s->nama_siswa?></td>
                            <!--Kriteria Core Factor-->
                            <?php foreach ($kriteria_core as $kc){ ?>
                                <td>
                                    <?=$hasil[$s->id_siswa]['core']['profil'][$kc->id_kriteria]?>
                                </td>
                            <?php } ?>
                            <!--Kriteria Secondary Factor-->
                            <?php foreach ($kriteria_secondary as $ks){ ?>
                                <td>
                                    <?=$hasil[$s->id_siswa]['secondary']['profil'][$ks->id_kriteria]?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <h5>Perhitungan GAP :</h5>
            <div class="table-responsive">
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
                    <?php foreach ($siswa as $s){ ?>
                        <tr>
                            <td><?=$s->nama_siswa?></td>
                            <!--Kriteria Core Factor-->
                            <?php foreach ($kriteria_core as $kc){ ?>
                                <td>
                                    <?=$hasil[$s->id_siswa]['core']['profil'][$kc->id_kriteria]." - ".$kc->nilai_target?>
                                    <br>
                                    <?=" = ".$hasil[$s->id_siswa]['core']['gap'][$kc->id_kriteria]?>
                                </td>
                            <?php } ?>
                            <!--Kriteria Secondary Factor-->
                            <?php foreach ($kriteria_secondary as $ks){ ?>
                                <td>
                                    <?=$hasil[$s->id_siswa]['secondary']['profil'][$ks->id_kriteria]." - ".$ks->nilai_target?>
                                    <br>
                                    <?=" = ".$hasil[$s->id_siswa]['secondary']['gap'][$ks->id_kriteria]?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <h5>Pembobotan Nilai GAP :</h5>
            <div class="table-responsive">
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
                    <?php foreach ($siswa as $s){ ?>
                        <tr>
                            <td><?=$s->nama_siswa?></td>
                            <!--Kriteria Core Factor-->
                            <?php foreach ($kriteria_core as $kc){ ?>
                                <td>
                                    <?=$hasil[$s->id_siswa]['core']['nilai_gap'][$kc->id_kriteria]?>
                                </td>
                            <?php } ?>
                            <!--Kriteria Secondary Factor-->
                            <?php foreach ($kriteria_secondary as $ks){ ?>
                                <td>
                                    <?=$hasil[$s->id_siswa]['secondary']['nilai_gap'][$ks->id_kriteria]?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <h5>Hasil Perhitungan Total :</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NCF</th>
                        <th>NSF</th>
                        <th>Total Nilai</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($siswa as $s){ ?>
                        <tr>
                            <td><?=$s->nama_siswa?></td>
                            <td><?=$hasil[$s->id_siswa]['core']['average']?></td>
                            <td><?=$hasil[$s->id_siswa]['secondary']['average']?></td>
                            <td><?=$hasil[$s->id_siswa]['total_nilai']?></td>
                            <td><?=$hasil[$s->id_siswa]['keterangan']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
