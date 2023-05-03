<?php
@include 'config.php';

session_start();

if (isset($_SESSION['nombre_usuario'])) {
    header('location:user_page.php');
}

if (isset($_SESSION['admin_name'])) {
    header('location:admin_page.php');
}
@include "header.php";
?>

<div class="col-lg-6">



    <!-- Card with an image on left -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <a href="login_form.php">
                        <h5 class="card-title">Card with an image on left</h5>
                    </a>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div><!-- End Card with an image on left -->

    <!-- Card with an image on left -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Card with an image on left</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div><!-- End Card with an image on left -->

</div>

<?php
@include "footer.php";
?>