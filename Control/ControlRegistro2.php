 
<?php
session_start();
include_once(__DIR__ . '/conf/BaseDatos.php');
include_once(__DIR__ . '/Entidades/Alumno.php');

// Inicializar el mensaje
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear un objeto Alumno
    $alumno = new Alumno();

    // Asignar valores del formulario
    $alumno->setNombre($_POST['nombre']);
    $alumno->setApellidoP($_POST['apellidoP']);
    $alumno->setApellidoM($_POST['apellidoM']);
    $alumno->setFechaNacimiento($_POST['fechaNacimiento']);
    $alumno->setTelefono($_POST['telefono']);
    $alumno->setEmail($_POST['email']);
    $alumno->setDomicilio($_POST['domicilio']);
    $alumno->setPeso($_POST['peso']);
    $alumno->setEstatura($_POST['estatura']);
    $alumno->setNivelEstudios($_POST['nivelEstudios']);
    $alumno->setLugarEstudios($_POST['lugarEstudios']);
    $alumno->setProfesion($_POST['profesion']);
    $alumno->setLugarEjerce($_POST['lugarEjerce']);
    $alumno->setPuesto($_POST['puesto']);
    $alumno->setProblemasSalud($_POST['problemasSalud']);
    $alumno->setDisciplinasInteres($_POST['disciplinasInteres']);
    $alumno->setFechaIngreso($_POST['fechaIngreso']);

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

    <form action="Control_Registro.php" method="POST">
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

        <label for="lugarEjerce">Lugar donde ejerce la profesión:</label>
        <input type="text" id="lugarEjerce" name="lugarEjerce">

        <label for="puesto">Puesto:</label>
        <input type="text" id="puesto" name="puesto">

        <label for="problemasSalud">Problemas de salud:</label>
        <input type="text" id="problemasSalud" name="problemasSalud">

        <label for="disciplinasInteres">Disciplinas de interés:</label>
        <input type="text" id="disciplinasInteres" name="disciplinasInteres">

        <label for="fechaIngreso">Fecha de Ingreso:</label>
        <input type="date" id="fechaIngreso" name="fechaIngreso" required>

        <button type="submit">Guardar Alumno</button>
    </form>
</body>
</html>
