<?php

include('config/session.php');
include('config/conn.php');
include('layout/header.php');
include('layout/nav.php');

?>

<body id="page-top">

    <div id="container-fluid wrapper" style="min-height:550px;">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="py-5 mt-5 ">

                <p class="text-center text-gray-900">Hallo <?= strtoupper($_SESSION['login_user']) ?> !</p>
                <h2 class="text-center  ext-gray-900">SELAMAT DATANG DI SISTEM PENGELOLAAN SURAT</h2>
                <div class="container-fluid row mt-5 p-5">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Surat Masuk</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php $i = 0;
                                            $row = mysqli_fetch_assoc(mysqli_query($conn, "Select count(*) from surat_Masuk"));
                                            echo $row['count(*)'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Keluar</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php $i = 0;
                                            $row = mysqli_fetch_assoc(mysqli_query($conn, "Select count(*) from surat_keluar"));
                                            echo $row['count(*)'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jenis Surat</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php $i = 0;
                                            $row = mysqli_fetch_assoc(mysqli_query($conn, "Select count(id_jenis) from jenis_surat"));
                                            echo $row['count(id_jenis)'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php $i = 0;
                                            $row = mysqli_fetch_assoc(mysqli_query($conn, "Select count(id_users) from users"));
                                            echo $row['count(id_users)'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>