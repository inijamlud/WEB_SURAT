<?php

include('config/session.php');
include('config/conn.php');
include('layout/header.php');
include('layout/nav.php');

$result = mysqli_query($conn, "Select * from surat_keluar sk, jenis_surat js where sk.kode_id=js.id_jenis");

?>
<div class="container-fluid px-5">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 row">
        <h1 class="h3 mb-0 text-gray-800 col">Daftar Surat Keluar</h1>

        <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Jenis Surat</th>
                            <th>Tujuan</th>
                            <th>Perihal</th>
                            <th>File Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['nomor_sk'] ?></td>
                                <td><?= $row['tgl_sk'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td><?= $row['tujuan'] ?></td>
                                <td><?= $row['perihal'] ?></td>
                                <td><?= substr($row['file_surat'], 7) ?></td>
                                <td>
                                    <a href="sk_edit.php?n_sk=<?= $row['id_sk'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                                    <a href="hapus.php?n_sk=<?= $row['id_sk'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $i++;
                        endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('layout/footer.php') ?>

<!-- Modal Tambah -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="sk_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="tgl_sm">Tanggal Surat</label>
                            <input type="date" class="form-control" name="tgl_sm" id="tgl_sm">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_sur">Nomor Surat</label>
                            <input type="text" class="form-control" name="no_sur" id="no_sur">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" id="tujuan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" name="perihal" id="perihal">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_surat">Upload Surat</label>
                            <input type="file" class="form-control" name="f_surat" id="f_surat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Jenis Surat</label>
                            <select id="inputState" class="form-control" name="js_surat">
                                <option disabled selected>--Pilih Jenis--</option>
                                <?php
                                $sql = mysqli_query($conn, "Select * from jenis_surat");
                                while ($row = mysqli_fetch_assoc($sql)) : ?>
                                    <option value="<?= $row['id_jenis'] ?>"><?= $row['keterangan'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>