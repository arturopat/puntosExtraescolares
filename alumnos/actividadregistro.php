<?php

@include '../config.php';

session_start();

if (!isset($_SESSION['nombre_alumno'])) {
    header('location:../login_form.php');
}

$id_actividad = $_GET['idactividad'];

$sql = "SELECT nombre_actividad,id_responsable FROM actividades WHERE id_actividad = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_actividad);
$stmt->execute();
$stmt->bind_result($nombre_actividad, $id_responsable);
$stmt->fetch();
$stmt->close();

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Panel Administrador</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



    <?php
    @include '../config.php';

    $id_alumno = $_SESSION['id_alumno'];

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT id, nombres,apellidos, correo, semestre,carrera,puntos FROM alumnos WHERE id = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular el ID de administrador a la consulta
    $stmt->bind_param("i", $id_alumno);

    // Ejecutar la consulta
    $stmt->execute();

    // Vincular los resultados a variables
    $stmt->bind_result($id, $nombres, $apellidos, $correo, $semestre, $carrera, $puntos);

    // Obtener datos del usuario

    if ($stmt->fetch()) {
        $id;
        $nombres;
        $apellidos;
        $correo;
        $semestre;
        $carrera;
        $puntos;
    } else {
        echo "No se encontraron datos del usuario";
    }

    // Cerrar la consulta
    $stmt->close();

    // Cerrar conexión

    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Alumno</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $nombres; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $nombres; ?></h6>
                            <span>Solo soy un estudiante</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="myProfile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../login_form.php">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Cerrar sesion</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="../admin_page.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link " href="admin/actividades.php">
                    <i class="bi bi-grid"></i>
                    <span>Actividades</span>
                </a>
            </li><!-- End Dashboard Nav -->
        </ul>



    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Agregar Actividad</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="login_form.php">Home</a></li>
                    <li class="breadcrumb-item active">Agregar Actividad</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">


            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>





                            <?php
                            // ...

                            if ($_POST) {
                                $id_actividad = $_POST['id_actividad'];
                                $id_alumno = $_POST['id_alumno'];
                                $fechaRegistro = date('Y-m-d');
                                $id_responsable = $_POST['id_responsable'];

                                // Conectar a la base de datos
                                $conexion = new mysqli('localhost', 'root', '', 'proyecto');

                                // Verificar si hay conexión exitosa
                                if ($conexion->connect_error) {
                                    die("Error de conexión: " . $conexion->connect_error);
                                }

                                // Verificar si el alumno ya está registrado en alguna actividad
                                $sql = "SELECT COUNT(*) FROM registroactividades WHERE id_alumno = ?";
                                $stmt = $conexion->prepare($sql);
                                $stmt->bind_param("i", $id_alumno);
                                $stmt->execute();
                                $stmt->bind_result($count);
                                $stmt->fetch();
                                $stmt->close();

                                if ($count > 0) {
                                    // El alumno ya está registrado en alguna actividad
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            El alumno ya está registrado en alguna actividad
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                                } else {
                                    // Obtener el cupo disponible de la actividad
                                    $sql = "SELECT cupo_disponible FROM actividades WHERE id_actividad = $id_actividad";
                                    $resultado = $conexion->query($sql);

                                    if ($resultado->num_rows > 0) {
                                        $fila = $resultado->fetch_assoc();
                                        $cupoDisponible = $fila['cupo_disponible'];

                                        // Verificar si aún hay cupo disponible
                                        if ($cupoDisponible > 0) {
                                            // Insertar el registro en la tabla registroactividades
                                            $sqlInsert = "INSERT INTO registroactividades (id_actividad, id_alumno, id_responsable, fecha_registro) VALUES ($id_actividad, $id_alumno, $id_responsable, '$fechaRegistro')";
                                            if ($conexion->query($sqlInsert) === true) {
                                                // Actualizar el cupo disponible en la tabla actividades
                                                $sqlUpdate = "UPDATE actividades SET cupo_disponible = cupo_disponible - 1 WHERE id_actividad = $id_actividad";
                                                $conexion->query($sqlUpdate);

                                                echo "<script>window.location.href = 'http://localhost/proyectos-php/puntosExtraescolares/alumnos/registrarse.php';</script>";
                                            } else {
                                                echo "Error al realizar el registro: " . $conexion->error;
                                            }
                                        } else {
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            Lo sentimos, todos los cupos para esta actividad han sido ocupados.!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>';
                                        }
                                    } else {
                                        echo "No se encontró la actividad especificada.";
                                    }
                                }

                                // Cerrar la conexión a la base de datos
                                $conexion->close();
                            }
                            ?>







                            <!-- General Form Elements -->
                            <form method="post" id="myForm">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Actividad</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_actividad" class="form-control" value="<?php echo $id_actividad ?>" placeholder="<?php echo $nombre_actividad; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Alumno</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_alumno" class="form-control" value="<?php echo $id ?>" placeholder="<?php echo $nombres; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">ID Responsable</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_responsable" class="form-control" value="<?php echo $id_responsable ?>" placeholder="<?php echo $nombres; ?>">
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Registrarse</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>

            </div>

            <!-- ======= Footer ======= -->
            <footer id="footer" class="footer">
                <div class="copyright">
                    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </footer><!-- End Footer -->

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <!-- Vendor JS Files -->
            <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/vendor/chart.js/chart.umd.js"></script>
            <script src="../assets/vendor/echarts/echarts.min.js"></script>
            <script src="../assets/vendor/quill/quill.min.js"></script>
            <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="../assets/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="../assets/js/main.js"></script>

</body>

</html>