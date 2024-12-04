<?php
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entity/Recurso.php');

$recurso = new Recurso($conexion);

namespace Control;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
        $idAlumno = $_POST['idAlumno'];
        $tipo = $_POST['tipo'];

        if ($tipo === 'documento') {
            $archivo = $_FILES['pdf'];
            if ($archivo['error'] === 0) {
                $rutaDestino = __DIR__ . '/../uploads/' . basename($archivo['name']);
                if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                    if ($recurso->agregarRecurso($idAlumno, $tipo, $rutaDestino)) {
                        header("Location: Control_Recurso.php?mensaje=Documento cargado correctamente");
                        exit();
                    } else {
                        echo "Error al guardar el recurso en la base de datos.";
                    }
                } else {
                    echo "Error al mover el archivo.";
                }
            } else {
                echo "Error en la carga del archivo.";
            }
        } elseif ($tipo === 'enlace') {
            $enlace = $_POST['enlace'];
            if ($recurso->agregarRecurso($idAlumno, $tipo, null, $enlace)) {
                header("Location: Control_Recurso.php?mensaje=Enlace agregado correctamente");
                exit();
            } else {
                echo "Error al guardar el recurso en la base de datos.";
            }
        }
    }
}
?>
