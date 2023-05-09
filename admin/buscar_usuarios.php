<?php
@include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query'];

    $sql = "SELECT * FROM alumnos WHERE nombres LIKE '%$query%'";
    $resultado = mysqli_query($conn, $sql);
    if (!$resultado) {
        die("Error al obtener los datos: " . mysqli_error($conn));
    }

    $output = '';
    foreach ($resultado as $fila) {
        $output .= "<tr>";
        $output .= "<td>" . $fila['id'] . "</td>";
        $output .= "<td>" . $fila['nombres'] . "</td>";
        $output .= "<td>" . $fila['apellidos'] . "</td>";
        $output .= "<td>" . $fila['correo'] . "</td>";
        $output .= "<td>" . $fila['semestre'] . "</td>";
        $output .= "<td>" . $fila['carrera'] . "</td>";
        $output .= "<td>" . $fila['puntos'] . "</td>";
        $output .= '<td><a href="alumnoseditar.php?ideditar=' . $fila['id'] . '" class="btn btn-warning ri-edit-box-fill"></td>';
        $output .= '<td><a href="alumnoeliminar.php?ideliminar=' . $fila['id'] . '" class="btn btn-danger ri-delete-bin-6-line"></td>';
        $output .= "</tr>";
    }

    echo $output;
}
