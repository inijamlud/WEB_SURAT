<?php

include('config/conn.php');
include('config/upload.php');

$no = $_POST['no'];
$tgl_sm = $_POST['tgl_sm'];
$no_sur = $_POST['no_sur'];
$tujuan = $_POST['tujuan'];
$perihal = $_POST['perihal'];
$js_surat = $_POST['js_surat'];

mysqli_query($conn, "INSERT INTO surat_keluar VALUES ('$no','$tgl_sm', '$no_sur', '$tujuan', '$perihal', '$loc', '$js_surat')");

header("location:sk.php");
