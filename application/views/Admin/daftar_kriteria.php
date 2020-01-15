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
    <h1 class="h3 mb-2 text-gray-800">Daftar Kriteria</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kriteria</h6>
            <a class="btn btn-sm btn-success text-white ml-auto w-auto" href="#" data-toggle="modal" data-target="#tambahKriteria">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kriteria</th>
                        <th>Nilai Target</th>
                        <th>Factor</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($kriteria as $k){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$k->nama_kriteria?></td>
                        <td><?=$k->nilai_target?></td>
                        <td><?=$k->factor?></td>
                        <td>
                            <a class="btn btn-sm btn-info text-white editKriteria" data-idkriteria="<?=$k->id_kriteria?>" data-namakriteria="<?=$k->nama_kriteria?>" data-nilaikriteria="<?=$k->nilai_target?>" data-factor="<?=$k->factor?>">Edit</a>
                            <a class="btn btn-sm btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?=site_url('Admin/hapus_kriteria/'.$k->id_kriteria)?>">Hapus</a>
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
<div class="modal fade" id="tambahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/tambah_kriteria')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" class="form-control small" placeholder="Nama Kriteria" aria-label="Search" aria-describedby="basic-addon2" id="nama_kriteria" name="nama_kriteria" required>
                            </div>

                            <div class="form-group">
                                <label for="nilai_kriteria">Nilai Target Kriteria</label>
                                <input type="number" class="form-control small" placeholder="Nilai Kriteria" aria-label="Search" aria-describedby="basic-addon2" id="nilai_kriteria" name="nilai_kriteria" required>
                            </div>

                            <div class="form-group">
                                <label for="factor">Factor</label>
                                <select id="factor" class="form-control small" aria-label="Search" aria-describedby="basic-addon2" name="factor" required>
                                    <option value="">-- Pilih Factor --</option>
                                        <option value="1">Core Factor</option>
                                        <option value="2">Secondary Factor</option>
                                </select>
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

<!-- Modal Ubah Siswa-->
<div class="modal fade" id="ubahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/ubah_kriteria')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <input type="hidden" id="edit-id_kriteria" name="id_kriteria">
                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" class="form-control small" placeholder="Nama Kriteria" aria-label="Search" aria-describedby="basic-addon2" id="edit-nama_kriteria" name="nama_kriteria" required>
                            </div>

                            <div class="form-group">
                                <label for="nilai_kriteria">Nilai Target Kriteria</label>
                                <input type="number" class="form-control small" placeholder="Nilai Kriteria" aria-label="Search" aria-describedby="basic-addon2" id="edit-nilai_kriteria" name="nilai_kriteria" required>
                            </div>

                            <div class="form-group">
                                <label for="factor">Factor</label>
                                <select id="edit-factor" class="form-control small" aria-label="Search" aria-describedby="basic-addon2" name="factor" required>
                                    <option value="">-- Pilih Factor --</option>
                                    <option value="1">Core Factor</option>
                                    <option value="2">Secondary Factor</option>
                                </select>
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
    $('.editKriteria').on('click', function(){
        $('#edit-id_kriteria').val($(this).data('idkriteria'));
        $('#edit-nama_kriteria').val($(this).data('namakriteria'));
        $('#edit-nilai_kriteria').val($(this).data('nilaikriteria'));
        $('#edit-factor').val($(this).data('factor')).change();
        $('#ubahKriteria').modal('show');
    });
</script>