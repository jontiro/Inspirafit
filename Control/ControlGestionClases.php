<?php

use Entity\Clase;

include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entity/Clase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'crear':
            $Salon_clase = $_POST['Salon_clase'];
            $materia = $_POST['materia'];
            $Profesor = $_POST['Profesor'];
            $Cupo = $_POST['Cupo'];
            $Horario = $_POST['Horario'];

            $clase = new Clase($materia, $Profesor, $Cupo, $Salon_clase, $Horario);
            if ($clase->guardar($conexion)) {
                echo "Clase creada exitosamente";
            } else {
                echo "Error al crear la clase";
            }
            break;

        case 'eliminar':
            $id = $_POST['id'];
            if (Clase::eliminar($conexion, $id)) {
                echo "Clase eliminada exitosamente";
            } else {
                echo "Error al eliminar la clase";
            }
            break;
    }
}

$resultado = Clase::obtenerTodas($conexion);
if ($resultado->num_rows > 0) {
    echo "<h2>Clases disponibles</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Salón</th><th>Materia</th><th>Profesor</th><th>Cupo</th><th>Horario</th><th>Acciones</th></tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['salon'] . "</td>";
        echo "<td>" . $fila['materia'] . "</td>";
        echo "<td>" . $fila['profesor'] . "</td>";
        echo "<td>" . $fila['cupo'] . "</td>";
        echo "<td>" . $fila['horario'] . "</td>";
        echo "<td>
                <form action='ControlGestionClases.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='accion' value='eliminar'>
                    <input type='hidden' name='id' value='" . $fila['id'] . "'>
                    <button type='submit' onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta clase?\");'>Eliminar</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay clases disponibles.</p>";
}
?>


