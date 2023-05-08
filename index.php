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
    echo "        <a href='login_form.php'><h5 class='card-title'>" . $resultado['nombre_actividad'] . "</h5></a>";
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
<a href=""></a>

<?php
@include "footer.php";
?>