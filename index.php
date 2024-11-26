<?php
session_start();
include_once('conf/BaseDatos.php');
include_once('Entity/Alumno.php');

// Inicializar el mensaje
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear un objeto Alumno
    $alumno = new Alumno();

    // Asignar valores del formulario
    $alumno->setNombre($_POST['nombre']);
    $alumno->setApellidoP($_POST['apellidoP']);
    $alumno->setApellidoM($_POST['apellidoM']);
    $alumno->setDisciplinasPrevias($_POST['disciplinas_previas']);
    $alumno->setDomicilio($_POST['domicilio']);
    $alumno->setTelefono($_POST['telefono']);

    // Guardar el alumno en la base de datos
    $message = $alumno->guardar($conexion);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumnos</title>
</head>
<body>
    <h1>Registro de Alumnos</h1>

    <?php if (!empty($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellidoP">Apellido Paterno:</label>
        <input type="text" id="apellidoP" name="apellidoP" required>

        <label for="apellidoM">Apellido Materno:</label>
        <input type="text" id="apellidoM" name="apellidoM" required>

        <label for="disciplinas_previas">DP:</label>
        <input type="text" id="disciplinas_previas" name="disciplinas_previas" required>

        <label for="domicilio">Dom:</label>
        <input type="text" id="domicilio" name="domicilio" required>

        <label for="telefono">tel:</label>
        <input type="text" id="telefono" name="telefono" required>

        <button type="submit">Guardar Alumno</button>
    </form>
</body>
</html>