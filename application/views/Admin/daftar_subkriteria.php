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
    <h1 class="h3 mb-2 text-gray-800">Daftar SubKriteria</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data SubKriteria</h6>
            <a class="btn btn-sm btn-success text-white ml-auto w-auto" href="#" data-toggle="modal" data-target="#tambahSubkriteria">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kriteria</th>
                        <th>Nama Subkriteria</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($subkriteria as $sk){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$sk->nama_kriteria." (ID: ".$sk->id_kriteria.")"?></td>
                        <td><?=$sk->nama_subkriteria?></td>
                        <td><?=$sk->nilai_subkriteria?></td>
                        <td>
                            <a class="btn btn-sm btn-info text-white ubahSubkriteria" data-idsubkriteria="<?=$sk->id_subkriteria?>" data-namasubkriteria="<?=$sk->nama_subkriteria?>" data-nilaisubkriteria="<?=$sk->nilai_subkriteria?>" data-idkriteria="<?=$sk->id_kriteria?>">Edit</a>
                            <a class="btn btn-sm btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?=site_url('Admin/hapus_subkriteria/'.$sk->id_subkriteria)?>">Hapus</a>
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
<div class="modal fade" id="tambahSubkriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/tambah_subkriteria')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_aspek">Nama Kriteria</label>
                                <select id="id_aspek"class="form-control small" aria-label="Search" aria-describedby="basic-addon2" name="id_kriteria" required>
                                    <option value="">-- Pilih Kriteria --</option>
                                    <?php foreach ($kriteria as $a){ ?>
                                        <option value="<?=$a->id_kriteria?>"><?=$a->nama_kriteria?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_kriteria">Nama Subkriteria</label>
                                <input type="text" class="form-control small" placeholder="Nama Subkriteria" aria-label="Search" aria-describedby="basic-addon2" id="nama_subkriteria" name="nama_subkriteria" required>
                            </div>

                            <div class="form-group">
                                <label for="nilai_subkriteria">Nilai Subkriteria</label>
                                <input type="number" class="form-control small" placeholder="Nilai Subkriteria" aria-label="Search" aria-describedby="basic-addon2" id="nilai_subkriteria" name="nilai_subkriteria" required>
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

<!-- Modal Ubah Subkriteria-->
<div class="modal fade" id="ubahSubkriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/ubah_subkriteria')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <input id="edit-id_subkriteria" name="id_subkriteria" type="hidden">
                            <div class="form-group">
                                <label for="edit-id_kriteria">Nama Kriteria</label>
                                <select id="edit-id_kriteria"class="form-control small" aria-label="Search" aria-describedby="basic-addon2" name="id_kriteria" required>
                                    <option value="">-- Pilih Kriteria --</option>
                                    <?php foreach ($kriteria as $a){ ?>
                                        <option value="<?=$a->id_kriteria?>"><?=$a->nama_kriteria?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit-nama_subkriteria">Nama Subkriteria</label>
                                <input type="text" class="form-control small" placeholder="Nama Subkriteria" aria-label="Search" aria-describedby="basic-addon2" id="edit-nama_subkriteria" name="nama_subkriteria" required>
                            </div>

                            <div class="form-group">
                                <label for="nilai_subkriteria">Nilai Subkriteria</label>
                                <input type="number" class="form-control small" placeholder="Nilai Subkriteria" aria-label="Search" aria-describedby="basic-addon2" id="edit-nilai_subkriteria" name="nilai_subkriteria" required>
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

<script>
    $('.ubahSubkriteria').on('click', function(){
        $('#edit-id_subkriteria').val($(this).data('idsubkriteria'));
        $('#edit-nama_subkriteria').val($(this).data('namasubkriteria'));
        $('#edit-nilai_subkriteria').val($(this).data('nilaisubkriteria'));
        $('#edit-id_kriteria').val($(this).data('idkriteria')).change();
        $('#ubahSubkriteria').modal('show');
    });
</script>