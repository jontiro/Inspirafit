<?php
session_start();
include_once(__DIR__ . '/../conf/BaseDatos.php'); // Asegúrate de que la conexión esté incluida

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanear los datos ingresados
    $nombre = trim($_POST['nombre']);
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $costo = $_POST['costo'];
    $numero_clases = $_POST['numero_clases'];

    // Usar la conexión `mysqli`
    $query = "INSERT INTO paquetes (nombre_paquete, fecha_inicio, fecha_vencimiento, costo, numero_clases) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("sssss", $nombre, $fecha_inicio, $fecha_vencimiento, $costo, $numero_clases);

    if ($stmt->execute()) {
        echo "Paquete creado exitosamente";
    } else {
        echo "Error al crear el paquete: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

