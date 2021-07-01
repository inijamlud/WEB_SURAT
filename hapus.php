<?php

include('config/conn.php');


if ($id = $_GET['id']) {
    mysqli_query($conn, "delete from jenis_surat where id_jenis = '$id' ");
    header("location:js.php");
} elseif ($n_sm = $_GET['n_sm']) {
    mysqli_query($conn, "delete from surat_masuk where id_sm = '$n_sm' ");
    header("location:sm.php");
} elseif ($n_sk = $_GET['n_sk']) {
    mysqli_query($conn, "delete from surat_keluar where id_sk = '$n_sk' ");
    header("location:sk.php");
} else {
    header("location:index.php");
}
