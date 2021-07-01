<?php

include('config/conn.php');

$no = $_POST['no'];
$kode_id = $_POST['kode_id'];
$ket = $_POST['ket'];

print_r($kode_id);
print_r($no);
print_r($ket);

mysqli_query($conn, "INSERT INTO jenis_surat VALUES ('$no', '$kode_id','$ket', 0)");

header("location:js.php");
