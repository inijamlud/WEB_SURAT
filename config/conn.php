<?php

$host   = 'localhost';
$db     = 'db_surat';

$conn = mysqli_connect($host, 'root', '', $db);

if (!$conn) {
    printf("connect fail : " . mysqli_connect_error());
    die;
}
