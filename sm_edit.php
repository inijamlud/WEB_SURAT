<?php

include('config/session.php');
include('config/conn.php');
include('layout/header.php');
include('layout/nav.php');

$n_sm = $_GET['n_sm'];
$result = mysqli_query($conn, "Select * from surat_masuk where id_sm = $n_sm");

?>

<div class="container-fluid px-5">
    <div class="container-fluid px-5">
        <h1>Edit Surat Masuk</h1><br>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="no">No.</label>
                        <input type="text" class="form-control" name="no" readonly value="<?= $row['id_sm']; ?> " id="no">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="tgl_sm">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_sm" value="<?= $row['tgl_sm']; ?>" id="tgl_sm">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_sur">Nomor Surat</label>
                        <input type="text" class="form-control" name="no_sur" value="<?= $row['nomor_sm']; ?>" id="no_sur">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" name="pengirim" value="<?= $row['pengirim']; ?>" id="pengirim">
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
                <!-- <a class="btn btn-primary" href="logout.php">Batal</a> -->
                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            </form>
        <?php endwhile; ?>
    </div>
</div>

<?php include('layout/footer.php') ?>