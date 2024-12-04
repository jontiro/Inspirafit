<?php
// Iniciar sesión y configurar conexión a la base de datos
session_start();
include_once(__DIR__ . '/../conf/BaseDatos.php'); // Asegúrate de que este archivo establezca la conexión a tu base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $domicilio = $_POST['domicilio'];
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $nivelEstudios = $_POST['nivelEstudios'];
    $lugarEstudios = $_POST['lugarEstudios'];
    $profesion = $_POST['profesion'];
    $problemasSalud = $_POST['problemasSalud'];
    $disciplinasImpartir = $_POST['disciplinasImpartir'];
    $fechaIngreso = $_POST['fechaIngreso'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO Profesor (nombre, apellidoP, apellidoM, fechaNacimiento, telefono, email, domicilio, peso, estatura, nivelEstudios, lugarEstudios, profesion, problemasSalud, disciplinasImpartir, fechaIngreso) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Usar una declaración preparada para evitar inyecciones SQL
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $nombre, $apellidoP, $apellidoM, $fechaNacimiento, $telefono, $email, $domicilio, $peso, $estatura, $nivelEstudios, $lugarEstudios, $profesion, $problemasSalud, $disciplinasImpartir, $fechaIngreso);

    if ($stmt->execute()) {
        $message = "Profesor registrado exitosamente.";
    } else {
        $message = "Error al registrar al profesor: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();

    // Redirigir o mostrar mensaje de éxito
    echo $message;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesores</title>
</head>
<body>
    <h1>Registro de Profesores</h1>

    <?php if (!empty($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="ControlGestionProfesores.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellidoP">Apellido Paterno:</label>
        <input type="text" id="apellidoP" name="apellidoP" required>

        <label for="apellidoM">Apellido Materno:</label>
        <input type="text" id="apellidoM" name="apellidoM" required>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" required>

        <label for="peso">Peso:</label>
        <input type="number" step="any" id="peso" name="peso">

        <label for="estatura">Estatura:</label>
        <input type="number" step="any" id="estatura" name="estatura">

        <label for="nivelEstudios">Nivel de Estudios:</label>
        <input type="text" id="nivelEstudios" name="nivelEstudios">

        <label for="lugarEstudios">Lugar de Estudios:</label>
        <input type="text" id="lugarEstudios" name="lugarEstudios">

        <label for="profesion">Profesión:</label>
        <input type="text" id="profesion" name="profesion">

        <label for="problemasSalud">Problemas de Salud:</label>
        <input type="text" id="problemasSalud" name="problemasSalud">

        <label for="disciplinasImpartir">Disciplinas a Impartir:</label>
        <input type="text" id="disciplinasImpartir" name="disciplinasImpartir">

        <label for="fechaIngreso">Fecha de Ingreso:</label>
        <input type="date" id="fechaIngreso" name="fechaIngreso" required>

        <button type="submit">Registrar Profesor</button>
    </form>
</body>
</html>
