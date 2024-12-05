<?php
namespace Control;
include_once (__DIR__.'/../Entity/Alumno.php');
session_start();
include_once(__DIR__.'/../conf/BaseDatos.php');

use Entity\Alumno;
use BaseDatos;

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
    $alumno->setLugarNacimiento($_POST['lugarNacimiento']);
    $alumno->setTelefono($_POST['telefono']);
    $alumno->setDisciplinasPrevias($_POST['disciplinas_previas']);
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

    $conexion = BaseDatos::getConexion();

    // Guardar el alumno en la base de datos

    if($alumno->guardar($conexion)){
        $nombreAlumno = $alumno->getNombre();
        echo '<script type="text/javascript">
      alert("Registro exitoso: ' . htmlspecialchars($nombreAlumno, ENT_QUOTES, 'UTF-8') . '");
    window.location.href="../Boundary/Admin/frmPantallaRegistro.html";
    </script>';

    } else {
        echo '<script type="text/javascript">
    alert("Registro fallido, favor de reintentar.");
    window.location.href="../Boundary/Admin/frmPantallaRegistro.html";
    </script>';
    }
    exit();
}

?>
