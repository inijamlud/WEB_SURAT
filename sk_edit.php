<?php

include('config/session.php');
include('config/conn.php');
include('layout/header.php');
include('layout/nav.php');

$n_sk = $_GET['n_sk'];
$result = mysqli_query($conn, "Select * from surat_keluar where id_sk = $n_sk");

?>

<div class="container-fluid px-5">
    <div class="container-fluid px-5">
        <h1>Edit Surat Keluar</h1><br>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="no">No.</label>
                        <input type="text" class="form-control" name="no_sk" readonly value="<?= $row['id_sk']; ?> " id="no">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="tgl_sk">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_sk" value="<?= $row['tgl_sk']; ?>" id="tgl_sk" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_sur">Nomor Surat</label>
                        <input type="text" class="form-control" name="no_sur" value="<?= $row['nomor_sk']; ?>" id="no_sur">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" value="<?= $row['tujuan']; ?>" id="tujuan">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" value="<?= $row['perihal']; ?>" id="perihal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="f_surat">Upload Surat</label>
                        <input type="file" class="form-control" name="f_surat" value="<?= $row['file_surat']; ?>" id="f_surat">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Jenis Surat</label>
                        <select id="inputState" class="form-control" name="js_surat" required>
                            <option disabled selected>--Pilih Jenis--</option>
                            <?php $sql = mysqli_query($conn, "Select * from jenis_surat");
                            while ($row = mysqli_fetch_assoc($sql)) : ?>
                                <option value="<?= $row['id_jenis'] ?>"><?= $row['keterangan'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            </form>
        <?php endwhile; ?>
    </div>
</div>

<?php include('layout/footer.php') ?>