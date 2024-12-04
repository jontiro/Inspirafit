<?php
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entidades/ListaDocumentosDeslinde.php');

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
</head>
<body>
    <h1>Lista de Alumnos</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Archivo PDF</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($alumno = $alumnos->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($alumno['id']) ?></td>
                    <td><?= htmlspecialchars($alumno['nombre']) ?></td>
                    <td>
                        <?php if (!empty($alumno['archivoPDF'])): ?>
                            <?= htmlspecialchars(basename($alumno['archivoPDF'])) ?>
                        <?php else: ?>
                            <span style="color: red;">Cargar archivo</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($alumno['archivoPDF'])): ?>
                            <!-- Botón para visualizar PDF -->
                            <a href="/uploads/<?= htmlspecialchars(basename($alumno['archivoPDF'])) ?>" target="_blank">
                                <button>Visualizar PDF</button>
                            </a>

                            <!-- Botón para eliminar PDF -->
                            <form action="Control_SubirPDF.php" method="POST">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="idAlumno" value="<?= htmlspecialchars($alumno['id']) ?>">
                                <input type="hidden" name="archivoPDF" value="<?= htmlspecialchars($alumno['archivoPDF']) ?>">
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar el PDF?');">Eliminar PDF</button>
                            </form>
                        <?php else: ?>
                            <!-- Botón para cargar PDF -->
                            <form action="Control_SubirPDF.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="accion" value="cargar">
                                <input type="hidden" name="idAlumno" value="<?= htmlspecialchars($alumno['id']) ?>">
                                <input type="file" name="pdf" accept="application/pdf" required>
                                <button type="submit">Cargar PDF</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
