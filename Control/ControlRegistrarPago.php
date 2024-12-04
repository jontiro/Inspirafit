<?php
session_start();
include_once('../Entidades/Pago.php');
include_once(__DIR__ . '/../conf/BaseDatos.php');

$conexion = (new BaseDatos())->getConexion(); // Obtener la conexión activa

// Crear una instancia de Pago
$pagos = new Pago($conexion);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAlumno = $_POST['idAlumno'];
    $modalidad = $_POST['modalidad'];
    $detalle = $_POST['detalle'];
    $monto = $_POST['monto'];
    $recibo = '';

    // Procesar el archivo de recibo
    if (isset($_FILES['recibo']) && $_FILES['recibo']['error'] === UPLOAD_ERR_OK) {
        $nombreRecibo = $_FILES['recibo']['name'];
        $rutaRecibo = '../recibos/' . $nombreRecibo;

        $extension = pathinfo($nombreRecibo, PATHINFO_EXTENSION);
        if (strtolower($extension) === 'pdf') {
            if (move_uploaded_file($_FILES['recibo']['tmp_name'], $rutaRecibo)) {
                $recibo = $rutaRecibo;
            } else {
                $message = "Error al subir el recibo.";
            }
        } else {
            $message = "El recibo debe estar en formato PDF.";
        }
    }

    // Registrar el pago si no hay errores
    if (empty($message)) {
        $message = $pagos->registrarPago($idAlumno, $modalidad, $detalle, $monto, $recibo);
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pago</title>
</head>
<body>
    <h1>Registrar Pago</h1>

    <?php if (!empty($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="ControlRegistrarPago.php" method="POST" enctype="multipart/form-data">
        <label for="idAlumno">ID del Alumno:</label>
        <input type="number" name="idAlumno" id="idAlumno" required>

        <label for="modalidad">Modalidad:</label>
        <select name="modalidad" id="modalidad" required>
            <option value="paquete">Paquete</option>
            <option value="mensual">Mensual</option>
        </select>

        <label for="detalle">Detalle (Paquete o Mes):</label>
        <input type="text" name="detalle" id="detalle" required>

        <label for="monto">Monto ($):</label>
        <input type="number" name="monto" id="monto" step="0.01" required>

        <label for="recibo">Subir Recibo (PDF):</label>
        <input type="file" name="recibo" id="recibo">

        <button type="submit">Registrar Pago</button>
    </form>
</body>
</html>
