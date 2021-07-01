<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Search -->
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a class="dropdown-item nav-link text-info text-lg font-weight-bold" href="index.php">
                <i class="fas fa-file-alt fa-sm fa-fw mr-2 "></i>
                SI-MAIL
            </a>
    </ul>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-gray-800" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-file fa-sm fa-fw mr-2 "></i>
                Surat
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="sm.php">
                    <i class="fas fa-file-download fa-sm fa-fw mr-2 text-gray-400"></i>
                    Surat Masuk
                </a>
                <a class="dropdown-item" href="sk.php">
                    <i class="fas fa-file-upload fa-sm fa-fw mr-2 text-gray-400"></i>
                    Surat Keluar
                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item ">
            <a class="dropdown-item nav-link text-gray-800" href="js.php">
                <i class="fas fa-folder fa-sm fa-fw mr-2 "></i>
                Jenis Surat
            </a>
        </li>
        
        <div class="topbar-divider d-none d-sm-block"></div>
     
        <li class="nav-item ">
            <a class="dropdown-item nav-link text-gray-800" href="" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                Logout
            </a>
        </li>

    </ul>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Anda yakin ingin keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>