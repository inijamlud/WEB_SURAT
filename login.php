<?php

include('config/conn.php');
include('layout/header.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $myuser = mysqli_real_escape_string($conn, $_POST['username']);
    $mypass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id_users FROM users WHERE username = '$myuser' and password = '$mypass' ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $myuser;
        header("Location: index.php");
    } else {
        $error = "Username / Password invalid!";
    }
}

?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9 mt-2">

                <div class="card o-hidden border-0 shadow-lg m-5">
                    <div class="card-body p-2">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12 p-5">
                                <div class="p-0">
                                    <div class="text-center mb-3">
                                        <h1 class="h1 text-gray-900">Selamat datang!</h1>
                                        <p class="badge text-danger"><?= $error ?></p>
                                    </div>
                                    <div class="text-center m-5">
                                        <img src="./assets/img/undraw_posting_photo.svg" alt="" width="200px" class="">
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control mt-4" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mt-4">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- <?php include('layout/footer.php') ?> -->