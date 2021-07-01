<?php

include('config/session.php');
include('config/conn.php');
include('layout/header.php');
include('layout/nav.php');

$result = mysqli_query($conn, "Select * from jenis_surat");

?>
<div class="container-fluid px-5">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 row">
        <h1 class="h3 mb-0 text-gray-800 col">Daftar Jenis Surat</h1>

        <a href="" data-toggle="modal" data-target="#tambahjsModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Surat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Jenis</th>
                            <th>Keterangan</th>
                            <th>Jumlah Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['kode_id'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td><?= $row['jml_surat'] ?></td>
                                <td>
                                    <a href="js_edit.php?id=<?= $row['id_jenis']; ?>"" class=" btn btn-warning btn-circle btn-sm"><i class="fas fa-pen"></i></a>
                                    <a href="hapus.php?id=<?= $row['id_jenis']; ?>"" class=" btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
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


<!-- Modal tambah js -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahjsModal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="js_add.php" method="POST" enctype="multipart/form-data">

                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="kode_id">Kode Jenis</label>
                            <input type="text" class="form-control" name="kode_id" id="kode_id">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" name="ket" id="ket">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>