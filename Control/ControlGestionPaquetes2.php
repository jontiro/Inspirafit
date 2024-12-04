<?php
session_start();
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entidades/Paquete.php');

// Procesar la eliminación de un paquete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $id = $_POST['id'];

    // Eliminar el paquete de la base de datos
    if (Paquete::eliminar($conexion, $id)) {
        echo "Paquete eliminado exitosamente";
    } else {
        echo "Error al eliminar el paquete";
    }
}

// Mostrar todos los paquetes disponibles
$resultado = $conexion->query("SELECT * FROM paquetes");
if ($resultado->num_rows > 0) {
    echo "<h2>Paquetes disponibles</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Fecha de inicio</th><th>Fecha de vencimiento</th><th>Costo</th><th>Número de clases</th><th>Acciones</th></tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre_paquete'] . "</td>";
        echo "<td>" . $fila['fecha_inicio'] . "</td>";
        echo "<td>" . $fila['fecha_vencimiento'] . "</td>";
        echo "<td>" . $fila['costo'] . "</td>";
        echo "<td>" . $fila['numero_clases'] . "</td>";
        echo "<td>
                <form action='ControlPaquetes.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='accion' value='eliminar'>
                    <input type='hidden' name='id' value='" . $fila['id'] . "'>
                    <button type='submit' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este paquete?\");'>Eliminar</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay paquetes disponibles.</p>";
}
?>
