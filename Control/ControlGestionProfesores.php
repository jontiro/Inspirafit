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
