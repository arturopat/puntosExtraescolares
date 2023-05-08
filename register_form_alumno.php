<?php

@include 'config.php';

if (isset($_POST['submit'])) {

    $nombres = mysqli_real_escape_string($conn, $_POST['nombres']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $semestre = mysqli_real_escape_string($conn, $_POST['semestre']);
    $carrera = mysqli_real_escape_string($conn, $_POST['carrera']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $puntos = mysqli_real_escape_string($conn, $_POST['puntos']);


    $select = " SELECT * FROM alumnos WHERE correo = '$correo' && contrasena = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO alumnos(nombres, apellidos, correo, semestre,carrera,contrasena,puntos) VALUES('$nombres','$apellidos','$correo','$semestre','$carrera','$pass','$puntos')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Registrar alumnos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Crea una cuenta</h5>
                                        <p class="text-center small">Ingresa la informacion del alumno para crear una cuenta</p>
                                    </div>

                                    <div class="form-container">

                                        <form action="" method="post">
                                            <?php
                                            if (isset($error)) {
                                                foreach ($error as $error) {
                                                    echo '<span class="error-msg">' . $error . '</span>';
                                                };
                                            };
                                            ?>

                                            <form class="row g-3 needs-validation" novalidate>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Nombres</label>
                                                    <input type="text" name="nombres" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Escribe los nombres!</div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Apellidos</label>
                                                    <input type="text" name="apellidos" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Escribe los apellidos!</div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Correo</label>
                                                    <input type="email" name="correo" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Escribe el correo!</div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Semestre</label>
                                                    <input type="text" name="semestre" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Escribe el semestre!</div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Carrera</label>
                                                    <input type="text" name="carrera" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Escribe la carrera!</div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Contraseña</label>
                                                    <input type="password" name="password" class="form-control" id="yourName" required>
                                                </div>

                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Confirmar Contraseña</label>
                                                    <input type="password" name="cpassword" class="form-control" id="yourName" required>
                                                </div>

                                                <br>
                                                <div class="col-12">
                                                    <label for="yourName" class="form-label">Puntos</label>
                                                    <input type="text" name="puntos" class="form-control" id="yourName" required>
                                                    <div class="invalid-feedback">Escribe los puntos!</div>
                                                </div>

                                                <div class="col-12">
                                                    <br>
                                                    <input type="submit" name="submit" value="Crear cuenta" class="btn btn-primary w-100">
                                                </div>

                                                <div class="col-12">
                                                    <p class="small mb-0">Ya tienes una cuenta? <a href="login_form.php">Iniciar sesion</a></p>
                                                </div>


                                            </form>

                                    </div>
                                </div>

                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>

                            </div>
                        </div>
                    </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>