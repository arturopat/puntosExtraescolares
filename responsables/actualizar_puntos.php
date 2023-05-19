<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["alumnos"])) {
    // Obtener los IDs de los alumnos seleccionados
    $alumnosSeleccionados = $_POST["alumnos"];

    // Realizar la actualización de puntos por cada alumno seleccionado
    foreach ($alumnosSeleccionados as $alumnoID) {
        // Verificar si el checkbox está marcado para el alumno actual
        $checkboxName = "checkbox_" . $alumnoID;
        if (isset($_POST[$checkboxName]) && $_POST[$checkboxName] == "on") {
            // Obtener la actividad a la que está inscrito el alumno
            $sql = "SELECT actividad FROM alumnos WHERE id = $alumnoID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $actividad = $row["actividad"];

                // Realizar la actualización de puntos según la actividad
                switch ($actividad) {
                    case "actividad1":
                        // Lógica de actualización de puntos para actividad1
                        // ...
                        echo "Puntos actualizados para actividad1 del alumno con ID: $alumnoID <br>";
                        break;
                    case "actividad2":
                        // Lógica de actualización de puntos para actividad2
                        // ...
                        echo "Puntos actualizados para actividad2 del alumno con ID: $alumnoID <br>";
                        break;
                        // Agrega más casos para cada actividad adicional
                    default:
                        // Actividad desconocida, no se realiza ninguna actualización
                        echo "Actividad desconocida para el alumno con ID: $alumnoID <br>";
                        break;
                }
            }
        }
    }

    echo "Puntos actualizados correctamente.";
} else {
    echo "No se han seleccionado alumnos para actualizar los puntos.";
}
