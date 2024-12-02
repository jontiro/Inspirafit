<?php
namespace Control;
require_once '../Entity/Alumno.php';
session_start();
include_once('conf/BaseDatos.php');
//include_once('../Entity/Alumno.php');

use Entity\Alumno;

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
