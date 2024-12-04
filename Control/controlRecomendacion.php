<?php
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entidades/Recurso.php');

$recurso = new Recurso($conexion);

// Obtener la lista de alumnos para mostrar en el formulario
$query = "SELECT id, nombre FROM alumno"; // Ajusta esta consulta a tu estructura de base de datos
$resultado = $conexion->query($query);

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
                        header("Location: ControlRecomendacion.php?mensaje=Documento cargado correctamente");
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
                header("Location: ControlRecomendacion.php?mensaje=Enlace agregado correctamente");
                exit();
            } else {
                echo "Error al guardar el recurso en la base de datos.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Recurso al Alumno</title>
</head>
<body>
    <h1>Agregar Recurso al Alumno</h1>
    <form action="Control_Recurso.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="accion" value="agregar">
        
        <label for="idAlumno">Alumno:</label>
        <select id="idAlumno" name="idAlumno" required>
            <?php while ($alumno = $resultado->fetch_assoc()): ?>
                <option value="<?= htmlspecialchars($alumno['id']) ?>"><?= htmlspecialchars($alumno['nombre']) ?></option>
            <?php endwhile; ?>
        </select>
        <br><br>

        <label for="tipo">Tipo de Recurso:</label>
        <select id="tipo" name="tipo" required>
            <option value="documento">Documento (PDF)</option>
            <option value="enlace">Enlace</option>
        </select>
        <br><br>

        <div id="documentoFields">
            <label for="pdf">Cargar Documento (PDF):</label>
            <input type="file" id="pdf" name="pdf" accept="application/pdf">
            <br><br>
        </div>

        <div id="enlaceFields" style="display: none;">
            <label for="enlace">Ingrese el Enlace:</label>
            <input type="url" id="enlace" name="enlace" placeholder="https://example.com">
            <br><br>
        </div>

        <button type="submit">Agregar Recurso</button>
    </form>

    <script>
        document.getElementById('tipo').addEventListener('change', function() {
            var tipo = this.value;
            if (tipo === 'documento') {
                document.getElementById('documentoFields').style.display = 'block';
                document.getElementById('enlaceFields').style.display = 'none';
                document.getElementById('pdf').required = true;
                document.getElementById('enlace').required = false;
            } else if (tipo === 'enlace') {
                document.getElementById('documentoFields').style.display = 'none';
                document.getElementById('enlaceFields').style.display = 'block';
                document.getElementById('pdf').required = false;
                document.getElementById('enlace').required = true;
            }
        });

        // Activar el cambio por defecto para asegurar que los campos estén configurados correctamente al cargar la página
        document.getElementById('tipo').dispatchEvent(new Event('change'));
    </script>
</body>
</html>
