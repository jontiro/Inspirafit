<<?php
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entity/Clase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'crear':
            $salon = $_POST['salon'];
            $materia = $_POST['materia'];
            $profesor = $_POST['profesor'];
            $cupo = $_POST['cupo'];
            $horario = $_POST['horario'];

            $clase = new Clase($salon, $materia, $profesor, $cupo, $horario);
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

<form action="ControlGestionClases.php" method="POST">
    <label for="salon">Salón:</label>
    <input type="text" name="salon" id="salon" required><br>

    <label for="materia">Materia:</label>
    <input type="text" name="materia" id="materia" required><br>

    <label for="profesor">Profesor:</label>
    <input type="text" name="profesor" id="profesor" required><br>

    <label for="cupo">Cupo:</label>
    <input type="number" name="cupo" id="cupo" required><br>

    <label for="horario">Horario (ej. Lunes 10:00-12:00, Miércoles 14:00-16:00):</label>
    <input type="text" name="horario" id="horario" required><br>

    <button type="submit" name="accion" value="crear">Crear Clase</button>
</form>

