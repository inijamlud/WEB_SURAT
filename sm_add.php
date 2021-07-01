<?php

include('config/conn.php');
include('config/upload.php');

$no = $_POST['no'];
$tgl_sm = $_POST['tgl_sm'];
$no_sur = $_POST['no_sur'];
$pengirim = $_POST['pengirim'];
$perihal = $_POST['perihal'];
$js_surat = $_POST['js_surat'];

mysqli_query($conn, "INSERT INTO surat_masuk VALUES ('$no', '$no_sur', '$tgl_sm', '$pengirim', '$perihal', '$loc', '$js_surat')");

header("location:sm.php");
