<?php 

$namafile = $_FILES['f_surat']['name'];
$namatemp = $_FILES['f_surat']['tmp_name'];
$loc = "upload/";

$upload = move_uploaded_file($namatemp, $loc . $namafile);

if ($upload) {
    $loc = $loc . $namafile;
    echo $loc;
} else {
    echo "Upload gagal!";
}
