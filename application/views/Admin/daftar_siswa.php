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
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
            <a class="btn btn-sm btn-success text-white ml-auto w-auto" href="#" data-toggle="modal" data-target="#tambahSiswa">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Asal Sekolah</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $s){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$s->nama_siswa?></td>
                        <td><?=$s->nis?></td>
                        <td><?=$s->asal_sekolah?></td>
                        <td><?=$s->tempat_lahir.", ".$s->tanggal_lahir?></td>
                        <td><?=$s->alamat?></td>
                        <td>
                            <a class="btn btn-sm btn-info text-white editSiswa" data-idsiswa="<?=$s->id_siswa?>" data-nama="<?=$s->nama_siswa?>" data-nis="<?=$s->nis?>" data-asalsekolah="<?=$s->asal_sekolah?>" data-tempatlahir="<?=$s->tempat_lahir?>" data-tanggallahir="<?=$s->tanggal_lahir?>" data-alamat="<?=$s->alamat?>">Edit</a>
                            <a class="btn btn-sm btn-danger text-white" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="<?=site_url('Admin/hapus_siswa/'.$s->id_siswa)?>">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/tambah_siswa')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control small" placeholder="Nama Siswa" aria-label="Search" aria-describedby="basic-addon2" id="nama" name="nama_siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control small" placeholder="Nomor Induk Siswa" aria-label="Search" aria-describedby="basic-addon2" id="nis" name="nis_siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" class="form-control small" placeholder="Asal Sekolah" aria-label="Search" aria-describedby="basic-addon2" id="asal_sekolah" name="asal_sekolah" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control small" placeholder="Alamat" aria-label="Search" aria-describedby="basic-addon2" id="alamat" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control small" placeholder="Tempat Lahir" aria-label="Search" aria-describedby="basic-addon2" id="tempat_lahir" name="tempat_lahir" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control small" placeholder="Tanggal Lahir" aria-label="Search" aria-describedby="basic-addon2" id="tanggal_lahir" name="tanggal_lahir" required>
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

<!-- Modal Edit Siswa-->
<div class="modal fade" id="editSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?=site_url('Admin/ubah_siswa')?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="card-body">
                            <input type="hidden" id="edit-id_siswa" name="id_siswa">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control small" placeholder="Nama Siswa" aria-label="Search" aria-describedby="basic-addon2" id="edit-nama" name="nama_siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control small" placeholder="Nomor Induk Siswa" aria-label="Search" aria-describedby="basic-addon2" id="edit-nis" name="nis_siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" class="form-control small" placeholder="Asal Sekolah" aria-label="Search" aria-describedby="basic-addon2" id="edit-asal_sekolah" name="asal_sekolah" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control small" placeholder="Alamat" aria-label="Search" aria-describedby="basic-addon2" id="edit-alamat" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control small" placeholder="Tempat Lahir" aria-label="Search" aria-describedby="basic-addon2" id="edit-tempat_lahir" name="tempat_lahir" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control small" placeholder="Tanggal Lahir" aria-label="Search" aria-describedby="basic-addon2" id="edit-tanggal_lahir" name="tanggal_lahir" required>
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
    $('.editSiswa').on('click', function(){
        $('#edit-id_siswa').val($(this).data('idsiswa'));
        $('#edit-nama').val($(this).data('nama'));
        $('#edit-nis').val($(this).data('nis'));
        $('#edit-asal_sekolah').val($(this).data('asalsekolah'));
        $('#edit-alamat').val($(this).data('alamat'));
        $('#edit-tempat_lahir').val($(this).data('tempatlahir'));
        $('#edit-tanggal_lahir').val($(this).data('tanggallahir'));
        $('#editSiswa').modal('show');
    });
</script>