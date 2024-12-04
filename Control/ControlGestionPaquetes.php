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


<form action="Paquete.php" method="POST">
    <label for="nombre">Nombre del paquete:</label>
    <input type="text" name="nombre" id="nombre" required><br>
    
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio" required><br>
    
    <label for="fecha_vencimiento">Fecha de vencimiento:</label>
    <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" required><br>
    
    <label for="costo">Costo:</label>
    <input type="number" name="costo" id="costo" step="0.01" required><br>
    
    <label for="numero_clases">Número de clases:</label>
    <input type="number" name="numero_clases" id="numero_clases" required><br>
    
    <button type="submit">Crear paquete</button>
</form>
