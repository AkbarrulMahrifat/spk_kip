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
    <h1 class="h3 mb-2 text-gray-800">Daftar Aspek</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Aspek</h6>
            <a class="btn btn-sm btn-success text-white ml-auto w-auto" href="#" data-toggle="modal" data-target="#tambahSiswa">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Aspek</th>
                        <th>Prosentase (%)</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($aspek as $a){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$a->nama_aspek?></td>
                        <td><?=$a->prosentase?> %</td>
                        <td>
                            <a class="btn btn-sm btn-info text-white">Edit</a>
                            <a class="btn btn-sm btn-danger text-white">Hapus</a>
                        </td>
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

<!-- Modal Tambah Siswa-->
<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aspek</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/tambah_aspek')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_aspek">Nama Aspek</label>
                                <input type="text" class="form-control small" placeholder="Nama Aspek" aria-label="Search" aria-describedby="basic-addon2" id="nama_aspek" name="nama_aspek" required>
                            </div>

                            <div class="form-group">
                                <label for="prosentase">Prosentase (%)</label>
                                <input type="text" class="form-control small" placeholder="Prosentase (%)" aria-label="Search" aria-describedby="basic-addon2" id="prosentase" name="prosentase" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>