<?php
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entity/ListaDocumentosDeslinde.php');

$listaDocumentos = new ListaDocumentosDeslinde($conexion);

// Obtener la lista de alumnos
$alumnos = $listaDocumentos->obtenerAlumnos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'cargar') {
        // Lógica para cargar un archivo PDF
        $idAlumno = $_POST['idAlumno'];
        $archivo = $_FILES['pdf'];

        if ($archivo['error'] === 0) {
            $rutaDestino = __DIR__ . '/../uploads/' . basename($archivo['name']);
            if (!is_dir(dirname($rutaDestino))) {
                mkdir(dirname($rutaDestino), 0777, true);
            }

            if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                if ($listaDocumentos->guardarPDF($idAlumno, $rutaDestino)) {
                    header("Location: Control_SubirPDF.php?mensaje=PDF%20subido%20correctamente");
                    exit();
                } else {
                    echo "Error al guardar la ruta del archivo en la base de datos.";
                }
            } else {
                echo "Error al mover el archivo.";
            }
        } else {
            echo "Error en la carga del archivo.";
        }
    } elseif (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        // Lógica para eliminar un archivo PDF
        $idAlumno = $_POST['idAlumno'];
        $archivoPDF = $_POST['archivoPDF'];

        if (file_exists($archivoPDF)) {
            if (unlink($archivoPDF)) {
                if ($listaDocumentos->eliminarPDF($idAlumno)) {
                    header("Location: Control_SubirPDF.php?mensaje=PDF%20eliminado%20correctamente");
                    exit();
                } else {
                    echo "Error al actualizar la base de datos.";
                }
            } else {
                echo "Error al eliminar el archivo.";
            }
        } else {
            echo "El archivo no existe.";
        }
    }
}
?>