<?php

@include '../config.php';

session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('location: ../login_form.php');
}




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

    $id_admin = $_SESSION['id_usuario'];

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT id, nombre, correo, tipo_usuario FROM adminsresponsables WHERE id = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular el ID de administrador a la consulta
    $stmt->bind_param("i", $id_admin);

    // Ejecutar la consulta
    $stmt->execute();

    // Vincular los resultados a variables
    $stmt->bind_result($id, $nombre, $correo, $tipo_usuario);

    // Obtener datos del usuario

    if ($stmt->fetch()) {
        $id;
        $nombre;
        $correo;
        $tipo_usuario;
    } else {
        echo "No se encontraron datos del usuario";
    }

    // Cerrar la consulta
    $stmt->close();

    // Cerrar conexión

    ?>


    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center ">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Administrador</span>
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
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $nombre; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $nombre; ?></h6>
                            <span>Solo soy un admin</span>
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
                <a class="nav-link " href="responsables.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="participantes.php">
                    <i class="bi bi-person"></i>
                    <span>Participantes</span>
                </a>
            </li>






        </ul>



    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="login_form.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->




        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>

                        <!-- Table with stripped rows -->
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <?php
                                // Obtener el id del responsable que ha iniciado sesión (en este caso, 12)
                                $id_responsable = $id_admin;

                                // Consulta para obtener los alumnos inscritos en la actividad del responsable
                                $sql = "SELECT alumnos.id, alumnos.nombres, alumnos.apellidos, alumnos.correo,alumnos.semestre,alumnos.carrera
        FROM alumnos
        INNER JOIN registroactividades ON alumnos.id = registroactividades.id_alumno
        WHERE registroactividades.id_responsable = $id_responsable";

                                $sql2 = "SELECT actividades.puntos
        FROM actividades
        INNER JOIN registroactividades ON actividades.id_actividad = registroactividades.id_actividad
        WHERE registroactividades.id_responsable = $id_responsable";

                                $result2 = $conn->query($sql2);

                                // obtencion de los puntos dependiendo de l actividad, falta verificar el checkbox "ON" y en caso de que si actualizar los puntos dependiendo de la actividad y los puntos
                                $result2 = $conn->query($sql2);



                                $result = $conn->query($sql);

                                //obtencion de los puntos dependiendo el responsable
                                $row2 = $result2->fetch_assoc();
                                // obtencion de los punto
                                $puntos2 = $row2['puntos'];

                                if (!$result) {
                                    die("Error en la consulta: " . mysqli_error($conn));
                                }

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Verificar si los checkbox están seleccionados
                                    if (isset($_POST['checkbox_nombre']) && is_array($_POST['checkbox_nombre'])) {
                                        // Obtener los puntos a asignar a los alumnos
                                        $puntos = $_POST['puntos'];

                                        // Recorrer los ID de los alumnos seleccionados
                                        foreach ($_POST['checkbox_nombre'] as $alumno_id) {
                                            // Realizar la actualización de puntos en la tabla "alumnos"
                                            $sql = "UPDATE alumnos SET puntos = puntos + ? WHERE id = ?";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("ii", $puntos, $alumno_id);
                                            $stmt->execute();
                                        }
                                    }
                                }

                                if ($result->num_rows > 0) {
                                    echo '<form method="POST">';
                                    echo '<table class="table datatable datatable-table">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th></th>'; // Agregamos una columna vacía para el checkbox
                                    echo '<th data-sortable="true"><a href="#">Nombre</a></th>';
                                    echo '<th data-sortable="true"><a href="#">Apellidos</a></th>';
                                    echo '<th data-sortable="true"><a href="#">Correo</a></th>';
                                    echo '<th data-sortable="true"><a href="#">Semestre</a></th>';
                                    echo '<th data-sortable="true"><a href="#">Carrera</a></th>';
                                    echo '<th></th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    // Verificar si el formulario ya ha sido enviado
                                    $formularioEnviado = $_SERVER["REQUEST_METHOD"] == "POST";

                                    // Mostrar los datos de los alumnos
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td><input name="checkbox_nombre[]" checked type="checkbox" value="' . $row["id"] . '"';

                                        // Si el formulario ha sido enviado, deshabilitar el checkbox
                                        if ($formularioEnviado) {
                                            echo ' disabled';
                                        }

                                        echo '></td>'; // Agregamos el [] al nombre del checkbox para que sea un array
                                        echo '<input name="puntos" value="' . $puntos2 . '" >';
                                        echo '<td>' . $row["nombres"] . '</td>';
                                        echo '<td>' . $row["apellidos"] . '</td>';
                                        echo '<td>' . $row["correo"] . '</td>';
                                        echo '<td>' . $row["semestre"] . '</td>';
                                        echo '<td>' . $row["carrera"] . '</td>';
                                        echo '</tr>';
                                    }

                                    echo '</tbody>';
                                    echo '</table>';

                                    echo '<button type="submit" class="btn btn-primary">Actualizar Puntos</button>';
                                    echo '</form>';
                                } else {
                                    echo "No hay alumnos inscritos en la actividad del responsable.";
                                }





                                // Cerrar la conexión
                                ?>


                            </div>
                            <div class="datatable-bottom">
                                <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                                <nav class="datatable-pagination">
                                    <ul class="datatable-pagination-list"></ul>
                                </nav>
                            </div>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

        <section class="section dashboard">


        </section>

    </main><!-- End #main -->

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