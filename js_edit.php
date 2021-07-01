<?php

include('config/session.php');
include('config/conn.php');
include('layout/header.php');
include('layout/nav.php');

$id = $_GET['id'];
$result = mysqli_query($conn, "Select * from jenis_surat where id_jenis = $id");

?>

<div class="container-fluid px-5">
    <div class="container-fluid px-5">
        <h1>Edit Jenis Surat</h1><br>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label for="id_kode">Kode Jenis</label>
                        <input type="text" class="form-control" name="id_kode" value="<?= $row['kode_id']; ?>" id="id_kode" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="<?= $row['keterangan']; ?>" id="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            </form>
        <?php endwhile; ?>
    </div>
</div>

<?php include('layout/footer.php') ?>