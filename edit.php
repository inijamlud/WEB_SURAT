<?php

include('config/conn.php');
include('config/upload.php');

if ($id_sm = $_POST['no']) {

    $tgl_sm = $_POST['tgl_sm'];
    $no_sur = $_POST['no_sur'];
    $pengirim = $_POST['pengirim'];
    $perihal = $_POST['perihal'];
    $f_surat = $_POST['f_surat'];
    $js_surat = $_POST['js_surat'];

    mysqli_query($conn, "UPDATE surat_masuk SET tgl_sm='$tgl_sm', nomor_sm = '$no_sur', perihal ='$perihal', pengirim = '$pengirim', file_surat = '$f_surat', kode_id = '$js_surat' WHERE id_sm='$id_sm' ");

    header("location:sm.php");
} elseif ($id_sk = $_POST['no_sk']) {

    $tgl_sk = $_POST['tgl_sk'];
    $no_sur = $_POST['no_sur'];
    $tujuan = $_POST['tujuan'];
    $perihal = $_POST['perihal'];
    $f_surat = $_POST['f_surat'];
    $js_surat = $_POST['js_surat'];

    mysqli_query($conn, "UPDATE surat_keluar SET tgl_sk='$tgl_sk', nomor_sk = '$no_sur', perihal ='$perihal', tujuan = '$tujuan', file_surat = '$f_surat', kode_id = '$js_surat' WHERE id_sk='$id_sk' ");

    header("location:sk.php");
} elseif ($id = $_POST['id_kode']) {

    $keterangan = $_POST['keterangan'];

    mysqli_query($conn, "UPDATE jenis_surat SET keterangan='$keterangan' WHERE kode_id='$id' ");

    header("location:js.php");
} else {
}
