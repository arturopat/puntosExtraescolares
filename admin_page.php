<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
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


   <?php
   @include 'config.php';

   $id_admin = $_SESSION['id_admin'];

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
   <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
         <a href="admin_page.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
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
                  <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
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
                     <a class="dropdown-item d-flex align-items-center" href="admin/myProfile.php">
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
                     <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
            <a class="nav-link " href="admin_page.php">
               <i class="bi bi-grid"></i>
               <span>Dashboard</span>
            </a>
         </li><!-- End Dashboard Nav -->



         <li class="nav-item">
            <a class="nav-link collapsed" href="admin/actividades.php">
               <i class="bi bi-person"></i>
               <span>Actividades</span>
            </a>
         </li>

         <li class="nav-item">
            <a class="nav-link collapsed" href="admin/alumnos.php">
               <i class="bi bi-person"></i>
               <span>Alumnos</span>
            </a>
         </li>


         <li class="nav-item">
            <a class="nav-link collapsed" href="admin/responsables.php">
               <i class="bi bi-person"></i>
               <span>Responsables</span>
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

      <section class="section dashboard">

         <?php
         $sql_responsables = "SELECT * FROM actividades";
         $result_responsables = $conn->query($sql_responsables);
         echo "<div class='row'>";
         foreach ($result_responsables as $resultado) {
            echo "<div class='col-md-6'>";
            echo "  <div class='card mb-3'>";
            echo "    <div class='row g-0'>";
            echo "      <div class='col-6'>";
            echo "        <img src='" . $resultado['url'] . "' class='card-img' alt='...' style='width: 300px; height: 230px; object-fit: cover;'>";
            echo "      </div>";
            echo "      <div class='col-6'>";
            echo "        <div class='card-body'>";
            echo "          <h5 class='card-title'>" . $resultado['nombre_actividad'] . "</h5>";
            echo "          <p class='card-text'><b>Inicia: </b>" . $resultado['fecha_inicio'] . "</p>";
            echo "          <p class='card-text'><b>Hora: </b>" . $resultado['horario'] . "</p>";
            echo "          <p class='card-text'><b>Puntos: </b>" . $resultado['puntos'] . "</p>";
            echo "        </div>";
            echo "      </div>";
            echo "    </div>";
            echo "  </div>";
            echo "</div>";
         }
         echo "</div>";
         ?>



         <?php
         @include "footer.php";
         ?>