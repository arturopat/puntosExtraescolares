<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// ID del responsable y ID de la actividad
$id_responsable = 5;
$id_actividad = 4;

// Consulta SQL para obtener los puntos de la actividad
$sql = "SELECT puntos FROM actividades WHERE id_responsable = $id_responsable AND id_actividad = $id_actividad";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si se encontraron resultados, obtener los puntos de la actividad
    $row = $result->fetch_assoc();
    $puntos = $row["puntos"];
    echo "Los puntos de la actividad son: $puntos";
} else {
    echo "No se encontraron resultados para la actividad con ID $id_actividad y responsable con ID $id_responsable";
}

// Cerrar la conexión
$conn->close();
